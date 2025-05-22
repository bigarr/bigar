#include <iostream>
#include <queue>
#include <stack>
#include <vector>

using namespace std;

struct Pesanan {
    string nama;
    string jenisRoti;
    double totalHarga;
};

// Antrean menggunakan queue
queue<Pesanan> antrean;

// Riwayat menggunakan vector
vector<Pesanan> riwayat;

void ambilAntrean() {
    Pesanan p;
    cout << "Masukkan nama pembeli: ";
    getline(cin, p.nama);
    cout << "Masukkan jenis roti: ";
    getline(cin, p.jenisRoti);
    cout << "Masukkan total harga: ";
    cin >> p.totalHarga;
    cin.ignore(); // Buang newline dari buffer

    antrean.push(p);
    cout << "Pesanan berhasil ditambahkan ke antrean.\n";
}

void layaniPembeli() {
    if (antrean.empty()) {
        cout << "Antrean kosong. Tidak ada pesanan yang bisa dilayani.\n";
        return;
    }

    Pesanan p = antrean.front();
    antrean.pop();
    riwayat.push_back(p);

    cout << "Pesanan atas nama " << p.nama << " telah dilayani.\n";
}

void tampilkanAntrean() {
    if (antrean.empty()) {
        cout << "Tidak ada pesanan dalam antrean.\n";
        return;
    }

    queue<Pesanan> temp = antrean;
    int i = 1;
    cout << "Daftar Pesanan Dalam Antrean:\n";
    while (!temp.empty()) {
        Pesanan p = temp.front();
        cout << i++ << ". Nama: " << p.nama << ", Roti: " << p.jenisRoti << ", Harga: " << p.totalHarga << "\n";
        temp.pop();
    }
}

void batalkanPesananTerakhir() {
    if (antrean.empty()) {
        cout << "Antrean kosong. Tidak ada pesanan yang bisa dibatalkan.\n";
        return;
    }

    queue<Pesanan> temp;
    while (antrean.size() > 1) {
        temp.push(antrean.front());
        antrean.pop();
    }

    Pesanan dibatalkan = antrean.front();
    antrean.pop(); // Hapus pesanan terakhir

    antrean = temp;
    cout << "Pesanan terakhir atas nama " << dibatalkan.nama << " telah dibatalkan.\n";
}

void tampilkanRiwayat() {
    if (riwayat.empty()) {
        cout << "Belum ada pesanan yang dilayani.\n";
        return;
    }

    cout << "Riwayat Pesanan yang Sudah Dilayani:\n";
    for (size_t i = 0; i < riwayat.size(); ++i) {
        Pesanan p = riwayat[i];
        cout << i + 1 << ". Nama: " << p.nama << ", Roti: " << p.jenisRoti << ", Harga: " << p.totalHarga << "\n";
    }
}

void tampilkanMenu() {
    cout << "\n=== Sistem Antrean Toko Roti Manis Lezat ===\n";
    cout << "1. Ambil Antrean\n";
    cout << "2. Layani Pembeli\n";
    cout << "3. Tampilkan Pesanan dalam Antrean\n";
    cout << "4. Batalkan Pesanan Terakhir\n";
    cout << "5. Tampilkan Riwayat Pesanan\n";
    cout << "0. Keluar\n";
    cout << "Pilih menu: ";
}

int main() {
    int pilihan;
    do {
        tampilkanMenu();
        cin >> pilihan;
        cin.ignore(); // Membersihkan newline dari buffer

        switch (pilihan) {
            case 1:
                ambilAntrean();
                break;
            case 2:
                layaniPembeli();
                break;
            case 3:
                tampilkanAntrean();
                break;
            case 4:
                batalkanPesananTerakhir();
                break;
            case 5:
                tampilkanRiwayat();
                break;
            case 0:
                cout << "Terima kasih telah menggunakan sistem.\n";
                break;
            default:
                cout << "Pilihan tidak valid. Coba lagi.\n";
        }

    } while (pilihan != 0);

    return 0;
}
