async function fetchData() {
  let minP = document.querySelector("#minp").value;
  let maxP = document.querySelector("#maxp").value;
  let sort = document.querySelector("#sortSelect").value[1];
  let categorie = document.querySelector(".categories").value;
  let rcheck = [];
  let dcheck = [];
  let scheck = [];
  let brand = document.querySelector(".brandselect").value;
  document.querySelectorAll(".rcheck:checked").forEach((e) => {
    rcheck.push(e.id[6]);
  });
  document.querySelectorAll(".dcheck:checked").forEach((e) => {
    dcheck.push(e.id.substring(6, 8));
  });
  document.querySelectorAll(".scheck:checked").forEach((e) => {
    scheck.push(e.id.substring(2));
  });

  document.querySelector("section").innerHTML = "";
  let response = await fetch(
    "http://localhost/p/my%20shop/content/rest%20api/main_content.php" +
      `?sort=${sort}&min_p=${minP}&max_p=${maxP}&categorie=${categorie}&rcheck=[${rcheck}]&scheck=[${scheck}]&dcheck=[${dcheck}]&brand=${brand}`
  );
  let data = await response.json();
  for (i of data) {
    let isInCart =  await cartChecker(i["id"]) ;
 
    let disc =
    i["discount"] != 0 ? `<div id="dis"><p>${i["discount"]}</p></div>` : "";
    let image = "http://localhost/p/" + i.imgs;
    let rating = "";
    for ($j = 1; $j < 5; $j++) {
      if ($j > i["rating"]) {
        rating += '<i style="color:gray;"class="fa-solid fa-star"></i>';
      } else {
        rating += '<i class="fa-solid fa-star"></i>';
      }
    }
    document.querySelector("section").innerHTML += `
          <a class="product" href="./productpage.php?id=${i["id"]}" >
          ${disc}
           <div class="image"><img src="${image}"
               alt="" /></div>
           <div class="information">
           <p class="price">${i["price"]}</p>
           <p class="title">${i["label"]}</p>
           </div>
           <div class="rating">
           ${rating}
           </div>
           <input type="button" data-id=${i["id"]} value="${isInCart?"added":"add to cart"}" class="addToCart ${isInCart?"added":""}">
           </a> 
           `;

  }
  document.querySelectorAll(".image").forEach((element) => {
    element.addEventListener("mousemove", (e) => {
      const target = e.target;
      const rect = target.parentElement.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      e.target.style.transformOrigin = x + "px " + y + "px";
      e.target.style.transform = "scale(3)";
    });
    element.addEventListener("mouseout", (e) => {
      e.target.style.transform = "scale(1)";
    });
  });
  document.querySelectorAll(".addToCart").forEach((el)=>{
    
    el.addEventListener("click" , (e)=>{
      e.preventDefault()
      let connection = new XMLHttpRequest() ;
      connection.open("post","http://localhost/p/my%20shop/content/rest api/test.php" , true )
      connection.onreadystatechange =()=>{
      if(connection.readyState ==4 && connection.status==200){
          e.target.classList.add("added")
          e.target.value = "added";
          e.target.setAttribute("disabled","true")
        }
      } 
      connection.send(e.currentTarget.getAttribute("data-id"))
    })
  })
}

document.onload = fetchData();
document.querySelector("#apply").addEventListener("click", () => {
  fetchData();
});
document.querySelector(".fa-chevron-down").onclick = (e) => {
  e.target.classList.toggle("fa-chevron-downactive");
  document.querySelector(".sizes").classList.toggle("sizesactive");
};

async function  cartChecker(id){
  let req = await fetch("http://localhost/p/my%20shop/content/rest%20api/cart.php",{
    method:"post"
  }) ;
  let data = await req.json() ;
  if(data.isEmpty){
    return false
  }
  for (j of data.data){
    if(j["id"] == id){
      return true ;
    }
  }
  return false ;
}