
int factorial(int number) {
  if (number <= 0) {
    return 1;
  } else {
    return (number * factorial(number - 1));
  }
}

void main() {
  print('--- 3.1.1 Variable ---');
  // type annotation
  String nama = "Luthfi";
  int umur = 20;
  // multiple variable
  var a = 1, b = 2, c = 3;
  
  print('Nama saya $nama, umur $umur tahun.');
  print('Nilai multiple variable: a=$a, b=$b, c=$c\n');

  print('--- 3.1.2 Statement Control ---');
  int pilihan = 2;
  switch (pilihan) {
    case 1:
      print("Kamu memilih angka 1");
      break;
    case 2:
      print("Kamu memilih angka 2"); // Ini yang akan dieksekusi
      break;
    default:
      print("Pilihan tidak ada");
      break;
  }
  print(''); // Spasi kosong

  print('--- 3.1.3 Looping ---');
  // For Loops
  print('Contoh For Loops:');
  for (int i = 1; i <= 3; i++) {
    print('Perulangan For ke-$i');
  }
  
  // While Loops
  print('\nContoh While Loops:');
  int j = 1;
  while (j <= 2) {
    print('Perulangan While ke-$j');
    j++;
  }
  print('');

  print('--- 3.1.4 List ---');
  // Fixed Length List
  var newList = List.filled(3, 0);
  newList[0] = 12; // Mengisi index ke-0 dengan angka 12
  print('Hasil Fixed Length List: $newList');

  // Growable List
  var growableList = [];
  growableList.add(12);
  growableList.add(25);
  print('Hasil Growable List: $growableList\n');

  print('--- 3.1.5 Fungsi (Faktorial) ---');
  int angka = 5;
  print('Hasil faktorial dari $angka adalah: ${factorial(angka)}');
}