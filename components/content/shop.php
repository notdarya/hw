<section class="content">
        <div class="container">
        <h1 class="content_title">Магазин правильного питания</h1>
            <p class="content_text">
                Магазин "Правильное питание" - это уникальное место, где вы можете обеспечить свое тело всем необходимым для здорового образа жизни. Наш магазин специализируется на продаже натуральных и органических продуктов питания, гарантируя, что вы получите самые свежие и качественные товары.  
            </p>
            <p class="content_text">
                У нас имеется широкий выбор фруктов и овощей, выращенных без использования химических удобрений и пестицидов. Мы также предлагаем цельные зерна, органические молочные продукты, свежую рыбу и мясо, безопасные для здоровья человека.
            </p>
            <p class="content_text">
                В магазине "Правильное питание" вы найдете также множество продуктов для вегетарианцев и веганов, таких как соевые продукты, орехи, семена и многое другое.
            </p>
            <p class="content_text">
                Мы гарантируем, что все наши товары совершенно безопасны для потребления и рекомендуемые диетологами. У нас работают высококвалифицированные сотрудники, готовые помочь вам с выбором продуктов и подсказать, как составить полноценное и сбалансированное меню.
            </p>
            <p class="content_text">
                Наши цены доступны для каждого, так как мы стремимся сделать здоровое питание доступным для всех слоев населения.
            </p>
            <p class="content_text">
                Загляните в магазин "Правильное питание" и убедитесь сами в наших преимуществах - качестве, свежести и разнообразии продуктов, которые помогут вам в достижении оптимального здоровья и физической формы.
            </p>
        </div>
    </section>
    <section class="index_prod">
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