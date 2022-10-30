<!-- multistep form -->
<!DOCTYPE HTML>

<head>
    <meta charset="utf-8" />
    <title>Zgłoś</title>
    <link rel="stylesheet" href="zgloszenia.css">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <form id="msform" action="zglos2.php" method="post" enctype="multipart/form-data">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Dane zgłoszenia</li>
            <li>Zdjęcie</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Uzupełnij dane</h2>
            <input type="text" name="tytul" placeholder="Tytuł" required />
            <!--      <input type="opis" name="pass" placeholder="Opis" />!!-->
            <input type="text" name="opis" placeholder="Opis" required />
            <input type="hidden" name="typ" value="<?php echo $_GET['typ'] ?>">
            <input type="button" name="Dalej" class="next action-button" value="Dalej" />
            <input type="hidden" name="pozycja_x" value="<?php echo $_COOKIE['pozycja_x'] ?>">
            <input type="hidden" name="pozycja_y" value="<?php echo $_COOKIE['pozycja_y'] ?>">
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Dodaj zdjęcie</h2>
            <input type="file" name="zdjecie"/>
            <input type="button" name="Wstecz" class="previous action-button" value="Wstecz" />
            <!-- <input type="button" name="wyslij" class="submit action-button" value="Wyślij" /> -->

            <button name="button" type="submit" class="action-button">Wyślij</button>

        </fieldset>
    </form>

    <script type="text/javascript" src="scripts.js"></script>
</body>
<html>