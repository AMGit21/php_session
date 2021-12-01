<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION["role"]) || (isset($_SESSION["role"]) && $_SESSION["role"] === '0'))
    header("Location: ../index.php");

$name = isset($_SESSION["user_name"]) ? $_SESSION["user_name"] : "Anonymous"; //ternary operator
echo "<h1 style='color:lightgreen; background-color: blue;text-shadow:3px 3px 5px red; text-align: center;'>Hello $name</h1>";
// echo gettype($_SESSION["role"]);
print_r($_SESSION);
echo "<br>";
// remove all session variables
// session_unset();

// // destroy the session
// session_destroy();
// print_r($_SESSION);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-5">
            <h1 style='text-align: center;'>Admin page</h1>
        </div>
        <div class="col-md-4"></div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>