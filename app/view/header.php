<div id="wrapper">    
    <div id="header">
            <a href="http://vk.loc.mvc/index.php?r=home&a=index"><img id="logo" src="/img/logo.png" /></a>
            <div id="top-navi">
                    <ul>
                            <li><a href="#">phpInfo</a></li>					
                            <li><a href="#">Ссылка 1</a></li>
                            <li><a href="#">Главная</a></li>
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