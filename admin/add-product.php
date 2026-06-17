<?php

include "./config/db.php";

$sql = "SELECT * FROM categories";
$res = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

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

        .container{
            max-width:900px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:10px;
        }

        h1{
            margin-bottom:25px;
        }

        .form-group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:600;
        }

        input,
        textarea,
        select{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:6px;
        }

        textarea{
            resize:vertical;
            min-height:120px;
        }

        .row{
            display:flex;
            gap:20px;
        }

        .row .form-group{
            flex:1;
        }

        button{
            padding:12px 24px;
            border:none;
            border-radius:6px;
            cursor:pointer;
        }

        .message{
          margin-top: 20px;
        }
    </style>
    
</head>
<body>

<div class="container">

    <h1>Add Product</h1>

    <form id="addProductForm" enctype="multipart/form-data">

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" id="category_id">
                <option value="">Select Category</option>
                <?php
                while($row = mysqli_fetch_assoc($res)){ ?>
                  <option value="<?= $row["id"] ?>">
                    <?=  $row["name"] ?>
                  </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Short Title</label>
            <input
                type="text"
                name="short_title"
                id="short_title"
            >
        </div>

        <div class="form-group">
            <label>Title</label>
            <input
                type="text"
                name="title"
                id="title"
            >
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea
                name="description"
                id="description"
            ></textarea>
        </div>

        <div class="row">

            <div class="form-group">
                <label>Discount Price</label>
                <input
                    type="number"
                    step="0.01"
                    name="dis_price"
                    id="dis_price"
                >
            </div>

            <div class="form-group">
                <label>Original Price</label>
                <input
                    type="number"
                    step="0.01"
                    name="original_price"
                    id="original_price"
                >
            </div>

        </div>

        <div class="row">

            <div class="form-group">
                <label>Stock</label>
                <input
                    type="number"
                    name="stock"
                    id="stock"
                >
            </div>

            <div class="form-group">
                <label>Status</label>
                <select
                    name="status"
                    id="status"
                >
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

        </div>

        <div class="form-group">
            <label>Product Images</label>
            <input
                type="file"
                name="images[]"
                id="images"
                multiple
                accept="image/*"
            >
        </div>

        <button type="submit">
            Add Product
        </button>

        <div class="message" id="message"></div>

    </form>

</div>

<script src="js/add-product.js"></script>
</body>
</html>