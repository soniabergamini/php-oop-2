<?php
session_start();

// DEFINE
define("DB_SERVERNAME", "127.0.0.1");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "boolean_e-commerce");
define("DB_PORT", "8889");

// VARIABLES
$email = null;
$password = null;

// SIGNUP
if(isset($_POST['signup_email']) && isset($_POST['signup_password'])) {

    // CONNECT TO DATABASE
    try {
        $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
    } catch (mysqli_sql_exception $e) {
        $conn = null;
        $connError = $e->getMessage();
    }

    // CHECK CONNECTION
    if ($conn === null) {
        echo 'Connection to database failed: ' . $connError;
    } else if ($conn && $conn->connect_error) {
        echo 'Connection to database failed: ' . $conn->connect_error;
    } else {

        // If connection successful create new user
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);
        $email = $_POST['signup_email'];
        $password = $_POST['signup_password'];
        $stmt->execute();
        $result = $stmt->get_result();

        if ($stmt->error === '') {
            $_SESSION['login'] = true;
            echo "Signup successful";
            header('Location: index.php');
        } else if ( !$result) {
            echo "Signup Failed ";
        }

        $conn->close();
    }
}
