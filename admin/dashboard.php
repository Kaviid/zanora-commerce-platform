<?php 
session_start();

if(!isset($_SESSION["admin_id"])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f5f5f5;
        }

        .dashboard{
            max-width:1200px;
            margin:40px auto;
            padding:20px;
        }

        .header{
            background:white;
            padding:20px;
            border-radius:10px;
            margin-bottom:20px;
        }

        .header h1{
            margin-bottom:10px;
        }

        .cards{
            display:grid;
            grid-template-columns:repeat(3, 1fr);
            gap:20px;
            margin-bottom:20px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:10px;
            text-align:center;
        }

        .card h2{
            font-size:32px;
            margin-bottom:10px;
        }

        .actions{
            display:flex;
            gap:15px;
        }

        .action-btn{
            background:white;
            padding:15px 25px;
            border-radius:10px;
            text-decoration:none;
            color:black;
        }

        @media(max-width:768px){
            .cards{
                grid-template-columns:1fr;
            }

            .actions{
                flex-direction:column;
            }
        }
    </style>
</head>
<body>

    <div class="dashboard">

        <div class="header">
            <h1><?php echo  $_SESSION["admin_fullname"] ?></h1>
            <p>Admin Dashboard</p>
        </div>

        <div class="cards">

            <div class="card">
                <h2>0</h2>
                <p>Total Products</p>
            </div>

            <div class="card">
                <h2>0</h2>
                <p>Total Orders</p>
            </div>

            <div class="card">
                <h2>0</h2>
                <p>Total Customers</p>
            </div>

        </div>

        <div class="actions">
            <a href="#" class="action-btn">Manage Products</a>
            <a href="#" class="action-btn">Manage Orders</a>
            <a href="logout.php" class="action-btn">Logout</a>
        </div>

    </div>

</body>
</html>