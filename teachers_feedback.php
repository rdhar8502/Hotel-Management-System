<?php
include_once "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Rose- Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body style="background-image: url('image/marinasands.jpg');background-repeat: no-repeat;
	background-size: cover;">

<div class="col-sm-12 col-lg-12 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Team</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Team</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="opacity:0.9">
                <div class="panel-heading">Team</div>
                <div class="panel-body" style="opacity:1.0">
                    <?php
                    if (isset($_GET['resolveError'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error on Resolve !
                            </div>";
                    }
                    if (isset($_GET['resolveSuccess'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Complaint Successfully Resolve !
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%" id="rooms" style="opacity:1.0">
                        <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Image</th>
							<th>Feedback</th>
                        </tr>
                        </thead>
                        <tbody style="text-align:center">
                                <tr>
                                    <td>1</td>
                                    <td>Shudhindu Bikash Mondal</td>
                                    <td><img src="image/sbm.jpeg" alt="Sourav Khamaru" style="width:256px; height: 256px;" ></td>
									<td>Try to update more</td>
                                </tr>
								<tr>
                                    <td>2</td>
                                    <td>Nripen Pramanik</td>
                                    <td><img src="image/nipen.jpeg" alt="Sourav Khamaru" style="width:256px; height: 256px;" ></td>
									<td>Good but try to be more!</td>
                                </tr>
								<tr>
                                    <td>3</td>
                                    <td>Debayan Bhattacharya</td>
                                    <td><img src="image/deb.jpeg" alt="Sourav Khamaru" style="width:256px; height: 256px;" ></td>
									<td>Try to improve more.</td>
                                </tr>
								<tr>
                                    <td>4</td>
                                    <td>Sharmistha Ghose</td>
                                    <td><img src="image/sarmi.jpeg" alt="Sourav Khamaru" style="width:256px; height: 256px;" ></td>
									<td>Very Good work!</td>
                                </tr>
								<tr>
                                    <td>5</td>
                                    <td>Somnath Mukharji</td>
                                    <td><img src="image/somnath.jpeg" alt="Sourav Khamaru" style="width:256px; height: 256px;" ></td>
									<td>Appreciate for your hardwork!</td>
                                </tr>
								<tr>
                                    <td>6</td>
                                    <td>Munmun Chaki</td>
                                    <td><img src="image/mon.jpeg" alt="Sourav Khamaru" style="width:256px; height: 256px;" ></td>
									<td>Good project</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>    <!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/foundation-datepicker.min.js"></script>
<script src="js/validator.min.js"></script>
<script src="js/custom.js"></script>
<script src="ajax.js"></script>


</body>
<footer>
	<div class="row">
		<div class="col-md-12">
			<div class="footer">
				<p>Project Developed by Rahul Dhar</p>
			</div>
		</div>
	</div>
</footer>
</html>