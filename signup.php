
<?php

include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];

    $telnumber = $_POST['tel'];

    $password = password_hash($_POST['pswd'], PASSWORD_BCRYPT); 

    $sql = "INSERT INTO users (Email, telnumber, password) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sss", $email, $telnumber, $password);

    if ($stmt->execute()) {

        echo "Registratie succesvol!";
        header("Location: ../signup.html");

    } else {

        echo "Fout bij registratie: " . $stmt->error;

    }

    $stmt->close();

    $conn->close();

}

?>