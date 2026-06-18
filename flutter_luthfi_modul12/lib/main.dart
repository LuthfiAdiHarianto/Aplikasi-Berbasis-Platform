import 'dart:io';
import 'package:flutter/foundation.dart'; // Tambahkan ini untuk kIsWeb
import 'package:flutter/material.dart';
import 'package:image_picker/image_picker.dart';
import 'package:flutter_local_notifications/flutter_local_notifications.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Tugas Kamera & Notifikasi',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(primarySwatch: Colors.indigo, useMaterial3: true),
      home: const HomePage(),
    );
  }
}

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  // Ubah tipe data dari File? menjadi XFile? agar aman di Web
  XFile? _imageFile;

  final ImagePicker _picker = ImagePicker();
 // Gunakan kata kunci 'dynamic' untuk membypass pengecekan error di Web
  final dynamic _notificationsPlugin =
      FlutterLocalNotificationsPlugin();
  @override
  void initState() {
    super.initState();
    _initNotification();
  }

  // ---------------------------------------------------------------------
  // Inisialisasi plugin notifikasi lokal (Aman untuk web)
  // ---------------------------------------------------------------------
  Future<void> _initNotification() async {
    // Lewati inisialisasi jika berjalan di Web
    if (kIsWeb) return; 

    const AndroidInitializationSettings androidSettings =
        AndroidInitializationSettings('@mipmap/ic_launcher');

    const InitializationSettings initSettings = InitializationSettings(
      android: androidSettings,
    );

    await _notificationsPlugin.initialize(initSettings);
  }

  // ---------------------------------------------------------------------
  // Menampilkan notifikasi lokal
  // ---------------------------------------------------------------------
  Future<void> _showNotification() async {
    // Jika di web, tampilkan SnackBar sebagai ganti notifikasi sistem
    if (kIsWeb) {
      if (mounted) {
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(content: Text('Foto Berhasil ditambahkan!')),
        );
      }
      return;
    }

    const AndroidNotificationDetails androidDetails =
        AndroidNotificationDetails(
      'foto_channel_id',
      'Notifikasi Foto',
      channelDescription: 'Notifikasi setelah foto berhasil diambil/dipilih',
      importance: Importance.high,
      priority: Priority.high,
    );

    const NotificationDetails notifDetails = NotificationDetails(
      android: androidDetails,
    );

    await _notificationsPlugin.show(
      0,
      'Foto Berhasil!',
      'Foto kamu sudah berhasil diambil dan ditampilkan di aplikasi.',
      notifDetails,
    );
  }

  // ---------------------------------------------------------------------
  // Fungsi untuk membuka kamera
  // ---------------------------------------------------------------------
  Future<void> _ambilFotoDariKamera() async {
    final XFile? hasilFoto = await _picker.pickImage(
      source: ImageSource.camera,
      imageQuality: 80,
    );

    if (hasilFoto != null) {
      setState(() {
        _imageFile = hasilFoto; // Simpan sebagai XFile
      });
      await _showNotification();
    }
  }

  // ---------------------------------------------------------------------
  // Fungsi untuk memilih foto dari galeri
  // ---------------------------------------------------------------------
  Future<void> _pilihFotoDariGaleri() async {
    final XFile? hasilFoto = await _picker.pickImage(
      source: ImageSource.gallery,
      imageQuality: 80,
    );

    if (hasilFoto != null) {
      setState(() {
        _imageFile = hasilFoto; // Simpan sebagai XFile
      });
      await _showNotification();
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Kamera & Notifikasi'),
        centerTitle: true,
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: [
                ElevatedButton.icon(
                  onPressed: _ambilFotoDariKamera,
                  icon: const Icon(Icons.camera_alt),
                  label: const Text('Ambil Foto'),
                ),
                ElevatedButton.icon(
                  onPressed: _pilihFotoDariGaleri,
                  icon: const Icon(Icons.photo_library),
                  label: const Text('Pilih Galeri'),
                ),
              ],
            ),
            const SizedBox(height: 24),
            Expanded(
              child: Container(
                width: double.infinity,
                decoration: BoxDecoration(
                  border: Border.all(color: Colors.grey),
                  borderRadius: BorderRadius.circular(12),
                ),
                clipBehavior: Clip.hardEdge,
                child: _imageFile == null
                    ? const Center(child: Text('Belum ada foto yang dipilih'))
                    // Gunakan kIsWeb untuk merender gambar sesuai platform
                    : kIsWeb
                        ? Image.network(_imageFile!.path, fit: BoxFit.contain)
                        : Image.file(File(_imageFile!.path), fit: BoxFit.contain),
              ),
            ),
          ],
        ),
      ),
    );
  }
}