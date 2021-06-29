<?php
    $con = mysqli_connect("localhost", "whdvm1", "eogkrtod97!", "whdvm1");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userID"];
    $resName = $_POST["resName"];
    $menu = $_POST["menu"];
    $price = $_POST["price"];
    $date = $_POST["date"];

    $statement = mysqli_prepare($con, "INSERT INTO ORDERLIST VALUES (?,?,?,?,?)");
    mysqli_stmt_bind_param($statement, "sssis", $userID, $resName, $menu, $price, $date);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;

     echo json_encode($response);
?>