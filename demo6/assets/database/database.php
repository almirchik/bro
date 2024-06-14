<?

try{
    $database = new PDO("mysql:host=localhost;dbname=demo4;charset=utf8;", 'root', '');
}catch(PDOException $e){
    die($e->getMessage());
}

?>