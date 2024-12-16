<?php
    //Customer
    if($_SESSION['user_type'] == 'customer') {
        
        echo "<div class='sidebar-header'>
                <h2>Customer Profile</h2>
                <i class='fas fa-times' id='close-sidebar' title='Close Dashboard'></i>
            </div>
            <ul class='sidebar-menu'>
                <li><a href='./customer.php' title='Your Profile'><i class='fa-solid fa-user'></i> My Profile</a></li>
                <li><a href='./products.php' title='Browse Products'><i class='fas fa-box-open'></i> Products</a></li>
                <li><a href='./accSettings.php' title='Edit profile & Change password'><i class='fas fa-cog'></i> Settings</a></li>
                <li><a href='./logout.php' title='Logout'><i class='fas fa-sign-out-alt'></i> Logout</a></li>
            </ul>";
    }

    //Buyer
    else if($_SESSION['user_type'] == 'buyer') {
        
        echo "<div class='sidebar-header'>
                <h2>Buyer Profile</h2>
                <i class='fas fa-times' id='close-sidebar' title='Close Dashboard'></i>
            </div>
            <ul class='sidebar-menu'>
                <li><a href='./buyer.php' title='Your Profile'><i class='fa-solid fa-user'></i> My Profile</a></li>
                <li><a href='./products.php' title='Browse Products'><i class='fas fa-box-open'></i> Products</a></li>
                <li><a href='./accSettings.php' title='Edit profile & Change password'><i class='fas fa-cog'></i> Settings</a></li>
                <li><a href='./logout.php' title='Logout'><i class='fas fa-sign-out-alt'></i> Logout</a></li>
            </ul>";
    }

    //Supplier
    else if($_SESSION['user_type'] == 'supplier') {
        
        echo "<div class='sidebar-header'>
                <h2>Supplier Profile</h2>
                <i class='fas fa-times' id='close-sidebar' title='Close Dashboard'></i>
            </div>
            <ul class='sidebar-menu'>
                <li><a href='./supplier.php' title='Your Profile'><i class='fa-solid fa-user'></i> My Profile</a></li>
                <li><a href='./accSettings.php' title='Edit profile & Change password'><i class='fas fa-cog'></i> Settings</a></li>
                <li><a href='./logout.php' title='Logout'><i class='fas fa-sign-out-alt'></i> Logout</a></li>
            </ul>";
    }

    //Manager
    else if($_SESSION['user_type'] == 'manager') {
        
        echo "<div class='sidebar-header'>
                <h2>Manager Profile</h2>
                <i class='fas fa-times' id='close-sidebar' title='Close Dashboard'></i>
            </div>
            <ul class='sidebar-menu'>
                <li><a href='./manager.php' title='Your Profile'><i class='fa-solid fa-user'></i> My Profile</a></li>
                <li><a href='./manageProducts.php' title='Products Management'><i class='fa-solid fa-store'></i> Manage Products</a></li>
                <li><a href='./manageOrders.php' title='Orders Management'><i class='fa-solid fa-cart-shopping'></i> Manage Orders</a></li>
                <li><a href='./todayPrice.php' title='Buyers & Sellers price list'><i class='fa-solid fa-money-bill-1-wave'></i> Today's Price List</a></li>
                <li><a href='./buyersManagement.php' title='Buyers Management'><i class='fa-solid fa-handshake'></i> Manage Buyers</a></li>
                <li><a href='./supplyManagement.php' title='Suppliers Management'><i class='fa-solid fa-business-time'></i> Manage Suppliers</a></li>
                <li><a href='./manageMessages.php' title='Messages Management'><i class='fa-solid fa-comment'></i> Manage Messages</a></li>
                <li><a href='./viewIncome.php' title='View Analytics'><i class='fas fa-chart-line'></i> View Analytics</a></li>
                <li><a href='./accSettings.php' title='Edit profile & Change password'><i class='fas fa-cog'></i> Settings</a></li>
                <li><a href='./logout.php' title='Logout'><i class='fas fa-sign-out-alt'></i> Logout</a></li>
            </ul>";
    }

    //Admin
    else if($_SESSION['user_type'] == 'admin') {
        
        echo "<div class='sidebar-header'>
                <h2>Customer Profile</h2>
                <i class='fas fa-times' id='close-sidebar' title='Close Dashboard'></i>
            </div>
            <ul class='sidebar-menu'>
                <li><a href='./admin.php' title='Your Profile'><i class='fa-solid fa-user'></i> My Profile</a></li>
                <li><a href='./manageManagers.php' title='Managers Management'><i class='fas fa-user-tie'></i> Manage Managers</a></li>
                <li><a href='./manageProducts.php' title='Products Management'><i class='fa-solid fa-store'></i> Manage Products</a></li>
                <li><a href='./manageOrders.php' title='Orders Management'><i class='fa-solid fa-cart-shopping'></i> Manage Orders</a></li>
                <li><a href='./todayPrice.php' title='Buyers & Sellers price list'><i class='fa-solid fa-money-bill-1-wave'></i> Today's Price List</a></li>
                <li><a href='./buyersManagement.php' title='Buyers Management'><i class='fa-solid fa-handshake'></i> Manage Buyers</a></li>
                <li><a href='./supplyManagement.php' title='Suppliers Management'><i class='fa-solid fa-business-time'></i> Manage Suppliers</a></li>
                <li><a href='./manageMessages.php' title='Messages Management'><i class='fa-solid fa-comment'></i> Manage Messages</a></li>
                <li><a href='./viewIncome.php' title='View Analytics'><i class='fas fa-chart-line'></i> View Analytics</a></li>
                <li><a href='./accSettings.php' title='Edit profile & Change password'><i class='fas fa-cog'></i> Settings</a></li>
                <li><a href='./logout.php' title='Logout'><i class='fas fa-sign-out-alt'></i> Logout</a></li>
            </ul>";
    }

    //other unsafe logins
    else {
        // redirect to login page
        header("Location:./login.php");
    }
?>