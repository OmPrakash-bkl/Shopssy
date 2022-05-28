<?php
session_start();
if(isset($_GET['l9o5g0o7u5t'])) {
  unset($_SESSION['user_login_id']);
}

if(!(isset($_SESSION['user_login_id']))) {
  ?>
  <script type="text/javascript">
  window.location.href = "http://localhost/my_clg_shopssy_project/admin/admin.php";
  </script>
  <?php
}



?>
<!-- Unfulfilled Data Delection Section Start -->
<script>
  if(localStorage.getItem('U345R47IX')) {
    document.cookie = "U345R47IX="+localStorage.getItem('U345R47IX');
  }
</script>
<?php
if(isset($_COOKIE['U345R47IX'])) {
  include '../db_con.php';
$user_dump_id = $_COOKIE['U345R47IX'];
$account_data_check_query = "SELECT * FROM `account` WHERE `user_id` = '$user_dump_id';";
$account_data_check_result = mysqli_query($con, $account_data_check_query);
$account_check_rows_count = mysqli_num_rows($account_data_check_result);

if($account_check_rows_count == 0) {
$delete_unfulfill_data_query = "DELETE FROM `register` WHERE `user_id` = $user_dump_id;";
mysqli_query($con, $delete_unfulfill_data_query);
}
}
?>
<!-- Unfulfilled Data Delection Section End -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Shopssy</title>

<link rel="icon" href="../images/favicon1.png">
<script src="https://kit.fontawesome.com/628c629a17.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Josefin+Sans:wght@700&family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./css/admin_style.css">

</head>
<body onresize="func()">

<!-- Pre Loader Container Start -->

<div class="pre_loader_container">
  <center>
  <span><i class="fa fa-spinner fa-spin"></i></span>
  </center>
</div>

<!-- Pre Loader Container End -->

<!-- Admin Panel Container Start -->

<center>
<div class="admin_panel_container">

<!-- Admin Panel Main Container Start -->

<div class="admin_panel_main_container">

<!-- Admin Panel Header Container Start -->

<div class="admin_panel_header_container">

<div class="admin_panel_header_left_container">
<div>
<button type="button"  class="admin_panel_header_icons"><i class="fa fa-bars hamburger_open_icon"></i><i class="fa fa-close hamburger_close_icon"></i></button>
</div>
<div>
<h1 class="admin_panel_header_web_title">Shopssy</h1>
</div>
</div>
<div class="admin_panel_header_right_container">
<div><span class="admin_panel_header_new_notify_dot"><i class="fa fa-circle"></i></span>
<button onclick="customer_feedback('')" type="button" class="admin_panel_header_icons admin_panel_header_bell_icon"><i class="fa fa-bell"></i></button>
</div>
<div class="user_db_container">
<div>
<img src="../images/myimg1.jpeg" alt="admin profile" class="admin_db_image">
</div>
<div class="user_db_container_arrow"><i class="fa fa-caret-down user_db_arrow_icon"></i></div>
</div>

<!-- Profile and Logout Container Start -->

<div class="profile_and_logout_container">
<button  onclick="show_admin_profile()" class="profile_and_logout_container_buttons"><i class="far fa-user-circle" aria-hidden="true"></i> Profile</button>
<hr>
<a href="http://localhost/my_clg_shopssy_project/admin/index.php?l9o5g0o7u5t=1"><button class="profile_and_logout_container_buttons"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button></a>
</div>

<!-- Profile and Logout Container End -->


</div>

</div>

<!-- Admin Panel Header Container End -->


</div>

<!-- Admin Panel Main Container End -->

<!-- Admin Panel Body Container Start -->

<div class="admin_panel_body_container">
<div class="admin_panel_body_navbar_container">
<div class="hamburger_container_of_admin_panel">
    
    <!-- Industry(shopssy) name container start -->
<div class="industry_name_container">
    <h1>Shopssy</h1>
</div>
    <!-- Industry(shopssy) name container end -->

<!-- Hamburger Main Container Start -->
<div class="hamburger_main_container">
<h3>Prakashz</h3>
<p>(Admin)</p>
</div>
<!-- Hamburger Main Container End -->

<!-- Hamburger Link Section Container Start -->
<div class="hamburger_link_section_container">

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(1)">
  <h2 class="heading_text"><i class='far fa-address-book'></i> USERS</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow1"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container1">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_registered_users('')"><i class="fa fa-address-book"></i> Short Details</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_users('')"><i class="fa fa-address-card"></i> Full Details</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_users()"><i class='fas fa-user-plus'></i> Add Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="edit_and_delete_users('')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(2)">
  <h2 class="heading_text"><i class="fa fa-list-alt"></i> Category</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow2"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container2">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_cat('')"><i class="fa fa-eye"></i> View Cat</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_cat()"><i class="fa fa-plus-square"></i> Add Cat</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="edit_and_delete_category('')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(3)">
  <h2 class="heading_text"><i class="fa fa-list" aria-hidden="true"></i> Sub Cat</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow3"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container3">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="view_sub_cat('')"><i class="fa fa-eye"></i> View SubCat</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_subcat()"><i class='fas fa-plus-square'></i> Add SubCat</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="edit_and_delete_of_subcat('')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(4)">
  <h2 class="heading_text"><i class="fa fa-skype"></i> Brand&Item</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow4"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container4">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_BandI('')"><i class="fa fa-eye"></i> View B & I</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_BandI()"><i class='fas fa-plus-square'></i> Add B & I</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="edit_and_delete_of_bandi('')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(5)">
  <h2 class="heading_text"><i class='fas fa-box-open'></i> Products</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow5"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container5">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_products('')"><i class="fa fa-eye"></i> View Prods</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_product()"><i class='fas fa-plus-square'></i> Add Prods</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="edit_and_delete_of_product('')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(6)">
  <h2 class="heading_text"><i class="fa fa-television"></i> Sub Prods</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow6"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container6">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_sub_prods('')"><i class="fa fa-eye"></i> View S.Prods</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_sub_prods()"><i class='fas fa-plus-square'></i> Add S.Prods</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="edit_and_delete_of_sub_product('')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(7)">
  <h2 class="heading_text"><i class="fa fa-file-text-o"></i> Prod's Specs</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow7"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container7">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_prod_specs('')"><i class="fa fa-eye"></i> View Specs</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_prod_specs()"><i class='fas fa-plus-square'></i> Add Specs</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="edit_and_delete_of_prod_spec('')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(8)">
  <h2 class="heading_text"><i class="fa fa-question"></i> Prod's FAQ</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow8"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container8">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="view_faq('')"><i class="fa fa-eye"></i> View FAQ</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_prod_faq_ans()"><i class='fas fa-plus-square'></i> Add Answers</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="delete_prod_faq('')"><i class="fa fa-trash-o"></i> Delete FAQ</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>



<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(9)">
  <h2 class="heading_text"><i class="fa fa-star-o"></i> Reviews</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow9"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container9">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_reviews('')"><i class="fa fa-eye"></i> View Review</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="delete_prod_review('')"><i class="fa fa-trash-o"></i> Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(10)">
  <h2 class="heading_text"><i class="fa fa-filter"></i> Filter</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow10"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container10">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="view_filter_data('')"><i class="fa fa-eye"></i> View F.Data</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_filter_data()"><i class='fas fa-plus-square'></i> Add F.Data</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="edit_and_delete_of_filter_data('')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(11)">
  <h2 class="heading_text"><i class="fa fa-sliders"></i> Sub Filter</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow11"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container11">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="view_sub_filter_data('')"><i class="fa fa-eye"></i> View S.F.Data</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_sub_filter_data()"><i class='fas fa-plus-square'></i> Add S.F.Data</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="edit_sub_filter_data('')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(12)">
  <h2 class="heading_text"><i class="fa fa-folder-open"></i> Prod's Datas</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow12"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container12">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_prods_data_tables('insert', '', '')"><i class="fa fa-eye"></i> View P.Data</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_prods_data_tables()"><i class='fas fa-plus-square'></i> Add P.Data</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_prods_data_tables('update', '', '')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(13)">
  <h2 class="heading_text"><i class="fa fa-bell"></i> Notifications</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow13"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container13">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_notifications('')"><i class="fa fa-eye"></i> View Notify</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_notification()"><i class='fas fa-plus-square'></i> Add Notify</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="edit_and_delete_of_notify('')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(14)">
  <h2 class="heading_text"><i class="fa fa-newspaper-o"></i> Newsletters</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow14"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container14">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="show_newsletters('')"><i class="fa fa-eye"></i> View N.Letter</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_newsletters()"><i class='fas fa-plus-square'></i> Add N.Letter</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="edit_and_delete_of_newsletters('')"><i class="fa fa-edit"></i> Edit & Delete</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<?php

if(isset($_SESSION['db_u_user_type'])) {
  if($_SESSION['db_u_user_type'] == "master") {
    echo '<div class="hamburger_link_section_inner_container">
    <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(15)">
    <h2 class="heading_text"><i class="fas fa-user-cog"></i> Admins</h2>
    <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow15"></i></span>
    </div>
  
    <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container15">
    <div class="hamburger_link_section_inner_hidden_floating_container">
    <button onclick="show_admins(0)"><i class="fa fa-eye"></i> View Admins</button>
    <span><i class="fa fa-arrow-circle-right"></i></span>
    </div>
    <div class="hamburger_link_section_inner_hidden_floating_container">
    <button onclick="add_admins()"><i class="fas fa-plus-square"></i> Add Admins</button>
    <span><i class="fa fa-arrow-circle-right"></i></span>
    </div>
    <div class="hamburger_link_section_inner_hidden_floating_container">
    <button onclick="edit_and_delete_of_admins(0)"><i class="fa fa-edit"></i> Edit & Delete</button>
    <span><i class="fa fa-arrow-circle-right"></i></span>
    </div>
    </div>
  </div>';
  }
}

?>



</div>
<!-- Hamburger Link Section Container End -->

</div>
</div>

<div class="admin_panel_body_content_container">


<!-- Table Name and Other Details Display Container Start -->

<div class="table_name_and_other_details_display_container">

<div class="table_name_and_other_details_display_containers_inner_left_container">
    <h2 class="table_name_and_other_details_display_containers_inner_left_containers_table_name">Order</h2>
    <p class="table_name_and_other_details_display_containers_inner_left_containers_count">28 Orders Found</p>
</div>

<div class="table_name_and_other_details_display_containers_inner_right_container">

<form action="">
    <input type="search" placeholder="Search Details" id="search_bar" required>
    <button type="button" onclick="search_the_details()">Search</button>
</form>

</div>

</div>

<!-- Table Name and Other Details Display Container End -->

<div class="admin_panel_details_table_container">
<table class="admin_panel_details_table">
   
</table>
</div>

<!-- Add User Form Container Start -->

<div class="add_user_form_container">

<div class="add_user_step1_container">
<center>
    <h1 class="form_title">User Form</h1>
</center>
<form action="" class="add_user_form" method="POST">
<input type="hidden" id="user_id">
  <label for="fir_name1">First Name <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="fir_name1" autofocus> <br>
  <p class="error_message_place add_user_fname_error_message_place"></p>
  <label for="las_name1">Last Name <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="las_name1"> <br>
  <p class="error_message_place add_user_lname_error_message_place"></p>
  <label for="user_email1">Email <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="email" id="user_email1"> <br>
  <p class="error_message_place add_user_email_error_message_place"></p>
  <label for="user_pass1">Password <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="password" id="user_pass1"> <br>
  <p class="error_message_place add_user_password_error_message_place"></p>
  <label >Is Verified User? <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="radio" name="verified_user" id="yes_verified_user" value="Yes" checked> <label for="yes_verified_user">Yes</label>
  <input type="radio" name="verified_user" id="no_not_verified_user" value="No"> <label for="no_not_verified_user">No</label>
  <p class="error_message_place add_user_radio_error_message_place"></p>
 <center>
 <button type="submit" class="add_user_next_btn">Next</button>
 <button type="submit" class="add_user_next_btn2">Next</button>
 <button type="button" class="add_user_submition_btn">Submit</button>
 </center>
</form>
</div>

<div class="add_user_step2_container">
<center>
    <h1 class="form_title">User Form</h1>
</center>
<form action="" class="add_user_form" method="POST">
  <input type="hidden" id="account_id">
<label for="addresses_tag" class="addresses_sections">No of Address <span class="required_field_asterisk_symbol">*</span></label> <br>
  <select id="addresses_tag" class="addresses_sections">
    
  </select> <br>
<label for="street">Street <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="street" autofocus> <br>
  <p class="error_message_place add_street_error_message_place"></p>
  <label for="city">City <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="city"> <br>
  <p class="error_message_place add_city_error_message_place"></p>
  <label for="state">State <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="state"> <br>
  <p class="error_message_place add_state_error_message_place"></p>
  <label for="country">Country <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="country"> <br>
  <p class="error_message_place add_country_error_message_place"></p>
  <label for="zip">Postal/Zip <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="zip"> <br>
  <p class="error_message_place add_zip_error_message_place"></p>
  <label for="phone">Phone <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="phone"> <br>
  <p class="error_message_place add_phone_error_message_place"></p>
  <label>Address Type <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="radio" name="add_type" id="default_add" value="default" checked> <label for="default_add">Default</label>
  <input type="radio" name="add_type" id="secondary_add" value="secondary"> <label for="secondary_add">Secondary</label>
  <p class="error_message_place add_user_add_radio_error_message_place"></p>
<center>
  <button type="button" class="add_user_back_btn" onclick="showStep1Form('insert')">Back</button>
  <button type="button" class="add_user_back_btn2" onclick="showStep1Form('update')">Back</button>
  <button type="button" class="add_user_submit_btn" onclick="insertAccountOfForm('insert')">Submit</button>
  <button type="button" class="add_user_submit_btn2" onclick="insertAccountOfForm('update')">Submit</button>
  <button type="button" class="add_user_cancel_btn" onclick="deleteDetailOfForm()">Cancel</button>
</center>
</form>
</div>

</div>

<!-- Add User Form Container End -->

<!-- Add Category Form Container Start -->

<div class="add_category_form_container">

<div class="add_category_step1_container">
<center>
    <h1 class="form_title1">Category Form</h1>
</center>
<form action="" class="add_category_form" method="POST">
<input type="hidden" id="cat_id">
  <label for="cat_title">Category Title <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="cat_title" autofocus> <br>
  <p class="error_message_place cat_name_error_message_place"></p>
  <label for="cat_image_name">Category Image Name <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="cat_image_name"> <br>
  <p class="error_message_place category_image_name_error_message_place"></p>
  <label for="cat_icon_name">Category Icon Name <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="cat_icon_name"> <br>
  <p class="error_message_place cat_icon_name_error_message_place"></p>
  <label for="cat_name_desc">Category Description <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="cat_name_desc"> <br>
  <p class="error_message_place cat_name_desc_error_message_place"></p>
  
 <center>
 <button type="button" class="add_category_submition_btn">Submit</button>
 <button type="button" class="add_category_submition_btn2">Submit</button>
 </center>
</form>
</div>

</div>

<!-- Add Category Form Container End -->

<!-- Add Sub Category Form Container Start -->

<div class="add_sub_category_form_container">

<div class="add_sub_category_step1_container">
<center>
    <h1 class="form_title2">Sub Category Form</h1>
</center>
<form action="" class="add_sub_category_form" method="POST">
  <select id="cats_id">

  </select> <br>
  <p class="error_message_place sub_cat_id_error_message_place"></p> <br>
<input type="hidden" id="sub_cat_identification_id">
<input type="hidden" id="sub_cat_identification_id_two">
  <label for="sub_cat_title">Sub Category Title <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="sub_cat_title" autofocus> <br>
  <p class="error_message_place sub_cat_name_error_message_place"></p>
  <label for="sub_cat_image_name">Sub Category Image Name <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="sub_cat_image_name"> <br>
  <p class="error_message_place sub_category_image_name_error_message_place"></p>
  
 <center>
 <button type="button" class="add_sub_category_submition_btn">Submit</button>
 <button type="button" class="add_sub_category_submition_btn2">Submit</button>
 
 </center>
</form>
</div>

</div>

<!-- Add Sub Category Form Container End -->

<!-- Add B and I Form Container Start -->

<div class="add_bandi_form_container">

<div class="add_bandi_step1_container">
<center>
    <h1 class="form_title3">Brand And Items Add Form</h1>
</center>
<form action="" class="add_bandi_form" method="POST">

<select id="brands_id">

  </select>
  <select id="category_id">

  </select> 
  <p class="error_message_place category_id_error_message_place"></p> 
  <select id="sub_category_id">

  </select> 
  <p class="error_message_place sub_category_id_error_message_place"></p> <br>
<input type="hidden" id="sub_cat_identification_id_2">
<input type="hidden" id="sub_cat_identification_id_two_2">
<input type="hidden" id="b_and_i_identification_id">
  <label for="brand_name">Brand Name <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="brand_name" autofocus> <br>
  <p class="error_message_place brand_name_error_message_place"></p>
  <label for="brand_sub_name1">Brand Sub Name 1 <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="brand_sub_name1"> <br>
  <p class="error_message_place brand_sub_name1_error_message_place"></p>
  <label for="brand_sub_name2">Brand Sub Name 2 <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="brand_sub_name2"> <br>
  <p class="error_message_place brand_sub_name2_error_message_place"></p>

 <center>
 <button type="button" class="brand_and_item_submition_btn">Submit</button>
 <button type="button" class="brand_and_item_submition_btn2">Submit</button>
 
 </center>
</form>
</div>

</div>

<!-- Add B and I Form Container End -->

<!-- Add Product Form Container Start -->

<div class="add_product_form_container">

<div class="add_product_step1_container">
<center>
    <h1 class="form_title4">Product Add Form</h1>
</center>
<form action="" class="add_product_form" method="POST">

<select id="prod_id">

  </select>
  <select id="categories_id">

  </select> 
  <p class="error_message_place categories_id_error_message_place"></p> 
  <select id="sub_categories_id">

  </select> 
  <p class="error_message_place sub_categories_id_error_message_place"></p>
  <select id="bandi_id">

  </select> 
  <p class="error_message_place bandi_id_error_message_place"></p> <br>
<input type="hidden" id="sub_cat_identification_id_3">
<input type="hidden" id="b_and_i_identification_id_3">
<input type="hidden" id="item_id">
<label for="prod_title">Product Title <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="prod_title" autofocus> <br>
  <p class="error_message_place prod_title_error_message_place"></p>
  <label for="prod_imagename">Product Image Name <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="prod_imagename"> <br>
  <p class="error_message_place prod_imagename_error_message_place"></p>
  <label for="rate_of_prod">Rating Of Product <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="rate_of_prod"> <br>
  <p class="error_message_place rate_of_prod_error_message_place"></p>
  <label for="original_price">Original Price <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="original_price"> <br>
  <p class="error_message_place original_price_error_message_place"></p>
  <label for="offer_price">Offer Price <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="offer_price"> <br>
  <p class="error_message_place offer_price_error_message_place"></p>
  <label for="hot_deal_prod">Is Hot Deal Product? <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="radio" name="hot_deal_pro" id="hot_deal_prod_yes" value="yes" checked>
  <label for="hot_deal_prod_yes">Yes</label>
  <input type="radio" name="hot_deal_pro" id="hot_deal_prod_no" value="no">
  <label for="hot_deal_prod_no">No</label>
 <br>
  <p class="error_message_place hot_deal_prod_error_message_place"></p>

 <center>
 <button type="button" class="product_submition_btn">Submit</button>
 <button type="button" class="product_submition_btn2">Submit</button>
 
 </center>
</form>
</div>

</div>

<!-- Add Product Form Container End -->

<!-- Add Sub Product Form Container Start -->

<div class="add_sub_prod_form_container">

<div class="add_sub_prod_step1_container">
<center>
    <h1 class="form_title5">Sub Product Form</h1>
</center>
<form action="" class="add_sub_prod_form" method="POST">
<select id="sub_pro_id">

</select>
  <select id="pro_id">

  </select> <br>
  <p class="error_message_place pro_id_error_message_place"></p> <br>

  <label for="main_image_name">Main Image Name <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="main_image_name" autofocus> <br>
  <p class="error_message_place main_image_name_error_message_place"></p>
  <label for="sub_image_name1">Sub Image Name 1 <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="sub_image_name1"> <br>
  <p class="error_message_place sub_image_name1_error_message_place"></p>
  <label for="sub_image_name2">Sub Image Name 2 <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="sub_image_name2"> <br>
  <p class="error_message_place sub_image_name2_error_message_place"></p>
  <label for="sub_image_name3">Sub Image Name 3 <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="sub_image_name3"> <br>
  <p class="error_message_place sub_image_name3_error_message_place"></p>
  <label for="availability">Availability <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="availability"> <br>
  <p class="error_message_place availability_error_message_place"></p>
  <label for="prod_tag1">Product Tag 1 <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="prod_tag1"> <br>
  <p class="error_message_place prod_tag1_error_message_place"></p>
  <label for="prod_tag2">Product Tag 2 <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="prod_tag2"> <br>
  <p class="error_message_place prod_tag2_error_message_place"></p>
  <label for="prod_tag3">Product Tag 3 <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="prod_tag3"> <br>
  <p class="error_message_place prod_tag3_error_message_place"></p>
  <label for="prod_desc">Product Description <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="prod_desc"> <br>
  <p class="error_message_place prod_desc_error_message_place"></p>

 <center>
 <button type="button" class="add_sub_prod_submition_btn">Submit</button>
 <button type="button" class="add_sub_prod_submition_btn2">Submit</button>
 
 </center>
</form>
</div>

</div>

<!-- Add Sub Product Form Container End -->

<!-- Add Product Specification Form Container Start -->

<div class="add_prod_spec_form_container">

<div class="add_prod_spec_step1_container">
<center>
    <h1 class="form_title6">Product Specification Form</h1>
</center>
<form action="" class="add_prod_spec_form" method="POST">
<select id="p_spec_id">

</select>
  <select id="produc_id">

  </select> 
  <p class="error_message_place produc_id_error_message_place"></p> <br>

  <label for="spec_name">Specification Name <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="spec_name" autofocus> <br>
  <p class="error_message_place spec_name_error_message_place"></p>
  <label for="spec_value">Specification Value <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="spec_value"> <br>
  <p class="error_message_place spec_value_error_message_place"></p>
 
 <center>
 <button type="button" class="prod_spec_submition_btn">Submit</button>
 <button type="button" class="prod_spec_submition_btn2">Submit</button>
 
 </center>
</form>
</div>

</div>

<!-- Add Product Specification Form Container End -->

<!-- Product FAQ Form Container Start -->

<div class="add_prod_faq_ans_form_container">

<div class="add_prod_faq_ans_step1_container">
<center>
    <h1 class="form_title7">Product FAQ Answering Form</h1>
</center>
<form action="" class="add_prod_faq_ans_form" method="POST">
<select id="p_and_q_id">

</select> 
<p class="error_message_place p_and_q_id_error_message_place"></p> 

  <label for="prod_faq_ques">Question <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="prod_faq_ques" autofocus> <br>
  <p class="error_message_place prod_faq_ques_error_message_place"></p>
  <label for="prod_faq_ans">Answer <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="prod_faq_ans"> <br>
  <p class="error_message_place prod_faq_ans_error_message_place"></p> <br>
<select id="prod_faq_ques_status">
<option value="0">Select Status</option>
  <option value="waiting">Un Approve</option>
  <option value="approved">Approve</option>
</select> <br>
<p class="error_message_place prod_faq_ques_status_error_message_place"></p>

 <center>

 <button type="button" class="p_q_and_a_submition_btn2">Submit</button>
 
 </center>
</form>
</div>

</div>

<!-- Product FAQ Form Container End -->

<!-- Filter Form Container Start -->

<div class="add_filter_form_container">

<div class="add_filter_step1_container">
<center>
    <h1 class="form_title8">Filter Form</h1>
</center>
<form action="" class="add_filter_form" method="POST">
<select id="filter_id">

</select>
<select id="subes_cats_id">

</select> 
<p class="error_message_place sub_cats_id_error_message_place"></p> 

  <label for="filter_title">Filter Title <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="filter_title" autofocus> <br>
  <p class="error_message_place filter_title_error_message_place"></p>
  <input type="hidden" id="filter_sub_title">
  
<select id="details_for_which_prod">

</select> <br>
<p class="error_message_place details_for_which_prod_status_error_message_place"></p>

 <center>

 <button type="button" class="filter_data_submition_btn">Submit</button>
 <button type="button" class="filter_data_submition_btn2">Submit</button>
 
 </center>
</form>
</div>

</div>

<!-- Filter Form Container End -->

<!-- Sub Filter Form Container Start -->

<div class="add_sub_filter_form_container">

<div class="add_sub_filter_step1_container">
<center>
    <h1 class="form_title9">Sub Filter Form</h1>
</center>
<form action="" class="add_sub_filter_form" method="POST">
<select id="sub_filter_id">

</select>
<select id="sub_catego_id">

</select>
<p class="error_message_place sub_catego_id_error_message_place"></p> 
<select id="filters_id">

</select> 
<p class="error_message_place filters_id_error_message_place"></p> 

  <label for="sub_filter_data">Filter Data <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="sub_filter_data" autofocus> <br>
  <p class="error_message_place sub_filter_data_error_message_place"></p>
  
 <center>

 <button type="button" class="sub_filter_data_submition_btn">Submit</button>
 <button type="button" class="sub_filter_data_submition_btn2">Submit</button>
 
 </center>
</form>
</div>

</div>

<!-- Sub Filter Form Container End -->

<!-- Prods Data Form Container Start -->

<div class="add_prods_data_form_container">

<div class="add_prods_data_step1_container">
<center>
    <h1 class="form_title10">Prods Details Form</h1> <br>
</center>
<form action="" class="add_prods_data_form" method="POST">


</form>
</div>

</div>

<!-- Prods Data Form Container End -->

<!-- New Filter Table Creation Form Start -->

<div class="new_filter_table_data_form_container">

<div class="new_filter_table_data_step1_container">
<center>
    <h1 class="form_title11">New Filter Table Creation Form</h1> <br>
</center>
<form action="" class="new_filter_table_data_form" method="POST">

<label for="new_filter_table_data">New filter table field details <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="new_filter_table_data" placeholder="End all field names with semicolon. (ex: tableName;subCategory;fieldNames;...)" autofocus> <br>
  <p class="error_message_place new_filter_table_data_error_message_place"></p>

<center>
 <button type="button" class="new_filter_table_data_submition_btn">Submit</button>
 </center>
</form>
</div>

</div>

<!-- New Filter Table Creation Form End -->

<!-- Notification Data Creation Form Start -->

<div class="add_notification_form_container">

<div class="add_notification_step1_container">
<center>
    <h1 class="form_title12">Notification Form</h1>
</center>
<form action="" class="add_notification_form" method="POST">
<input type="hidden" id="notify_id">
  <label for="notification_title">Notification title <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="notification_title" autofocus> <br>
  <p class="error_message_place notification_title_error_message_place"></p>
  <label for="notification_content">Notification content <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="notification_content"> <br>
  <p class="error_message_place notification_content_error_message_place"></p>
  <label for="notify_for_who">Notification for who?  <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="notify_for_who"> <br>
  <p class="error_message_place notify_for_who_error_message_place"></p>
  <label for="notify_link">Link <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="notify_link"> <br>
  <p class="error_message_place notify_link_desc_error_message_place"></p>
  
 <center>
 <button type="button" class="notification_submition_btn">Submit</button>
 <button type="button" class="notification_submition_btn2">Submit</button>
 </center>
</form>
</div>

</div>

<!-- Notification Data Creation Form End -->

<!-- Customer Feedback Form Start -->

<div class="add_cus_feedback_form_container">

<div class="add_cus_feedback_step1_container">
<center>
    <h1 class="form_title13">Customer Feedback Form</h1>
</center>
<form action="" class="add_cus_feedback_form" method="POST">
<input type="hidden" id="feedback_id">
  <label for="feedbacker_name">Name <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="feedbacker_name" autofocus disabled> <br>
  <p class="error_message_place feedbacker_name_error_message_place"></p>
  <label for="feedbacker_email">Email <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="feedbacker_email" disabled> <br>
  <p class="error_message_place feedbacker_email_error_message_place"></p>
  <label for="feedbacker_phonenumber">Phone number <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="feedbacker_phonenumber" disabled> <br>
  <p class="error_message_place feedbacker_phonenumber_error_message_place"></p>
  <label for="feedbacker_feedback">Message <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="feedbacker_feedback" disabled> <br>
  <p class="error_message_place feedbacker_feedback_desc_error_message_place"></p>
  <label for="admin_reply">Reply <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="admin_reply"> <br>
  <p class="error_message_place admin_reply_desc_error_message_place"></p>
  
 <center>
 <button type="button" class="feedback_submition_btn">Submit</button>
 </center>
</form>
</div>

</div>

<!-- Customer Feedback Form End -->

<!-- News Letter Section Start -->

<div class="add_newsletter_form_container">

<div class="add_newsletter_step1_container">
<center>
    <h1 class="form_title14">Newsletter Form</h1>
</center>
<form action="" class="add_newsletter_form" method="POST">
<input type="hidden" id="newsletter_id">
  <label for="html_data">Coding of content <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="html_data" autofocus> <br>
  <p class="error_message_place html_data_error_message_place"></p>
  <label for="newsletter_title">Title <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="newsletter_title"> <br>
  <p class="error_message_place newsletter_title_error_message_place"></p>
  <label for="newsletter_subject">Subject <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="newsletter_subject"> <br>
  <p class="error_message_place newsletter_subject_error_message_place"></p>
 <center>
 <button type="button" class="newsletter_submition_btn">Submit</button>
 <button type="button" class="newsletter_submition_btn2">Submit</button>
 </center>
</form>
</div>

</div>

<!-- News Letter Section End -->

<!-- Admin Management Section Start -->

<div class="add_admin_management_form_container">

<div class="add_admin_management_step1_container">
<center>
    <h1 class="form_title15">Newsletter Form</h1>
</center>
<form action="" class="add_admin_management_form" method="POST" enctype="multipart/form-data">
<input type="hidden" id="admin_management_id">
  <label for="admin_email_id">Email <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="email" id="admin_email_id" autofocus> <br>
  <p class="error_message_place admin_email_id_error_message_place"></p>
  <label for="admin_password">Password <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="password" id="admin_password"> <br>
  <p class="error_message_place admin_password_error_message_place"></p>
  <label for="admin_name">Name <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="admin_name"> <br>
  <p class="error_message_place admin_name_error_message_place"></p>
  <label for="admin_photo">Upload Image <span class="required_field_asterisk_symbol">*</span></label>  <br>
  <input type="file" id="admin_photo">
  <p class="error_message_place admin_photo_error_message_place"></p>
  <label for="admin_phone_number">Phone number <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="admin_phone_number"> <br>
  <p class="error_message_place admin_phone_number_error_message_place"></p>
  <label for="admin_address">Address <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="admin_address"> <br>
  <p class="error_message_place admin_address_error_message_place"></p>
  <label for="admin_type">Admin Type <span class="required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="admin_type"> <br>
  <p class="error_message_place admin_type_error_message_place"></p>
 <center>
 <button type="button" class="admin_submition_btn">Submit</button>
 <button type="button" class="admin_submition_btn2">Submit</button>
 </center>
</form>
</div>

</div>

<!-- Admin Management Section End -->

<!-- Admin Setting Section Start -->

<div class="admin_profile_container">
  <button class="admin_profile_close_button" onclick="unshow_admin_profile()"><i class="fa fa-close"></i></button>
<h1 class="admin_page_name"><u>Admin Profile</u></h1>
<img src="./images/prakash.jpeg" class="admin_profile_picture" alt="admin profile picture">
<h2 class="admin_details">Om Prakash</h2>
<h4>(Admin)</h4> <br>
<h2 class="admin_page_adminAccess_title"><u>Account Details</u></h2>
<div class="account_details_of_admin">
<label><b>Email</b></label>
<h3 class="admin_details">omprakash2001bkl@gmail.com</h3> <br>
<label><b>Password</b></label>
<h3 class="admin_details">Ompra@123</h3> <br>
<label><b>Phone Number</b></label>
<h3 class="admin_details">8838067309</h3> <br>
<label><b>Address</b></label>
<h3 class="admin_details">13A, Prasanna colony, 3rd Street, Avaniyapuram, Madurai - 625012.</h3> <br>
<label><b>Admin Type</b></label>
<h3 class="admin_details">Slaves</h3> <br>
</div>
<button class="admin_profile_buttons admin_profile_buttons_edit">Edit</button> <button  class="admin_profile_buttons admin_profile_buttons_logout">Logout</button>
</div>

<!-- Admin Setting Section End -->

</div>

</div>

<!-- Admin Panel Body Container End -->

</div>
</center>

<!-- Admin Panel Container End -->

<script src="./js/user_icon.js"></script>
<script src="./js/hamburger_funcs.js"></script>
<script src="./js/hide_and_display_div_func.js"></script>
</body>
</html>