<?php
session_start(); //start session
$fname = $lname = $email = $pwd_hashed = $errorMsg = "";
$success = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    if (!empty($_POST["fname"])) {
        $fname = sanitize_input($_POST["fname"]);
    }
    
    
    if (empty($_POST["lname"])) {
        $errorMsg .= "Last name is required.<br>";
        $success = false;
    } else {
        $lname = sanitize_input($_POST["lname"]);
    }
    
  
    if (empty($_POST["email"])) {
        $errorMsg .= "Email is required.<br>";
        $success = false;
    } else {
        $email = sanitize_input($_POST["email"]);
        
      
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMsg .= "Invalid email format.<br>";
            $success = false;
        }
    }
    

    if (empty($_POST["pwd"]) || empty($_POST["pwd_confirm"])) {
        $errorMsg .= "Password and confirmation are required.<br>";
        $success = false;
    } else {
     
        if ($_POST["pwd"] != $_POST["pwd_confirm"]) {
            $errorMsg .= "Passwords do not match.<br>";
            $success = false;
        } else {
            $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
        }
    }
     
} else {
    echo "<h2>This page is not meant to be run directly.</h2>";
    echo "<p>You can register at the link below:</p>";
    echo "<a href='register.php'>Go to Sign up page...</a>";
    exit();
}



// Helper function that checks input for malicious or unwanted content.
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function saveMemberToDB() {
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
    
    // Create database connection.
    //$config = parse_ini_file('../../private/db-config.ini');
    //$conn = new mysqli($config['servername'], $config['username'],
      //      $config['password'], $config['dbname']);
// Create connection
    $servername = "localhost";
    $username = "root";
    $password = "kahwei";
    $dbname = "1004_Project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

    
    // Check connection
    if ($conn->connect_error)
    {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
        // Prepare the statement:
        $stmt = $conn->prepare("INSERT INTO member (fname, lname, email, password) VALUES (?, ?, ?, ?)");
        
          $_SESSION['use']=$fname; //get fname after registration 
            echo $_SESSION['use'];
            
            if (!isset($_SESSION['use'])) { 
                echo "You are not logged in";
            }
            else{
                echo "You are logged in"; //After registration jump to index.php
                header("location: index.php");
                exit();
            }
        
        // Bind & execute the query statement:
        $stmt->bind_param("ssss", $fname, $lname, $email, $pwd_hashed);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}
?>
<html>
    <head>
        <title>Registration Results</title>
        <?php
            include "head.inc.php";
        ?>
    </head>
    <body>
        <?php
            include "nav.inc.php";
        ?>
        
        <main class="container">
            
            <?php
            if ($success) {
                saveMemberToDB();
                echo "<h3>Your registration is successful!</h3>";
                echo "<h4>Thank you for signing up, " . $fname . " " . $lname . "</h4>";
                echo "<a class=\"btn btn-success\" href=\"login.php\">Log-in</a>";
            } else {
                echo "<h3>Oops!</h3>";
                echo "<h4>The following input errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo '<button class="btn btn-danger hBack">Return to Sign Up</button>';
            }
            ?>
            
        </main>
    </body>
     <?php
            include "footer.inc.php";
        ?>
</html>