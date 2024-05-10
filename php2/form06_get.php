// form06_get.php
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['success_msg'])) {
        echo '<div style="color:green;">' . $_SESSION['success_msg'] . '</div>';
        unset($_SESSION['success_msg']);
    }
    if (isset($_SESSION['error_msg'])) {
        echo '<div style="color:red;">' . $_SESSION['error_msg'] . '</div>';
        unset($_SESSION['error_msg']);
    }
    ?>
    <h2>Lista pracowników</h2>
    <?php
    $link = mysqli_connect("localhost", "scott", "tiger", "instytut");
    if (!$link) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "SELECT * FROM pracownicy";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["ID_PRAC"] . " " . $row["NAZWISKO"] . "<br/>";
        }
    } else {
        echo "Brak pracowników.";
    }
    $link->close();
    ?>
    <br />
    <a href="form06_post.php">Dodaj nowego pracownika</a>
</body>

</html>