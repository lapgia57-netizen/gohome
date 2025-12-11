import face_recognition
import cv2
import numpy as np
import pickle
import os
import sqlite3
from datetime import datetime
import pygame

# Khởi tạo âm thanh
pygame.mixer.init()
sound_in = pygame.mixer.Sound("sounds/vao.wav")  # Tạo file âm thanh hoặc dùng hệ thống loa
sound_out = pygame.mixer.Sound("sounds/ra.wav")
sound_unknown = pygame.mixer.Sound("sounds/canhbao.wav")

# Load tất cả nhân viên đã đăng ký
known_face_encodings = []
known_face_metadata = []

def load_known_faces():
    for filename in os.listdir("known_faces"):
        if filename.endswith(".pkl"):
            path = os.path.join("known_faces", filename)
            with open(path, 'rb') as f:
                data = pickle.load(f)
                for encoding in data["encodings"]:
                    known_face_encodings.append(encoding)
                    known_face_metadata.append({
                        "name": data["name"],
                        "employee_id": data["employee_id"],
                        "department": data["department"],
                        "last_seen": None,
                        "last_direction": None
                    })

def log_access(employee_id, name, direction):
    conn = sqlite3.connect('access_log.db')
    c = conn.cursor()
    timestamp = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    c.execute("INSERT INTO access_log (employee_id, name, timestamp, direction) VALUES (?, ?, ?, ?)",
              (employee_id, name, timestamp, direction))
    conn.commit()
    conn.close()
    print(f"[{timestamp}] {direction} - {name} ({employee_id})")

# Load dữ liệu nhân viên
load_known_faces()

video_capture = cv2.VideoCapture(0)
video_capture.set(3, 1280)
video_capture.set(4, 720)

print("Hệ thống kiểm soát ra vào KCN đang chạy... (Nhấn Q để thoát)")

while True:
    ret, frame = video_capture.read()
    rgb_frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
    face_locations = face_recognition.face_locations(rgb_frame)
    face_encodings = face_recognition.face_encodings(rgb_frame, face_locations)

    for (top, right, bottom, left), face_encoding in zip(face_locations, face_encodings):
        matches = face_recognition.compare_faces(known_face_encodings, face_encoding, tolerance=0.5)
        name = "Không xác định"
        employee_id = "Unknown"
        direction = ""

        if True in matches:
            first_match_index = matches.index(True)
            metadata = known_face_metadata[first_match_index]
            name = metadata["name"]
            employee_id = metadata["employee_id"]

            # Xác định hướng ra/vào (dựa trên lần thấy trước đó)
            now = datetime.now()
            last_seen = metadata.get("last_seen")
            last_direction = metadata.get("last_direction")

            if last_seen is None or (now - last_seen).seconds > 30:
                # Lần đầu hoặc lâu rồi mới thấy → coi như VÀO
                direction = "VÀO"
                sound_in.play()
            else:
                # Đã thấy gần đây → nếu trước đó là VÀO thì giờ là RA
                direction = "RA" if last_direction == "VÀO" else "VÀO"
                if direction == "RA":
                    sound_out.play()
                else:
                    sound_in.play()

            # Cập nhật metadata
            metadata["last_seen"] = now
            metadata["last_direction"] = direction

            log_access(employee_id, name, direction)

        else:
            sound_unknown.play()

        # Vẽ khung và thông tin
        cv2.rectangle(frame, (left, top), (right, bottom), (0, 255, 0) if name != "Không xác định" else (0, 0, 255), 2)
        cv2.rectangle(frame, (left, bottom - 35), (right, bottom), (0, 255, 0) if name != "Không xác định" else (0, 0, 255), cv2.FILLED)
        cv2.putText(frame, f"{name} - {employee_id}", (left + 6, bottom - 10),
                    cv2.FONT_HERSHEY_DUPLEX, 0.8, (255, 255, 255), 2)
        if direction:
            cv2.putText(frame, direction, (left + 6, top - 10),
                        cv2.FONT_HERSHEY_DUPLEX, 0.8, (0, 255,255), 2)

    # Hiển thị thời gian hiện tại
    cv2.putText(frame, datetime.now().strftime("%Y-%m-%d %H:%M:%S"),
                (10, 30), cv2.FONT_HERSHEY_SIMPLEX, 1, (255, 255, 255), 2)

    cv2.imshow('Hệ thống kiểm soát ra vào KCN - xAI Tech', frame)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

video_capture.release()
cv2.destroyAllWindows()
