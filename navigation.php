<nav class="navbar navbar-default">
  
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      
      <?php
      
        if (!$_SESSION["email"]) {
          
          // user not logged in
          echo "<li><a href=\"register.php\">Register</a></li>";
          echo "<li><a href=\"login.php\">Login</a></li>";
          
        }
        else {
          
          // user is logged in
           
          // check if admin
          if ($_SESSION["admin"] == 1) {
            
            echo "<li><a href=\"admin-dashboard.php\">Dashboard</a></li>";
            
          }
          else if ($_SESSION["admin"] == 0) {
            
            echo "<li><a href=\"user-dashboard.php\">Dashboard</a></li>";
            
          }
          
          echo "<li><a href=\"messages.php\">Messages</a></li>";
          echo "<li><a href=\"messages.php\">Offers</a></li>";
          echo "<li><a href=\"add-product.php\">Sell an item</a></li>";
          echo "<li><a href=\"watchlist.php\">
          <span class=\"glyphicon glyphicon-shopping-cart\"></span>
          <span class=\"badge cart-total\">0</span></a></li>";
        }
        
      ?>
      
      <?php
      
        if ($_SESSION["email"]) {
          
          if ($_SESSION["admin"]) {
            echo "<li><a href=\"dashboard.php\">Dashboard</a></li>";
          }
          
          echo "<li><a href=\"logout.php\">Logout</a></li>";
        }
        
      ?>
      
    </ul>
    
    <form class="navbar-form navbar-right" action="search.php" method="post">
      
      <div class="form-group">
        
        <input type="text" name="search" class="form-control" placeholder="Search">
        
        <button type="submit" role="search" class="btn btn-default">
          Search
        </button>
        
        </div>
    </form>
  </div>
</nav>

<div class="navbar-links">
  
  <div class="container">
    
    <ul class="nav nav-tabs">
      
      <?php
      
        // change tab navigation to dashboard tabs if on dashboard page
        if ($_SESSION['currentpage'] == "Dashboard" && $_SESSION['dashboardtab'] == "Edit Account") {
          
          echo "<li class=\"active\"><a href=\"user-dashboard.php\">Edit Account</a></li>";
          echo "<li><a href=\"user-dashboard-activeitems.php\">Your Active Items</a></li>";
          echo "<li><a href=\"#\">Transaction History</a></li>";
          echo "<li><a href=\"#\">Payment Options</a></li>";
          
        }
        else if ($_SESSION['currentpage'] == "Dashboard" && $_SESSION['dashboardtab'] == "Active Items") {
          
          echo "<li><a href=\"user-dashboard.php\">Edit Account</a></li>";
          echo "<li class=\"active\"><a href=\"user-dashboard-activeitems.php\">Your Active Items</a></li>";
          echo "<li><a href=\"#\">Transaction History</a></li>";
          echo "<li><a href=\"#\">Payment Options</a></li>";
          
        }
        else if ($_SESSION['currentpage'] == "Dashboard" && $_SESSION['dashboardtab'] == "Transaction History") {
          
          echo "<li><a href=\"user-dashboard.php\">Edit Account</a></li>";
          echo "<li><a href=\"user-dashboard-activeitems.php\">Your Active Items</a></li>";
          echo "<li class=\"active\"><a href=\"#\">Transaction History</a></li>";
          echo "<li><a href=\"#\">Payment Options</a></li>";
          
        }
        else if ($_SESSION['currentpage'] == "Dashboard" && $_SESSION['dashboardtab'] == "Payment Options") {
          
          echo "<li><a href=\"user-dashboard.php\">Edit Account</a></li>";
          echo "<li><a href=\"user-dashboard-activeitems.php\">Your Active Items</a></li>";
          echo "<li><a href=\"#\">Transaction History</a></li>";
          echo "<li class=\"active\"><a href=\"#\">Payment Options</a></li>";
          
        }
        else {
      
            // effect pedals menu
            echo "<li class=\"dropdown\">";
              
              echo "<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Effects";
              echo "<span class=\"caret\"></span></a>";
              echo "<ul class=\"dropdown-menu\">";
                echo "<li><a href=\"effects-chorus.php\">Chorus</a></li>";
                echo "<li><a href=\"effects-delay.php\">Delay</a></li>";
                echo "<li><a href=\"effects-tremolo.php\">Tremolo</a></li>";
                echo "<li><a href=\"effects-vibrato.php\">Vibrato</a></li>";
                echo "<li><a href=\"effects-wah.php\">Wah</a></li>";
                
              echo "</ul>";
              
            echo "</li>";
            
            // amps menu
            echo "<li class=\"dropdown\">";
              
              echo "<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Amps";
              echo "<span class=\"caret\"></span></a>";
              echo "<ul class=\"dropdown-menu\">";
                echo "<li><a href=\"amps-fender.php\">Fender</a></li>";
                echo "<li><a href=\"amps-vox.php\">Vox</a></li>";
                
              echo "</ul>";
              
            echo "</li>";
            
            // accessories menu
            echo "<li class=\"dropdown\">";
              
              echo "<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Accessories";
              echo "<span class=\"caret\"></span></a>";
              echo "<ul class=\"dropdown-menu\">";
                echo "<li><a href=\"accessories-cables.php\">Cables</a></li>";
                echo "<li><a href=\"accessories-powersupplies.php\">Power Supply</a></li>";
                
              echo "</ul>";
              
            echo "</li>";
          
        }
      
      ?>
      
    </ul>
    
  </div>
  
</div>

<div class="container">
  
  <div class="row">
    
    <div class="col-md-6">
      
      <?php
      
        if($_SESSION["email"]) {
          
          echo "<p>Hello ".$_SESSION["email"]."</p>";
          
        }
        
      ?>
      
    </div>
  </div>
</div>

