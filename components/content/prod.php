
<section class="prod">
        <div class="container">
            <h1 class="index_prod-title">Наши товары</h1>
            <div class="prod_items">
                <div class="prod_item">
                    <img src="assets/images/1.png" alt="" class="prod_img">
                    <p class="name_prod">Красное яблоко</p>
                    <p class="price_prod">99 Рублей</p>
                    <a href="" class="buy">Купить</a>
                </div>
                <div class="prod_item">
                    <img src="assets/images/2.png" alt="" class="prod_img">
                    <p class="name_prod">Спелая клубника</p>
                    <p class="price_prod">99 Рублей</p>
                    <a href="" class="buy">Купить</a>
                </div>
                <div class="prod_item">
                    <img src="assets/images/3.png" alt="" class="prod_img">
                    <p class="name_prod">Красная вишня</p>
                    <p class="price_prod">99 Рублей</p>
                    <a href="" class="buy">Купить</a>
                </div>
                <div class="prod_item">
                    <img src="assets/images/4.png" alt="" class="prod_img">
                    <p class="name_prod">Виноград свежий</p>
                    <p class="price_prod">99 Рублей</p>
                    <a href="" class="buy">Купить</a>
                </div>
                <div class="prod_item">
                    <img src="assets/images/5.png" alt="" class="prod_img">
                    <p class="name_prod">Малина великолепная</p>
                    <p class="price_prod">99 Рублей</p>
                    <a href="" class="buy">Купить</a>
                </div>
                <div class="prod_item">
                    <img src="assets/images/6.png" alt="" class="prod_img">
                    <p class="name_prod">Зеленое яблоко</p>
                    <p class="price_prod">99 Рублей</p>
                    <a href="" class="buy">Купить</a>
                </div>
                <?php
                                    $out_prod_str="SELECT * FROM `products`";
                                    $run_out_prod=mysqli_query($connect,$out_prod_str);
                                
                                
                                    while ($out_prod=mysqli_fetch_array($run_out_prod)) {
                                        echo"
                                        <div class='prod_item'>
                                        <img src='assets/images/$out_prod[avatar]' alt='' class='prod_img'>
                                        <p class='name_prod'>$out_prod[name_prod]</p>
                                        <p class='price_prod'>$out_prod[price] Рублей</p>
                                        <a href='' class='buy'>Купить</a>
                                        </div>
                                        ";
                                 
                                    }
                                ?>
            </div>
        </div>
    </section>
