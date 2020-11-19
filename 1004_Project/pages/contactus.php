<?php
session_start();
?>
<html>
    <head>
        <title>Phone Case Shop</title>
        <?php
        include "../page_incs/head.inc.php";
        ?>
    </head>
    <body> 
        <?php
        include "../page_incs/nav.inc.php";
        ?>
        <main class="container">
        <h1>Contact Us</h1>
        <p>
            For any queries, Please contact us below.
        </p>

        <div class="container">
            <form action="../processes/process_contactus.php" method="post">
              <label for="fname">Name *</label>
              <input type="text" id="fname" Required name="name" placeholder="Your name..">

              <label for="lname">Phone Number *</label>
              <input type="text" id="phoneno" Required name="phoneno" placeholder="Phone number..">
              
               <label for="lname">Email *</label>
              <input type="text" id="email" Required name="email" placeholder="Email..">

              <label for="subject">Comment</label>
              <textarea id="comment" name="comment" placeholder="Write something.." style="height:200px"></textarea>

              <input type="submit" value="Submit">

            </form>
          </div>
        </main> 
    </body>
    <?php
        include "../page_incs/footer.inc.php";
    ?>
</html>


