<?php

    include("dbconnection.php");
    
    // get input from user
    $title = $_POST["title"];
    $category = $_POST["category"];
    $subcategory = $_POST["subcategory"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $shippingOptions = $_POST["shippingOptions"];
    //set reply array
    $success = array();
    $updateQuery = "UPDATE products SET title='$title', category='$category', subcategory='$subcategory', price='$price', description='$description', shippingOptions='$shippingOptions' WHERE id='$itemId'";
    $updateQueryResult = $dbconnection->query($updateQuery);
    
    if ($updateQueryResult) {
        $success["query"] = $updateQueryResult;
        $success["success"]=true;
        //echo "success:".$title.$category.$subcategory.$price.$description.$shippingOptions;
        // update succeeded; redirect to detail page
        //header("Location: user-dashboard-activeitems.php");
        
    }
    else {
        $success["success"]=false;
    }
    echo json_encode($success);

?>