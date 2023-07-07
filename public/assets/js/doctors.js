let first = document.getElementById("frist_book");
let second = document.getElementById("second_book");
let thered = document.getElementById("thered_book");
let four = document.getElementById("four_book");
let ddd = document.querySelector(".bac_center .one .one_four");

let bac1 = document.getElementById("bac1");
let bac2 = document.getElementById("bac2");
let bac3 = document.getElementById("bac3");
let bac4 = document.getElementById("bac4");

/* let icons = document.getElementById("iconnn"); */

let over = document.getElementById("over");
let formm = document.getElementById("formm");

let finish = document.getElementById("fnish");

first.addEventListener("click", () => {
  over.classList.add("overlay");
  formm.style.display = "block";
  first.textContent = "waiting";
  bac1.style.backgroundColor = "#707070";
  bac1.innerHTML =
    '<i class="fa-sharp fa-solid fa-clock"   style="color: white;"></i > <span style="color: white;">waiting</span> ';
});

second.addEventListener("click", () => {
  over.classList.add("overlay");
  formm.style.display = "block";
  second.textContent = "waiting";
  bac2.style.backgroundColor = "#707070";
  bac2.innerHTML =
    '<i  class="fa-sharp fa-solid fa-clock" style="color: white;" ></i > <span style="color: white;">waiting</span> ';
});

thered.addEventListener("click", () => {
  over.classList.add("overlay");
  formm.style.display = "block";

  thered.textContent = "waiting";
  bac3.style.backgroundColor = "#707070";
  bac3.innerHTML =
    '<i  class="fa-sharp fa-solid fa-clock" style="color: white;" ></i > <span style="color: white;">waiting</span> ';
});

four.addEventListener("click", () => {
  over.classList.add("overlay");
  formm.style.display = "block";
  four.textContent = "waiting";
  bac4.style.backgroundColor = "#707070";
  bac4.innerHTML =
    '<i  class="fa-sharp fa-solid fa-clock" style="color: white;" ></i > <span style="color: white;">waiting</span> ';
});
