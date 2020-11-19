<?php
session_start(); // start session

$id = $_SESSION['id'];
$fname = $lname = $email = $pno = $address = $pwd_hashed = $errorMsg = "";
$success = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (!empty($_POST["fname"])) 
    {
        $fname = sanitize_input($_POST["fname"]);
    }
    if (empty($_POST["lname"])) 
    {
        $errorMsg .= "Last name is required.<br>";
        $success = false;
    } else 
    {
        $lname = sanitize_input($_POST["lname"]);
    }
    if (empty($_POST["email"]))
    {
        $errorMsg .= "Email is required.<br>";
        $success = false;
    } else 
    {
        $email = sanitize_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $errorMsg .= "Invalid email format.<br>";
            $success = false;
        }
    }
    if (empty($_POST["address"])) 
    {
        $address = sanitize_input($_POST["address"]);
    }  
     if (empty($_POST["pno"])) 
    {
        $pno = sanitize_input($_POST["pno"]);
    }   
}

UpdateDB(); 
// Helper function that checks input for malicious or unwanted content.
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function UpdateDB() {
    global $id, $fname, $lname, $email, $address, $pno, $pwd_hashed, $errorMsg, $success;

    $servername = "localhost";
    $username = "root";
    $password = "kahwei";
    $dbname = "1004_Project";
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        $success = false;
    } else {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $pno = $_POST['pno'];
        $sql = ("UPDATE member SET fname ='$fname', lname ='$lname', email ='$email', address ='$address', pno ='$pno' WHERE member_id = '$id'");
        //header('Location:/pages/account.php');
    }
    if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
        $_SESSION["update"] = true;
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}
?>
<html>
    <head>
        <title>Update Results</title>
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
                echo "<h3>Update successful!</h3>"; 
                echo "<a class=\"btn btn-success\" href=\"\pages\account.php\">Return to Account</a>";
            } else {
                echo "<h3>Oops!</h3>";
                echo "<h4>The following input errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo '<button class="btn btn-danger hBack">Return to Account</button>';
            }
            ?>           
        </main>
    </body>
    <?php
    include "../page_incs/footer.inc.php";
    ?>
</html>