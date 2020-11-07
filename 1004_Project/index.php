<?php
session_start(); //start session
?>
<head>
    <title>Phone Case Shop</title>
    <?php
    include "head.inc.php";
    ?>
</head>

<body>
    <?php
    include "nav.inc.php";
    ?>
    <header class="jumbotron parallax text-center" style="margin: 20px;">
        <div>
            <h1 class="display-4">Welcome to ______</h1>
            <p>at introduces the company/organization</p>
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
                                <a href="phone_cases_img/iphone_11_clearcase.jpg">
                                    <img src="phone_cases_img/iphone_11_clearcase.jpg" alt="iphone11"/>
                                </a>
                                <figcaption>iPhone 11 clear case</figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col">
                        <article >
                            <figure>
                                <a href="phone_cases_img/iphone_12_kumquat.jpg">
                                    <img src="phone_cases_img/iphone_12_kumquat.jpg" alt="iphone12"/>
                                </a>
                                <figcaption>iPhone 12 Silicon case - Kumquat</figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col">
                        <article >
                            <figure>
                                <a href="phone_cases_img/iphone_12_Green.jpg">
                                    <img src="phone_cases_img/iphone_12_Green.jpg" alt="iphone12"/>
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
                                <a href="phone_cases_img/samsung_note20_clear.jpg">
                                    <img src="phone_cases_img/samsung_note20_clear.jpg" alt="Samsungnote20"/>
                                </a>
                                <figcaption>Samsung note20 clear</figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col">
                        <article>
                            <figure>
                                <a href="phone_cases_img/huawei_p30_red.jpg">
                                    <img src="phone_cases_img/huawei_p30_red.jpg" alt="huaweip30"/>
                                </a>
                                <figcaption>HuaWei P30 silicon case red</figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col">
                        <article>
                            <figure>
                                <a href="phone_cases_img/samsung_note20_brown.jpg">
                                    <img src="phone_cases_img/samsung_note20_brown.jpg" alt="Samsungnote20"/>
                                </a>
                                <figcaption>Samsung note20 Leather cover - brown</figcaption>
                            </figure>
                        </article>
                    </div>
                </div>

            </div>
    </main>        
</body>

<?php
include "footer.inc.php";
?>