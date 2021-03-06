<?php 
include './action.php';
$title = "Notification - Shopssy";
include './header.php';

?>


    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./notification_page.php">Notification</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--notification container start-->
    <center>
    <div class="notification_page_master_container">
        <?php 

        // Query For Unknown User Fun Start

        if(!isset($_SESSION['user_id'])) {
            $notification_retrieve_query = "SELECT * FROM `notification` WHERE `noti_for_who` = 0;";
        } 
            // Query For Unknown User Fun End

            // Query For Shopssy User Fun Start

        else {
            $user_id =  $_SESSION['user_id'];
            $notification_retrieve_query = "SELECT * FROM `notification` WHERE `noti_for_who` = 0 OR `noti_for_who` = $user_id;";
        }
        // Query For Shopssy User Fun End
        
        // Notification Retrieve Fun Start

        $notification_retrieve_result = mysqli_query($con, $notification_retrieve_query);
        $notification_retrieve_check_row = mysqli_num_rows($notification_retrieve_result);
        if($notification_retrieve_check_row > 0) {

            while($row = mysqli_fetch_assoc($notification_retrieve_result)) {
                $notification_link = $row['link'];
                $notification_title = $row['n_title'];
                $notification_content = $row['n_content'];
                $notification_time = $row['n_time'];
                
                if($notification_time != "") {
            ?>
        <a href="<?php echo $notification_link; ?>" class="notifi_link">
            <div class="notification_page_parent_container">
                <div class="notification_page_child_1">
                    <h1>S</h1>
                </div>
                <div class="notification_page_child_2">
                    <div class="notification_page_child_2_content_div">
                    <h2><?php echo $notification_title; ?></h2>
                    <p><?php echo $notification_content; ?></p>
                    </div>
                    <hr class="hr_line">
                    <h4><?php echo $notification_time; ?></h4>
                </div>
            </div>
        </a>
    
        <?php } } ?>
        

   <?php  }

   // Notification Retrieve Fun End
   
   else {
       echo "<h1 class='no_notification_msg'>There are no notifications to display!</h1>";
   } ?>
  
    </div>
    </center>
    <!--notification container end-->

    <?php 
    include "./footer.php";
    ?>
              
    <script src="./javascript/index.js"></script>
</body>
</html>