<div id="wrapper">    
    <div id="header">
            <a href="http://vk.loc.mvc/index.php?r=home&a=index"><img id="logo" src="/img/logo.png" /></a>
            <div id="top-navi">
                    <ul>
                            <li><a href="index.php?r=user&a=logout">Выйти</a></li>
                            <li><a href="index.php?r=user&a=login">Логин</a></li>
                            <li><a href="index.php?r=user&a=registration">Регистрация</a></li>
                            <li><a href="index.php?r=home&a=index">Главная</a></li>
                    <ul>
            </div>
            <h1><?php
                    if($_SERVER["REQUEST_URI"] == '/index.php?r=user&a=registration'){
                            echo "Регистрация";
                    }else{
                            echo "Добро пожаловать!";
                    }
            ?></h1>
    </div>