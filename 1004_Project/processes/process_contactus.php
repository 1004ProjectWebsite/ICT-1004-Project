<?php
session_start(); //start session
$userName = $userphoneno = $useremail = $usercomment = $errorMsg = "";

// recipient
$to = "tshujuan99@hotmail.com";
$subject = "Email from my website";
$body = "Information Submitted:";

// \r\n create new line when displaying 
$body .= "\r\n Name: " . $userName;
$body .= "\r\n Phone Number: " . $userphoneno;
$body .= "\r\n Email: " . $useremail;
$body .= "\r\n Comment: " . $usercomment;

// mail($to, $subject, $body);
$success = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["name"])) {
        $userName = sanitize_input($_POST["name"]);
    }
    if (empty($_POST["name"])) {
        $errorMsg .= "Name is required.<br>";
        $success = false;
    } else {
        $userName = sanitize_input($_POST["name"]);
    }
    if (empty($_POST["email"])) {
        $errorMsg .= "Email is required.<br>";
        $success = false;
    } else {
        $useremail = sanitize_input($_POST["email"]);
        if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
            $errorMsg .= "Invalid email format.<br>";
            $success = false;
        }
    }

    if (empty($_POST["phoneno"])) {
        $errorMsg .= "Phone number is required is required.<br>";
        $success = false;
    } else {
        $userphoneno = sanitize_input($_POST["phoneno"]);
    }
} else {
    echo "<h2>This page is not meant to be run directly.</h2>";
    echo "<a href='../pages/contactus.php'>Go to Contact us page...</a>";
    exit();
}

// Helper function that checks input for malicious or unwanted content.
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
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
    echo "<h3>Thank you for your feedbacks $userName</h3>";
    echo "<a class=\"btn btn-success\" href=\"\pages\home.php\">Return to Home</a>";
} else {
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