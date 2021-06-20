var i = 0;
var txt = 'Tracy merupakan bank sampah digital. Pilahlah sampah lalu tabung dan hasilkan lingkungan yang bersih. Daftarkan dirimu sekarang!!!';
var speed = 50;

function typeWriter() {
    if (i < txt.length) {
        document.getElementById("runningText").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
    }
  
}