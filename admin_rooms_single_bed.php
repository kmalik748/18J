<?php
require 'parts/app.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Single Bed";
require 'parts/head.php';
?>

<body id="page-top">

<script src="vendor/jquery/jquery.min.js"></script>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php require 'parts/side_bar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require 'parts/top_bar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?> Record</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Floor</th>
                                        <th>Room #</th>
                                        <th>Beds</th>
                                        <th>Key #</th>
                                        <th>Availability</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Floor</th>
                                        <th>Room #</th>
                                        <th>Beds</th>
                                        <th>Key #</th>
                                        <th>Bed 1</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM rooms WHERE beds=1";
                                    $res = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($res)){
                                        while($row = mysqli_fetch_array($res)){
                                            $rand = rand();


                                            $roomID = $row["id"];
                                            $s1 = "SELECT * FROM students WHERE roomID=$roomID";
                                            $r1 = mysqli_query($con, $s1);
                                            $studentName="";
                                            if(mysqli_num_rows($r1)){
                                                $ro1 = mysqli_fetch_array($r1);
                                                $studentName = $ro1["name"];
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $roomID; ?></td>
                                                <td><?php echo $row["floor"]; ?></td>
                                                <td><?php echo $row["room"]; ?></td>
                                                <td><?php echo $row["beds"]; ?></td>
                                                <td><?php echo $row["keyNumber"]; ?></td>
                                                <td>
                                                    <?php if($row["bed1"]==1 && $row["beds"]>=1){ ?>
                                                        <span  data-toggle="tooltip_booked<?php echo $rand; ?>" title="<?php echo $studentName; ?>"
                                                               class="bg-danger text-white px-2 py-1" style="border-radius: 10px;">Booked</span>
                                                    <?php }elseif($row["bed1"]==0 && $row["beds"]>=1){ ?>
                                                        <span class="bg-success text-white px-2 py-1" style="border-radius: 10px;">Available</span>
                                                    <?php }elseif($row["bed1"]==69 && $row["beds"]>=1){ ?>
                                                        <span data-toggle="tooltip<?php echo $rand; ?>" title="<?php echo $studentName; ?>"
                                                            class="bg-secondary text-white px-2 py-1" style="border-radius: 10px;">
                                                            Reserved
                                                        </span>
                                                    <?php }else{ ?>
                                                        <span class="text-center">--</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <script>
                                                $(document).ready(function(){
                                                    $('[data-toggle="tooltip<?php echo $rand; ?>"]').tooltip();
                                                    $('[data-toggle="tooltip_booked<?php echo $rand; ?>"]').tooltip();
                                                });
                                            </script>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php require 'parts/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>