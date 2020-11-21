<nav class="navbar navbar-expand-sm navbar-light text-right" id="navbar">
    <a class="navbar-brand" href="/pages/home.php">
        <img src="../images/phonix_logo_black.png" alt="phonix" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../pages/index.php">Home</a>
            </li>
            <li class="dropdown">
                <a class="nav-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>                 
                    <i class="material-icons" style="font-size:1em">store</i>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="index.php?page=products">All</a></li>
                    <li><a class="dropdown-item" href="index.php?page=huawei">Huawei</a></li>
                    <li><a class="dropdown-item" href="index.php?page=apple">Apple</a></li>
                    <li><a class="dropdown-item" href="index.php?page=oppo">Oppo</a></li>
                    <li><a class="dropdown-item" href="index.php?page=samsung">Samsung</a></li>
                    </ul>
            </li>
            <div class="dropdown">
                <a class="nav-item dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About
                <span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="index.php?page=aboutus">About Us</a></li>
                    <li><a class="dropdown-item" href="index.php?page=contactus">Contact Us</a></li>
                </ul>
            </div>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" title="Shopping Cart" href="index.php?page=cart">
                    <i class="material-icons" style="font-size:2em">shopping_cart</i>
                     <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                   
                </a>
            </li>
            <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { //Means user is logged in display logout
            ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons" style="font-size:2em">account_circle</i>  
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?page=account">Account</a>
                        <a class="dropdown-item" href="">Order History</a>
                    </div>
                </li>         
                <li class="nav-item">
                    <a class="nav-link" title="Log out" href="index.php?page=logout">
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
                        <a class="dropdown-item" href="index.php?page=login">Log in</a>
                        <a class="dropdown-item" href="index.php?page=register">Register</a>
                    </div>
                </li>
<?php 
            } 
            ?>
        </ul>
    </div>  
</nav>