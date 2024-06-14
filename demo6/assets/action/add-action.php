
<?
session_start();
include('../database/database.php');

if(!isset($_SESSION['AUTH_ID'])){
    $_SESSION['message'] = 'Пользователь не авторизован!';
    header("Location: /?page=signup");
    die();
}

$user_id = $_SESSION['AUTH_ID'];


foreach($_POST as $el => $value){
    if($value == ''){
        $_SESSION['message'] = 'Введиет всеп оля';
        header("Location: /?page=signup");
        die();
    }
}

$name = $_POST['name'];
$them_id = $_POST['them_id'];
$comments = $_POST['comments'];

$database->query("INSERT INTO `orders`(`name`, `comments`, `them_id`, `user_id`) VALUES ('$name','$comments','$them_id','$user_id')");
$_SESSION['message'] = 'Доабвлено';
header("Location: /");
die();



?>