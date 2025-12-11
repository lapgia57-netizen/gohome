#include <QApplication>
#include "mainwindow.h"

int main(int argc, char *argv[])
{
    QApplication app(argc, argv);

    MainWindow window;
    window.setWindowTitle("Khung Giao Diện C++ - Qt");
    window.resize(400, 300);
    window.show();

    return app.exec();
}
