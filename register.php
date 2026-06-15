<!DOCTYPE html>
<head>
  <title>Log In</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">  
  <link rel="stylesheet" href="css/log-register/reg.css">
  <link rel="stylesheet" href="css/log-register/notification.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
  <div class="container">
    <a href="index.php" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i>
    </a>

    <form id="register-form" method="POST">
      <div class="inner-container">
        <p class="title">Register</p>
        <div class="name-box">
            <p class="name">Name</p>
  
          <div class="f-l">
            <input type="text" name="firstname" placeholder="First name">
            <input type="text" name="lastname" placeholder="Last name">
          </div>
        </div>
  
        <div class="email-box">
          <div class="sec">
            <p class="email">Email</p>
            <div id="email-err"></div>
          </div>
          <input type="text" name="email" placeholder="Enter email">
        </div>
  
        <div class="pass-box">
          <div class="sec">
            <p class="pass">Password</p>
            <div id="pass-err"></div>
          </div>
          <input type="password" id="password" name="password" placeholder="Enter password">
        </div>
  
        <div class="con-pass-box">
          <div class="sec">
            <p class="con-pass">Confirm Password</p>
            <div id="con-pass-err"></div>
          </div>
          <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password">
        </div>
  
        <div class="submit-box">
          <button type="submit" id="submit" class="reg-btn">Register</button>
          <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
      </div>
    </form>

    <div id="msg-box" class="msg-box"></div>
    
  </div>
  <script src="js/log-reg-page/register.js"></script>
</body>
</html>