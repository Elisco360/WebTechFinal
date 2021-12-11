<?php require("inc/header.php"); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require("inc/sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require("inc/navbar.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <?php
                        if(isset($_GET['msg']))
                        {
                            $msg = $_GET['msg'];

                            if($msg = 'dsuccess')
                            {
                                ?>
                                    <div role="alert" class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Task is deleted successfully</strong>
                                    </div>
                                    
                                    <script>
                                        $(".alert").alert();
                                    </script>

                                <?php
                            }
                            else 
                            {
                                ?>
                                <div role="alert" class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Task not deleted</strong>
                                </div>
                                
                                <script>
                                    $(".alert").alert();
                                </script>

                            <?php   
                            }
                        }
                        ?>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manage Tasks</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Task Title</th>
                                            <th>Priority level</th>
                                            <th>Description</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tfoot>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Task Title</th>
                                            <th>Priority level</th>
                                            <th>Description</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $query = "SELECT * FROM tasks ORDER BY created_at DESC";
                                        $result = mysqli_query($conn, $query);

                                        $count = 0;
                                        while($data = mysqli_fetch_array($result))
                                        { 

                                            $count += 1;
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $data['title']; ?>k</td>
                                            <td><?php echo $data['priority']; ?></td>
                                            <td><?php echo $data['details']; ?>y</td>
                                            <td><?php echo $data['deadline']; ?></td>
                                            <td><?php echo $data['status']; ?></td>
                                            <td>
                                                <a href="edittask.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm" name="" id="" role="button">Edit</a>
                                                <a href="deletetask.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" name="" id="" role="button">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
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

<?php require("inc/footer.php"); ?>  