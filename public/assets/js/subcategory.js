/* ttttttttttwwwwwwwwwwwwwwwwwwwwwwwwooooooooooooooooooooooooooooooo */
let close = document.getElementById("closee");
let day = document.getElementById("game");
let addd = document.getElementById("exit");
let day2 = document.getElementById("game2");
let addd2 = document.getElementById("exit2");
let close2 = document.getElementById("closee2");
let fun = document.getElementById("iss");

let desc = document.getElementById("desc");
let bacc = document.getElementById("bacc");

/*
fun.addEventListener("click", () => {

  desc.innerHTML='hello world';

  addd.classList.add("overlayy_inner");
  day.style.display = "block";
});
*/

function function1(id){
  
  desc.innerHTML=document.getElementById("desc"+id).value;
  bacc.innerHTML='<img src="/assets/images/'+document.getElementById("img"+id).value+'">';

  addd.classList.add("overlayy_inner");
  day.style.display = "block";
}

close.addEventListener("click", () => {
  addd.classList.remove("overlayy_inner");
  day.style.display = "none";
});

  
