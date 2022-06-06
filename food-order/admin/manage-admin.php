<?php include('partials/menu.php') ?>

<!-- Main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">Manage Admin</h1>
        <br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; // show the message
            unset($_SESSION['add']); // make the message dissapear on refresh
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete']; // show the message
            unset($_SESSION['delete']); // make the message dissapear on refresh
        }
        ?>
        <br><br>
        <!-- button to add admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br /><br /><br /><br />
        <table class="tbl">
            <tr>
                <th>S.N </th>
                <th>Full name </th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
            // query to get all admin
            $sql = "SELECT * FROM tbl_admin";
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
                $count = mysqli_num_rows($res); // function to get all the rows in database

                // check the num of rows
                if ($count > 0) {
                    $sn = 1;
                    while ($rows = mysqli_fetch_assoc($res)) {
                        // while we have rows
                        // will run as we have as long we have rows in database

                        // get individual data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        // now we have all the values, NEED to DISPLAY it
            ?>
                        <tr>
                            <td><?php echo $sn++ ?>.</td>
                            <td><?php echo $full_name ?></td>
                            <td><?php echo $username ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id ?>" class="btn-secondary">Update admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete admin</a>

                            </td>
                        </tr>

            <?php

                    }
                } else {
                }
            } else {
                $_SESSION['add'] = "Admin failed to add";
                //  redirect the page
                header("location:" . SITEURL . "admin/add-admin.php");
            }
            ?>
        </table>
    </div>

</div>
<!-- Main content section ends -->
<?php include('partials/footer.php') ?>