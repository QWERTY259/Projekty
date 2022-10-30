<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
</head>
<body>
    <?php
        require_once "connect.php";

        $conn = @new mysqli($host, $db_user, $db_password, $db_name);

        if(!$conn){
            echo "error".mysqli_connect_error();
        }
        else
        {
            $sql = 'SELECT `id`, `tytul`, `data`, `ulica`, `typ`, `zdjęcie`, `status`, `opis`, `pozycja_x`, `pozycja_y` FROM `zgloszenia` ORDER BY `data`';
            #$sql = 'SELECT `tytul`, `pozycja_x`, `pozycja_y` FROM `zgloszenia` ORDER BY `data`';

            $result = mysqli_query($conn, $sql);

            $notifications = mysqli_fetch_all($result, MYSQLI_ASSOC);

            mysqli_free_result($result);

            mysqli_close($conn);
        }
    ?>
    <h1>Zgłoszenia</h1>
    <div class="container">
        <div class="row">
            <?php foreach($notifications as $notification){ ?>
                <h2><?php echo htmlspecialchars($notification['tytul']) ?></h2>
                Data dodania: <?php echo htmlspecialchars($notification['data']) ?><br/>
                ulica: <?php echo htmlspecialchars($notification['ulica']) ?><br/>
                typ: <?php echo htmlspecialchars($notification['typ']) ?><br/>
                status: <?php echo htmlspecialchars($notification['status']) ?><br/>
                opis: <?php echo htmlspecialchars($notification['opis']) ?><br/>
                pozycja: <?php 
                    $pozycja = "(".$notification['pozycja_x'].", ".$notification['pozycja_y'].")";
                    echo htmlspecialchars($pozycja) 
                ?><br/><br/>
                <img src=<?php echo htmlspecialchars($notification['zdjęcie']) ?> width="200" height="100" />
                <form action="edit.php">
                    <input type = "hidden" name = "id" value="<?php echo $notification['id'] ?>">
                    <input type = "hidden" name = "newstatus" value="zaczete">
                    <button type = "submit">Ustaw status na zaczete</button>
                </form>
                <form action="edit.php">
                    <input type = "hidden" name = "id" value="<?php echo $notification['id'] ?>">
                    <input type = "hidden" name = "newstatus" value="skonczone">
                    <button type = "submit">Ustaw status na skonczone</button>
                </form>
                <form action="edit.php">
                    <input type = "hidden" name = "id" value="<?php echo $notification['id'] ?>">
                    <input type = "hidden" name = "newstatus" value="odrzucone">
                    <button type = "submit">Ustaw status na odrzucone</button>
                </form>
            <?php }  ?>

        </div>
        <form action="index.php">
            <button type="submit">wroc do mapy</button>
        </form>
    </div>
</body>
</html>