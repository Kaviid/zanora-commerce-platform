<!DOCTYPE html>
<head>
  <title>Log In</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">  
  <link rel="stylesheet" href="css/log-register/log.css">
  <link rel="stylesheet" href="css/log-register/notification.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>
  <div class="container">
    <a href="index.php" class="back-btn">
      <i class="fa-solid fa-arrow-left"></i>
    </a>

    <form id="login-form" method="POST">
      <div class="inside-container">
        <p class="login">Login</p>
  
        <div class="email-box">
          <div class="sec">
            <label for="" class="label">Email</label>
            <div id="email-err"></div>
          </div>
          <input type="text" id="email" name="email" class="type-box" placeholder="Enter email">
        </div>
  
        <div class="password-box">
          <div class="sec">
            <label for="" class="label">Password</label>
            <div id="pass-err"></div>
          </div>
          <input type="password" id="password" name="password" class="type-box" placeholder="Enter password">
          <a href="#">Forgot password?</a>
        </div>
  
        <div class="submit">
          <button type="submit" class="sign-in">Sign In</button>
          <p class="reg-label">Not a member? <a href="register.php" class="reg-href">Register here</a></p>
        </div>
      </div>
    </form>

    <div id="msg-box" class="msg-box"></div>
  </div>
  <script src="js/log-reg-page/login.js"></script>
</body>
</html>