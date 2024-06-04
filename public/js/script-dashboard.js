window.onload = function () {
    let date = new Date();
    let jam = date.getHours();
    let welcomeMessage = "";
    const username = document
        .getElementById("username")
        .getAttribute("data-username");

    if (jam >= 4 && jam <= 10) {
        welcomeMessage = "Selamat Pagi, ";
    } else if (jam >= 11 && jam <= 14) {
        welcomeMessage = "Selamat Siang, ";
    } else if (jam >= 15 && jam <= 18) {
        welcomeMessage = "Selamat Sore, ";
    } else {
        welcomeMessage = "Selamat Malam, ";
    }

    welcomeMessage += username;
    document
        .getElementById("text")
        .insertAdjacentText("afterbegin", welcomeMessage);
    myFunction();
};

function myFunction() {
    const months = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
    ];
    const days = [
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu",
    ];
    let date = new Date();
    let jam = date.getHours();
    let tanggal = date.getDate();
    let hari = days[date.getDay()];
    let bulan = months[date.getMonth()];
    let tahun = date.getFullYear();
    let m = date.getMinutes();
    let s = date.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById(
        "date"
    ).innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
    requestAnimationFrame(myFunction);
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function previewFile() {
    var preview = document.querySelector("#preview");
    var file = document.querySelector("input[type=file]").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
        preview.style.display = "block";
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}
