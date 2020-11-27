<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
<head>
    <title>About Phnoix</title>
    <link rel="icon" href="../images/phonix_logo.PNG">
    <meta name="description" content="The best phone case out there">
    <meta name="keywords" content="Phone case, Contact, About">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "../page_incs/head.inc.php";?>
    <link rel="stylesheet" href="../css/about_contact.css">


</head>
<body>
<?php
include "../page_incs/nav.inc.php";
?>
<main>
    <section class="jumbotron parallax text-center">
        <div>
            <h1 class="display-4">ABOUT US </h1>
            <br/>
            <h4 id="companyInfo" style="color:white">Let us know</h4>
        </div>
    </section>

    <section class="container">
        <article>
            <h2>About us</h2>
            <hr>
            <p>
                Phonix, located in Ang Mo Kio, sells different types of phone cases for your phone protection<br>
                needs. Our phone case are made from high quality materials sources from great manufacturers. <br>
                Our products ensure environment sustainability and can be recycled. If there is no case to <br>
                your liking, drop us a message and we will try our best to put that on our product page!<br>
            </p>
        </article>
    </section>

    <div class="container">
        <h2>Get in Touch</h2>
        <hr>
        <article>

            <div id="contactusRow" class="row">
                <div id="contactmap" class="col-md-8" style="height:400px;">
                    <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.665252371279!2d103.8466486145811!3d1.3775233989953357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16e96db0a1ab%3A0x3d0be54fbbd6e1cd!2sSingapore%20Institute%20of%20Technology%20(SIT%40NYP)!5e0!3m2!1sen!2ssg!4v1570768423752!5m2!1sen!2ssg"
                            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" title="google map of Phonix">
                    </iframe>
                </div>
                <form id="contactForm" action="process_contact.php" method="post" class="col-md-4 ">
                    <div class="form-group">
                        <label for="contactName">Name:</label>
                        <input type="text" class="form-control" id="contactName" name="contactName" placeholder="Name" pattern="[A-z ]+" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" required>
                    </div>

                    <div class="form-group">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="tel" class="form-control" id="contactNumber" name="contactPhoneNumber" placeholder="Phone Number" pattern="/^([0-9]{8})$/" maxlength="8" required>
                    </div>

                    <div class="form-group">
                        <label for="feedback">Feedback/Message:</label>
                        <textarea class="form-control" id="feedback" name="contactMessage" placeholder="MESSAGE" required></textarea>
                    </div>

                    <button type="submit" id="btnSubmit" class="btn btn-default">SUBMIT</button>
                </form>

            </div>
        </article>
    </div>
</main>
<?php
include "../page_incs/footer.inc.php";
?>
</body>
</html>
