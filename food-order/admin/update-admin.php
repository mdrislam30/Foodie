<?php include('partials/menu.php') ?>

<?php
// query to get all admin
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_admin WHERE id=$id";
define('SITEURL', 'http://localhost/food-order/');
define('LOCALHOST', 'localhost:3307');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); // select database
$res = mysqli_query($conn, $sql) or die(mysqli_error());

if ($res == TRUE) {
    // count rows to check if we have data in the database
    // function to get all the rows in database
    $rows = mysqli_fetch_assoc($res);
    $id = $rows['id'];
    $full_name = $rows['full_name'];
    $username = $rows['username'];
}

?>
<div class="main-content">
    <div class="wrapper">
        <h1> Update Admin</h1>
        <br><br>
        <!-- <?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['data'];
                    unset($_SESSION['data']);
                }
                ?> -->
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>
                        Fullname:
                    </td>

                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name" value="<?php echo $full_name ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Username:
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="Your user name" value="<?php echo $username ?>">
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
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php') ?>