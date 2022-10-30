<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="zglos.css">
</head>

<body>
    <?php
    if (isset($_FILES['zdjecie'])) {
        move_uploaded_file($_FILES['zdjecie']['tmp_name'], 'zdjecia/' . $_FILES['zdjecie']['name']);
    }

    require_once "connect.php";

    $polonczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if ($polonczenie->connect_error != 0) {
        echo "error" . $polonczenie->connect_error;
    } else {
        $tytul = $_POST['tytul'];
        $data = date('Y-m-d');
        $ulica = "nie mam lokalizacji";
        $typ = $_POST['typ'];
        $zdjęcie = 'zdjecia/' . $_FILES['zdjecie']['name'];
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
            <form id="msform" action="index.php">
                <fieldset>
                <h2 class="fs-title">Twoje zgłoszenie zostało przyjęte</h2>
                    <input type="hidden" name="lastid" value="<?php echo $id; ?>">
                    <button name="button" type="submit" class="action-button">wróć</button>
                </fieldset>
            </form>
</body>

</html>