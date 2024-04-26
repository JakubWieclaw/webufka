<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <a href="index.php">Wróć do logowania</a>
    <?php
    if (isset($_GET['czas'])) {
        $czas_zycia = $_GET['czas'];
        $czas_zycia = intval($czas_zycia);


        setcookie("nazwa", "wartość", time() + $czas_zycia, "/");

        echo "Ciasteczko zostało dodane pomyślnie!";
    } else {
        echo "Błąd: Nieprawidłowy czas życia ciasteczka.";
    }
    ?>
</body>

</html>
