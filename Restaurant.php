<?php
    $con = mysqli_connect("localhost", "whdvm1", "eogkrtod97!", "whdvm1");
    mysqli_query($con,'SET NAMES utf8');

    $resID = $_POST["resID"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM RESTAURANT WHERE resID = ?");
    mysqli_stmt_bind_param($statement, "i", $resID);
    mysqli_stmt_execute($statement);


    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $resID, $resName);

    $response = array();
    $allres = array();
    $response["success"] = false;
 
    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["resID"] = $resID;
        $response["resName"] = $resName;
        $allres[] = $response;
    }

     echo json_encode($allres);
?>