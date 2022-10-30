<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Zgłoś</title>
</head>
<body>
    <form action="zglos.php" method="post" enctype="multipart/form-data">
        Tytul: <br/><input type="text" name="tytul"><br/>
        Opis: <br/><input type="text" name="opis"><br/>
        Zdjęcie: <br/><input type="file" name="zdjecie"><br/><br/>
        <input type="hidden" name ="pozycja_x" value="<?php echo $_COOKIE['pozycja_x'] ?>">
        <input type="hidden" name ="pozycja_y" value="<?php echo $_COOKIE['pozycja_y'] ?>">
        <input type="hidden" name ="typ" value="<?php echo $_GET['typ'] ?>">
        <button name="wyslij" type="submit">Wyslij</button>

    </form>

</body>
<html>