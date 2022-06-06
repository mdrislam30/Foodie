<?php include('partials/menu.php') ?>
<!-- <?php include('config/constants.php') ?> -->
<div class="main-content">
    <div class="wrapper">
        <h1> Add Admin</h1>
        <br><br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['data'];
            unset($_SESSION['data']);
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>
                        Fullname:
                    </td>

                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>
                        Username:
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="Your user name">
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter password">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

<?php

// process tyhe value from form and add it to the database
if (isset($_POST['submit'])) {

    //1. get the data from the form
    $full_name = $_POST['full_name'];
    $user_name = $_POST['username'];
    $password = md5($_POST['password']); // password encryption with MD5   

    //2. create SQL query to add the data into database
    $sql = "INSERT INTO tbl_admin SET 
    full_name = '$full_name',
    username = '$user_name',
    password = '$password'
    ";
    // 3. Execute query and save data into database
    // define the constants
    define('SITEURL', 'http://localhost/food-order/');
    define('LOCALHOST', 'localhost:3307');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');


    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); // select database

    // 3. Execute query and save data into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    if ($res == TRUE) {
        //creating session variable to display message
        $_SESSION['add'] = "<div class='success'>Admin added</div>";
        //  redirect the page
        header("location:" . SITEURL . "admin/manage-admin.php");
    } else {
        $_SESSION['add'] = "<div class='error'>Admin failed to add</div>";
        //  redirect the page
        header("location:" . SITEURL . "admin/add-admin.php");
    }
}

?>