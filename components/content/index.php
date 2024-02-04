

    <h1 class="title">авторизация для пользователя</h1>
    <section class="auth_form-index">
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
    </section>
    <h1 class="title">авторизация для админа</h1>
    <section class="auth_form-index">
		<form class="auth_form" method="POST" action="controllers/auth_admin.php">
			<input type="text" name="login_auth" placeholder="Логин"><br>
			<input type="password" name="pass_auth" placeholder="Пароль"><br>
			<input type="submit" name="auth_admin" value="Войти"><br><br>
			<?php
	        if ($_SESSION['mess_a']) {
	        echo '<font color=#3081da <p class="msg">'.$_SESSION['mess'].'</p></font>';
	        }
	        if ($_SESSION['error']) {
	        echo '<font color=red <p class="msg">'.$_SESSION['error'].'</p></font>';
	        }
	        unset($_SESSION['mess_a']);
	        unset($_SESSION['error']);
	        ?><br>
		</form>
	</div>
    