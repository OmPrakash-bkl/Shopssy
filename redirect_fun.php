<?php
function redirect() {
    if(isset($_GET['b_title'])) {
        $b_title = $_GET['b_title'];
        ?>
        <input type="hidden" name="b_title" value="<?php echo $b_title; ?>">
        <?php
    }
    if(isset($_GET['b_and_i_identification_id'])) {
        $b_and_i_identification_id = $_GET['b_and_i_identification_id'];
        ?>
        <input type="hidden" name="b_and_i_identification_id" value="<?php echo $b_and_i_identification_id; ?>">
        <?php
    }
    if(isset($_GET['sub_cat_identification_id'])) {
        $sub_cat_identification_id = $_GET['sub_cat_identification_id'];
        ?>
        <input type="hidden" name="sub_cat_identification_id" value="<?php echo $sub_cat_identification_id; ?>">
        <?php
    }
    if(isset($_GET['sub_cat_identification_id_two'])) {
        $sub_cat_identification_id_two = $_GET['sub_cat_identification_id_two'];
        ?>
        <input type="hidden" name="sub_cat_identification_id_two" value="<?php echo $sub_cat_identification_id_two; ?>">
        <?php
    }
   
    if(isset($_GET['sub_cat_title'])) {
        $sub_cat_title = $_GET['sub_cat_title'];
        ?>
        <input type="hidden" name="sub_cat_title" value="<?php echo $sub_cat_title; ?>">
        <?php
    }
    if(isset($_GET['s'])) {
        $s = $_GET['s'];
        ?>
        <input type="hidden" name="s" value="<?php echo $s; ?>">
        <?php
    }
    if(isset($_GET['t'])) {
        $t = $_GET['t'];
        ?>
        <input type="hidden" name="t" value="<?php echo $t; ?>">
        <?php
    }
    if(isset($_GET['sort'])) {
        $sort = $_GET['sort'];
        ?>
        <input type="hidden" name="sort" value="<?php echo $sort; ?>">
        <?php
    }
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        ?>
        <input type="hidden" name="page" value="<?php echo $page; ?>">
        <?php
    }
    if(isset($_GET['inc'])) {
        $inc = $_GET['inc'];
        ?>
        <input type="hidden" name="inc" value="<?php echo $inc; ?>">
        <?php
    }
    if(isset($_GET['dec'])) {
        $dec = $_GET['dec'];
        ?>
        <input type="hidden" name="dec" value="<?php echo $dec; ?>">
        <?php
    }
   
}
?>