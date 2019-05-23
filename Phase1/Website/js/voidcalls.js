var i = 0;
var txt = 'The void calls...';
var speed = 150;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("voidcalls").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}