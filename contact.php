<?php
include_once "db.php";?>
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
<body style="background-image: url('image/superior-room.jpg');background-repeat: no-repeat;
	background-size: cover;">

<div class="col-sm-12 col-lg-12 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Contact</li>
        </ol>
    </div><!--/.row-->

    <br>

    <div class="row">
        <div class="col-lg-12">
            <div id="success"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="background: transparent">
                <div class="panel-heading">Contact
                   
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error on Delete !
                            </div>";
                    }
                    if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully Delete !
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>Hotel Nmame:</th>
                            <th>Contact No.</th>
                            <th>Email:</th>
                            <th>Address:</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>Hotel Regent</td>
                                    <td>9875397872</td>
                                    <td>hotel.regent1999@gmail.com<td>
                                    <td>
                                        Bara Kathaliya, Barrackpore, West Bengal India
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="background: transparent">
                <div class="panel-body" style="text-align: center">
                    <img src="image/Screenshot (180).png" alt="map" style="width: 80%; height: 40%;">
                </div>
            </div>

        </div>
    </div>
	
    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">Hotel Regent Developed by <a href="#">Rahul Dhar</a></p>
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