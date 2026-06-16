<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Zanora</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#f8f8f8;
        }

        .login-container{
            width:380px;
            background:white;
            padding:35px;
            border-radius:15px;
            border:1px solid #FFE1CC;
            box-shadow:0 4px 20px rgba(0,0,0,0.08);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
            color:gray;
        }

        .input-group{
            margin-bottom:18px;
        }

        label{
            display:block;
            margin-bottom:6px;
            color:#555;
            font-size:14px;
        }

        input{
            width:100%;
            padding:12px;
            border:1px solid #FF9452;
            border-radius:8px;
            font-size:14px;
        }

        input:focus{
            outline:none;
            border-color:#FF7A1A;
            box-shadow:0 0 0 3px rgba(255, 122, 26, 0.15);
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            border-radius:8px;
            background:#FF7A1A;
            color:white;
            font-size:15px;
            cursor:pointer;
            transition:0.2s;
        }

        button:hover{
            background:#ff6200;
        }

        #message{
            margin-top:15px;
            text-align:center;
            color:red;
            font-size:14px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Admin Login</h2>

        <form id="adminLoginForm" method="POST">
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Login</button>

            <div id="message"></div>
        </form>
    </div>

    <script src="js/admin-login.js"></script>

</body>
</html>