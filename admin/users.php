<?php
include_once('./layouts/header.php');
?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php
    include_once("./layouts/sidebar.php")
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php
            include_once("./layouts/navbar.php")
            ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Users</h1>

            </div>
            <div class="container-fluid pb-3">


            </div>
                <?php
                // if (isset($_SESSION['added-user'])) {
                //     echo $_SESSION['added-user'];
                //     unset($_SESSION['added-user']);
                // }
                ?>
            <!-- /.container-fluid -->

            <?php
                include_once('design/user/viewUser.php');
            // if (!isset($_GET['action'])) {

            // } elseif ($_GET['action'] == 'add') {
            //     # code...
            //     include_once('design/user/addUser.php');
            // }
            ?>

        </div>
        <!-- End of Main Content -->

        <?php
        include_once('./layouts/footer.php');
        
        ?>

<!-- <script src="../js/ajax.js"></script> -->
