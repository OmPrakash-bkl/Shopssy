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
<button type="button" class="admin_panel_header_icons admin_panel_header_bell_icon"><i class="fa fa-bell"></i></button>
</div>
<div class="user_db_container">
<div>
<img src="../images/myimg1.jpeg" alt="admin profile" class="admin_db_image">
</div>
<div class="user_db_container_arrow"><i class="fa fa-caret-down user_db_arrow_icon"></i></div>
</div>

<!-- Profile and Logout Container Start -->

<div class="profile_and_logout_container">
<a href="#"><button class="profile_and_logout_container_buttons"><i class="far fa-user-circle" aria-hidden="true"></i> Profile</button></a>
<hr>
<a href="#"><button class="profile_and_logout_container_buttons"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button></a>
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
  <button onclick="show_users()"><i class="fa fa-eye"></i> View Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button onclick="add_users()"><i class='fas fa-user-plus'></i> Add Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(2)">
  <h2 class="heading_text"><i class='far fa-address-book'></i> USERS</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow2"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container2">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button><i class="fa fa-eye"></i> View Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button><i class='fas fa-user-plus'></i> Add Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(3)">
  <h2 class="heading_text"><i class='far fa-address-book'></i> USERS</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow3"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container3">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button><i class="fa fa-eye"></i> View Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button><i class='fas fa-user-plus'></i> Add Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(4)">
  <h2 class="heading_text"><i class='far fa-address-book'></i> USERS</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow4"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container4">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button><i class="fa fa-eye"></i> View Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button><i class='fas fa-user-plus'></i> Add Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(5)">
  <h2 class="heading_text"><i class='far fa-address-book'></i> USERS</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow5"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container5">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button><i class="fa fa-eye"></i> View Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button><i class='fas fa-user-plus'></i> Add Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

<div class="hamburger_link_section_inner_container">
  <div class="hamburger_link_section_inner_heading_container" onclick="display_and_undisplay(6)">
  <h2 class="heading_text"><i class='far fa-address-book'></i> USERS</h2>
  <span class="heading_arrow"><i class="fa fa-chevron-down hamburger_down_arrow6"></i></span>
  </div>

  <div class="hamburger_link_section_inner_hidden_container hamburger_link_section_inner_hidden_container6">
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button><i class="fa fa-eye"></i> View Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  <div class="hamburger_link_section_inner_hidden_floating_container">
  <button><i class='fas fa-user-plus'></i> Add Users</button>
  <span><i class="fa fa-arrow-circle-right"></i></span>
  </div>
  </div>
</div>

</div>
<!-- Hamburger Link Section Container End -->

</div>
</div>

<div class="admin_panel_body_content_container">


<!-- Table Name and Other Details Display Container Start -->

<div class="table_name_and_other_details_display_container">

<div class="table_name_and_other_details_display_containers_inner_left_container">
    <h2>Order</h2>
    <p>28 Orders Found</p>
</div>

<div class="table_name_and_other_details_display_containers_inner_right_container">

<form action="">
    <input type="search" placeholder="Search Details">
    <button type="submit">Search</button>
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
<center>
    <h1>Add User</h1>
</center>

<div class="add_user_step1_container">
<form action="" class="add_user_form" method="POST">
  <label for="fir_name1">First Name <span class="add_user_required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="fir_name1" autofocus> <br>
  <p class="add_user_error_message_place add_user_fname_error_message_place"></p>
  <label for="las_name1">Last Name <span class="add_user_required_field_asterisk_symbol">*</span></label> <br>
  <input type="text" id="las_name1"> <br>
  <p class="add_user_error_message_place add_user_lname_error_message_place"></p>
  <label for="user_email1">Email <span class="add_user_required_field_asterisk_symbol">*</span></label> <br>
  <input type="email" id="user_email1"> <br>
  <p class="add_user_error_message_place add_user_email_error_message_place"></p>
  <label for="user_pass1">Password <span class="add_user_required_field_asterisk_symbol">*</span></label> <br>
  <input type="password" id="user_pass1"> <br>
  <p class="add_user_error_message_place add_user_password_error_message_place"></p>
  <label >Is Verified User? <span class="add_user_required_field_asterisk_symbol">*</span></label> <br>
  <input type="radio" name="verified_user" id="yes_verified_user" value="Yes" checked> <label for="yes_verified_user">Yes</label>
  <input type="radio" name="verified_user" id="no_not_verified_user" value="No"> <label for="no_not_verified_user">No</label>
  <p class="add_user_error_message_place add_user_radio_error_message_place"></p>
 <center>
 <button type="submit" class="add_user_next_btn">Next</button>
 </center>
</form>
</div>

<div class="add_user_step2_container">
<form action="">

</form>
</div>

</div>

<!-- Add User Form Container End -->

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