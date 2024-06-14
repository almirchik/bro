<?
session_start();
unset($_SESSION['AUTH_ID']);
$_SESSION['message'] = 'Вы вышли!';
header("Location: /");
die();

?>