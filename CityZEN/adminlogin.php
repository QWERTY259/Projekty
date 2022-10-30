<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <h1>Logowanie do panelu admina</h1>
</head>
<body>
    <form action="logincheck.php" method="post" enctype="multipart/form-data">
        username: <br/><input type="text" name="username"><br/>
        passwd: <br/><input type="text" style="-webkit-text-security: disc;" name="passwd" autocomplete = "off" ><br/>
        <button name ="submit" type = "submit">Log in</button>
    </form>
    
</body>
<html>