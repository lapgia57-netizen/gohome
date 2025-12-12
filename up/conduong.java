import java.util.Scanner;

public class HanhTrinhSuNghiep {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        
        // Các biến theo dõi chỉ số
        int kiThuat = 50;      // Kỹ thuật lập trình (0-100)
        int kinhNghiem = 0;    // Kinh nghiệm làm việc
        int hocVan = 0;        // Trình độ học vấn (0-5)
        int mangLuoi = 30;     // Mạng lưới quan hệ
        int tien = 0;          // Tiền tiết kiệm (triệu VND)
        String ten;
        
        System.out.println("========================================");
        System.out.println("   HÀNH TRÌNH HỌC VẤN & SỰ NGHIỆP   ");
        System.out.println("   Bạn sẽ trở thành ai trong 15 năm tới?");
        System.out.println("========================================");
        System.out.print("Nhập tên nhân vật của bạn: ");
        ten = sc.nextLine();
        
        System.out.println("\nChào " + ten + "! Hành trình bắt đầu từ lớp 12...\n");
        delay(2000);

        // ================= Giai đoạn 1: Sau THPT =================
        System.out.println("=== Giai đoạn 1: Sau khi tốt nghiệp THPT ===");
        System.out.println("Bạn sẽ chọn con đường nào?");
        System.out.println("1. Thi Đại học chính quy (FPT, Bách Khoa, BK HCM...)");
        System.out.println("2. Học Cao đẳng / Trung cấp nghề");
        System.out.println("3. Đi làm luôn + tự học online");
        System.out.print("Lựa chọn của bạn (1-3): ");
        int chon1 = sc.nextInt();
        
        switch (chon1) {
            case 1:
                hocVan += 3;
                kiThuat += 20;
                mangLuoi += 30;
                tien -= 200; // Học phí 4 năm
                System.out.println("Bạn học ngành CNTT 4 năm, ra trường có bằng khá!");
                break;
            case 2:
                hocVan += 2;
                kiThuat += 15;
                kinhNghiem += 20;
                tien -= 50;
                System.out.println("Bạn học Cao đẳng thực hành, vừa học vừa làm thêm.");
                break;
            case 3:
                hocVan += 0;
                kiThuat += 30;
                kinhNghiem += 40;
                tien += 300; // Đi làm sớm
                System.out.println("Bạn tự học trên YouTube, freeCodeCamp, làm freelancer từ năm 18 tuổi!");
                break;
        }
        delay(2500);

        // ================= Giai đoạn 2: 2: 22-25 tuổi =================
        System.out.println("\n=== Giai đoạn 2: 22-25 tuổi ===");
        System.out.println("Bạn đang có kỹ thuật = " + kiThuat + ", kinh nghiệm = " + kinhNghiem);
        System.out.println("Bạn muốn tập trung vào gì nhất trong 3 năm tới?");
        System.out.println("1. Làm ở công ty lớn (FPT, VNG, Tiki...) để lấy kinh nghiệm");
        System.out.println("2. Nhảy việc liên tục, tăng lương nhanh + học thêm công nghệ mới");
        System.out.println("3. Làm freelance / remote cho khách nước ngoài");
        System.out.println("4. Nghỉ việc khởi nghiệp luôn");
        System.out.print("Lựa chọn: ");
        int chon2 = sc.nextInt();
        
        switch (chon2) {
            case 1:
                kinhNghiem += 40;
                mangLuoi += 40;
                tien += 600;
                System.out.println("Bạn làm Senior sau 4 năm, lương ổn định, nhiều bạn bè trong ngành.");
                break;
            case 2:
                kiThuat += 30;
                tien += 1000;
                mangLuoi += 10;
                System.out.println("Bạn nhảy 4 công ty trong 3 năm, lương tăng gấp 3, kỹ thuật cực mạnh!");
                break;
            case 3:
                kiThuat += 40;
                tien += 2000;
                kinhNghiem += 20;
                System.out.println("Bạn làm remote cho khách Mỹ, Úc – thu nhập đô la, tiếng Anh tốt!");
                break;
            case 4:
                if (tien >= 300) {
                    tien -= 300;
                    if (Math.random() > 0.3) { // 30% thành công
                        tien += 10000;
                        System.out.println("Startup của bạn thành kỳ lân! Bạn là triệu phú USD ở tuổi 25!!!");
                    } else {
                        tien -= 200;
                        System.out.println("Startup thất bại... thất bại. Bạn quay lại đi làm với nhiều bài học quý giá.");
                    }
                } else {
                    System.out.println("Bạn không đủ tiền khởi nghiệp, đành đi làm thuê tiếp...");
                }
                break;
        }
        delay(2500);

        // ================= Giai đoạn 3: 26-30 tuổi =================
        System.out.println("\n=== Giai đoạn 3: 26-30 tuổi ===");
        System.out.println("Bạn có muốn học lên cao hơn không?");
        System.out.println("1. Học Thạc sĩ (trong hoặc ngoài nước)");
        System.out.println("2. Lấy chứng chỉ quốc tế (AWS, Google Cloud, PMP...)");
        System.out.println("3. Không học thêm, tập trung kiếm tiền và gia đình");
        System.out.print("Lựa chọn: ");
        int chon3 = sc.nextInt();
        
        if (chon3 == 1) {
            hocVan += 2;
            kiThuat += 20;
            mangLuoi += 30;
            tien -= 400;
            System.out.println("Bạn có bằng Thạc sĩ, dễ thăng tiến lên quản lý hoặc sang nước ngoài.");
        } else if (chon3 == 2) {
            kiThuat += 35;
            tien += 800;
            System.out.println("Bạn có hàng loạt chứng chỉ xịn, lương tăng vọt!");
        }

        // ================= KẾT QUẢ CUỐI CÙNG =================
        System.out.println("\n\n========================================");
        System.out.println("           KẾT QUẢ SAU 15 NĂM");
        System.out.println("========================================");
        System.out.println("Tên: " + ten);
        System.out.println("Trình độ học vấn: " + tenHocVan(hocVan));
        System.out.println("Kỹ thuật: " + capDo(kiThuat));
        System.out.println("Kinh nghiệm & mạng lưới: " + capDo((kinhNghiem + mangLuoi)/2));
        System.out.println("Tài sản tiết kiệm: " + tien + " triệu VND");

        String viTri = xepHangTongThe(kiThuat, kinhNghiem, hocVan, mangLuoi, tien);
        System.out.println("\n=> " + ten + " hiện tại là: " + viTri);
        System.out.println("========================================");
        
        sc.close();
    }
    
    public static String tenHocVan(int hv) {
        if (hv >= 5) return "Tiến sĩ";
        if (hv >= 4) return "Thạc sĩ";
        if (hv >= 3) return "Kỹ sư / Cử nhân";
        if (hv >= 2) return "Cao đẳng";
        return "Tự học / Không bằng cấp chính quy";
    }
    
    public static String capDo(int diem) {
        if (diem >= 90) return "Thần cấp / World-class";
        if (diem >= 75) return "Chuyên gia (Expert)";
        if (diem >= 60) return "Senior";
        if (diem >= 40) return "Mid-level";
        return "Junior";
    }
    
    public static String xepHangTongThe(int kt, int kn, int hv, int ml, int tien) {
        int tong = kt + kn + hv*15 + ml + tien/10;
        
        if (tong >= 800) return "CEO / Founder công ty công nghệ tỷ đô";
        if (tong >= 600) return "Giám đốc Công nghệ (CTO) / Kiến trúc sư trưởng ở tập đoàn lớn";
        if (tong >= 450) return "Technical Lead / Engineering Manager lương >100tr/tháng";
        if (tong >= 350) return "Senior Developer / Freelancer thu nhập cao, tự do tài chính";
        if (tong >= 250) return "Lập trình viên ổn định, có nhà xe ở thành phố lớn";
        return "Lập trình viên bình thường, cuộc sống đủ đầy";
    }
    
    public static void delay(long ms) {
        try {
            Thread.sleep(ms);
        } catch (InterruptedException e) {
            Thread.currentThread().interrupt();
        }
    }
}
