let request = new XMLHttpRequest();
request.open(
  "get",
  "http://localhost/p/my%20shop/content/rest%20api/product_page_content.php?" +
    window.location.href.split("?")[1]
);
request.send();
request.onreadystatechange = () => {
  if (request.readyState == 4 && request.status == 200) {
    let data = JSON.parse(request.responseText)[0];
    addDataToPage(
      data.label,
      data.rating,
      data.price,
      data.brand,
      data.categorie,
      data.dateT,
      data.size,
      data.store,
      data.description,
      data.discount
    );
    let imagesUrl = data.img.map((e) => {
      return "http://localhost/p/" + e;
    });

    var lButton = document.getElementById("left");
    var rButton = document.getElementById("right");
    var list = [];
    var minilist = [];
    var counter = 0;
    var y = "";
    var x = "translateX(-1200px)";

    function right() {
      if (counter < list.length - 1) {
        list[counter].style.transform = x;
        counter++;
        setmins();
      }
    }

    function left() {
      if (0 <= counter - 1) {
        list[counter - 1].style.transform = y;
        counter--;
        setmins();
      }
    }

    async function checkMiniDirection(num) {
      con = counter;
      if (counter > num) {
        for (let j = 0; j < con - num; j++) {
          left();
          await sleep(0.2);
        }
      } else {
        for (let j = 0; j < num - con; j++) {
          right();
          await sleep(0.2);
        }
      }
    }

    function setmins() {
      minilist.forEach((element, index) => {
        element.style.opacity = counter == index ? "10" : "0.7";
        element.style.border = counter == index ? "4px solid white" : "0";
        element.style.transform = `translateX(calc(${
          window.getComputedStyle(document.querySelector(".section")).width
        } / 2
         - ${
           window.getComputedStyle(document.querySelector(".minislider >*"))
             .width
         } / 2  
         - (  ${
           window.getComputedStyle(document.querySelector(".minislider >*"))
             .width
         } * ${counter} ) 
         -  ${
           window.getComputedStyle(document.querySelector(".minislider >*"))
             .marginRight
         } * ${counter}))`;
      });
    }
    lButton.addEventListener("click", (e) => {
      lButton.style.backgroundColor = "rgba(29, 29, 29, 0.507)";
      setTimeout(() => {
        lButton.style.backgroundColor = "transparent";
      }, 200);
      left();
    });
    rButton.addEventListener("click", (e) => {
      rButton.style.backgroundColor = "rgba(29, 29, 29, 0.507)";
      setTimeout(() => {
        rButton.style.backgroundColor = "transparent";
      }, 200);
      right();
    });
    for (let i = 0; i < imagesUrl.length; i++) {
      let e = document.createElement("img");
      e.id = `d${i}`;
      e.classList.add("image");
      e.src = `${imagesUrl[i]}`;
      e.style.zIndex = `${imagesUrl.length - i}`;
      document.querySelector(".section").appendChild(e);
      list.push(e);
    }
    for (let i = 0; i < imagesUrl.length; i++) {
      let e = document.createElement("div");
      e.id = `d${i}mini`;
      e.style.width =
        parseFloat(
          window.getComputedStyle(document.querySelector(".minislider")).height
        ) + "px";
      document.querySelector(".minislider").appendChild(e);
      minilist.push(e);
    }
    minilist.forEach((element, index) => {
      element.addEventListener("click", checkMiniDirection.bind(null, index));
      element.style.backgroundImage = `url("${imagesUrl[index]}")`;
    });
    function sleep(s) {
      return new Promise((resolve) => setTimeout(resolve, 1000 * s));
    }
    setmins();

    function zoom() {
      if (document.querySelector(".image") == null) {
        zoom();
      } else {
        document.querySelectorAll(".image").forEach((element) => {
          element.addEventListener("mousemove", (e) => {
            e.target.style.transition = "none";
            const target = e.target;
            const rect = target.parentElement.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            target.style.transformOrigin = x + "px " + y + "px";
            target.style.transform = "scale(3)";
            document.querySelector(".minislider").style.display = "none";
            document.querySelector("#left").style.display = "none";
            document.querySelector("#right").style.display = "none";
          });
          element.addEventListener("mouseout", (e) => {
            e.target.style.transition = "600ms ease-out";
            e.target.style.transform = "scale(1)";
            document.querySelector(".minislider").style.display = "flex";
            document.querySelector("#left").style.display = "block";
            document.querySelector("#right").style.display = "block";
          });
        });
      }
    }
    zoom();
    document.querySelector(".fa-chevron-down").onclick = (e) => {
      e.target.classList.toggle("rotate180");
      e.target.parentElement.parentElement.classList.toggle("smalldetail");
    };
    document.querySelector("#addToWish").onclick = async (e) => {
      let pId = new URLSearchParams(window.location.search).get("id");
      let res = await fetch(
        "http://localhost/p/my shop/content/rest api/wish.php",
        {
          method: "POST",
          header: { "Content-Type": "application/json" },
          body: pId,
        }
      );
      e.target.setAttribute("disabled",true)
      e.target.style.backgroudColor ="green"
    };
  }
};
function addDataToPage(
  label,
  rating,
  price,
  brand,
  categorie,
  date,
  size,
  store,
  description,
  discount
) {
  document.querySelector(".title").innerHTML = label;
  for ($j = 1; $j < 5; $j++) {
    if ($j > rating) {
      document.querySelector(".rating").innerHTML +=
        '<i style="color:gray;"class="fa-solid fa-star"></i>';
    } else {
      document.querySelector(".rating").innerHTML +=
        '<i class="fa-solid fa-star"></i>';
    }
  }
  document.querySelector(".rating span").innerHTML = rating;
  document.querySelector(".price").innerHTML = price;
  document.querySelector(
    "body > section > div > div.information > div.flexbox > div.details > ul > li:nth-child(1)"
  ).innerHTML += brand;
  document.querySelector(".details ul li:nth-child(2)").innerHTML += categorie;
  document.querySelector(".details ul li:nth-child(3)").innerHTML +=
    date.split(" ")[0];
  document.querySelector(".details ul li:nth-child(4)").innerHTML += size;
  document.querySelector(".details ul li:nth-child(5)").innerHTML += store;
  document.querySelector("#moredetailsp").innerHTML = description;
  document.querySelector("#dis p").innerHTML = discount;
}
