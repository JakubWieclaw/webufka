<?php
session_start();

$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if (
    isset($_POST['id_prac']) &&
    is_numeric($_POST['id_prac']) &&
    is_string($_POST['nazwisko'])
) {
    $sql = "INSERT INTO pracownicy(id_prac, nazwisko) VALUES(?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
    try {
        $result = $stmt->execute();
        if ($result) {
            $_SESSION['success_msg'] = "Pracownik został pomyślnie dodany.";
            header("Location: form06_get.php?success=true");
        } else {
            $_SESSION['error_msg'] = "Błąd podczas dodawania pracownika.";
            header("Location: form06_post.php");
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            $_SESSION['error_msg'] = "Podany identyfikator pracownika już istnieje.";
        } else {
            $_SESSION['error_msg'] = "Wystąpił błąd: " . $e->getMessage();
        }
    }
} else {
    $_SESSION['error_msg'] = "Nieprawidłowe dane wejściowe.";
}

header("Location: form06_post.php");
exit();
