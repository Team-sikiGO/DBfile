<?php
    $con = mysqli_connect("localhost", "whdvm1", "eogkrtod97!", "whdvm1");
    mysqli_query($con,'SET NAMES utf8');

    $resName = $_POST["resName"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM FOOD WHERE resName = ?");
    mysqli_stmt_bind_param($statement, "s", $resName);
    mysqli_stmt_execute($statement);


    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $resName, $foodName, $price);

    $response = array();
    $allres = array();

    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["foodName"] = $foodName;
        $response["price"] = $price;
        $allres[] = $response;
    }

     echo json_encode($allres);
?>