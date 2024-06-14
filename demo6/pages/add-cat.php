<?
session_start();
include('assets/database/database.php');

if(isset($_POST['submit'])){

    if($_POST['name'] == ''){
        $_SESSION['message'] = 'Заполните все поля';
    header("Location: /?page=add-cat");
    die();
    }
    
    $name = $_POST['name'];
    
    $database->query("INSERT INTO `thems`(`name`) VALUES ('$name')");
    $_SESSION['message'] = 'етма доавблена';
    header("Location: /?page=admin-cat");
    die();
}



?>

<div class="container">
    <form action="#" method="post">
        <input type="text" name="name" placeholder="логин">
        <button name="submit" >Добавить</button>
    </form>
</div>