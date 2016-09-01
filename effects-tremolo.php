<?php

    session_start();
    include("dbconnection.php");
    
    $_SESSION['currentpage'] = "Tremolo";
    
    // get delay items from effects table in db
    $productQuery = "SELECT * FROM PedalDistrict.products WHERE subcategory = 'Tremolo';";
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
            
            <?php
            
                $productIndex = 0;
                
                echo "<h3>Tremolo Pedals</h3>";
                
                // row
                for ($i = 0; $i <= 2; $i++) {
                    
                    echo "<div class='row'>";
                    
                    // column
                    for ($p = 0; $p <= 2; $p++) {
                        
                        echo "<div class='col-md-4 col-sm-4'>";
                        
                            // product image
                            echo "<div class='centerBlock'>";
                                echo "<img src='#' class='home-product-image' id='new-product-image'>";
                            echo "</div>";
                            
                            // product title
                            echo "<h3>".$productsArray[$productIndex]['title']."</h3>";
                            
                            // product price
                            echo "<div class='col-md-6 col-sm-6'>";
                                echo "<h3> $".$productsArray[$productIndex]['price']."</h3>";
                            echo "</div>";
                            
                            // view button
                            echo "<div class='col-md-6 col-sm-6'>";
                                echo "<a class=\"btn btn-default\" href=\"product-detail.php?id=".$productsArray[$productIndex]['id']."\";>View</a>";
                            echo "</div>";
                            
                        echo "</div>";
                        
                        $productIndex++;
                        
                    }
                    
                    echo "</div>";
                    
                }
            
            ?>
                
        </div>
        
    </body>
    
</html>