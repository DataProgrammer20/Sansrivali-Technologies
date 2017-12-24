<!DOCTYPE html>
<html>
<head>
    <title>PHP Sign in service page</title>
</head>
<body>
<h1>Welcome to the PHP Sign In Service Screen!</h1>
<?php
$usernameInput = "";
$usernameError = "";
$passwordInput = "";
$passwordError = "";
$usernamePattern = "/^[a-zA-Z1-9]*$/";
$passwordPattern = "";

function testInput($dataInput) {
    $dataInput = trim($dataInput);
    $dataInput = stripslashes($dataInput);
    $dataInput = htmlspecialchars($dataInput);
    return $dataInput;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameError = "No username entered. ";
        echo $usernameError;
    }
    else {
        $usernameInput = testInput($usernameInput);
        //Research more into PHP regular expression pattern searching
        if (!preg_match($usernamePattern, $usernameInput)) {
            $usernameError = "Special Characters + * ? $ ! = < > | : - & are not allowed. ";
            echo $usernameError;
        }
    }
    if (empty($_POST["password"])) {
        $passwordError = "No password entered. ";
        echo $passwordError;
    }
    else {
        $passwordInput = testInput($passwordInput);
        if (!preg_match($passwordPattern, $passwordInput)) {
            $passwordError = "A password character error has occurred. ";
            echo $passwordError;
        }
    }
}
echo "Processes Completed ";
echo "Data Entered: ";
echo "$usernameInput";
echo "$passwordInput";
?>
</body>
</html>
