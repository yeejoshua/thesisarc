<?php
	session_start();
	if(!isset($_SESSION['id']) || (isset($_SESSION['id']) && $_SESSION['id'] <= 0)){
	    header("Location:./login.php");
	    exit;
	}
	require_once('./config.php');
	$page = isset($_GET['page']) ? $_GET['page'] : 'home';
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Audit Trailing</title>
	    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
	    <link rel="stylesheet" href="./css/bootstrap.min.css">
	    <script src="./js/jquery-3.6.0.min.js"></script>
	    <script src="./js/popper.min.js"></script>
	    <script src="./js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="./DataTables/datatables.min.css">
	    <script src="./DataTables/datatables.min.js"></script>
	    <script src="./fontawesome/js/all.min.js"></script>
	    <script src="./js/script.js"></script>
	    <style>
	    </style>
	</head>
	<body class="bg-light">
	    <main>
	    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient" id="topNavBar">
	        <div class="container">
	            <a class="navbar-brand" href="./">
	                Audit Trailing
	            </a>
	            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
	            </button>
	            <div class="collapse navbar-collapse" id="navbarNav">
	                <ul class="navbar-nav">
	                    <li class="nav-item">
	                        <a class="nav-link <?php echo ($page == 'home')? 'active' : '' ?>" aria-current="page" href="./"><i class="fa fa-home"></i> Home</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link <?php echo ($page == 'logs')? 'active' : '' ?>" aria-current="page" href="./?page=logs"><i class="fa fa-th-list"></i> Audit Logs</a>
	                    </li>
	                </ul>
	            </div>
	            <div>
	            <?php if(isset($_SESSION['id'])): ?>
	                <div class="dropdown">
	                    <button class="btn btn-secondary dropdown-toggle bg-transparent  text-light border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
	                        Hello <?php echo $_SESSION['name'] ?>
	                    </button>
	                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	                        <li><a class="dropdown-item" href="././Actions.php?a=logout">Logout</a></li>
	                    </ul>
	                </div>
	            <?php endif; ?>
	            </div>
	        </div>
	    </nav>
	    <div class="container py-3" id="page-container">
	        <?php 
	            if(isset($_SESSION['flashdata'])):
	        ?>
	        <div class="dynamic_alert alert alert-<?php echo $_SESSION['flashdata']['type'] ?>">
	        <div class="float-end"><a href="javascript:void(0)" class="text-dark text-decoration-none" onclick="$(this).closest('.dynamic_alert').hide('slow').remove()">x</a></div>
	            <?php echo $_SESSION['flashdata']['msg'] ?>
	        </div>
	        <?php unset($_SESSION['flashdata']) ?>
	        <?php endif; ?>
	        <?php
	            include $page.'.php';
	        ?>
	    </div>
	    </main>
	    <div class="modal fade" id="uni_modal" role='dialog' data-bs-backdrop="static" data-bs-keyboard="true">
	        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
	        <div class="modal-content">
	            <div class="modal-header py-2">
	            <h5 class="modal-title"></h5>
	        </div>
	        <div class="modal-body">
	        </div>
	        <div class="modal-footer py-1">
	            <button type="button" class="btn btn-sm rounded-0 btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
	            <button type="button" class="btn btn-sm rounded-0 btn-secondary" data-bs-dismiss="modal">Close</button>
	        </div>
	        </div>
	        </div>
	    </div>
	    <div class="modal fade" id="uni_modal_secondary" role='dialog' data-bs-backdrop="static" data-bs-keyboard="true">
	        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
	        <div class="modal-content">
	            <div class="modal-header py-2">
	            <h5 class="modal-title"></h5>
	        </div>
	        <div class="modal-body">
	        </div>
	        <div class="modal-footer py-1">
	            <button type="button" class="btn btn-sm rounded-0 btn-primary" id='submit' onclick="$('#uni_modal_secondary form').submit()">Save</button>
	            <button type="button" class="btn btn-sm rounded-0 btn-secondary" data-bs-dismiss="modal">Close</button>
	        </div>
	        </div>
	        </div>
	    </div>
	    <div class="modal fade" id="confirm_modal" role='dialog'>
	        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
	        <div class="modal-content rounded-0">
	            <div class="modal-header py-2">
	            <h5 class="modal-title">Confirmation</h5>
	        </div>
	        <div class="modal-body">
	            <div id="delete_content"></div>
	        </div>
	        <div class="modal-footer py-1">
	            <button type="button" class="btn btn-primary btn-sm rounded-0" id='confirm' onclick="">Continue</button>
	            <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
	        </div>
	        </div>
	        </div>
	    </div>
	</body>
	</html>