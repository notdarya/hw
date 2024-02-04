<!-- <section class="auth_form-index">
        <form class="auth_form" method="POST" action="controllers/auth.php">
            <input type="text" name="login" placeholder="логин" >
            <input type="text" name="pass"  placeholder="пароль" >
            <input type="submit" name="auth_user" placeholder="войти" >
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
    </section> -->