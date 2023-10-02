var dropdowns = document.getElementsByClassName("dropdown-menu");
for (var i = 0; i < dropdowns.length; i++) {
  dropdowns[i].addEventListener("mouseover", function() {
    this.querySelector("ul").style.display = "block";
  });
  dropdowns[i].addEventListener("mouseout", function() {
    this.querySelector("ul").style.display = "none";
  });
}

var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");
var burgerMenu = document.getElementById("burgerMenu");

openBtn.addEventListener("click", openNav);
closeBtn.addEventListener("click", closeNav);

function openNav() {
  sidenav.classList.add("active");
  burgerMenu.classList.add("active");
}

function closeNav() {
  sidenav.classList.remove("active");
  burgerMenu.classList.remove("active");
}


