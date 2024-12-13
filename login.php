<!-- backend -->
 <?php
    session_start();

    // include the database config file
    require_once 'config.php';

    if(isset($_POST['next-button'])) {
        
        //retrieve the email and password from post method
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        //input validations
        if(!empty($email) && !empty($password)){
            $sql = "SELECT * FROM user_info WHERE email = ? AND status = 'active'";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            //check if table has only one email
            if($result-> num_rows == 1) {
                //get the user's data
                $row = $result->fetch_assoc();

                //verify password
                if(password_verify($password, $row['password'])) {

                    //store user details in sessions
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_fName'] = $row['fName'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['user_phone'] = $row['phone1'];
                    $_SESSION['user_type'] = $row['type'];
                    $_SESSION['user_status'] = $row['status'];

                    //redirect users based on their user types
                    switch($user['type']) {
                        case 'admin':
                            header("Location: admin.php");
                            break;
                        case 'manager':
                            header("Location: manager.php");
                            break;
                        case 'customer':
                            header("Location: customer.php");
                            break;
                        case 'buyer':
                            header("Location: buyer.php");
                            break;
                        case'supplier':
                            header("Location: supplier.php");
                            break;
                        default:
                            header("Location: login.php");
                            break;
                    }
                }
            }
        }

    }

 ?>

<!-- html part -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <!-- link the stylesheet -->
    <link rel="stylesheet" href="./css/login.css">

    <!-- set the logo into title -->
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <div class="login-container">
        <!-- Background Image -->
        <div class="login-bg">
          <img src="./images/coconut-still-life.jpg" alt="Coconut">
        </div>
    
        <!-- Login Form -->
        <div class="login-form">
          <h1>Hello!</h1>
          <p>Welcome back! Please log in to your account.</p>
          
            <form action="login.php" method="POST">
                <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" required>
                </div>
        
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                
                <div class="show-password-container">
                    <input type="checkbox" id="show-password" class="showPwd">
                    <label for="show-password" class="showPwd">Show Password</label>
                </div>

                <p class="incorrect-password" id="incorrect-password"></p>
        
                <button type="submit" id="next-button" name="next-button" title="Click to Login">
                    NEXT <span class="arrow">&rarr;</span>
                </button>
                <p>Don't you have an account? <a href="./register.php" title="Register">Sign Up</a></p>
            </form>
        </div>
    </div>

    <!-- link the script -->
    <script src="./js/login.js"></script>
</body>
</html>