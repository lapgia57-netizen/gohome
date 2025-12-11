import face_recognition
import cv2
import numpy as np
import pickle
import os
import sqlite3

def register_employee():
    employee_id = input("Nhập mã nhân viên: ")
    name = input("Nhập họ tên: ")
    department = input("Nhập phòng ban: ")

    # Tạo thư mục nếu chưa có
    if not os.path.exists('known_faces'):
        os.makedirs('known_faces')

    video_capture = cv2.VideoCapture(0)
    print("Nhìn thẳng vào camera và nhấn SPACE để chụp ảnh (chụp 3 lần)")

    face_encodings = []
    count = 0

    while count < 3:
        ret, frame = video_capture.read()
        rgb_frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
        face_locations = face_recognition.face_locations(rgb_frame)
        face_encodings_temp = face_recognition.face_encodings(rgb_frame, face_locations)

        for (top, right, bottom, left), face_encoding in zip(face_locations, face_encodings_temp):
            cv2.rectangle(frame, (left, top), (right, bottom), (0, 255, 0), 2)
            cv2.putText(frame, f"Chup anh {count+1}/3", (left, top-10),
                        cv2.FONT_HERSHEY_SIMPLEX, 0.8, (0,255,0), 2)

        cv2.imshow('Dang ky - Nhan SPACE de chup', frame)

        key = cv2.waitKey(1)
        if key == 32:  # Phím Space
            if len(face_encodings_temp) > 0:
                face_encodings.append(face_encodings_temp[0])
                count += 1
                print(f"Đã chụp ảnh {count}/3")
            else:
                print("Không phát hiện khuôn mặt!")

    video_capture.release()
    cv2.destroyAllWindows()

    if len(face_encodings) == 3:
        # Lưu encoding vào file .pkl
        data = {
            "name": name,
            "employee_id": employee_id,
            "department": department,
            "encodings": face_encodings
        }
        
        filename = f"known_faces/{employee_id}_{name.replace(' ', '_')}.pkl"
        with open(filename, 'wb') as f:
            pickle.dump(data, f)

        # Lưu vào database
        conn = sqlite3.connect('access_log.db')
        c = conn.cursor()
        c.execute('''CREATE TABLE IF NOT EXISTS employees
                     (employee_id TEXT PRIMARY KEY, name TEXT, department TEXT)''')
        c.execute("INSERT OR REPLACE INTO employees VALUES (?, ?, ?)",
                  (employee_id, name, department))
        
        c.execute('''CREATE TABLE IF NOT EXISTS access_log
                     (id INTEGER PRIMARY KEY AUTOINCREMENT,
                      employee_id TEXT,
                      name TEXT,
                      timestamp TEXT,
                      direction TEXT)''')
        conn.commit()
        conn.close()

        print(f"Đăng ký thành công nhân viên: {name} ({employee_id})")
    ")
    else:
        print("Đăng ký thất bại!")

if __name__ == "__main__":
    register_employee()
