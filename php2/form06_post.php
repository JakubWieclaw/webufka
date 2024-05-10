<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script>
        function showMessage(message, isError) {
            var messageDiv = document.createElement('div');
            messageDiv.style.color = isError ? 'red' : 'green';
            messageDiv.textContent = message;
            document.body.appendChild(messageDiv);
            setTimeout(function() {
                messageDiv.parentNode.removeChild(messageDiv);
            }, 1500);
        }
    </script>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['success_msg'])) {
        echo '<script>showMessage("' . $_SESSION['success_msg'] . '", false);</script>';
        unset($_SESSION['success_msg']);
    }
    if (isset($_SESSION['error_msg'])) {
        echo '<script>showMessage("' . $_SESSION['error_msg'] . '", true);</script>';
        unset($_SESSION['error_msg']);
    }
    ?>
    <form action="form06_redirect.php" method="POST">
        id_prac <input type="text" name="id_prac">
        nazwisko <input type="text" name="nazwisko">
        <input type="submit" value="Wstaw">
        <input type="reset" value="Wyczyść">
    </form>
    <a href="form06_get.php">Lista pracowników</a>
</body>

</html>