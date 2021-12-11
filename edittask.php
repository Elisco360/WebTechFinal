<?php require("inc/header.php"); ?>

<body id="page-top">
    <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            $query = "SELECT * FROM tasks WHERE id = $id";
            $result = mysqli_query($conn, $query);
            $row = $result -> fetch_assoc();
            $title = $row['title'];
            $priority = $row['priority'];
            $details = $row['details'];
            $deadline = $row['deadline'];
            $status = $row['status'];
        }
        
    ?>

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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                
                    <div class="card shadow mb-4">
                    <?php
            //when submit is clicked
            if(isset($_POST["submit"]))
            {
                $title = $_POST["title"];
                $priority = $_POST["priority"];
                $details = $_POST["details"];
                $deadline = $_POST["deadline"];
                $status = $_POST["status"];

                //Insertion query
                $query = "UPDATE tasks SET title='$title', priority='$priority', details='$details', deadline='$deadline', status='$status'";
                
                $result = mysqli_query($conn, $query);

                if($result)
                {
                    ?>
                    <div role="alert" class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Task is updated successfully</strong>
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
                        <strong>Task was not updated</strong>
                    </div>
                    
                    <script>
                        $(".alert").alert();
                    </script>

                    <?php
                }
            }
            ?>
                        
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Create a Task</h6>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Task Title<span style="color: red;">*</span> </label>
                                    <input type="text"
                                    class="form-control" value="<?php echo $title; ?>" name="title" id="" aria-describedby="helpId" placeholder="Task" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Task Priority</label>
                                    <select name="priority" id="" class="form-control">
                                        <option value="High">High</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Task Details</label>
                                    <textarea name="details" id="" rows="3" class="form-control"><?php echo $details; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Deadline</label>
                                    <input type="date"
                                    class="form-control" value="<?php echo $deadline; ?>" name="deadline" id="" aria-describedby="helpId" placeholder="Task" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="New">New</option>
                                        <option value="Progress">In Progress</option>
                                        <option value="Done">Done</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                            </form>
                        </div>
                    </div>

</div>
<!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require("inc/footer.php"); ?>  

