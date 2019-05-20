<?php
include_once "db.php";
?>

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
<body style="background-image: url('image/marina-bay-sands-hotel-singapore.jpg');background-repeat: no-repeat;
	background-size: cover;">

	<div class="col-sm-12 col-lg-12 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Feedback</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Feedback</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="opacity:0.8;">
                <div class="panel-heading">Give Feedback</div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error on Complaint !
                            </div>";
                    }
                    if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Complaint Successfully Added !
                            </div>";
                    }
                    ?>
                    <form role="form"  data-toggle="validator" method="post" action="ajax.php">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="feedback_name" required>
                                <div class="help-block with-errors"></div>
                            </div>
							
							<div class="form-group col-lg-6">
                                <label>Contact</label>
                                <input type="text" class="form-control" placeholder="Contact" name="feedback_contact" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Feedback Description</label>
                                <textarea class="form-control" name="feedback_desc" placeholder="Feedback" required></textarea>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-lg btn-primary" name="createFeedback">Submit</button>
                        <button type="reset" class="btn btn-lg btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="col-sm-12 col-lg-12 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Customer Feedback</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Customer Feedback</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="opacity:0.8">
                <div class="panel-heading">Customer Feedback</div>
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
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%" id="rooms">
                        <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Customer Name</th>
                            <th>Contact</th>
                            <th>Feedback</th>
							
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $feedback_query = "SELECT * FROM `feedback`";
                        $feedback_result = mysqli_query($connection, $feedback_query);
                        if (mysqli_num_rows($feedback_result) > 0) {
                            $num = 0;
                            while ($feedback = mysqli_fetch_assoc($feedback_result)) {
                                $num++
                                ?>
                                <tr>
                                    <td><?php echo $num ?></td>
                                    <td><?php echo $feedback['feedback_name'] ?></td>
                                    <td><?php echo $feedback['feedback_contact'] ?></td>
                                    <td><?php echo $feedback['feedback'] ?></td>

                                </tr>
                            <?php }
                        } else {
                            echo "No Feedback";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <p class="back-link">Hotel Regent Developed by <a href="#">Hotel Regent</a></p>
        </div>
    </div>

</div>


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