<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form method="post" action="">
        <label for="login">Login:</label>
        <input type="text" name="login" required>

        <label for="haslo">Hasło:</label>
        <input type="password" name="haslo" required>

        <input type="submit" value="Zaloguj">
    </form>
    
    <p>Nie masz konta? Możesz je założyć tutaj: <a href="rejestracja.php">Zarejestruj</a></p>

<?php
    $conn = mysqli_connect("127.0.0.1","root","","filmy");
    if (!$conn) {
        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
    }

    $komunikat = 'Zaloguj się'; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        
        $sql = "SELECT id, login, haslo FROM uzytkownicy WHERE login = '$login'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            
            if ($haslo === $row['haslo']) {
                $_SESSION['id'] = $row['id'];
                header("Location: LiczbaFilmow.php");
            } else {
                $komunikat = "Nieprawidłowe hasło.";
            }
        } else {
            $komunikat = "Nieprawidłowy login.";
        }
    }
?>
</body>
</html>
