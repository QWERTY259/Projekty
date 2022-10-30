<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <title>Zgłoś</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

    <link rel="stylesheet" href="main.css">

</head>

<body>

    <img class="loader" style="margin: auto" src="bg.gif" alt="Loading">

    <div id="map"></div>
    <div id="nav">
        <p id="text">Widzisz jakiś problem w swoim mieście? Wybierz miejsce na mapie, opisz problem, a resztą zajmnie się gmina</p>
    </div>
    <a href="adminlogin.php">
        <img class="button" id="log" src="b_logowanie.png">
    </a>

    <img onclick="roll_up()" class="button" src="add_button.png" id="add_b">

    <a href="wypelnij2.php?typ=Ludzie">
        <img class="button" src="b_ludzie.png">
    </a>
    <a href="wypelnij2.php?typ=Infrastruktura">
        <img class="button" src="b_domek.png">
    </a>
    <a href="wypelnij2.php?typ=Przyroda">
        <img class="button" src="b_przyroda.png">
    </a>
    <a href="wypelnij2.php?typ=Inne">
        <img class="button" src="b_inne.png">
    </a>


    <script>
        const loader = document.querySelector(".loader");
        window.onload = function() {
            var purpleScreen = document.getElementById("nav");
            var buttons = document.getElementsByClassName("button");

            for (var i = 0; i < buttons.length; i++) {
                buttons[i].style.display = "none";
            }
            purpleScreen.style.display = "none";

            document.getElementById('map').style.display = "none";
            setTimeout(function() {
                loader.style.opacity = "0";
                setTimeout(function() {
                    loader.style.display = "none";
                }, );
                document.getElementById('map').style.display = "block";
                purpleScreen.style.display = "block";
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].style.display = "block";
                }
            }, 1800);


        }

        var clicked = false;

        function roll_up() {
            var buttons = document.getElementsByClassName("button");
            if (clicked) {
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].style.bottom = "1vh";
                    buttons[i].style.transition = "all 0.75s";
                }
                clicked = false;
            } else {
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].style.bottom = String(7 * i + 1 - 7) + "vh";
                    buttons[i].style.transition = "all 0.75s";
                }
                clicked = true;
            }
        }
    </script>

    <script>
        var markerData = []

        <?php
        require_once "connect.php";

        $conn = @new mysqli($host, $db_user, $db_password, $db_name);

        if (!$conn) {
            echo "error" . mysqli_connect_error();
        } else {
            $sql = 'SELECT  `id`, `tytul`, `pozycja_x`, `pozycja_y`, `typ`, `status` FROM `zgloszenia`';

            $result = mysqli_query($conn, $sql);

            $notifications = mysqli_fetch_all($result, MYSQLI_ASSOC);

            mysqli_free_result($result);

            mysqli_close($conn);
        }
        $rozmiar = count($notifications);
        $iterate = 1;

        foreach ($notifications as $notification) {
            $lan = $notification['pozycja_x'];
            $lng = $notification['pozycja_y'];
            $tytul = $notification['tytul'];
            $status = $notification['status'];
            $typ = $notification['typ'];

        ?>
            markerData.push([('<?php echo $lan; ?>'), ('<?php echo $lng; ?>'), ('<?php echo $tytul; ?>'), ('<?php echo $status; ?>'), ('<?php echo $typ; ?>')]);
            <?php


            if (isset($_GET['lastid'])) {
                $idforjs = $_GET['lastid'];

                if ($notification['id'] == $idforjs) {
            ?>
                    zoomlat = ('<?php echo $notification['pozycja_x']; ?>')
                    zoomlng = ('<?php echo $notification['pozycja_y']; ?>')
        <?php
                }
            }
        }







        ?>
    </script>
    <script src="mapafinal.js"></script>



</body>
<html>