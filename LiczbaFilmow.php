<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoja lista filmów</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Twoja lista filmów</h1>

    <?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "filmy");
    if (!$conn) {
        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM filmy";
    $result = $conn->query($sql);

    if ($conn->query($sql)->num_rows > 0) {
        echo "<ul>";
        while ($film = $conn->query($sql)->fetch_assoc()) {
            echo "<li>{$film['tytul']} - {$film['kategoria']}</li>";
        }
        echo "</ul>";
    } else {
        echo "Brak filmów w bazie danych.";
    }
    ?>

    <a href="dodaj_film.php">Dodaj nowy film</a>
    <br>
    <a href="wyloguj.php">Wyloguj się</a>
</body>
</html>