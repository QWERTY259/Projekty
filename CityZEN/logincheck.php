<!DOCTYPE HTML>
<html lang="pl">
<head>
</head>
<body>
<?php 
$correctusername = $_POST['username'];
$correctpasswd = $_POST['passwd'];
if ($correctusername == "admin" && $correctpasswd == "hasloadmina"){ ?>
    <h1>zalogowano</h1>
    <form action="wypisz.php" method="post" enctype="multipart/form-data">
        <button type = "submit">przejdz do widoku admina</button>
    </form>
<?php } else { ?>

    <h1>niepoprawna nazwa lub haslo</h1>
    <form action="adminlogin.php" method="post" enctype="multipart/form-data">
        <button type = "submit">wroc do logowania</button>
    </form>

<?php } ?>

    
</body>
<html>