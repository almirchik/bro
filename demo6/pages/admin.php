<? 



$orders = $database->query("SELECT * FROM `orders`")->fetchAll(); ?>

<?

if (isset($_GET['cancel'])) {
    $id = $_GET['cancel'];
    $database->query("UPDATE `orders` SET `status` =2 WHERE `id` = \"$id\"");
    header("Location: /?page=admin");
    die();
}

if (isset($_GET['confirm'])) {
    $id = $_GET['confirm'];
    $database->query("UPDATE `orders` SET `status` =1 WHERE `id` = \"$id\"");
    header("Location: /?page=admin");
    die();
}


if (isset($_GET['c_delete'])) {
    $id = $_GET['c_delete'];
    $database->query("DELETE FROM `cars` WHERE `id` = \"$id\"");
    header("Location: /?page=admin");
    die();
}

?>

<div class="container">
    <div class="admin">
        <h1>Здорова, хусесос!</h1>
    </div>

    <div class="admin-btn">
        <a href="">заявки</a>
        <a href="?page=admin-cat">темы</a>
        <a href="">пользователи</a>
    </div>

    <div class="admin-table">

        <table>


            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>comments</th>
                    <th>пользователь</th>
                    <th>статус</th>
                    <th>тема</th>
                    <th>действеи</th>
                </tr>
            </thead>

            <tbody>
                <? foreach($orders as $or): ?>
                <tr>
                    <td><?= $or['id'];?></td>
                    <td><?= $or['name'];?></td>
                    <td><?= $or['comments'];?></td>    
                    <td> <? $user = $database->query("SELECT * FROM `users` WHERE `id` = \"$id\"")->fetch(); 
                        echo $user['login'];
                       ?></td>      
                    <td>
                    <? if($or['status'] == 0){
                        echo 'Ожидает';
                    } 
                     if($or['status'] == 1){
                        echo 'Принято';
                    } 
                     if($or['status'] == 2){
                        echo 'Отказано';
                    } 
                    ?>
                    </td>
                    <td>
                        <? $them = $database->query("SELECT * FROM `thems` WHERE `id` = \"$id\"")->fetch(); 
                        echo $them['name'];
                       ?>
                        
                    </td>
                    <td><a href="?page=admin&cancel=<?= $or['id'];?>">Отказать</a>
                    <a href="?page=admin&confirm=<?= $or['id'];?>">подтвердить</a>
                </td>
                </tr>
                <? endforeach; ?>

            </tbody>

        </table>


    </div>

</div>