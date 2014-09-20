<?php if(!empty($_SESSION['userName']) && !empty($_SESSION['id'])): ?>
    <p class='hello'><?php echo $data['result']; //строка приветствия ?></p>
 
<?php else: ?>
        <div id="headLogin">
            <h2>Авторизация</h2>
        </div>	
        <div id="login">
            <div id="leftPartLog">
                <img src="/img/forLogin.png">
                <a class="logLink" href="/index.php?r=user&a=registration">Регистрация</a>
                <a class="logLink" href="#">Забыли пароль?</a>
            </div>
            <div id="rightPartLog">
                <form id="authorize" method="post">
                    <input id="forMargin" class="inputLogin" type="text" name="eMail" placeholder=" E-mail" required>
                    <input class="inputLogin" type="password" name="password" placeholder=" Пароль" required><br>
                    <label>
                        <input type="checkbox" name="remember" value="1">Чужой компьютер
                    </label><br>
                    <input id="loginButton" type="submit" value="">
                </form>
            </div>
        </div>
<?php endif; ?>