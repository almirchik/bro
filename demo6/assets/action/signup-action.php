<? session_start();
    include('../database/database.php');


    foreach($_POST as $el => $value){
        if($value == ''){
            $_SESSION['message'] = 'Введиет всеп оля';
            header("Location: /?page=signup");
            die();
        }
    }

    $name = $_POST['name'];
    $login = $_POST['login'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];


    $patern = "/^\+7\(\d{3}\)\d{3}\-\d{2}\-\d{2}$/";

    if(!preg_match($patern, $phone)){
        $_SESSION['message'] = 'Неверный формат номера!';
        header("Location: /?page=signup");
        die();
    }

    $loginExist = $database->query("SELECT * FROM `users` WHERE `login` = '$login'")->fetch();
    if(!empty($loginExist)){
        $_SESSION['message'] = 'Такой логин уже есть!';
        header("Location: /?page=signup");
        die();
    }

    $phoneExist = $database->query("SELECT * FROM `users` WHERE `phone` = '$phone'")->fetch();
    if(!empty($phoneExist)){
        $_SESSION['message'] = 'Такой логин уже есть!';
        header("Location: /?page=signup");
        die();
    }

    $emailExist = $database->query("SELECT * FROM `users` WHERE `email` = '$email'")->fetch();
    if(!empty($emailExist)){
        $_SESSION['message'] = 'Такой логин уже есть!';
        header("Location: /?page=signup");
        die();
    }

    if($password != $re_password){
        $_SESSION['message'] = 'пароли не совпадают!';
        header("Location: /?page=signup");
        die();
    }

    if(strlen($password < 6)){
        $_SESSION['message'] = 'пароль менее 6 символов!';
        header("Location: /?page=signup");
        die();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['message'] = 'Неверный формат почты!';
        header("Location: /?page=signup");
        die();
    }

    $hash = md5($password);

    $database->query("INSERT INTO `users`(`name`, `login`, `phone`, `email`, `password`) VALUES ('$name','$login','$phone','$email','$hash')");
    $_SESSION['AUTH_ID'] = $database->lastInsertId();
    $_SESSION['message'] = 'Вы успешно зарегались!';
    header("Location: /");
    die();


?>