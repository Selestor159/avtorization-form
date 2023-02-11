<?php
    $login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);

    $name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);

    $pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
    
    if(mb_strlen($login)<5 || mb_strlen($login)>90)
    {
        echo"Нeдопустимая длина логина";
        exit();
    }
    else if(mb_strlen($name)<2 || mb_strlen($name)>50)
    {
        echo"Нeдопустимая длина имени";
        exit();
    }
    else if(mb_strlen($pass)<8 || mb_strlen($pass)>20)
    {
        echo"Нeдопустимая длина пароля(от 8 до 20 символов)";
        exit();
    }


    $pass = md5($pass);//ХЕШИРЫВАНИЕ ПАРОЛЯ

    $mysql = new mysqli('localhost', 'root', 'root' ,'register-bd');
    $mysql->query("INSERT INTO `users` (`login`, `name`, `pass`)
    VALUES('$login','$name','$pass')");

    $mysql->close();

    header('Location: /');
    
?>