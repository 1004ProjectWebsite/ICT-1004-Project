<?php
session_start(); //start session
?>
<head>
    <title>Phone Case Shop</title>
    <?php
    include "../page_incs/head.inc.php";
    ?>
    <style>
        article {
            text-align: center;
        }
        
        #companyInfo {
            margin-top: -100px;
        }
        
        #logo {
            height: 200px;
        }
    </style>
</head>
<body>
    <?php
    include "../page_incs/nav.inc.php";
    ?>
    <header class="jumbotron parallax text-center";">
        <div>
            <h1 class="display-4">Welcome to <img id="logo" src="../images/phonix_logo.png"></h1>
            <br/>
            <h4 id="companyInfo" style="color:white">The premier place to buy your mobile phones and accessories</h4>
        </div>
    </header>
    <main class="container">
        <h3>Popular items</h3>
        <!--put image in 3 column -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <article>
                        <figure>
                            <a href="../images/phone_cases_img/iphone_11_clearcase.jpg">
                                <img src="../images/phone_cases_img/iphone_11_clearcase.jpg" alt="iphone11"/>
                            </a>
                            <figcaption>iPhone 11 clear case</figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col">
                    <article >
                        <figure>
                            <a href="../images/phone_cases_img/iphone_12_kumquat.jpg">
                                <img src="../images/phone_cases_img/iphone_12_kumquat.jpg" alt="iphone12"/>
                            </a>
                            <figcaption>iPhone 12 Silicon case - Kumquat</figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col">
                    <article >
                        <figure>
                            <a href="../images/phone_cases_img/iphone_12_Green.jpg">
                                <img src="../images/phone_cases_img/iphone_12_Green.jpg" alt="iphone12"/>
                            </a>
                            <figcaption>iPhone 12 Silicon case - Green</figcaption>
                        </figure>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <article>
                        <figure>
                            <a href="../images/phone_cases_img/samsung_note20_clear.jpg">
                                <img src="../images/phone_cases_img/samsung_note20_clear.jpg" alt="Samsungnote20"/>
                            </a>
                            <figcaption>Samsung note20 clear</figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col">
                    <article>
                        <figure>
                            <a href="../images/phone_cases_img/huawei_p30_red.jpg">
                                <img src="../images/phone_cases_img/huawei_p30_red.jpg" alt="huaweip30"/>
                            </a>
                            <figcaption>HuaWei P30 silicon case red</figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col">
                    <article>
                        <figure>
                            <a href="../images/phone_cases_img/samsung_note20_brown.jpg">
                                <img src="../images/phone_cases_img/samsung_note20_brown.jpg" alt="Samsungnote20"/>
                            </a>
                            <figcaption>Samsung note20 Leather cover - brown</figcaption>
                        </figure>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <article>
                        <figure>
                            <a href="../images/phone_cases_img/iphone_12_starrysky.jpg">
                                <img src="../images/phone_cases_img/iphone_12_starrysky.jpg" alt="iPhone12"/>
                            </a>
                            <figcaption>iPhone 12 Starry Sky</figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col">
                    <article>
                        <figure>
                            <a href="../images/phone_cases_img/iphone_x_dog.jpg">
                                <img src="../images/phone_cases_img/iphone_x_dog.jpg" alt="iPhoneX"/>
                            </a>
                            <figcaption>iPhone X Dog</figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col">
                    <article>
                        <figure>
                            <a href="../images/phone_cases_img/oppo_doraemon.jpg">
                                <img src="../images/phone_cases_img/oppo_doraemon.jpg" alt="Oppo"/>
                            </a>
                            <figcaption>Oppo Doraemon</figcaption>
                        </figure>
                    </article>
                </div>
            </div>

        </div>
    </main>        
</body>
<?php
include "../page_incs/footer.inc.php";
?>