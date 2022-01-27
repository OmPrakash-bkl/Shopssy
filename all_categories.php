<?php 
include './db_con.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopssy - All Categories</title>
    <link rel="icon" href="./images/favicon1.png">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!--all categories container start-->
    <div class="all_categories_container">
        <center>
            <h2><u>CATEGORIES</u></h2>
        </center>
        <center>

        <?php

        $all_categories_query = "SELECT * FROM `sub_category`;";
        $all_categories_result = mysqli_query($con, $all_categories_query);
        while($row = mysqli_fetch_assoc($all_categories_result)) {
            $all_categories_sub_cat_image_name = $row['sub_cat_image_name'];
            $all_categories_cat_title = $row['subs_cat_title'];
        ?>

            <div class="all_categories_sub_container">
                <center>
                 <a href="./product.php">
                     <img src="./images/<?php echo $all_categories_sub_cat_image_name; ?>" alt="<?php echo $all_categories_cat_title; ?>">
                </a>
                <a href="./product.php" class="product_link"><?php echo $all_categories_cat_title; ?></a>
                </center>
             </div>

             <?php } ?>
            
        </center>
    </div>
    <!--all categories container end-->
</body>
</html>