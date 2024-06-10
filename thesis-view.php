<?php
require 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="newstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>View Thesis Details</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Thesis Details
                            <a href="browseadmin.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $theses_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM theses WHERE id='$theses_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $theses = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Title</label>
                                        <p class="form-control">
                                            <?=$theses['title'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Researcher/s</label>
                                        <p class="form-control">
                                            <?=$theses['author'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>College</label>
                                        <p class="form-control">
                                            <?=$theses['college'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Course</label>
                                        <p class="form-control">
                                            <?=$theses['course'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Abstract</label>
                                        <p class="form-control">
                                            <?=$theses['abstract'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Date</label>
                                        <p class="form-control">
                                            <?=$theses['date'];?>
                                        </p>
                                    </div>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>