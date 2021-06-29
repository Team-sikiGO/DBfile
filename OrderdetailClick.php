<?php
    $con = mysqli_connect("localhost", "whdvm1", "eogkrtod97!", "whdvm1");
    mysqli_query($con,'SET NAMES utf8');

    $date= $_POST["date"];
    $userID= $_POST["userID"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM ORDERLIST WHERE date = ? and userID = ?");
    mysqli_stmt_bind_param($statement, "ss", $date, $userID);
    mysqli_stmt_execute($statement);


    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $resName, $menu, $price, $date);

    $response = array();
 
    while(mysqli_stmt_fetch($statement)) {
	$response["success"] = true;
        $response["resName"] = $resName;
	$response["menu"] = $menu;
	$response["price"] = $price;
        $response["date"] = $date;
    }

     echo json_encode($response);
?>