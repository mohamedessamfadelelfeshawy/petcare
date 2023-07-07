let setting = document.querySelector("body .middle .profile_photo .icon");
let icon = document.querySelector("body .middle .profile_photo .icon i");
let user_name = document.querySelector(
  "body .middle .profile_photo .data .name"
);
let user_email = document.querySelector(
  "body .middle .profile_photo .data .email"
);
let add = document.querySelector(".my_animal .add");
let pictures = document.querySelector(".my_animal .pictures");
let pic1 = document.querySelectorAll(".my_animal .pictures .pic1");
let close = document.querySelectorAll(".close");
let close2 = document.querySelectorAll(".close2");
let smldav = document.querySelectorAll(".my_animal .pic1 .rex ");

let firstname = document.querySelector("body .middle form .d1");
let phone = document.querySelector("body .middle form .d2");
let adress = document.querySelector("body .middle form .d3");
let profile_photo = document.querySelector("body .middle .profile_photo");
let photo = document.querySelector(".photo1");
let iconph = document.querySelector("form .photo1 i");
let para = document.querySelector("form .photo1 p");
let btn = document.getElementById("btn");

/* adddtooooo*/
let add2 = document.querySelector("body .add2");
let add2_icon = document.querySelector("body .add2 .icon");

let num = 0;
let new_name;
/*
setting.addEventListener("click", () => {
  num += 1;
  if (num % 2 != 0) {
    icon.style.display = "none";
    setting.innerHTML = '<i class="fa-sharp fa-solid fa-check"></i>';

    add.style.display = "block";

    firstname.style.display = "block";
    firstname.style.margin = "10px 0px 0px 60px";
    lastname.style.display = "block";
    lastname.style.margin = "10px 0px 0px 60px";
    username.style.display = "block";
    username.style.margin = "10px 0px 0px 60px";
    phone.style.position = "relative";
    phone.stytle.bottom = "-70px";

    firstname.lastElementChild.style.background = "white";
    lastname.lastElementChild.style.background = "white";
    username.lastElementChild.style.background = "white";

    phone.lastElementChild.style.background = "white";
    adress.lastElementChild.style.background = "white";

    phone.lastElementChild.style.color = "black";
    adress.lastElementChild.style.color = "black";

    phone.lastElementChild.removeAttribute("disabled");
    adress.lastElementChild.removeAttribute("disabled");


    iconph.style.display = "block";
    para.style.display = "block";

    let z = 0;

    for (z; z < close2.length; z++) {
      let m = z;


      close2[m].style.display = "block";
      
      close2[z].addEventListener("click", () => {
        pic1[m].style.display = "none";
        m++;
      });
      smldav[m].style.display = "block";
      
   
      smldav[m].style.bottom = "41%";
    }

    add.addEventListener("click", () => {
      add2.style.display = "block";
    });
    add2_icon.addEventListener("click", () => {
      add2.style.display = "none";
    });
    btn.style.display = "block";
  } else {
    icon.style.display = "none";
    setting.innerHTML = '<i class="fa-solid fa-gear"></i>';

    add.style.display = "none";
    iconph.style.display = "none";
    para.style.display = "none";

    profile_name.style.display = "none";
    new_name = profile_name.lastElementChild.value;
    user_name.textContent = new_name;
    

    phone.style.bottom = "0px";
    phone.lastElementChild.style.background = "#70707038";
    phone.lastElementChild.style.color = "#707070";
    phone.lastElementChild.setAttribute("disabled", "disabled");
    adress.lastElementChild.style.color = "#707070";
    adress.lastElementChild.style.background = "#70707038";
    adress.lastElementChild.setAttribute("disabled", "disabled");
    btn.style.display = "none";

    let z = 0;

    for (z; z < close.length; z++) {
      let m = z;
         close2[m].style.display = "none";
      smldav[m].style.display = "block";
    }
  }
});

*/

/* cameraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa */
function previewFile() {
  var preview = document.getElementById("profile-image1");
  let file = document.getElementById("profile-image-upload").files[0];
  var reader = new FileReader();

  reader.addEventListener(
    "load",
    function () {
      preview.src = reader.result;
    },
    false
  );

  if (file) {
    reader.readAsDataURL(file);
  }
}

/*
$(function () {
  $("#wany").on("click", function () {
    $("#profile-image-upload").click();
  });
});*/

/* adddddddtooooooooooooooooooooooooooooooooooooo */

function previewFilee() {
  var previeww = document.getElementById("profile-image2");
  let filee = document.getElementById("profile-image-upload2").files[0];
  var reader = new FileReader();

  reader.addEventListener(
    "load",
    function () {
      previeww.src = reader.result;
    },
    false
  );

  if (filee) {
    reader.readAsDataURL(filee);
  }
}

/*
$(function () {
  $("#addto").on("click", function () {
    $("#profile-image-upload2").click();
  });
});
*/

let intervalId = null;

function startCountdown() {
  // Set the date to countdown to (30 days from now)
  const countdownDate = new Date();
  countdownDate.setDate(countdownDate.getDate() + 30);

  // Update the countdown every second
  intervalId = setInterval(() => {
    // Get the current date and time
    const now = new Date().getTime();

    // Calculate the difference between now and the countdown date
    const difference = countdownDate - now;

    // Calculate days, hours, minutes, and seconds
    const days = Math.floor(difference / (1000 * 60 * 60 * 24));
    const hours = Math.floor(
      (difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((difference % (1000 * 60)) / 1000);

    // Update the countdown element
    const countdownElement = document.getElementById("countdown");
    //countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;

    // Show the alert after 30 days
    if (difference <= 0) {
      clearInterval(intervalId);
      setTimeout(() => {
        alert("30 days have passed!");
        startCountdown();
      }, 0);
    }
  }, 1000);
}

// Start the countdown
startCountdown();
