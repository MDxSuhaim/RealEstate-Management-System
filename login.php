<?php
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "INVENTORY";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get username and password from POST request
        $username = $_POST['username'];
        $password = $_POST['password'];

        // SQL query to fetch admin credentials
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Admin credentials found, set session or return success message
            // For simplicity, let's just return success message
            echo "success";
            exit; // Prevent rendering HTML content after successful login
        } else {
            // Admin credentials not found, return error message
            echo "error";
            exit; // Prevent rendering HTML content after unsuccessful login
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/IMS/css/login.css" />
    <title>Admin Login</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="sign-in-form" id="loginForm" method="POST">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" id="username" name="username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="password" name="password" />
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3> Welcome</h3>
                    <p>
                        "Welcome back to your real estate universe! 
                        Login now to unlock a world of endless possibilities and seamless management. 
                        Your journey to efficient inventory control begins here. Let's elevate your real estate game together!"
                    </p>
                </div>
                <img src="/IMS/img/loginstock.png" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of Our Valued Members</h3>
                    <p>
                        Thank you for being part of our community. Your presence enriches our
                        shared experiences. Let's continue this journey together!
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="https://i.ibb.co/nP8H853/Mobile-login-rafiki.png" class="image" alt="" />
            </div>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            
            // AJAX code to send form data to PHP file for validation
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Response from PHP file
                    if (xhr.responseText == "success") {
                        // Redirect to dashboard or desired page upon successful login
                        window.location.href = '/ims/html/customer-report.php';
                    } else {
                        // Display error message
                        alert('Invalid username or password');
                    }
                }
            }
            xhr.send('username=' + username + '&password=' + password);
        });
    </script>
</body>

</html>
