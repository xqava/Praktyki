<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <h1>Rejestracja</h1>
    <form method="post" action="">
        <label for="login">Login:</label>
        <input type="text" name="login" required>

        <label for="haslo">Hasło:</label>
        <input type="password" name="haslo" required>

        <input type="submit" value="Zarejestruj">
    </form>

    <?php
    $conn = mysqli_connect("127.0.0.1","root","","filmy");

    if (!$conn) {
        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $query = "INSERT INTO uzytkownicy (login, haslo) VALUES ('$login', '$haslo')";

        if ($conn->query($query) === TRUE) {
            echo "Rejestracja udana!";
            header("Location: login.php");
        } else {
            echo "Błąd podczas rejestracji: " . $conn->error;
        }
    }
    ?>

</body>
</html>
