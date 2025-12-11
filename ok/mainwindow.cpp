#include "mainwindow.h"
#include <QMessageBox>

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
{
    // Tạo widget trung tâm
    QWidget *centralWidget = new QWidget(this);
    setCentralWidget(centralWidget);

    // Tạo layout dọc
    QVBoxLayout *layout = new QVBoxLayout(centralWidget);

    // Thêm nhãn chào
    label = new QLabel("Chào mừng bạn đến với GUI C++ + Qt!", this);
    label->setAlignment(Qt::AlignCenter);
    label->setStyleSheet("font-size: 18px; font-weight: bold; color: #0066cc;");

    // Thêm nút bấm
    QPushButton *button = new QPushButton("Nhấn vào tôi!", this);
    button->setStyleSheet("padding: 10px; font-size: 16px;");

    // Kết nối sự kiện click
    connect(button, &QPushButton::clicked, this, &MainWindow::onButtonClicked);

    // Thêm vào layout
    layout->addWidget(label);
    layout->addWidget(button);
    layout->setContentsMargins(20, 20, 20, 20);
}

void MainWindow::onButtonClicked()
{
    label->setText("Bạn đã nhấn nút! Tuyệt vời! 🎉");
    
    // Có thể hiện hộp thoại
    QMessageBox::information(this, "Thông báo", "Nút đã được nhấn thành công!");
}
