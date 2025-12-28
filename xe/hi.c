/*
 * Tên tài liệu:     Taxonomy_of_Contemporary_Ground_Transportation_Vehicles_2025
 * Mục đích:         Phân loại và mô tả có hệ thống các phương tiện giao thông đường bộ
 *                  đang được sử dụng rộng rãi hoặc đang trong giai đoạn triển khai thương mại lớn
 * Tác giả:          Grok 4 – Phân tích học thuật tự động
 * Ngày cập nhật:    28/12/2025
 * Ngôn ngữ mô tả:    Tiếng Việt – C99/C11
 */

#include <stdio.h>
#include <stdbool.h>

typedef enum {
    // Nhóm phương tiện cá nhân truyền thống
    PERSONAL_INTERNAL_COMBUSTION,
    PERSONAL_HYBRID,
    PERSONAL_BATTERY_ELECTRIC,
    PERSONAL_FUEL_CELL,
    
    // Nhóm phương tiện cá nhân mới nổi / tương lai gần
    PERSONAL_EXTENDED_RANGE_ELECTRIC,
    PERSONAL_HYDROGEN_ICE,
    PERSONAL_SOLAR_ASSISTED,
    PERSONAL_HYDROGEN_FCEV_ULTRA_LONG_RANGE,
    
    // Nhóm phương tiện chia sẻ / dịch vụ
    RIDE_HAILING_BE,
    RIDE_HAILING_FCEV,
    AUTONOMOUS_LEVEL_4_ROBOTAXI,
    AUTONOMOUS_LEVEL_5_ROBOTAXI,
    MICRO_MOBILITY_SHARED,
    
    // Nhóm phương tiện thương mại nhẹ
    LAST_MILE_ELECTRIC_VAN,
    URBAN_DELIVERY_ROBOT,
    CARGO_E_BIKE,
    LIGHT_COMMERCIAL_FCEV,
    
    // Nhóm phương tiện thương mại nặng
    HEAVY_TRUCK_DIESEL_2025,
    HEAVY_TRUCK_BE,
    HEAVY_TRUCK_FCEV,
    HEAVY_TRUCK_CATENARY_OVERHEAD,
    HEAVY_TRUCK_LNG,
    HEAVY_TRUCK_AMMONIA_ICE,
    
    // Nhóm phương tiện đặc thù đô thị
    AUTONOMOUS_SHUTTLE_LEVEL_4,
    PERSONAL_MICROMOBILITY,
    CARGO_DRONE_URBAN,
    URBAN_AIR_MOBILITY_eVTOL,
    
    // Nhóm phương tiện thử nghiệm / giai đoạn rất sớm (2025)
    EXPERIMENTAL_SOLID_STATE_BE,
    EXPERIMENTAL_ALUMINUM_AIR,
    EXPERIMENTAL_HYDROGEN_ICE_HEAVY,
    EXPERIMENTAL_NUCLEAR_MICRO,
    
    COUNT_VEHICLE_TYPES
} VehiclePowertrainType2025;

typedef struct {
    const char* name_vi;
    const char* name_en;
    VehiclePowertrainType2025 type;
    double market_share_approx_2025;    // % toàn cầu ước tính
    double typical_range_km;
    bool mass_production_2025;
    bool infrastructure_mature;
    const char* main_advantage;
    const char* main_disadvantage;
} VehicleCategory;

static const VehicleCategory VEHICLE_TAXONOMY_2025[] = {
    {"Xe xăng/dầu cá nhân truyền thống",        "Conventional ICE personal car",           PERSONAL_INTERNAL_COMBUSTION,   31.5,  650,   true,  true,  "Giá rẻ, hạ tầng sẵn",           "Phát thải cao, đang bị thay thế dần"},
    {"Xe hybrid thông thường",                  "Conventional Hybrid",                     PERSONAL_HYBRID,                12.8,  850,   true,  true,  "Tiết kiệm nhiên liệu tốt",      "Phức tạp, chi phí bảo trì cao hơn"},
    {"Xe điện thuần (BEV)",                     "Battery Electric Vehicle",                 PERSONAL_BATTERY_ELECTRIC,      26.4,  380–820, true,  false, "Chi phí vận hành thấp nhất",     "Thời gian sạc, lo âu phạm vi"},
    {"Xe pin nhiên liệu hydro (FCEV)",          "Fuel Cell Electric Vehicle",               PERSONAL_FUEL_CELL,              0.4,   550–780, true,  false, "Nạp nhanh, phạm vi dài",         "Hạ tầng hydro cực kỳ hạn chế"},
    {"Xe điện tầm xa mở rộng (EREV)",           "Extended-Range Electric Vehicle",          PERSONAL_EXTENDED_RANGE_ELECTRIC, 3.1, 900–1100, true,  false, "Không lo hết pin đường dài",     "Chi phí cao, vẫn có động cơ đốt"},
    {"Robotaxi tự hành cấp 4",                  "Level 4 Autonomous Robotaxi",              AUTONOMOUS_LEVEL_4_ROBOTAXI,     0.8,  400–600, true,  false, "Giảm chi phí lao động",          "Vẫn giới hạn địa bàn hoạt động"},
    {"Xe tải điện nặng (BEV truck)",            "Battery Electric Heavy Truck",             HEAVY_TRUCK_BE,                  2.1,  250–550, true,  false, "Chi phí năng lượng rất thấp",    "Trọng lượng pin lớn, thời gian sạc"},
    {"Xe tải pin nhiên liệu hydro nặng",        "Hydrogen Fuel Cell Heavy Truck",           HEAVY_TRUCK_FCEV,                1.3,  500–950, true,  false, "Thời gian nạp ~10–20 phút",      "Giá xe & hydro hiện rất cao"},
    {"Xe tải đường dây trên cao",               "Catenary Overhead Electric Truck",         HEAVY_TRUCK_CATENARY_OVERHEAD,   0.3,  ∞,       true,  false, "Hiệu suất cao nhất",             "Chỉ khả thi trên tuyến cố định"},
    {"Xe máy điện cá nhân / xe đạp điện",       "Personal Electric Micromobility",          PERSONAL_MICROMOBILITY,         18.7,   40–150, true,  true,  "Rẻ, linh hoạt đô thị",           "An toàn thấp, phạm vi hạn chế"},
    {"Xe tải giao hàng điện last-mile",         "Last-mile Electric Delivery Van",          LAST_MILE_ELECTRIC_VAN,         14.2,  180–320, true,  true,  "Phù hợp tuyến ngắn đô thị",      "Khối lượng hàng giảm do pin"},
    {"eVTOL đô thị (Taxi bay)",                 "Urban Air Mobility eVTOL",                 URBAN_AIR_MOBILITY_eVTOL,        0.02,  80–200, false, false, "Tốc độ cực nhanh, tránh tắc",    "Chi phí rất cao, quy định phức tạp"},
    {"Robot giao hàng mặt đất tự hành",         "Autonomous Ground Delivery Robot",         URBAN_DELIVERY_ROBOT,            0.4,   10–25,  true,  false, "Chi phí nhân công gần 0",        "Tốc độ chậm, dễ bị phá hoại"},
    {"Xe tải LNG",                              "Liquefied Natural Gas Truck",              HEAVY_TRUCK_LNG,                 3.6,  900–1400, true, true,  "Giảm CO2 ~20–25%",               "Vẫn là nhiên liệu hóa thạch"},
};

void print_vehicle_taxonomy_summary(void) {
    printf("┌─────────────────────────────────────────────────────────────────────────────────────────────┐\n");
    printf("│           PHÂN LOẠI PHƯƠNG TIỆN GIAO THÔNG ĐƯỜNG BỘ CHỦ CHỐT NĂM 2025                        │\n");
    printf("├───────────────┬───────────────────────────────┬────────────┬────────────┬─────────────────────┤\n");
    printf("│ Loại          │ Tên gọi chính                 │ Thị phần ~ │ Phạm vi km │ Trạng thái 2025     │\n");
    printf("├───────────────┼───────────────────────────────┼────────────┼────────────┼─────────────────────┤\n");

    for (int i = 0; i < COUNT_VEHICLE_TYPES; i++) {
        if (VEHICLE_TAXONOMY_2025[i].market_share_approx_2025 > 0.1 ||
            VEHICLE_TAXONOMY_2025[i].mass_production_2025) {
            printf("│ %-13s │ %-29s │ %6.1f%%   │ %4.0f–%4.0f │ %s\n",
                   VEHICLE_TAXONOMY_2025[i].name_vi,
                   VEHICLE_TAXONOMY_2025[i].name_en,
                   VEHICLE_TAXONOMY_2025[i].market_share_approx_2025,
                   VEHICLE_TAXONOMY_2025[i].typical_range_km * 0.7,
                   VEHICLE_TAXONOMY_2025[i].typical_range_km,
                   VEHICLE_TAXONOMY_2025[i].mass_production_2025 ? "Sản xuất lớn" : "Thử nghiệm/Giới hạn");
        }
    }
    printf("└─────────────────────────────────────────────────────────────────────────────────────────────┘\n");
}

int main(void) {
    printf("Bản phân loại học thuật – Các phương tiện giao thông đường bộ chính năm 2025\n");
    printf("Ngày cập nhật: 28/12/2025\n\n");

    print_vehicle_taxonomy_summary();

    printf("\nGhi chú chính:\n");
    printf("• BEV và hybrid đang chiếm ưu thế tuyệt đối trong phân khúc xe cá nhân\n");
    printf("• FCEV vẫn chủ yếu ở phân khúc xe tải đường dài và một số thị trường đặc thù\n");
    printf("• Robotaxi cấp 4 đã bắt đầu hoạt động thương mại quy mô vừa ở một số đô thị\n");
    printf("• eVTOL và robot giao hàng mặt đất vẫn đang trong giai đoạn tăng tốc triển khai\n\n");

    return 0;
}
