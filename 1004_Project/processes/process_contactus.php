<?php
        // sender's information
	$userName = $_POST['name'];
        $userphoneno = $_POST['phoneno'];
        $useremail = $_POST['email'];
        $usercomment = $_POST['comment'];
        
        // recipient
        $to = "tshujuan99@hotmail.com";
	$subject = "Email from my website";
	$body = "Information Submitted:";
	
        // \r\n create new line when displaying 
        $body .= "\r\n Name: " . $userName;
        $body .= "\r\n Phone Number: " . $userphoneno;
        $body .= "\r\n Email: " . $useremail;
        $body .= "\r\n Comment: " . $usercomment;
        
        mail($to, $subject, $body);
        
        
?>

<html>
    <head>
        <title>Feedback Successful</title>
        <?php
            include "../page_incs/head.inc.php";
        ?>
    </head>
    <body>
        <?php
            include "../page_incs/nav.inc.php";
        ?>       
        <main class="container">           

        <?php
            if ($success) {
                echo "Thank you for your feedbacks";
            }
            else{
                echo "Sorry, an error had occurred";
                echo '<button class="btn btn-danger Back">Return to Home</button>';
            }
        ?>
        </main>
    </body>
    <?php
    include "../page_incs/footer.inc.php";
    ?>
</html>