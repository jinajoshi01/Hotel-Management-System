let btn = document.querySelector(".btn");

const len = 200;

function moveButton() {
  const randomX = Math.floor(Math.random() * (innerWidth - len));
  const randomY = Math.floor(Math.random() * (innerHeight - len));
  this.style.top = `${randomY}px`;
  this.style.left = `${randomX}px`;
}


for (const eventName of ["mouseover", "mousemove"]) {
  btn.addEventListener(eventName, moveButton);
}

btn.addEventListener("click", function(){
  alert("haha");
});

document.addEventListener("contextmenu", (event)=>event.preventDefault());