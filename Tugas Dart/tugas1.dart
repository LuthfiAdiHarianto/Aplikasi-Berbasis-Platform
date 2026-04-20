import 'dart:math';

void main() {
  print("=== Tugas List 2 Dimensi ===");
  
  // Inisialisasi list 2 dimensi kosong
  List<List<int>> isiList = [];

  // Baris 1: 4 bilangan kelipatan 6 mulai dari 6
  List<int> baris1 = [];
  for (int i = 1; i <= 4; i++) {
    baris1.add(i * 6);
  }
  isiList.add(baris1);

  // Baris 2: 5 bilangan ganjil mulai dari 3
  List<int> baris2 = [];
  for (int i = 0; i < 5; i++) {
    baris2.add(3 + (i * 2));
  }
  isiList.add(baris2);

  // Baris 3: 6 bilangan pangkat tiga mulai dari 4
  List<int> baris3 = [];
  for (int i = 4; i < 4 + 6; i++) {
    baris3.add(pow(i, 3).toInt());
  }
  isiList.add(baris3);

  // Baris 4: 7 bilangan asli beda 7 mulai dari 3
  List<int> baris4 = [];
  for (int i = 0; i < 7; i++) {
    baris4.add(3 + (i * 7));
  }
  isiList.add(baris4);

  // Menampilkan Output
  print("Isi List:");
  for (var baris in isiList) {
    print(baris.join(" "));
  }
}