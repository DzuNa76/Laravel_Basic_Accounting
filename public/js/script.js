// Toggle class active
const navbarNav = document.querySelector(".navbar-nav");

// Ketika hamburger menu diklik
document.querySelector("#hamburger-menu").onclick = () => {
    navbarNav.classList.toggle("active");
};

// Ketika klik diluar navbar
const hamburger = document.querySelector("#hamburger-menu");

document.addEventListener("click", function (e) {
    if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove("active");
    }
});

// Carousel automatically
var firstindex = 0;
function autoSlide() {
    var gbr;
    const img = document.querySelectorAll(".imgslide");
    for (gbr = 0; gbr < img.length; gbr++) {
        img[gbr].style.display = "none";
    }
    firstindex++;
    if (firstindex > img.length) {
        firstindex = 1;
    }
    img[firstindex - 1].style.display = "block";
    setTimeout(autoSlide, 5000);
}
autoSlide();

// Carousel Button
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides((slideIndex += n));
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides((slideIndex = n));
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("imgslide");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

// Fungsi untuk membuka modal dan mengisi data kategori secara otomatis
function bukaModal(categoryId) {
    // Menggunakan AJAX untuk memanggil skrip PHP get_kategori.php
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Mendapatkan respons JSON dari skrip PHP
            var responseData = JSON.parse(xhr.responseText);
            // Mengisi data kategori ke dalam formulir modal
            document.getElementById("detail-kategori").value =
                responseData.kategori;
            document.getElementById("detail-harga").value = responseData.harga;
            // Menampilkan modal
            document.getElementById("myModal").style.display = "flex";
        }
    };
    // Mengirimkan request GET ke skrip PHP dengan parameter categoryId
    xhr.open("GET", "get_kategori.php?id=" + categoryId, true);
    xhr.send();
}

// Fungsi untuk menutup modal
function tutupModal() {
    document.getElementById("myModal").style.display = "none";
}
