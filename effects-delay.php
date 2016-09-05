<?php

    session_start();
    include("dbconnection.php");
    
    $_SESSION['currentpage'] = "Delay";
    
    // get delay items from effects table in db
    $productQuery = "SELECT * FROM PedalDistrict.products WHERE subcategory = 'Delay';";
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
                
                echo "<h3>Delay Pedals</h3>";
                
                $numItems = count($productsArray);
                $numRows = ceil($numItems / 3);
                $temp = 0;
                
                for ($i = 0; $i < $numRows; $i++) {
                    
                    echo "<div class='row'>";
                    
                        $numCols = $numItems - ($temp - 1);
                        $maxCols = ($temp + 3);
                        
                        for ($p = $temp; $p < $numCols && $p < $maxCols; $p++) {
                            
                            echo "<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>";
                        
                                // product image
                                echo "<div class='centerBlock'>";
                                    echo "<img src='" . "images/" . $productsArray[$p]['coverImage'] . "' class='home-product-image' id='new-product-image'>";
                                echo "</div>";
                                
                                // product title
                                echo "<h3>".$productsArray[$p]['title']."</h3>";
                                
                                // product price
                                echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                    echo "<h3> $".$productsArray[$p]['price']."</h3>";
                                echo "</div>";
                                
                                // view button
                                echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                    echo "<a class=\"btn btn-default\" href=\"product-detail.php?id=".$productsArray[$p]['id']."\";>View</a>";
                                echo "</div>";
                            
                            echo "</div>";
                            
                            $temp = $p;
                            
                        }
                    
                    echo "</div>";
                    
                }
                
                /*$itemCount = count($productsArray);
                
                for ($i = 0; $i < $itemCount; $i++) {
                    
                    if ($i % 3 == 0 || $i == 0) {
                        echo "<div class='row'>";
                    }
                    
                        echo "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>";
                        
                            // product image
                            echo "<div class='centerBlock'>";
                                echo "<img src='" . "images/" . $productsArray[$i]['coverImage'] . "' class='home-product-image' id='new-product-image'>";
                            echo "</div>";
                            
                            // product title
                            echo "<h3>".$productsArray[$i]['title']."</h3>";
                            
                            // product price
                            echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                echo "<h3> $".$productsArray[$i]['price']."</h3>";
                            echo "</div>";
                            
                            // view button
                            echo "<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>";
                                echo "<a class=\"btn btn-default\" href=\"product-detail.php?id=".$productsArray[$i]['id']."\";>View</a>";
                            echo "</div>";
                            
                        echo "</div>";
                    
                    if ($i == ((($i % 3) * 3) - 1)) {
                        echo "</div>";
                    }
                    
                }*/
            
            ?>
                
        </div>
        
    </body>
    
</html>