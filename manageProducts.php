<?php
// start sessions
session_start();

//connect config file
include_once 'config.php';

// Check if user is logged in
if(!isset($_SESSION['user_fName'])) {
    //user is not logged in redirect to login page
    header('Location: login.php');
    exit();
}
else {
    $dob = $_SESSION['user_dob'];
    $today = date('m-d');
    $birthday = date('m-d', strtotime($dob));

    if($birthday == $today) {
        $greeting = "Happy Birthday ".htmlspecialchars($_SESSION['user_fName']). "!";
    }
    else {
        $greeting = "Welcome ".htmlspecialchars($_SESSION['user_fName'])."!";
    }

    // add product form
    if(isset($_POST['submitBtn'])) {
        $productName = trim($_POST['productName']);
        $description = trim($_POST['description']);
        $productPrice = trim($_POST['price']);
        $category = trim($_POST['category']);
        $quantity = trim($_POST['quantity']);
        $productImage = NULL;

        //handle product image upload
        /*if(isset($_FILES['productImg']) && $_FILES['productImg']['error'] === UPLOAD_ERR_OK) {
            $targetDir = "./images/products/";
            $fileName = basename($_FILES['productImg']['name']);
            $targetFile = $targetDir. uniqid(). "-". $fileName;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            //check file type
            if(in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                if(move_uploaded_file($_FILES['productImg']['tmp_name'], $targetFile)) {
                    $productImage = $targetFile;
                }
            }
        }
        $sql = "INSERT INTO product (name, description, price, image, category, quantity)
                VALUES ('$productName', '$description', '$productImage', '$category', '$quantity');"
        $result = mysqli_query($conn, $sql);
        
        if($result) {
            echo "<script>alert('Product added successfully!');</script>";
        }
        else {
            echo "<script>alert('Failed to add product. Please try again!');</script>";
        }*/
    }

    //fetch details for display on table
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>

    <!-- link stylesheet -->
    <link rel="stylesheet" href="./css/manageProducts.css">

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

            <h2 class="hiddenFormH2">Looking for add a new product? </h2>
            <center>
                <button type="submit" class="hiddenFormBtn" id="hiddenFormBtn" name="hiddenFormBtn" title="Add Product"><i class="fa-solid fa-plus"></i> Add New Product</button>
            </center>

            <div id="formContainer" class="hidden">
                <form id="hiddenForm" action="manageProducts.php" method="POST">
                    <div class="formUpper">
                        <h2>Add Product</h2>
                        <i class="fas fa-times" id="cancelForm"></i>
                    </div>

                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="productName" placeholder="Enter product name" required>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="3" placeholder="Enter a small description"></textarea>

                    <label for="price">Price(Rs.):</label>
                    <input type="number" id="price" name="price" placeholder="Enter product price" min="0" step="0.01" required>

                    <label for="productImg">Product Image:</label>
                    <input type="file" id="productImg" name="productImg" required>

                    <label for="category">Category:</label>
                    <input type="text" id="category" name="category" placeholder="Enter product category">

                    <label for="quantity">Available Product Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="0" placeholder="Enter available product quantity" required>

                    <center>
                        <button type="submit" id="submitBtn" title="Click to add product" name="submitBtn">Add</button>
                    </center>
                </form>
            </div>

            <h2 class="displayProductH2">Products we already published</h2>

            <center>
            <div class="displayProducts">
                <div class="custom-scroll">
                    <div class="content" id="scrollable-content">
                        <table class="listTable" border="1px">
                            <tr>
                                <th class="productID">Product Number</th>
                                <th class="tName">Product Name</th>
                                <th class="tDescription">Product Description</th>
                                <th class="tPrice">Price (Rs. )</th>
                                <th class="tProductImg">Product Image</th>
                                <th class="tCategory">Category</th>
                                <th class="tQuantity">Quantity</th>
                                <th class="tAction">Action</th>
                            </tr>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td class="productID"><?php echo $row['productid'] ?></td>
                                <td class="tName"><?php echo $row['name'] ?></td>
                                <td class="tDescription"><?php echo $row['description'] ?></td>
                                <td class="tPrice"><?php echo $row['price'] ?></td>
                                <td class="tProductImg"><?php echo $row['image'] ?></td>
                                <td class="tCategory"><?php echo $row['category'] ?></td>
                                <td class="tQuantity"><?php echo $row['quantity'] ?></td>
                                <td class="tAction">
                                    <a href="#" title="Edit"><i class="fa-solid fa-edit"></i></a> | 
                                    <a href="#"><i class="fa-solid fa-trash" title="Delete Product"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
            </center>
            
            <h2 class="quickH2">Quick Actions</h2>
            <div class="quick">
                <div class="card">
                    <a href="./manageManagers.php" title="Managers Management"><i class="fas fa-user-tie"></i><br>Manage Managers</a>
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
    <script src="./js/manageProducts.js"></script>
    <script src="./js/scrollBar.js"></script>
</body>
</html>