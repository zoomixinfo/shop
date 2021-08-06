<!DOCTYPE html>
<?php
include('db.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Admin Panel</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="productname" placeholder="Enter Product Name"> <br>
        <input type="text" name="productprice" placeholder="Enter Product Price"> <br>
        <input type="text" name="productid" placeholder="Enter Product Id"> <br>
        <input type="file" name="productimg">
        <input type="submit" value="Add Product" name="btn">
    </form>
    <?php
        if(isset($_POST['btn'])){
            $productname = $_POST['productname'];
            $productprice = $_POST['productprice'];
            $productid = $_POST['productid'];
            $productimg = $_FILES['productimg']['name'];


            $target_path = "product-images/";
            $target_path = $target_path . basename($productimg);
            move_uploaded_file($_FILES['productimg']['tmp_name'], $target_path);

            
            $productimg = "product-images/".$_FILES['productimg']['name'];
            $sql = "INSERT INTO products (name, price, code, image) VALUES ('$productname', '$productprice', '$productid', '$productimg')";

            if(!mysqli_query($con, $sql)){
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
            else{
                echo "Product Added Successfully";
            }
        }
    ?>
</body>
</html>