<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Formularz logowania</title>
	<meta charset="UTF-8">
</head>

<body>
	<?php
	require('funkcje.php');
	echo "<h1>Nasz system</h1>";

	if (isset($_POST['zaloguj'])) {
		$login = test_input($_POST['login']);
		$haslo = test_input($_POST['haslo']);

		if (($login == $osoba1->login && $haslo == $osoba1->haslo) ||
			($login == $osoba2->login && $haslo == $osoba2->haslo)
		) {
			// Utworzenie zmiennych sesji
			$_SESSION['zalogowanyImie'] = ($login == $osoba1->login) ? $osoba1->imieNazwisko : $osoba2->imieNazwisko;
			$_SESSION['zalogowany'] = 1;
			header("Location: user.php");
			exit();
		} else {
			$_SESSION['error'] = "Błędny login lub hasło.";
			header("Location: index.php");
			exit();
		}
	}

	if (isset($_POST['wyloguj'])) {
		$_SESSION['zalogowany'] = 0;
		header("Location: index.php");
		exit();
	}

	if (isset($_COOKIE['nazwa'])) {
		echo "Ciasteczko o nazwie 'nazwa' ma wartość: " . $_COOKIE['nazwa'];
	} else {
		echo "Brak ciasteczka o nazwie 'nazwa'";
	}
	?>

	<form action="index.php" method="POST">
		<fieldset>
			<legend>Logowanie:</legend>
			<?php
			if (isset($_SESSION['error'])) {
				echo $_SESSION['error'] . "<br>";
				unset($_SESSION['error']);
			}
			?>
			<label for="login">Login:</label>
			<input type="text" id="login" name="login"><br><br>
			<label for="haslo">Hasło:</label>
			<input type="password" id="haslo" name="haslo"><br><br>
			<input type="submit" value="Zaloguj" name="zaloguj">
		</fieldset>
	</form>

	<form action="cookie.php" method="GET">
		<fieldset>
			<legend>Utwórz ciasteczko:</legend>
			<label for="czas">Czas życia cookie (w sekundach):</label>
			<input type="number" id="czas" name="czas"><br><br>
			<input type="submit" value="Utwórz Cookie" name="utworzCookie">
		</fieldset>

	</form>
</body>

</html>