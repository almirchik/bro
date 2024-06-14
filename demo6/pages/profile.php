<? 


$id = $_SESSION['AUTH_ID'];

$orders = $database->query("SELECT * FROM `orders` WHERE `user_id` = \"$id\"")->fetchAll(); ?>

<?


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
                </tr>
                <? endforeach; ?>

            </tbody>

        </table>


    </div>

</div>