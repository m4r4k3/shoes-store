<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href=".\style\style.css" />
    <link rel="stylesheet" href="./style/repeat.css">
    <script src="https://kit.fontawesome.com/d4341dfe2d.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
     require('header.php')  ;
    ?>
    <article>
        <aside>
            <span>Sort by</span>
            <div class="sort">
                <select id="sortSelect">
                    <option value="s1" default>name ascending</option>
                    <option value="s0" >trending this week</option>
                    <option value="s2">name descending</option>
                    <option value="s3"> price ascending</option>
                    <option value="s4">price descending</option>
                    <option value="s5">rating descending</option>
                </select>
            </div>
            <hr />
            <ul class="filter">
                <span>Filter by</span>
                <li>
                    <span>a price range :</span>
                    <div>
                        <label for="minp">From:</label><input type="number" autocomplete="off" id="minp" />
                    </div>
                    <div>
                        <label for="maxp">To:</label><input autocomplete="off" type="number" id="maxp" />
                    </div>
                </li>
                <li>
                    <span>categories :</span>
                    <select class="categories">
                        <option value="0" selected>ALL</option>
                        <option value="T-shirts">T-shirts</option>
                        <option value="Jeans">Jeans</option>
                        <option value="Dresses">Dresses</option>
                        <option value="Shirts">Shirts</option>
                        <option value="Sweaters">Sweaters</option>
                        <option value="Hoodies">Hoodies</option>
                        <option value="Jackets">Jackets</option>
                        <option value="Coats">Coats</option>
                        <option value="Activewear">Activewear</option>
                        <option value="Swimwear">Swimwear</option>
                        <option value="Underwear">Underwear</option>
                        <option value="Socks">Socks</option>
                        <option value="Blouses">Blouses</option>
                        <option value="Skirts">Skirts</option>
                        <option value="Shorts">Shorts</option>
                        <option value="Pants">Pants</option>
                        <option value="Suits">Suits</option>
                        <option value="Ties">Ties</option>
                        <option value="Scarves">Scarves</option>
                        <option value="Hats">Hats</option>
                        <option value="Belts">Belts</option>
                        <option value="Gloves">Gloves</option>
                        <option value="Handbags">Handbags</option>
                        <option value="Backpacks">Backpacks</option>
                        <option value="Shoes">Shoes</option>
                        <option value="Sneakers">Sneakers</option>
                        <option value="Sandals">Sandals</option>
                        <option value="Boots">Boots</option>
                        <option value="Heels">Heels</option>
                        <option value="Flats">Flats</option>
                    </select>

                </li>
                <li>
                    <span>a rating :</span>
                    <div class="r1">
                        <input type="checkbox" class="rcheck" id="rcheck1" /><label for="rcheck1"><i
                                class="fa-solid fa-star"></i></label>
                    </div>
                    <div class="r2">
                        <input type="checkbox" class="rcheck" id="rcheck2" /><label for="rcheck2"><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></label>
                    </div>
                    <div class="r3">
                        <input type="checkbox" class="rcheck" id="rcheck3" /><label for="rcheck3"><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i></label>
                    </div>
                    <div class="r4">
                        <input type="checkbox" class="rcheck" id="rcheck4" /><label for="rcheck4"><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></label>
                    </div>
                    <div class="r5">
                        <input type="checkbox" class="rcheck" id="rcheck5" /><label for="rcheck5"><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><iclass="fa-solid fa-star"></i></label>
                    </div>
                </li>
                <li>
                    <span>brands :</span>
                    <select class="brandselect">
                        <option value="0" selected> ALL</option>
                        <option value="Adidas">Adidas</option>
                        <option value="Nike">Nike</option>
                        <option value="Puma">Puma</option>
                        <option value="Reebok">Reebok</option>
                        <option value="Vans">Vans</option>
                        <option value="Converse">Converse</option>
                        <option value="Levi's">Levi's</option>
                        <option value="Tommy Hilfiger">Tommy Hilfiger</option>
                        <option value="Calvin Klein">Calvin Klein</option>
                        <option value="GAP">GAP</option>
                        <option value="H&M">H&M</option>
                        <option value="Zara">Zara</option>
                        <option value="Forever 21">Forever 21</option>
                        <option value="Urban Outfitters">Urban Outfitters</option>
                        <option value="American Eagle">American Eagle</option>
                        <option value="Abercrombie &amp; Fitch">Abercrombie &amp; Fitch</option>
                        <option value="Ralph Lauren">Ralph Lauren</option>
                        <option value="Versace">Versace</option>
                        <option value="Gucci">Gucci</option>
                        <option value="Prada">Prada</option>
                        <option value="Dolce &amp; Gabbana">Dolce &amp; Gabbana</option>
                        <option value="Armani">Armani</option>
                        <option value="Balenciaga">Balenciaga</option>
                        <option value="Saint Laurent">Saint Laurent</option>
                        <option value="Givenchy">Givenchy</option>
                        <option value="Fendi">Fendi</option>
                        <option value="Burberry">Burberry</option>
                        <option value="Chanel">Chanel</option>
                        <option value="Louis Vuitton">Louis Vuitton</option>
                        <option value="Marc Jacobs">Marc Jacobs</option>
                        <option value="Michael Kors">Michael Kors</option>
                        <option value="Hugo Boss">Hugo Boss</option>
                        <option value="Lacoste">Lacoste</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Guess">Guess</option>
                        <option value="Ted Baker">Ted Baker</option>
                        <option value="Superdry">Superdry</option>
                        <option value="Fred Perry">Fred Perry</option>
                        <option value="Under Armour">Under Armour</option>
                        <option value="The North Face">The North Face</option>
                        <option value="Columbia">Columbia</option>
                        <option value="Patagonia">Patagonia</option>
                        <option value="Timberland">Timberland</option>
                        <option value="Carhartt">Carhartt</option>
                        <option value="Cotton On">Cotton On</option>
                        <option value="Uniqlo">Uniqlo</option>
                        <option value="Lululemon">Lululemon</option>
                        <option value="Victoria's Secret">Victoria's Secret</option>
                        <option value="GAP">Gap</option>
                        <option value="J.Crew">J.Crew</option>
                        <option value="Balmain">Balmain</option>
                        <option value="Yeezy">Yeezy</option>
                        <option value="Off-White">Off-White</option>
                        <option value="Alexander McQueen">Alexander McQueen</option>
                        <option value="Supreme">Supreme</option>
                        <option value="Givenchy">Givenchy</option>
                        <option value="Vetements">Vetements</option>
                        <option value="Balenciaga">Balenciaga</option>
                    </select>

                </li>
                <li>
                    <span>discount :</span>
                    <label for="dcheck10">-10%:</label>
                    <input type="checkbox" class="dcheck" id="dcheck10" />
                    <br>
                    <label for="dcheck25">-25%:</label>
                    <input type="checkbox" class="dcheck" id="dcheck25" />
                    <br>
                    <label for="dcheck30">-30%:</label>
                    <input type="checkbox" class="dcheck" id="dcheck30" />
                    <br>
                    <label for="dcheck50">-50%:</label>
                    <input type="checkbox" class="dcheck" id="dcheck50" />
                </li>
                <li >
                    <span>Sizes: <i class="fa-sharp fa-solid fa-chevron-down"></i></span>
                    <div class="sizes">
                    <div class="1"><label for="Sr1">S</label><input type="checkbox" class="scheck" id="SrS"></div>
                    <div class="2"><label for="Sr2">M</label><input type="checkbox" class="scheck" id="Sr2"></div>
                    <div class="3"><label for="Sr3">L</label><input type="checkbox" class="scheck" id="Sr3"></div>
                    <div class="4"><label for="Sr4">XL</label><input type="checkbox" class="scheck" id="Sr4"></div>
                    <div class="5"><label for="Sr5">XXL</label><input type="checkbox" class="scheck" id="Sr5"></div>
                    <div class="10"><label for="Sr10">10</label><input type="checkbox" class="scheck" id="Sr10"></div>
                    <div class="11"><label for="Sr11">11</label><input type="checkbox" class="scheck" id="Sr11"></div>
                    <div class="12"><label for="Sr12">12</label><input type="checkbox" class="scheck" id="Sr12"></div>
                    <div class="13"><label for="Sr13">13</label><input type="checkbox" class="scheck" id="Sr13"></div>
                    <div class="14"><label for="Sr14">14</label><input type="checkbox" class="scheck" id="Sr14"></div>
                    <div class="15"><label for="Sr15">15</label><input type="checkbox" class="scheck" id="Sr15"></div>
                    <div class="16"><label for="Sr16">16</label><input type="checkbox" class="scheck" id="Sr16"></div>
                    <div class="17"><label for="Sr17">17</label><input type="checkbox" class="scheck" id="Sr17"></div>
                    <div class="18"><label for="Sr18">18</label><input type="checkbox" class="scheck" id="Sr18"></div>
                    <div class="19"><label for="Sr19">19</label><input type="checkbox" class="scheck" id="Sr19"></div>
                    <div class="20"><label for="Sr20">20</label><input type="checkbox" class="scheck" id="Sr20"></div>
                    <div class="21"><label for="Sr21">21</label><input type="checkbox" class="scheck" id="Sr21"></div>
                    <div class="22"><label for="Sr22">22</label><input type="checkbox" class="scheck" id="Sr22"></div>
                    <div class="23"><label for="Sr23">23</label><input type="checkbox" class="scheck" id="Sr23"></div>
                    <div class="24"><label for="Sr24">24</label><input type="checkbox" class="scheck" id="Sr24"></div>
                    <div class="25"><label for="Sr25">25</label><input type="checkbox" class="scheck" id="Sr25"></div>
                    <div class="26"><label for="Sr26">26</label><input type="checkbox" class="scheck" id="Sr26"></div>
                    <div class="27"><label for="Sr27">27</label><input type="checkbox" class="scheck" id="Sr27"></div>
                    <div class="28"><label for="Sr28">28</label><input type="checkbox" class="scheck" id="Sr28"></div>
                    <div class="29"><label for="Sr29">29</label><input type="checkbox" class="scheck" id="Sr29"></div>
                    <div class="30"><label for="Sr30">30</label><input type="checkbox" class="scheck" id="Sr30"></div>
                    <div class="31"><label for="Sr31">31</label><input type="checkbox" class="scheck" id="Sr31"></div>
                    <div class="32"><label for="Sr32">32</label><input type="checkbox" class="scheck" id="Sr32"></div>
                    <div class="33"><label for="Sr33">33</label><input type="checkbox" class="scheck" id="Sr33"></div>
                    <div class="34"><label for="Sr34">34</label><input type="checkbox" class="scheck" id="Sr34"></div>
                    <div class="35"><label for="Sr35">35</label><input type="checkbox" class="scheck" id="Sr35"></div>
                    <div class="36"><label for="Sr36">36</label><input type="checkbox" class="scheck" id="Sr36"></div>
                    <div class="37"><label for="Sr37">37</label><input type="checkbox" class="scheck" id="Sr37"></div>
                    <div class="38"><label for="Sr38">38</label><input type="checkbox" class="scheck" id="Sr38"></div>
                    <div class="39"><label for="Sr39">39</label><input type="checkbox" class="scheck" id="Sr39"></div>
                    <div class="40"><label for="Sr40">40</label><input type="checkbox" class="scheck" id="Sr40"></div>
                    <div class="41"><label for="Sr41">41</label><input type="checkbox" class="scheck" id="Sr41"></div>
                    <div class="42"><label for="Sr42">42</label><input type="checkbox" class="scheck" id="Sr42"></div>
                    <div class="43"><label for="Sr43">43</label><input type="checkbox" class="scheck" id="Sr43"></div>
                    <div class="44"><label for="Sr44">44</label><input type="checkbox" class="scheck" id="Sr44"></div>
                </div></li>
                <li>
                    <button id="apply">apply</button>
                </li>
            </ul>
        </aside>
        <section>
        </section>
    </article>
    <script src="./scripts/script.js"></script>
</body>

</html>