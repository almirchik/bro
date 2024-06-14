<? $thems = $database->query("SELECT * FROM `thems`")->fetchAll(); ?>

<?
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $database->query("DELETE FROM `thems` WHERE `id` = \"$id\"");
    header("Location: /?page=admin-cat");
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

<a href="?page=add-cat">Добавить</a>

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
                <? foreach($thems as $or): ?>
                <tr>
                    <td><?= $or['id'];?></td>
                    <td><?= $or['name'];?></td>
                    <td><a href="?page=admin-cat&delete=<?= $or['id'];?>">Удалить</a>
                    
                </td>
                </tr>
                <? endforeach; ?>

            </tbody>

        </table>


    </div>

</div>