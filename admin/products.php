
<?php

include "config/db.php";

$totalProducts = mysqli_num_rows(
    mysqli_query($conn, "SELECT id FROM products")
);

$activeProducts = mysqli_num_rows(
    mysqli_query($conn, "SELECT id FROM products WHERE status = 'active'")
);

$outOfStockProducts = mysqli_num_rows(
    mysqli_query($conn, "SELECT id FROM products WHERE stock = 0")
);

$inactiveProducts = mysqli_num_rows(
    mysqli_query($conn, "SELECT id FROM products WHERE status = 'inactive'")
);


$sql = "SELECT * FROM products";
$res = mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products Management</title>

<style>

  *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family:Arial,sans-serif;
  }

  body{
      background:#f4f6f9;
      padding:30px;
  }

  .container{
      max-width:1400px;
      margin:auto;
  }

  .top-bar{
      display:flex;
      justify-content:space-between;
      align-items:center;
      margin-bottom:25px;
  }

  .top-bar h1{
      font-size:32px;
  }

  .add-btn{
      text-decoration:none;
      background:#111827;
      color:white;
      padding:12px 20px;
      border-radius:8px;
  }

  .stats{
      display:grid;
      grid-template-columns:repeat(4,1fr);
      gap:20px;
      margin-bottom:25px;
  }

  .card{
      background:white;
      padding:25px;
      border-radius:12px;
      box-shadow:0 2px 8px rgba(0,0,0,0.08);
  }

  .card h2{
      font-size:32px;
      margin-bottom:10px;
  }

  .card p{
      color:#666;
  }

  .search-box{
      background:white;
      padding:20px;
      border-radius:12px;
      margin-bottom:25px;
      box-shadow:0 2px 8px rgba(0,0,0,0.08);
  }

  .search-box input{
      width:100%;
      padding:12px;
      border:1px solid #ddd;
      border-radius:8px;
  }

  .table-container{
      background:white;
      border-radius:12px;
      overflow:hidden;
      box-shadow:0 2px 8px rgba(0,0,0,0.08);
  }

  table{
      width:100%;
      border-collapse:collapse;
  }

  th{
      background:#111827;
      color:white;
      text-align:left;
      padding:15px;
  }

  td{
      padding:15px;
      border-bottom:1px solid #eee;
  }

  .product-img{
      width:60px;
      height:60px;
      object-fit:cover;
      border-radius:8px;
  }

  .status{
      padding:6px 12px;
      border-radius:20px;
      font-size:14px;
  }

  .active{
      background:#d1fae5;
      color:#065f46;
  }

  .inactive{
      background:#fee2e2;
      color:#991b1b;
  }

  .action-btn{
      text-decoration:none;
      padding:8px 12px;
      border-radius:6px;
      color:white;
      margin-right:5px;
  }

  .edit-btn{
      background:#2563eb;
  }

  .delete-btn{
      background:#dc2626;
  }

  @media(max-width:900px){

      .stats{
          grid-template-columns:1fr 1fr;
      }

      table{
          font-size:14px;
      }

  }

</style>
</head>
<body>

<div class="container">

    <div class="top-bar">
        <h1>Products Management</h1>
        <a href="add-product.php" class="add-btn">+ Add Product</a>
    </div>


    <div class="stats">

        <div class="card">
            <h2><?= $totalProducts ?></h2>
            <p>Total Products</p>
        </div>

        <div class="card">
            <h2><?= $activeProducts ?></h2>
            <p>Active Products</p>
        </div>

        <div class="card">
            <h2><?= $outOfStockProducts ?></h2>
            <p>Out of Stock</p>
        </div>

        <div class="card">
            <h2><?= $inactiveProducts ?></h2>
            <p>Inactive Products</p>
        </div>

    </div>


    <div class="search-box">
        <input type="text" placeholder="Search products...">
    </div>

    <div class="table-container">

        <table>

            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>


          <tbody>

            <?php
            while($row = mysqli_fetch_assoc($res)){
            ?>

            <tr>


            <?php

            $imageSql = "SELECT image_path
                        FROM product_images
                        WHERE product_id = {$row['id']}
                        ORDER BY sort_order ASC
                        LIMIT 1";

            $imageRes = mysqli_query($conn, $imageSql);
            $image = mysqli_fetch_assoc($imageRes);

            ?>

            <td>
                <img
                    src="uploads/products/<?= $image['image_path'] ?>"
                    class="product-img"
                >
            </td>



                <td><?= $row["short_title"] ?></td>

                <td><?= $row["category_id"] ?></td>

                <td>Rs. <?= $row["dis_price"] ?></td>

                <td><?= $row["stock"] ?></td>

                <td>
                    <span class="status <?= $row["status"] ?>">
                        <?= ucfirst($row["status"]) ?>
                    </span>
                </td>

                <td>
                    <a href="#" class="action-btn edit-btn">Edit</a>
                    <a href="#" class="action-btn delete-btn">Delete</a>
                </td>

            </tr>

            <?php
            }
            ?>

          </tbody>


        </table>

    </div>

</div>

</body>
</html>

