package main

import (
    "fmt"
    "time"
    "math/rand"
)

type LuKhach struct {
    Ten       string
    NamThang  int // số năm tháng xa nhà
    KiUc      []string
    DaQua     []string
    ConDuong  string
    DangVeNha bool
}

func NewLuKhach(ten string) *LuKhach {
    return &LuKhach{
        Ten:      ten,
        NamThang: 0,
        KiUc:     []string{},
        DaQua:    []string{},
        DangVeNha: false,
    }
}

func (lk *LuKhach) LangBat(nam int) {
    fmt.Printf("🌍 %s bắt đầu hành trình xa quê...\n\n", lk.Ten)
    lk.NamThang = nam

    diaDanh := []string{
        "sa mạc vàng cháy bỏng", "rừng sâu đầy thú dữ", "thành phố đèn neon không ngủ",
        "đỉnh núi tuyết trắng xóa", "biển khơi sóng dữ", "làng quê xa lạ bên kia đại dương",
        "chiến trường khói lửa", "tu viện cổ giữa mây", "con đường tơ lụa đầy cát bụi",
    }

    rand.Seed(time.Now().UnixNano())
    rand.Shuffle(len(diaDanh), func(i, j int) { diaDanh[i], diaDanh[j] = diaDanh[j], diaDanh[i] })

    for i := 0; i < nam && i < len(diaDanh); i++ {
        noi := diaDanh[i]
    lk.DaQua = append(lk.DaQua, noi)

        kiUc := [...]string{
            fmt.Sprintf("ngồi bên lửa trại kể chuyện với những người du mục ở %s", noi),
            fmt.Sprintf("học được một câu nói cổ của người dân bản địa ở %s", noi),
            fmt.Sprintf("mất đi một người bạn trên đường ở %s", noi),
            fmt.Sprintf("tìm thấy một mảnh ghép của chính mình ở %s", noi),
            fmt.Sprintf("khóc một mình dưới bầu trời đầy sao ở %s", noi),
        }[rand.Intn(5)]

        lk.KiUc = append(lk.KiUc, kiUc)
        time.Sleep(300 * time.Millisecond)
        fmt.Printf("   Năm thứ %d: %s\n", i+1, kiUc)
    }
    fmt.Println()
}

func (lk *LuKhach) NhoVeNha() {
    fmt.Printf("🌅 Một buổi chiều %s đứng giữa sa mạc, gió mang theo mùi khói bếp từ làng quê cũ...\n", lk.Ten)
    time.Sleep(2 * time.Second)
    fmt.Printf("   Anh nghe thấy tiếng mẹ gọi tên mình trong gió.\n\n")
    time.Sleep(2 * time.Second)
    fmt.Printf("   \"%s ơi... về nhà thôi con...\"\n\n", lk.Ten)
    time.Sleep(2 * time.Second)

    fmt.Printf("💔 Trái tim %s chợt đau nhói. Bao nhiêu năm tháng rong ruổi,\n", lk.Ten)
    fmt.Printf("   hóa ra chỉ để nhận ra: nhà mới là nơi duy nhất mình thuộc về.\n\n")
    lk.DangVeNha = true
}

func (lk *LuKhach) HanhTrinhTroVe() {
    fmt.Printf("🚶‍♂️ %s quay đầu. Con đường trở về bắt đầu...\n\n", lk.Ten)

    buocChan := []string{
        "bước qua những cánh đồng lúa chín vàng từng bỏ lại",
        "vượt qua ngọn đồi nơi từng thả diều ngày bé",
        "nghe lại tiếng chó sủa vang trong xóm nhỏ",
        "ngửi thấy mùi rơm rạ, mùi khói bếp củi thân thương",
        "thấy ánh đèn dầu leo lét trước hiên nhà",
        "và cuối cùng... thấy bóng mẹ già đứng đợi ở đầu ngõ",
    }

    for i, buoc := range buocChan {
        time.Sleep(1 * time.Second)
        fmt.Printf("   Bước thứ %d: %s...\n", i+1, buoc)
    }

    time.Sleep(2 * time.Second)
    fmt.Println()
    fmt.Printf("🏡 %s quỳ xuống trước mẹ, nước mắt rơi như mưa:\n", lk.Ten)
    fmt.Printf("   \"Con đã về rồi, mẹ ơi...\"\n\n")

    fmt.Printf("   Người mẹ già ôm lấy đứa con trai lạc lối bao năm,\n")
    fmt.Printf("   thì thầm: \"Về được là tốt rồi, con ơi... về được là tốt rồi...\"\n\n")

    fmt.Println("🌟 Hành trình trở về đã hoàn thành.")
    fmt.Println("Và từ đó, ngôi nhà nhỏ lại sáng đèn mỗi tối,")
    fmt.Println("   tiếng cười lại vang lên, ấm áp như chưa từng xa cách.")
}

func main() {
    fmt.Println("════════════════════════════════════")
    fmt.Println("       HÀNH TRÌNH TRỞ VỀ")
    fmt.Println("   (Một câu chuyện nhỏ bằng Go)")
    fmt.Println("════════════════════════════════════\n")

    nguoi = NewLuKhach("Minh")

    nguoi.LangBat(12)      // lang bạt 12 năm
    nguoi.NhoVeNha()       // chợt nhớ nhà
    nguoi.HanhTrinhTroVe() // trở về

    fmt.Println("\n💌 Cảm ơn bạn đã đồng hành cùng câu chuyện.")
    fmt.Println("   Hãy nhớ: dù đi đâu, xa bao lâu,")
    fmt.Println("   nhà vẫn luôn là nơi trái tim mình.")
}
