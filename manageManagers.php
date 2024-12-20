<?php
    //start sessions
    session_start();
    
    //include database config file
    require_once 'config.php';

    //check user logs in
    if (!isset($_SESSION['user_fName'])) {
        //redirect to login page
        header('Location: login.php');
        exit();
    }
    else {
        $dob = $_SESSION['user_dob'];
        $today = date('m-d');
        $birthday = date('m-d', strtotime($dob));

        //check user's b'day
        if($today === $birthday) {
            $greeting = "Happy Birthday ".$_SESSION['user_fName']."!";
        }
        else {
            $greeting = "Welcome ".$_SESSION['user_fName']."!";
        }

        //add managers
        if(isset($_POST['addBtn'])) {
            $fName = trim($_POST['first-name']);
            $lName = trim($_POST['last-name']);
            $assignWork = trim($_POST['assignWork']);
            $email = trim($_POST['email']);
            $phone1 = trim($_POST['phone1']);
            $password = trim($_POST['password']);
            $status = 'active';
            $image = './images/default-profile.png';
            $type = 'manager';

            $sql = "INSERT INTO user_info (email, password, fName, lName, phone1, image, type, assignType, status)
                    VALUES ('$email', '$password', '$fName', '$lName', '$phone1', '$image', '$type', '$assignWork', '$status');";

            $result = mysqli_query($conn, $sql);

            //check if query was successful
            if($result) {
                echo "<script>alert('Manager added successfully!');</script>";
            }
            else {
                echo "<script>alert('Failed to add manager. Please try again!');</script>";
            }
        }

        //Check, Activate, Deactivate and Remove Managers
        if($_POST['checkMailBtn']) {
            $email = trim($_POST['checkMail']);

            $sql = "SELECT email FROM user_info WHERE email = ?"
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Managers Page</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/manageManagers.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Main Container -->
    <div class="container">
        <!-- Hidden Sidebar -->
        <aside id="sidebar" class="sidebar">
            <?php include 'sidebar.php'; ?>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Topbar -->
            <div class="topbar">
                <i class="fas fa-bars" id="toggle-sidebar" title="Open Dashboard"></i>
                <h1><?php echo $greeting; ?></h1>
            </div>

            <section class="mainSeparation">
                <div class="addManager">
                    <h2>Add Managers</h2>
                    <form action="manageManagers.php" method="POST" class="addForm">
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" id="first-name" name="first-name" placeholder="Enter the first name of Manager" required>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" id="last-name" name="last-name" placeholder="Enter the second name of Manager">
                        </div>
                        <div class="form-group">
                            <label for="assignWork">Assigned Work</label>
                            <input type="text" id="assignWork" name="assignWork" placeholder="Enter the assigned work for Manager">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter Manager's email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone1">Phone Number</label>
                            <input type="tel" id="phone1" name="phone1" placeholder="Enter manager's primary phone number">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Enter a password">
                        </div>
                        
                        <center>
                            <button type="submit" id="addBtn" name="addBtn" title="Click to add manager"><i class="fa-solid fa-user-plus"></i> Add Manager</button>
                        </center>
                    </form>
                </div>

                <div class="rightSide">
                    <!-- Check, Activate, Deactivate and Remove Managers -->
                    <div class="checkManager">
                        <h2>Check, Activate, Deactivate and Remove Managers</h2>
                        <div class="checkCard">
                            <form action="#" method="POST">
                                <input type="text" id="checkmail" name="checkMail" placeholder="Enter email" required>
                                <button type="submit" id="checkMailBtn" name="checkMailBtn" title="Check Availability"><i class="fa-solid fa-magnifying-glass"></i> Check</button>
                                <div class="status">
                                    <label for="status"><strong>Status: </strong>Active</label>
                                </div>
                                <div class="btns">
                                    <button type="submit" id="activate" name="activate" title="Activate">Activate <i class="fa-regular fa-thumbs-up"></i></button>
                                    <button type="submit" id="deactivate" name="deactivate" title="Deactivate">Deactivate <i class="fa-solid fa-user-lock"></i></button>
                                    <button type="submit" id="remove" name="remove" title="Remove">Remove <i class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="managerList">
                        <h2>Manager List</h2>

                        <div class="custom-scroll">
                            <div class="content" id="scrollable-content">
                                <table class="listTable" border="1px">
                                    <tr>
                                        <th class="tFName">First Name</th>
                                        <th class="tLName">Last Name</th>
                                        <th class="tType">Assign Type</th>
                                        <th class="tMail">Email</th>
                                        <th class="tPhone">Phone Number</th>
                                        <th class="tStatus">Status</th>
                                    </tr>
                                    <tr>
                                        <td>Susantha</td>
                                        <td>Perera</td>
                                        <td>Product Manager</td>
                                        <td>manager.susantha@gmail.com</td>
                                        <td>0772274083</td>
                                        <td>Active</td>
                                    </tr>
                                    <tr>
                                        <td>Siriwardhana</td>
                                        <td>Silvage</td>
                                        <td>Supply Manager</td>
                                        <td>manager.silvas@gmail.com</td>
                                        <td>0712514562</td>
                                        <td>Non-Active</td>
                                    </tr>
                                    <tr>
                                        <td>Ishini</td>
                                        <td>Maneesha</td>
                                        <td>Order Manager</td>
                                        <td>manager.ishini@gmail.com</td>
                                        <td>0712512587</td>
                                        <td>Active</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <h2 class="quickH2">Quick Actions</h2>
            <div class="quick">
                <div class="card">
                    <a href="./manageProducts.php" title="Products Management"><i class="fa-solid fa-store"></i><br>Manage Products</a>
                </div>
                <div class="card">
                    <a href="./manageOrders.php" title="Orders Management"><i class="fa-solid fa-cart-shopping"></i><br>Manage Orders</a>
                </div>
                <div class="card">
                    <a href="./todayPrice.php" title="Buyers & Sellers price list"><i class="fa-solid fa-money-bill-1-wave"></i><br>Today's Price List</a>
                </div>
                <div class="card">
                    <a href="./supplyManagement.php" title="Suppliers Management"><i class="fa-solid fa-business-time"></i><br>Manage Suppliers</a>
                </div>
                <div class="card">
                    <a href="./buyersManagement.php" title="Buyers Management"><i class="fa-solid fa-handshake"></i><br>Manage Buyers</a>
                </div>
                <div class="card">
                    <a href="./manageMessages.php" title="Messages Management"><i class="fa-solid fa-comment"></i><br>Manage Messages</a>
                </div>
            </div>
        </div>
    </div>

    <!-- link script -->
    <script src="./js/sideBar.js"></script>
    <script src="./js/scrollBar.js"></script>
</body>
</html>