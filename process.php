<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Praktikan - Dynamic</title>
    <link rel="stylesheet" href="tugas no 1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="form-container">
    <h2>Formulir Pendaftaran</h2>
    <form id="pendaftaranForm">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label>Jenjang</label>
            <select name="jenjang" id="jenjang">
                <option value="S1">Tamat S1</option>
                <option value="D3">Tamat D3</option>
            </select>
        </div>
        
        <div style="margin-top: 20px; text-align: center;">
            <button type="submit" class="submit-btn">Kirim Data (AJAX)</button>
        </div>
    </form>

    <div id="responseMessage" style="margin-top: 20px; text-align: center; font-weight: bold;"></div>

    <div style="margin-top: 30px; text-align: center; font-size: 12px; color: #666;">
        Luthfi Adi Harianto <br>
        NIM : 2311102172
    </div>
</div>

<script>
// JavaScript & AJAX Logic
document.getElementById('pendaftaranForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Mencegah reload halaman

    // Ambil data dari form
    const formData = new FormData(this);

    // Animasi Loading
    const responseDiv = document.getElementById('responseMessage');
    responseDiv.innerHTML = "Sedang memproses...";

    // Eksekusi AJAX menggunakan Fetch API (Modern JS)
    fetch('process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success') {
            Swal.fire('Berhasil!', data.message, 'success');
            responseDiv.style.color = 'green';
            this.reset(); // Kosongkan form
        } else {
            Swal.fire('Oops!', 'Terjadi kesalahan', 'error');
            responseDiv.style.color = 'red';
        }
        responseDiv.innerHTML = data.message;
    })
    .catch(error => {
        console.error('Error:', error);
        responseDiv.innerHTML = "Gagal menghubungi server.";
    });
});
</script>

</body>
</html>