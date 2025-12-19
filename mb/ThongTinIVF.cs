using System;

namespace ThongTinIVF
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.OutputEncoding = System.Text.Encoding.UTF8; // Để hiển thị tiếng Việt có dấu đúng

            Console.WriteLine("### Thụ tinh ống nghiệm (IVF) là gì?\n");

            Console.WriteLine("Thụ tinh ống nghiệm (IVF - In Vitro Fertilization) là phương pháp hỗ trợ sinh sản tiên tiến, " +
                              "trong đó trứng và tinh trùng được lấy ra khỏi cơ thể, kết hợp trong phòng thí nghiệm để tạo phôi. " +
                              "Sau đó, phôi được nuôi cấy vài ngày rồi chuyển vào tử cung người mẹ để phát triển thành thai nhi. " +
                              "Đây là giải pháp phổ biến cho các cặp vợ chồng hiếm muộn, vô sinh, được áp dụng tại Việt Nam từ năm 1997 " +
                              "và đã giúp hàng nghìn gia đình có con.\n");

            Console.WriteLine("Phương pháp này khác với bơm tinh trùng vào buồng tử cung (IUI): IUI chỉ đưa tinh trùng vào tử cung, " +
                              "còn thụ tinh vẫn xảy ra tự nhiên trong cơ thể; IVF thì toàn bộ quá trình thụ tinh diễn ra ngoài cơ thể.\n");

            Console.WriteLine("### Quy trình thực hiện IVF cơ bản\n");

            Console.WriteLine("Quy trình thường kéo dài khoảng 4-6 tuần, bao gồm các bước chính:\n");

            Console.WriteLine("1. **Kích thích buồng trứng**: Người vợ dùng thuốc tiêm kích thích để sản sinh nhiều trứng " +
                              "(thay vì chỉ 1 trứng mỗi chu kỳ tự nhiên). Theo dõi bằng siêu âm và xét nghiệm máu.\n");

            Console.WriteLine("2. **Chọc hút trứng**: Khi trứng chín, bác sĩ gây mê nhẹ và dùng kim chọc qua âm đạo để lấy trứng " +
                              "(thường 10-20 trứng).\n");

            Console.WriteLine("3. **Lấy tinh trùng**: Người chồng cung cấp mẫu tinh trùng (hoặc lấy từ mào tinh/mào tinh hoàn nếu cần).\n");

            Console.WriteLine("4. **Thụ tinh trong phòng lab**: Trứng và tinh trùng được kết hợp " +
                              "(có thể dùng kỹ thuật ICSI - tiêm tinh trùng trực tiếp vào trứng nếu tinh trùng yếu).\n");

            Console.WriteLine("5. **Nuôi cấy phôi**: Phôi được nuôi 3-5 ngày, có thể sàng lọc di truyền (PGS/PGD) để chọn phôi khỏe.\n");

            Console.WriteLine("6. **Chuyển phôi**: Chuyển 1-2 phôi vào tử cung (khuyến cáo chuyển ít để tránh đa thai).\n");

            Console.WriteLine("7. **Hỗ trợ hoàng thể và xét nghiệm thai**: Dùng thuốc hỗ trợ, xét nghiệm máu sau 10-14 ngày để kiểm tra thai.\n");

            Console.WriteLine("Quá trình an toàn, không đau đớn nhiều nhờ gây tê/mê.\n");

            Console.WriteLine("### Ưu điểm của IVF\n");

            Console.WriteLine("- Tỷ lệ thành công cao nhất trong các phương pháp hỗ trợ sinh sản (cao hơn IUI).\n" +
                              "- Áp dụng cho nhiều trường hợp khó: tắc vòi trứng, tinh trùng yếu/ít, lạc nội mạc tử cung, vô sinh không rõ nguyên nhân, tuổi cao.\n" +
                              "- Có thể sàng lọc di truyền để tránh bệnh cho con.\n" +
                              "- Bảo tồn phôi đông lạnh cho lần sau.\n" +
                              "- Trẻ sinh ra từ IVF phát triển bình thường như trẻ thụ thai tự nhiên.\n");

            Console.WriteLine("### Nhược điểm và rủi ro\n");

            Console.WriteLine("- Chi phí cao: Tại Việt Nam năm 2025, khoảng 80-120 triệu đồng/chu kỳ (bao gồm thuốc, thủ thuật; có thể cao hơn nếu cần kỹ thuật bổ sung).\n" +
                              "- Không đảm bảo 100% thành công, có thể cần làm nhiều chu kỳ.\n" +
                              "- Tác dụng phụ: Kích thích buồng trứng có thể gây đầy bụng, hội chứng quá kích (OHSS - hiếm gặp).\n" +
                              "- Rủi ro đa thai nếu chuyển nhiều phôi (dẫn đến sinh non, biến chứng).\n" +
                              "- Áp lực tâm lý, cảm xúc lớn do chờ đợi kết quả.\n");

            Console.WriteLine("### Tỷ lệ thành công\n");

            Console.WriteLine("Tỷ lệ thành công phụ thuộc chủ yếu vào **tuổi người vợ** (yếu tố quan trọng nhất), sức khỏe, nguyên nhân hiếm muộn và chất lượng trung tâm y tế:\n");

            Console.WriteLine("- Dưới 35 tuổi: 45-50% (thai lâm sàng/chu kỳ).\n" +
                              "- 35-40 tuổi: 30-40%.\n" +
                              "- Trên 40 tuổi: 10-20% hoặc thấp hơn.\n");

            Console.WriteLine("Tại Việt Nam (dữ liệu gần nhất 2023-2025 từ các bệnh viện lớn như Tâm Anh, Từ Dũ, Vinmec, Đông Đô): " +
                              "Trung bình 40-50%/chu kỳ, một số trung tâm đạt 60-70% ở nhóm trẻ. Tỷ lệ thai sinh sống khỏe mạnh khoảng 35-45%.\n");

            Console.WriteLine("### Ai nên làm IVF?\n");

            Console.WriteLine("- Tắc/hư vòi trứng.\n" +
                              "- Tinh trùng yếu, ít hoặc bất thường.\n" +
                              "- Lạc nội mạc tử cung nặng.\n" +
                              "- Vô sinh không rõ nguyên nhân.\n" +
                              "- Thất bại IUI nhiều lần.\n" +
                              "- Phụ nữ lớn tuổi hoặc dự trữ buồng trứng thấp.\n");

            Console.WriteLine("Nên khám sớm tại các trung tâm uy tín như Bệnh viện Từ Dũ, Tâm Anh, Vinmec, Đông Đô IVF, Nam học & Hiếm muộn Hà Nội để được tư vấn cá nhân hóa.\n");

            Console.WriteLine("Nếu bạn có câu hỏi cụ thể hơn (như chi phí chi tiết, trường hợp cá nhân, hoặc địa chỉ bệnh viện), hãy cho mình biết để hỗ trợ thêm nhé! " +
                              "Chúc bạn sớm có tin vui. 😊\n");

            Console.WriteLine("Nhấn phím bất kỳ để thoát...");
            Console.ReadKey();
        }
    }
}
