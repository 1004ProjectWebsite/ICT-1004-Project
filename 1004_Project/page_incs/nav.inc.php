<nav class="navbar navbar-expand-sm navbar-light text-right" id="navbar">
    <a class="navbar-brand" href="../pages/home.php">
        <img src="//cdn.shopify.com/s/files/1/0254/0516/1520/files/logo_2048x.gif?v=1561039465" alt="in a nutshell – kurzgesagt" height="30" style="height:30px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../pages/home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/store.php">Shop
                    <i class="material-icons" style="font-size:1em">store</i>
                </a>
            </li>
            
            <div class="dropdown">
                <a class="nav-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About
                <span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../pages/aboutus.php">About Us</a></li>
                    <li><a class="dropdown-item" href="../pages/contactus.php">Contact</a></li>
                </ul>
            </div>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="link-icons">
                <a class="nav-link" title="Shopping Cart" href="home.php?page=cart">
                    <i class="fas fa-shopping-cart" style="font-size:1.8em"></i>
                </a>

            <?php
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { //Means user is logged in display logout
            ?>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons" style="font-size:2em">account_circle</i>  
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../pages/account.php">Account</a>
                        <a class="dropdown-item" href="">Order History</a>
                    </div>
                </li>          
                <li class="nav-item">
                    <a class="nav-link" title="Log out" href="../pages/logout.php">
                        <i class="material-icons" style="font-size:2em">exit_to_app</i>
                    </a>
                </li>                
                <?php 
            } else //User is not logged in diplay login/register
            { 
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons" style="font-size:2em">account_circle</i>  
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../pages/login.php">Log in</a>
                        <a class="dropdown-item" href="../pages/register.php">Register</a>
                    </div>
                </li>
<?php 
            } 
            ?>
        </ul>
    </div>  
</nav>