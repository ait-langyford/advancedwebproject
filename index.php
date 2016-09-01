<?php

    session_start();
    include("dbconnection.php");
    
    $_SESSION['currentpage'] = "Home";
    
    // get first 3 items in product db table
    $productQuery = "SELECT * FROM PedalDistrict.products LIMIT 3;";
    $productQueryResults = $dbconnection->query($productQuery);
    
    $productsArray = array();
    
    if ($productQueryResults->num_rows > 0) {

        while($row = $productQueryResults->fetch_assoc()) {
            
            array_push($productsArray, $row);
            
        }
    
    }
    else {
        
        // didn't find any items in db table
        
    }
    
?>

<!doctype HTML>
<html>
    
    <head>
        
        <?php include("head.php"); ?>
        
    </head>
    
    <body>
        
        <?php include("navigation.php"); ?>
        
        <div class="container">
        
            <!--new items-->    
            <div class="row">
                    
                <h3>New Items</h2>
                
                <!--new item 1-->
                <div class="col-md-4 col-sm-4">
                    
                    <!--product image-->
                    <div class="centerBlock">
                        <img src="#" class="home-product-image" id="new-product-image">
                    </div>
                    
                    <!--product title-->
                    <h3><?php echo $productsArray[0]['title'] ?></h3>
                    
                    <!--product price-->
                    <div class="col-md-6 col-sm-6">
                        <h3><?php echo "$".$productsArray[0]['price'] ?></h3>
                    </div>
                    <div class="col-md-6 col-sm-6">
                         <a class="btn btn-default" href="product-detail.php?id=<?php echo $productsArray[0]['id'];?>">View</a>
                    </div>
                    
                </div>
                <!--new item 2-->
                <div class="col-md-4 col-sm-4">
                    
                    <!--product image-->
                    <div class="centerBlock">
                        <img src="#" class="home-product-image">
                    </div>
                    
                    <!--product title-->
                    <h3><?php echo $productsArray[1]['title'] ?></h3>
                    
                    <!--product price-->
                    <div class="col-md-6 col-sm-6">
                        <h3><?php echo "$".$productsArray[1]['price'] ?></h3>
                    </div>
                    <div class="col-md-6 col-sm-6">
                         <a class="btn btn-default" href="product-detail.php?id=<?php echo $productsArray[1]['id'];?>">View</a>
                    </div>
                    
                </div>
                <!--new item 3-->
                <div class="col-md-4 col-sm-4">
                    
                    <!--product image-->
                    <div class="centerBlock">
                        <img src="#" class="home-product-image">
                    </div>
                    
                    <!--product title-->
                    <h3><?php echo $productsArray[2]['title'] ?></h3>
                    
                    <!--product price-->
                    <div class="col-md-6 col-sm-6">
                        <h3><?php echo "$".$productsArray[2]['price'] ?></h3>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a class="btn btn-default" href="product-detail.php?id=<?php echo $productsArray[2]['id'];?>">View</a>
                    </div>
                    
                </div>
                
            </div>
            
            <!--other item-->    
            <div class="row">
                    
                <h3>Other Item Row</h2>
                
                <!--new item 1-->
                <div class="col-md-4">
                    
                    <h3>Other Items</h2>
                    
                </div>
                <!--new item 2-->
                <div class="col-md-4">
                    
                    <h3>Other Items</h2>
                    
                </div>
                <!--new item 3-->
                <div class="col-md-4">
                    
                    <h3>Other Items</h2>
                    
                </div>
                
            </div>
            
        </div>
        
    </body>
    
</html>