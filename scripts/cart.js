try {
    let xhr = new XMLHttpRequest();
    xhr.open("post", "http://localhost/p/my%20shop/content/rest%20api/cart.php",true)
    xhr.onreadystatechange = () => {
        if (xhr.status == 200 && xhr.readyState == 4  ) {
            document.querySelector("section").innerHTML =""
            data=JSON.parse(xhr.responseText).data
            for (i of data) {
                document.querySelector("section").innerHTML += `
            <div class="product">
            <div class="info">
                <div class="img">
                    <img src="${i.img.replace("my shop", "./")}" alt="">
                </div>
                <div class="label">
                    <p>${i.label}</p>
                </div>
                <div class="price">
                    <p>${i.price}</p>
                </div>
                <div class="qte">
                    <input type="number" name="qte${i.id}" id="qte">
                </div>
            </div>
            <div class="button">
                <input type="button" value="Order" id="order">
            </div>
            <div class="x">
            <i class="fa-solid fa-x" data-id="${i.cId}"></i>
            </div>
        </div>
            `
            }
            document.querySelectorAll(".fa-x").forEach(el=>{
                el.addEventListener("click",(e)=>{
                    xhr.open("delete", "http://localhost/p/my%20shop/content/rest%20api/cart.php")
                    xhr.send(e.currentTarget.getAttribute("data-id"))
            })
            })
        }

    }
    xhr.send()
  
} catch (error) {
    console.log(error)
}