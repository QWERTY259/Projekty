<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
</head>
<body>

<?php 

    require_once "connect.php";

    $polonczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polonczenie->connect_error!=0)
    {
        echo "error".$polonczenie->connect_error;
    }
    else
    {
        $id = $_GET['id'];

        $newstatus = $_GET['newstatus'];

        $sql = "UPDATE `zgloszenia` SET `status` = '$newstatus' WHERE `id` = '$id'";

        $result = $polonczenie->query($sql);
        
        $id = mysqli_insert_id($polonczenie);
        
        $polonczenie->close();
    }

    header('Location: wypisz.php');

?>

    
</body>
</html>
