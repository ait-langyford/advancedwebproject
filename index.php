<?php

    session_start();
    include("dbconnection.php");
    
    $_SESSION['currentpage'] = "Home";
    
    $effectsCategories = array("Chorus", "Tremolo", "Vibrato", "Delay", "Wah");
    shuffle($effectsCategories);
    
    // get first 3 items in the first 3 effects categories array
    $category1Query = "SELECT * FROM PedalDistrict.products WHERE subcategory='$effectsCategories[0]' LIMIT 3;";
    $category2Query = "SELECT * FROM PedalDistrict.products WHERE subcategory='$effectsCategories[1]' LIMIT 3;";
    $category3Query = "SELECT * FROM PedalDistrict.products WHERE subcategory='$effectsCategories[2]' LIMIT 3;";
    $category1Results = $dbconnection->query($category1Query);
    $category2Results = $dbconnection->query($category2Query);
    $category3Results = $dbconnection->query($category3Query);
    
    $category1Array = array();
    $category2Array = array();
    $category3Array = array();
    
    while($row = $category1Results->fetch_assoc()) {
        array_push($category1Array, $row);
    }
    
    while ($row = $category2Results->fetch_assoc()) {
        array_push($category2Array, $row);
    }
    
    while ($row = $category3Results->fetch_assoc()) {
        array_push($category3Array, $row);
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
            
                echo "<div class='row'>";
                    
                    echo "<h2>" . $effectsCategories[0] . " Pedals</h2>";
                    
                    for ($col = 0; $col < 3; $col++) {

                        echo "<div class='col-md-4 col-sm-4'>";
                    
                            // product image
                            echo "<div class='centerBlock'>";
                                $coverImage = "images/" . $category1Array[$col]['coverImage'];
                                echo "<img src='$coverImage' class='home-product-image' id='new-product-image'>";
                            echo "</div>";
                            
                            // product title
                            echo "<h3>" . $category1Array[$col]['title'] . "</h3>";
                            
                            // product price
                            echo "<div class='col-md-6 col-sm-6'>";
                                echo "<h3>$" . $category1Array[$col]['price'] . "</h3>";
                            echo "</div>";
                            echo "<div class='col-md-6 col-sm-6'>";
                                 echo "<a class='btn btn-default' href='product-detail.php?id=".$category1Array[$col]['id']."'>View</a>";
                            echo "</div>";
                    
                        echo "</div>";
                    
                    }
                    
                    echo "<div class='col-md-12'>";
                        $categoryLowerCase = strtolower($effectsCategories[0]);
                        echo "<a class='btn btn-default pull-right' href='". "effects-" . $categoryLowerCase . ".php" . "'>View More</a>";
                    echo "</div>";
                
                echo "</div>";
                
                echo "<div class='row'>";
                
                echo "<h2>" . $effectsCategories[1] . " Pedals</h2>";
                
                for ($col = 0; $col < 3; $col++) {

                    echo "<div class='col-md-4 col-sm-4'>";
                
                        // product image
                        echo "<div class='centerBlock'>";
                            $coverImage = "images/" . $category2Array[$col]['coverImage'];
                            echo "<img src='$coverImage' class='home-product-image' id='new-product-image'>";
                        echo "</div>";
                        
                        // product title
                        echo "<h3>" . $category2Array[$col]['title'] . "</h3>";
                        
                        // product price
                        echo "<div class='col-md-6 col-sm-6'>";
                            echo "<h3>$" . $category2Array[$col]['price'] . "</h3>";
                        echo "</div>";
                        echo "<div class='col-md-6 col-sm-6'>";
                             echo "<a class='btn btn-default' href='product-detail.php?id=".$category2Array[$col]['id']."'>View</a>";
                        echo "</div>";
                
                    echo "</div>";
                
                }
                
                echo "<div class='col-md-12'>";
                    $categoryLowerCase = strtolower($effectsCategories[1]);
                    echo "<a class='btn btn-default pull-right' href='". "effects-" . $categoryLowerCase . ".php" . "'>View More</a>";
                echo "</div>";
                
                echo "</div>";
                
                echo "<div class='row'>";
                    
                    echo "<h2>" . $effectsCategories[2] . " Pedals</h2>";
                
                    for ($col = 0; $col < 3; $col++) {

                        echo "<div class='col-md-4 col-sm-4'>";
                    
                            // product image
                            echo "<div class='centerBlock'>";
                                $coverImage = "images/" . $category3Array[$col]['coverImage'];
                                echo "<img src='$coverImage' class='home-product-image' id='new-product-image'>";
                            echo "</div>";
                            
                            // product title
                            echo "<h3>" . $category3Array[$col]['title'] . "</h3>";
                            
                            // product price
                            echo "<div class='col-md-6 col-sm-6'>";
                                echo "<h3>$" . $category3Array[$col]['price'] . "</h3>";
                            echo "</div>";
                            echo "<div class='col-md-6 col-sm-6'>";
                                 echo "<a class='btn btn-default' href='product-detail.php?id=".$category3Array[$col]['id']."'>View</a>";
                            echo "</div>";
                    
                        echo "</div>";
                    
                    }
                    
                    echo "<div class='col-md-12'>";
                        $categoryLowerCase = strtolower($effectsCategories[2]);
                        echo "<a class='btn btn-default pull-right' href='". "effects-" . $categoryLowerCase . ".php" . "'>View More</a>";
                    echo "</div>";
                    
                echo "</div>";
            
            ?>
            
        </div>
        
    </body>
    
</html>