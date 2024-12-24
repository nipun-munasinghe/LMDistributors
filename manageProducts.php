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

    // update product form
    if (isset($_POST['updateBtn'])) {
        $productID = $_POST['productID'];
        $productName = $_POST['productName'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $quantity = $_POST['quantity'];
    
        // Update the product in the database
        $sql = "UPDATE product 
                SET name = ?, description = ?, price = ?, category = ?, quantity = ?
                WHERE productid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdssi", $productName, $description, $price, $category, $quantity, $productID);
    
        if ($stmt->execute()) {
            echo "<script>alert('Product updated successfully!'); window.location.href = 'manageProducts.php';</script>";
        } else {
            echo "<script>alert('Failed to update product. Please try again!'); window.location.href = 'manageProducts.php';</script>";
        }
    }

    // Handle product deletion
    if (isset($_GET['deleteID'])) {
        // Validate and sanitize the deleteID from GET parameter
        $deleteID = intval($_GET['deleteID']); // Ensure deleteID is an integer
    
        // Prepare the DELETE query
        $sql = "DELETE FROM product WHERE productid = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) { // Check if prepare() was successful
            $stmt->bind_param("i", $deleteID);
    
            // Execute the query
            if ($stmt->execute()) {
                // Success message
                echo "<script>alert('Product deleted successfully!'); window.location.href = 'manageProducts.php';</script>";
            } else {
                // Error message for execution failure
                echo "<script>alert('Failed to delete product. Error: " . htmlspecialchars($stmt->error) . "'); window.location.href = 'manageProducts.php';</script>";
            }
        } else {
            // Error message for query preparation failure
            echo "<script>alert('Failed to prepare the delete query. Please try again!'); window.location.href = 'manageProducts.php';</script>";
        }
    }    
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
                                <td class="tProductImg"><img src="<?php echo $row['image'] ?>" 
                                    alt="Product Image" class="productImg"></td>
                                <td class="tCategory"><?php echo $row['category'] ?></td>
                                <td class="tQuantity"><?php echo $row['quantity'] ?></td>
                                <td class="tAction">
                                    <a href="#" title="Edit"><i class="fa-solid fa-edit"></i></a> | 
                                    <a href="manageProducts.php?deleteID=<?php echo $row['productid']; ?>" 
                                        title="Delete Product" 
                                        onclick="return confirm('Are you sure you want to delete this product?');">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
            </center>

            <!-- hidden form for edit details and update -->
            <div id="editModal" class="modal hidden">
                <div class="modal-content">
                    <span class="close-btn">&times;</span>
                    <h2 class="editH2">Edit Product</h2>
                    <form id="editForm" method="POST" action="manageProducts.php">
                        <input type="hidden" id="editProductID" name="productID">
                        
                        <label for="editProductName">Product Name:</label>
                        <input type="text" id="editProductName" name="productName" required>
                        
                        <label for="editDescription">Description:</label>
                        <textarea id="editDescription" name="description" rows="3"></textarea>
                        
                        <label for="editPrice">Price (Rs.):</label>
                        <input type="number" id="editPrice" name="price" step="0.01" required>
                        
                        <label for="editCategory">Category:</label>
                        <input type="text" id="editCategory" name="category">
                        
                        <label for="editQuantity">Quantity:</label>
                        <input type="number" id="editQuantity" name="quantity" min="0" required>
                        
                        <center>
                            <button type="submit" id="updateBtn" name="updateBtn">Update</button>
                        </center>
                    </form>
                </div>
            </div>
            
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