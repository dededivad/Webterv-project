<?php
session_start();
include "authentication.php";

$username = $_SESSION["user"]["username"];
$users = loadUsers("../data/users.txt");
$updated_user = $_SESSION["user"];

$updated_user["email"] = $_POST["email"];
$updated_user["full_name"] = $_POST["full_name"];
$updated_user["postal_code"] = $_POST["postal_code"];
$updated_user["city"] = $_POST["city"];
$updated_user["street_name"] = $_POST["street_name"];
$updated_user["phone_number"] = $_POST["phone_number"];

$index = array_search($_SESSION["user"], $users);
$users[$index] = $updated_user;

saveUsers("../data/users.txt", $users);

$_SESSION["user"] = $updated_user;

header("Location: profile.php");