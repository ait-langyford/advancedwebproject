<?php

    session_start();
    include("dbconnection.php");
    
    $_SESSION['currentpage'] = "Product";
    
    $id = $_GET["id"];
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    
    // item from products db
    $productQuery = "SELECT * FROM PedalDistrict.products WHERE id = '$id';";
    $productQueryResults = $dbconnection->query($productQuery);
    
    $product = array();
    
    if ($productQueryResults->num_rows > 0) {

        // found the item
        $product = $productQueryResults->fetch_assoc();
    
    }
    else {
        
        // didn't find any items in db table
        
    }
    
    // get seller information
    $sellerId = $product['sellerId'];
    $sellerQuery = "SELECT * FROM PedalDistrict.users WHERE id = '$sellerId';";
    $sellerResults = $dbconnection->query($sellerQuery);
    $seller = array();
    
    if ($sellerResults->num_rows > 0) {
        
        // found the seller in the user table
        $seller = $sellerResults->fetch_assoc();
        
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
        
            <div class="row">
            
                <!--image-->
                <div class="col-xs-4">
                    
                        <!--product image-->
                        <?php
                            $coverImage = "images/" . $product['coverImage'];
                        ?>
                        <div class="centerBlock">
                            <img src="<?php echo $coverImage; ?>" class="product-detail-image imageBorder" id="product-detail-image">
                        </div>
                
                </div>
                <!--item details-->
                <div class="col-xs-8">
                
                    <div class="col-xs-12">
                        <!--title-->
                        <h2><?php echo $product['title']; ?></h2>
                    </div>
                    <div class="col-xs-12">
                        <!--categories-->
                        <h4><?php echo $product['category']." -> ". $product['subcategory']; ?></h4>
                    </div>
                    <div class="col-xs-12">
                        <!--item location-->
                        <h2>Sydney, Australia</h2>
                    </div>
                    <div class="col-xs-8">
                        <!--price-->
                        <h2><?php echo "$".$product['price']; ?></h2>
                    </div>
                    <div class="col-xs-4">
                        <!--title-->
                        <a class="btn btn-default" href="#">make offer</a>
                    </div>
                
                </div>
                    
            </div>
            
            <div class="row">
                
                <!--product info section-->
                <div class="col-md-8">
                    
                    <!--shipping options-->
                    <div class="col-md-12">
                        
                        <h3>Item Location: <?php echo $seller['address'] ?></h3>
                        
                    </div>
                    <div class="col-md-12">
                        
                        <h3>Shipping Options: <?php echo $product['shippingOptions']; ?></h3>
                        
                    </div>
                    
                    <!--description-->
                    <div class="col-md-12">
                        
                        <h3>Description:</h3>
                        <p><?php echo $product['description']; ?></p>
                        
                    </div>
                    
                </div>
                <!--seller info-->
                <div class="col-md-4">
                    
                    <div class="seller-info">
                        <h3>Seller Info</h3>
                        <h4><?php echo $seller['name']; ?></h4>
                        <h4><?php echo $seller['email']; ?></h4>
                        <h4><?php echo $seller['phonenumber']; ?></h4>
                    </div>
                    
                </div>
                
            </div>

            <!--item images-->            
            <div class="row">
                
                <div class="col-md-12">
                    
                    <div class="centerBlock">
                        <img src="#" class="item-detail-image">
                    </div>
                    
                </div>
                <div class="col-md-12">
                    
                    <div class="col-md-6">
                        
                        <button class="btn btn-default" onclick="">Previous</button>
                        
                    </div>
                    <div class="col-md-6">
                        
                        <div class="pull-right">
                            <a class="btn btn-default" href="#">Next</a>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </body>
    
</html>