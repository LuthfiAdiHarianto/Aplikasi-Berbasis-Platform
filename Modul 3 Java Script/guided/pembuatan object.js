// Object mobil
const mobil = {
  warnaBadan: "merah",
  nomorPolisi: "BK1234AB"
};


const jadwalDetail = {
  platform: 34,
  telahBerangkat: false,
  asal: {
    kodeKota: "MDN",
    namaKota: "Medan",
    waktu: "2013-12-29 14:00"
  },
  tujuan: {
    kodeKota: "JKT",
    namaKota: "Jakarta",
    waktu: "2013-12-29 17:30"
  }
};


const output = document.getElementById("output");


output.innerHTML = `
  <h2>Data Mobil</h2>
  <p>Warna: ${mobil.warnaBadan}</p>
  <p>Nomor Polisi: ${mobil.nomorPolisi}</p>

  <h2>Jadwal Perjalanan</h2>
  <p>Platform: ${jadwalDetail.platform}</p>
  <p>Status: ${jadwalDetail.telahBerangkat ? "Sudah Berangkat" : "Belum Berangkat"}</p>
  <p>Asal: ${jadwalDetail.asal.namaKota} (${jadwalDetail.asal.waktu})</p>
  <p>Tujuan: ${jadwalDetail.tujuan.namaKota} (${jadwalDetail.tujuan.waktu})</p>
`;