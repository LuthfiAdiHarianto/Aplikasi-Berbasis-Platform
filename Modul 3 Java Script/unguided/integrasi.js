const claimBtn = document.getElementById('claimBtn');
const closeModalBtn = document.getElementById('closeModal');
const overlay = document.getElementById('modalOverlay');
const modal = document.getElementById('modalBox');
const thrAmountDisplay = document.getElementById('thrAmount');
const statusText = document.getElementById('statusText');
const giftIcon = document.querySelector('.gift-icon-container');

let isClaimed = false;


const formatRupiah = (number) => {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    }).format(number);
};


const generateRandomAmount = () => {
    const min = 50000;
    const max = 1000000;
    // Bulatkan ke ribuan terdekat
    const rawAmount = Math.floor(Math.random() * (max - min + 1)) + min;
    return Math.round(rawAmount / 1000) * 1000;
};


const openModal = () => {
    overlay.style.display = 'flex';
    
    setTimeout(() => {
        overlay.style.opacity = '1';
        modal.classList.add('active');
    }, 10);
};


const closeModalFunc = () => {
    overlay.style.opacity = '0';
    modal.classList.remove('active');
    setTimeout(() => {
        overlay.style.display = 'none';
    }, 300);
};


const claimTHR = () => {
    if (isClaimed) return; // Mencegah klik ganda

    isClaimed = true;
    claimBtn.disabled = true;
    claimBtn.querySelector('.btn-text').textContent = 'Sedang Mengambil...';
    statusText.textContent = 'Membuka keberuntunganmu... ✨';
    
    
    setTimeout(() => {
       
        const amount = generateRandomAmount();
        thrAmountDisplay.textContent = formatRupiah(amount);
        
        
        claimBtn.querySelector('.btn-text').textContent = 'THR Terambil!';
        statusText.textContent = 'Selamat! Lihat detailnya di layar.';

        
        createConfetti();
        
        
        openModal();
    }, 1500); // Jeda 1.5 detik
};


claimBtn.addEventListener('click', claimTHR);
giftIcon.addEventListener('click', claimTHR); // Klik pada icon hadiah juga bisa

closeModalBtn.addEventListener('click', closeModalFunc);
overlay.addEventListener('click', (e) => {
    // Tutup jika klik di luar box modal
    if (e.target === overlay) closeModalFunc();
});


function createConfetti() {
    // Warna-warna mewah (gold, putih, cream, biru muda)
    const colors = ['#d4af37', '#ffffff', '#fef3c7', '#4da9fc', '#34d399'];
    
    // Buat 60 partikel
    for (let i = 0; i < 60; i++) {
        const confetti = document.createElement('div');
        confetti.classList.add('confetti');
        
        // Posisi awal acak
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.top = (Math.random() * 20) - 10 + 'vh'; // Sedikit di atas layar
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0%'; // Variasi bentuk bulat/kotak
        
        document.body.appendChild(confetti);

        // Animasi jatuh dengan rotasi, ayunan horizontal, dan memudar
        const animation = confetti.animate([
            { 
                transform: `translate3d(0, 0, 0) rotate(0deg)`, 
                opacity: 1 
            },
            { 
                transform: `translate3d(${Math.random() * 200 - 100}px, 105vh, 0) rotate(${Math.random() * 1000}deg)`, 
                opacity: 0 
            }
        ], {
           
            duration: Math.random() * 2500 + 2500,
            easing: 'cubic-bezier(0.1, 0.8, 0.4, 1)'
        });

        
        animation.onfinish = () => confetti.remove();
    }
}