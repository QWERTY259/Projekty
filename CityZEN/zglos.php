<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
</head>
<body>
    <?php
        if (isset($_FILES['zdjecie']))
        {
            move_uploaded_file($_FILES['zdjecie']['tmp_name'], 'zdjecia/'.$_FILES['zdjecie']['name']);
        }

        require_once "connect.php";

        $polonczenie = @new mysqli($host, $db_user, $db_password, $db_name);

        if($polonczenie->connect_error!=0)
        {
            echo "error".$polonczenie->connect_error;
        }
        else
        {
            $tytul = $_POST['tytul'];
            $data = date('Y-m-d');
            $ulica = "nie mam lokalizacji";
            $typ = $_POST['typ'];
            $zdjęcie = 'zdjecia/'.$_FILES['zdjecie']['name'];
            $status = "nierozpatrzone";
            $opis = $_POST['opis'];
            $pozycja_x = $_POST['pozycja_x'];
            $pozycja_y = $_POST['pozycja_y'];

            $sql = "INSERT INTO `zgloszenia`(`id`, `tytul`, `data`, `ulica`, `typ`, `zdjęcie`, `status`, `opis`, `pozycja_x`, `pozycja_y`)
            VALUES ('', '$tytul', '$data', '$ulica', '$typ', '$zdjęcie', '$status', '$opis', '$pozycja_x', '$pozycja_y')";

            $result = $polonczenie->query($sql);
            
            $id = mysqli_insert_id($polonczenie);
            
            $polonczenie->close();
        }
    ?>
    <h1>Twoje zgłoszenie zostało przyjete<h1>
    <form action="index.php">
        <input type = "hidden" name = "lastid" value="<?php echo $id; ?>">
        <button type="submit">wroc do mapy</button>
    </form>
    <form action="adminlogin.php">
        <button type = "submit">przejdz do widoku admina</button>
    </form>
</body>
</html>