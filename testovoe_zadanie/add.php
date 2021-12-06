<?php
if (isset($_POST["surname"]) && isset($_POST["name"]) && isset($_POST["email"])) {

    $conn = new mysqli("localhost", "sbster10_test", "m1D*wyvR", "sbster10_test");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $surname = $conn->real_escape_string($_POST["surname"]);
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $sql = "INSERT INTO users (surname, name, email) VALUES ('$surname', '$name', '$email')";
    if($conn->query($sql)){

        header("Location: /");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>
