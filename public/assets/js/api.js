function Api() {
  let req1 = new XMLHttpRequest();


  req1.open("GET", '../../data.json', true);
  req1.send();



  req1.addEventListener("readystatechange", function () {
    if (this.readyState === 4 && this.status === 200) {
      let response = JSON.parse(this.responseText);
      let hayy = document.getElementById("sacbig");
      let conten = "";
      response.forEach((x) => {
        let prices = x.price;
        let img = x.image;
        let names = x.name;
    
        conten += `
      
          <div class="one" >
            <img src="${img}" alt="" />
            <h2>${names}</h2>
          <section class="line">
          <p>${prices}</p>
             <a href="#">Add to cart <i class="fa-brands fa-shopify"></i></a>  
             </section>
              </div>
        

        `;
      });
      hayy.innerHTML = conten;
    }
  });

}
Api();


let recomendation = document.getElementById("recomendation");
let dav = document.getElementById("geryy");
  
recomendation.addEventListener("click", () => {
  dav.style.display = "none";
})
