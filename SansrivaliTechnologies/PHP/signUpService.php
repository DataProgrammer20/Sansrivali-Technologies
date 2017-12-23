<?php
//Defining variables
$firstNameErr = $lastNameErr = $emailErr = $stateErr = "";
$cityErr = $addressErr = $userNameErr = $passwordErr = "";
$fname = $lname = $Email = $state = $city = "";
$address = $userName = $passWord = "";

function testInput($dataInput) {
    $dataInput = trim($dataInput);
    $dataInput = stripslashes($dataInput);
    $dataInput = htmlspecialchars($dataInput);
    return $dataInput;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First name is required";
    }
    else {
        $fname = testInput($_POST["firstName"]);
        //Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
            $firstNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["lastName"])) {
        $lastNameErr = "Last name is required";
    }
    else {
        $lname = testInput($_POST["lastName"]);
        if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
            $lastNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    }
    else {
        $Email = testInput($_POST["email"]);
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["state"])) {
        $stateErr = "State full name is required";
    }
    else {
        $state = testInput($_POST["state"]);
        if (!preg_match("/^[a-zA-Z]*$/", $state)) {
            $stateErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["city"])) {
        $cityErr = "city full name is required";
    }
    else {
        $city = testInput($_POST["city"]);
        if (!preg_match("/^[a-zA-Z]*$/", $city)) {
            $cityErr = "Only letters and white space allowed";
        }
    }

    //Address placeholder


    //Username should be able to possess number, letters, and white space
    if (empty($_POST["username"])) {
        $userNameErr = "username is required";
    }
    else {
        $userName = testInput($_POST["username"]);
        if (!preg_match("/^[a-zA-Z]*$/", $userName)) {
            $userNameErr = "Only letters and white space allowed";
        }
    }

    //Password should be able to possess numbers, letters, special characters, and white space
    if (empty($_POST["password"])) {
        $passwordErr = "password is required";
    }
    else {
        $passWord = testInput($_POST["password"]);
        if (!preg_match("/^[a-zA-Z]*$/", $passWord)) {
            $passwordErr = "Only letters and white space allowed";
        }

    }
}