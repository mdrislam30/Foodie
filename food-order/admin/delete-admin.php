
<?php
// 1. get the id of the admin to be deleted
session_start();
echo $id = $_GET['id'];
// 2. create SQL query to delete admin
define('SITEURL', 'http://localhost/food-order/');
define('LOCALHOST', 'localhost:3307');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); // select database
$sql = "DELETE FROM tbl_admin WHERE id= $id";

// execute the query
$res = mysqli_query($conn, $sql);
if ($res == TRUE) {
    //creating session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin deleted</div>";
    //  redirect the page
    header("location:" . SITEURL . "admin/manage-admin.php");
} else {
    $_SESSION['delete'] = "<div class='error'>Admin failed to delete</div>";
    //  redirect the page
    header("location:" . SITEURL . "admin/manage-admin.php");
}

// 3. redirect to manage admin page with message
