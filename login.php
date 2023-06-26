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

// LOGIN
if(isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

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

        // If connection successful
        $sql = "SELECT id, email, password FROM users WHERE email = '$email' AND password = '$password'";
        // var_dump($sql);
        $result = $conn->query($sql);
        $results = [];
        // $users = [];
        // echo '<pre>', var_dump($result), '</pre>';

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $results[] = $row; 
            }
            $_SESSION['login'] = true;
            echo "Login successful";
            header('Location: index.php');
        } else if ($result) {
            echo "Login Failed. The query returned 0 results.";
        } else {
            echo "Login failed. Query error.";
        }

        $conn->close();
    }
}

?>