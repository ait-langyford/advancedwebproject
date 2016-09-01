<?php

    session_start();
    include("dbconnection.php");
    
    $_SESSION['currentpage'] = "Register";
    
    if (isset($_POST['submit']) && count($_POST['submit']) > 0) {

        $submitted = true;
        
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $address = ($_POST["address_streetnumber"]." ".$_POST["address_streetname"]." ".$_POST["address_postcode"]." ".$_POST["address_city"]." ".$_POST["address_state"]);
        $phonenumber = $_POST["phonenumber"];
        
        // clean email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        
        // INPUT CHECKING
        
        // check if email already exists
        $checkEmailQuery  = "SELECT * FROM PedalDistrict.users WHERE email ='$email';";
        $emailResults = $dbconnection->query($checkEmailQuery);
        
        // check if username already exists
        $checkUsernameQuery = "SELECT * FROM  PedalDistrict.users WHERE username ='$username';";
        $usernameResults = $dbconnection->query($checkUsernameQuery);
        
        $errors = array();
        
        if ($emailResults->num_rows > 0) {
            
            // email address is already in the db
            $errors['email'] = "Email address already in use";
            
        }
        else if ($usernameResults->num_rows > 0) {
            
            $errors['username'] = "Username already in use";
            
        }
        else {
            
            // email address and username not in use, insert user into db
            
            // hash password
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            $insertQuery = "INSERT INTO  `PedalDistrict`.`users` (`id` , `admin`, `name` ,`username` ,`email` ,`password` ,`address` ,`phonenumber`)
                            VALUES (NULL , '0', '$name',  '$username',  '$email',  '$password',  '$address',  '$phonenumber')";
             
            
            $insertQueryResult = $dbconnection->query($insertQuery);
            
            // run insert query with completion check
            if ($insertQueryResult) {
                
                // todo; redirect
                
            }
            else if (!$insertQueryResult) {
                
                $errors['insert'] = "failed to register account";
                
            }
            
        }
    
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
                
                <div class="col-md-6 col-md-offset-3">
                    
                    <h3>Register</h3>
                    
                    <!--REGISTER FORM-->
                    <form id="register" method="post" action="register.php">
                        
                        <!--NAME-->
                        <div class="form-group">
                            
                            <label for="name">Name</label>
                            <input id="name" name="name" class="form-control" type="text" placeholder="First and Last Name">
                            
                        </div>
                        
                        <!--USERNAME-->
                        <div class="form-group">
                            
                            <label for="username">Username</label>
                            <input id="username" name="username" class="form-control" type="text" placeholder="Username">
                            
                        </div>
                        
                        <!--EMAIL-->
                        <div class="form-group">
                            
                            <label for="email">Email</label>
                            <input id="email" name="email" class="form-control" type="email" placeholder="youremail@domain.com">
                            
                        </div>
                        
                        <!--PASSWORD-->
                        <div class="form-group">
                            
                            <label for="password">Password</label>
                            <input id="password" name="password" class="form-control" type="password">
                            
                        </div>
                        
                        <!--ADDRESS-->
                        <div class="form-group">
                            
                            <label for="address">Address</label>
                            <input id="address_streetnumber" name="address_streetnumber" class="form-control" type="text" placeholder="Street Number">
                            </br>
                            <input id="address_streetname" name="address_streetname" class="form-control" type="text" placeholder="Street Name">
                            </br>
                            <input id="address_postcode" name="address_postcode" class="form-control" type="number" placeholder="Postcode">
                            </br>
                            <input id="address_city" name="address_city" class="form-control" type="text" placeholder="City">
                            </br>
                            <input id="address_state" name="address_state" class="form-control" type="text" placeholder="State">
                            
                        </div>
                        
                        <!--PHONE NUMBER-->
                        <div class="form-group">
                            
                            <label for="phonenumber">Phone Number</label>
                            <input id="phonenumber" name="phonenumber" class="form-control" type="text" placeholder="+61.......">
                            
                        </div>
                        
                        <!--SUBMIT-->
                        <button class="btn btn-default" name="submit" type="submit">Register</button>
                        
                    </form> 
                    
                    <?php
                    
                        // check if there were any errors
                        if(count($errors) > 0) {
                            
                            echo "<div class=\"alert alert-warning\">";
                            
                            if ($errors['email']) {
                                
                                echo $errors['email'] . "<br>";
                                
                            }
                            if ($errors['username']) {
                                
                                echo $errors['username'] . "<br>";
                                
                            }
                            if ($errors['insert']) {
                                
                                echo $errors['insert'] . "<br>";
                                
                            }
                            
                            echo "</div>";
                            
                        }
                        else if (count($errors) == 0 && $submitted == true) {

                            echo "<div class='alert alert-success'>
                            Your account has been created
                            </div>";
                            
                        }
                    
                    ?>
                    
                </div>
                
            </div>
            
        </div>
        
    </body>
    
</html>