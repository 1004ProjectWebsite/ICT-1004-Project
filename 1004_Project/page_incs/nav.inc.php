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
                <a class="nav-link" href="../pages/home.php">Home</a>
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
            <div class="nav-item">
                    <li><a class="dropdown-item" href="index.php?page=aboutus">About Us</a></li>
            </div>
        </ul>
        <ul class="navbar-nav ml-auto">
             <a class="nav-link" title="Shopping Cart" href="index.php?page=cartpage">
                     <i class="material-icons" style="font-size:2em">shopping_cart</i>
                     <?php
                        if (!empty($_SESSION["shopping_cart"])) {
                            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                            ?>
                                 <span><?php echo $cart_count; ?></span></a>
                            <?php
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
                        <a class="dropdown-item" href="index.php?page=changepwd">Change Password</a>
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