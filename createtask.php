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

                //Insertion query
                $query = "INSERT INTO tasks (title, priority, details, deadline) VALUES ('$title', '$priority', '$details', '$deadline')";
                
                $result = mysqli_query($conn, $query);

                if($result)
                {
                    ?>
                    <div role="alert" class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Task is created successfully</strong>
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
                        <strong>Task was not created</strong>
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
                                    class="form-control" name="title" id="" aria-describedby="helpId" placeholder="Task" required>
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
                                    <textarea name="details" id="" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Deadline</label>
                                    <input type="date"
                                    class="form-control" name="deadline" id="" aria-describedby="helpId" placeholder="Task" required>
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

