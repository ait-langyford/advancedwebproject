<?php

    include("dbconnection.php");
        
        echo "<script>console.log('test');</script>";
    
        // get input from user
        $title = $_POST["title"];
        $category = $_POST["category"];
        $subcategory = $_POST["subcategory"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $shippingOptions = $_POST["shippingOptions"];
        
        $updateQuery = "UPDATE PedalDistrict.products SET title='$title', category='$category', subcategory='$subcategory', price='$price', description='$description', shippingOptions='$shippingOptions' WHERE id='$itemId';";
        
        $updateQueryResult = $dbconnection->query($updateQuery);
        
        if ($updateQueryResult) {
            
            // update succeeded; redirect to detail page
            header("Location: user-dashboard-activeitems.php");
            
        }
        else {
            
            echo "failed to update product details";
            $sqlError = mysqli_error($dbconnection);
            echo "<script>console.log($sqlError);</script>";
            
        }

?>