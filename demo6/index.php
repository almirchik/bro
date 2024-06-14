<? 
session_start();
include("assets/database/database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <? include('assets/action/message.php'); ?>
    <? include("assets/inc/header.php"); ?>

    <? if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'main':
                include('pages/main.php');
                break;
                case 'signin':
                    include('pages/signin.php');
                    break;
                    case 'signup':
                        include('pages/signup.php');
                        break;
                        case 'admin':
                            include('pages/admin.php');
                            break;
                            case 'admin-cat':
                                include('pages/admin-cat.php');
                                break;
                                case 'add-cat':
                                    include('pages/add-cat.php');
                                    break;
                                    case 'profile':
                                        include('pages/profile.php');
                                        break;
            
        }
    } else{
        include('pages/main.php');
    }
    
    
    ?>


    
</body>
</html>