<?php
session_start();
include 'includes/header.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/profile/profile.css">
  <link rel="stylesheet" href="css/profile/side_bar.css">
</head>
<body>
  <div class="container">
    <div class="profile-layout">

      <?php include 'includes/profile_side_bar.php'; ?>

      <main class="profile-content">

        <div class="profile-banner">
            <div class="banner-avatar">JD</div>

            <div class="banner-info">
                <h2>Hi, <?php echo $_SESSION["fullname"]; ?></h2>
                <p>Manage your profile and account settings</p>
            </div>
        </div>

        <div class="details-grid">

          <div class="detail-card">
              <span class="detail-label">Name</span>
              <h4><?php echo $_SESSION["fullname"]; ?></h4>
          </div>

          <div class="detail-card">
              <span class="detail-label">Email</span>
              <h4>kaviid@email.com</h4>
          </div>

          <div class="detail-card">
              <span class="detail-label">Phone</span>
              <h4>+94 74 106 5472</h4>
          </div>

          <div class="detail-card">
              <span class="detail-label">Address</span>
              <h4>42 Maple Street, New York</h4>
          </div>

        </div>

      </main>

    </div>

  </div>
</body>
</html>