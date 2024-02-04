
<section class="reg_form-index">
        <form class="reg_form"  method="POST" action="controllers/add.php">
            <input type="text" name="login" placeholder="логин" >
            <input type="text" name="name" placeholder="имя" >
            <input type="text" name="surname" placeholder="фамилия" >
            <input type="text" name="l_name" placeholder="отчество" >
            <input type="text" name="email" placeholder="почта" >
            <input type="text" name="pass" placeholder="пароль" >
            <input type="text"name="repass"  placeholder="повторите пароль" >
            <input type="submit" name="add_user" placeholder="войти" >
        </form>
        <?php
                            if($_SESSION['mess']){
                                echo "$_SESSION[mess]";
                                unset($_SESSION['mess']);
                            }
                            if($_SESSION['error']){
                                echo "$_SESSION[error]";
                                unset($_SESSION['error']);
                            }
                        ?>
    </section>
 