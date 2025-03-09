#include <iostream>
#include <iomanip>
using namespace std;

struct Film {
    string kode;
    string judul;
    double rating;
};

void tampilkanFilm(Film* films, int jumlah) {
    cout << "\n===================================\n";
    cout << "Judul          Kode      Rating\n";
    cout << "===================================\n";
    for (int i = 0; i < jumlah; i++) {
        cout << left << setw(15) << films[i].judul 
             << setw(10) << films[i].kode 
             << fixed << setprecision(2) << films[i].rating << endl;
    }
    cout << "===================================\n";
}

void cariBerdasarkanKode(Film* films, int jumlah, string kode) {
    for (int i = 0; i < jumlah; i++) {
        if (films[i].kode == kode) {
            cout << "Film ditemukan: " << films[i].judul << " - Rating: " << films[i].rating << endl;
            return;
        }
    }
    cout << "Film dengan kode " << kode << " tidak ditemukan.\n";
}

int binarySearch(Film* films, int left, int right, string judul) {
    while (left <= right) {
        int mid = left + (right - left) / 2;
        if (films[mid].judul == judul) {
            return mid;
        } else if (films[mid].judul < judul) {
            left = mid + 1;
        } else {
            right = mid - 1;
        }
    }
    return -1;
}

void quickSort(Film* films, int low, int high) {
    if (low < high) {
        double pivot = films[high].rating;
        int i = low - 1;
        for (int j = low; j < high; j++) {
            if (films[j].rating < pivot) {
                i++;
                swap(films[i], films[j]);
            }
        }
        swap(films[i + 1], films[high]);
        int pi = i + 1;
        quickSort(films, low, pi - 1);
        quickSort(films, pi + 1, high);
    }
}

void bubbleSort(Film* films, int jumlah) {
    for (int i = 0; i < jumlah - 1; i++) {
        for (int j = 0; j < jumlah - i - 1; j++) {
            if (films[j].rating < films[j + 1].rating) {
                swap(films[j], films[j + 1]);
            }
        }
    }
}

int main() {
    Film films[] = {
        {"A01", "Trolls", 7.00},
        {"A02", "Nimona", 7.50},
        {"A03", "Shrek", 8.50},
        {"A04", "Epic", 8.90},
        {"A05", "Home", 6.50}
    };
    int jumlah = sizeof(films) / sizeof(films[0]);
    
    int pilihan;
    do {
        cout << "\n======== Bioskop XII =========\n";
        cout << "1. Tampilkan Film\n";
        cout << "2. Cari berdasarkan kode\n";
        cout << "3. Cari berdasarkan\n";
        cout << "4. Sort Rating\n";
        cout << "5. Sort Rating\n";
        cout << "6. Keluar\n";
        cout << "Pilih menu: ";
        cin >> pilihan;
        
        switch (pilihan) {
            case 1:
                tampilkanFilm(films, jumlah);
                break;
            case 2: {
                string kode;
                cout << "Masukkan kode film: ";
                cin >> kode;
                cariBerdasarkanKode(films, jumlah, kode);
                break;
            }
            case 3: {
                string judul;
                cout << "Masukkan judul film: ";
                cin.ignore();
                getline(cin, judul);
                int index = binarySearch(films, 0, jumlah - 1, judul);
                if (index != -1) {
                    cout << "Film ditemukan: " << films[index].judul << " - Rating: " << films[index].rating << endl;
                } else {
                    cout << "Film dengan judul " << judul << " tidak ditemukan.\n";
                }
                break;
            }
            case 4:
                quickSort(films, 0, jumlah - 1);
                tampilkanFilm(films, jumlah);
                break;
            case 5:
                bubbleSort(films, jumlah);
                tampilkanFilm(films, jumlah);
                break;
            case 6:
                cout << "See yu...\n";
                break;
            default:
                cout << "eitsss...\n";
        }
    } while (pilihan != 6);
    
    return 0;
}
