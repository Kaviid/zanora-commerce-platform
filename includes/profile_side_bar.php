<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<aside class="sidebar">

    <div class="user-summary">
        <div class="avatar">KD</div>

        <div class="user-info">
            <h3><?php echo $_SESSION["fullname"]; ?></h3>
            <p>Have a great day!</p>
        </div>
    </div>

    <nav class="sidebar-menu">

        <a href="profile.php"
           class="menu-item <?php echo ($currentPage == 'profile.php') ? 'active' : ''; ?>">
            <img src="icons/user.png" alt="Profile" class="icon">
            <span>Profile</span>
        </a>

        <a href="orders.php"
           class="menu-item <?php echo ($currentPage == 'orders.php') ? 'active' : ''; ?>">
            <img src="icons/order.png" alt="Orders" class="icon">
            <span>Orders</span>
        </a>

        <a href="logout.php" class="menu-item logout">
            <img src="icons/logout.png" alt="Logout" class="icon">
            <span>Logout</span>
        </a>

    </nav>

</aside>