<? session_start();
    include('../database/database.php');


    foreach($_POST as $el => $value){
        if($value == ''){
            $_SESSION['message'] = 'Введиет всеп оля';
            header("Location: /?page=signup");
            die();
        }
    }

 
    $login = $_POST['login'];
    $password = $_POST['password'];



    $hash = md5($password);

    $user = $database->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$hash'")->fetch();
    if(empty($user)){
        $_SESSION['message'] = 'Почта или пароль неверные!';
        header("Location: /?page=signup");
        die();
    }

    $_SESSION['AUTH_ID'] = $user['id'];
    $_SESSION['message'] = 'Вы успешно вошли!';
    header("Location: /");
    die();


?>