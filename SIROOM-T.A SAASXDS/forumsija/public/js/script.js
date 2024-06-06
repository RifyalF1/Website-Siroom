// Buat Profile bisa berubah
function previewImage(input) {
    const imagePreview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}

// Buat Tanggal Sekarang
document.addEventListener('DOMContentLoaded', (event) => {
    function formatDate(date) {
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        const dayName = days[date.getDay()];
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();

        return `${dayName}, ${day} ${month} ${year}`;
    }

    const dateContainer = document.getElementById('date-container');
    const today = new Date();
    dateContainer.textContent = formatDate(today);
});


// Buat konversi tanggal Hours Ago
function timeAgo(date) {
    const now = new Date();
    const past = new Date(date);
    const diffInSeconds = Math.floor((now - past) / 1000);

    const secondsInMinute = 60;
    const secondsInHour = 3600;
    const secondsInDay = 86400;

    if (diffInSeconds < secondsInMinute) {
        return `${diffInSeconds} Seconds ago`;
    } else if (diffInSeconds < secondsInHour) {
        const minutes = Math.floor(diffInSeconds / secondsInMinute);
        return `${minutes} Minutes ago`;
    } else if (diffInSeconds < secondsInDay) {
        const hours = Math.floor(diffInSeconds / secondsInHour);
        return `${hours} Hours ago`;
    } else {
        const days = Math.floor(diffInSeconds / secondsInDay);
        return `${days} Days ago`;
    }
}

document.addEventListener('DOMContentLoaded', (event) => {
    const elements = document.querySelectorAll('[data-timestamp]');
    elements.forEach(element => {
        const timestamp = element.getAttribute('data-timestamp');
        element.textContent = timeAgo(timestamp);
    });
});