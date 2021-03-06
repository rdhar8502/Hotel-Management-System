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
<body style="background-image: url('image/guest-room-hotel-president-wilson-geneva-EXPENSIVESUITE1017.jpg');background-repeat: no-repeat;
	background-size: cover;">

<div class="col-sm-12 col-lg-12 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Room Management</li>
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
                <div class="panel-heading">Rooms Available
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
                            <th>Room No</th>
                            <th>Room Type</th>
							<th>Image</th>
							<th>Price</th>
                            <th>Booking Status</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $room_query = "SELECT * FROM `room` NATURAL JOIN room_type WHERE deleteStatus = 0";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $rooms['room_no'] ?></td>
                                    <td><?php echo $rooms['room_type'] ?></td>
									<td>
										<center><img src="<?php echo $rooms['room_image'] ?>" width="160px" height="128px"></center>
                                    </td>
									<td><?php echo $rooms['price'] ?> /-</td>
                                    <td>
                                        <?php
                                        if ($rooms['status'] == 0) {
                                            echo '<a href="reservation.php?room_id=' . $rooms['room_id'] . '&room_type_id=' . $rooms['room_type_id'] . '" class="btn btn-success">Book Room</a>';
                                        } else {
                                            echo '<a href="#" class="btn btn-danger">Booked</a>';
                                        }
                                        ?>


                                    <td>
                                        <?php
                                        if ($rooms['status'] == 1 && $rooms['check_in_status'] == 0) {
                                            echo '<button class="btn btn-success" id="checkInRoom"  data-id="' . $rooms['room_id'] . '" data-toggle="modal" data-target="#checkIn">Check In</button>';
                                        } elseif ($rooms['status'] == 0) {
                                            echo '-';
                                        } else {

                                            echo '<a href="#" class="btn btn-danger">Checked In</a>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($rooms['status'] == 1 && $rooms['check_in_status'] == 1) {
                                            echo '<button class="btn btn-success" id="checkOutRoom" data-id="' . $rooms['room_id'] . '">Check Out</button>';
                                        } elseif ($rooms['status'] == 0) {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo "No Rooms";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <!---customer details-->
    <div id="cutomerDetailsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Customer Detail</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td id="customer_name"></td>
                                </tr>
                                <tr>
                                    <td>Contact Number</td>
                                    <td id="customer_contact_no"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td id="customer_email"></td>
                                </tr>
                                <tr>
                                    <td>ID Card Type</td>
                                    <td id="customer_id_card_type"></td>
                                </tr>
                                <tr>
                                    <td>ID Card Number</td>
                                    <td id="customer_id_card_number"></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td id="customer_address"></td>
                                </tr>
                                <tr>
                                    <td>Remaining Amount</td>
                                    <td id="remaining_price"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---customer details ends here-->

    <!-- Check In Modal -->
    <div id="checkIn" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Check In Room</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td id="getCustomerName"></td>
                                </tr>
                                <tr>
                                    <td>Room Type</td>
                                    <td id="getRoomType"></td>
                                </tr>
                                <tr>
                                    <td>Room No</td>
                                    <td id="getRoomNo"></td>
                                </tr>
                                <tr>
                                    <td>Check In</td>
                                    <td id="getCheckIn"></td>
                                </tr>
                                <tr>
                                    <td>Check Out</td>
                                    <td id="getCheckOut"></td>
                                </tr>
                                <tr>
                                    <td>Total Price</td>
                                    <td id="getTotalPrice"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="advancePayment">
                                <div class="payment-response"></div>
                                <div class="form-group col-lg-12">
                                    <label>Advance Payment</label>
                                    <input type="number" class="form-control" id="advance_payment"
                                           placeholder="Advance Payment">
                                </div>
                                <input type="hidden" id="getBookingID" value="">
                                <button type="submit" class="btn btn-primary pull-right">Payment & Check In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Check Out Modal-->
    <div id="checkOut" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Check Out Room</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Customer Name</td>
                                    <td id="getCustomerName_n"></td>
                                </tr>
                                <tr>
                                    <td>Room Type</td>
                                    <td id="getRoomType_n"></td>
                                </tr>
                                <tr>
                                    <td>Room No</td>
                                    <td id="getRoomNo_n"></td>
                                </tr>
                                <tr>
                                    <td>Check In</td>
                                    <td id="getCheckIn_n"></td>
                                </tr>
                                <tr>
                                    <td>Check Out</td>
                                    <td id="getCheckOut_n"></td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td id="getTotalPrice_n"></td>
                                </tr>
                                <tr>
                                    <td>Remaining Amount</td>
                                    <td id="getRemainingPrice_n"></td>
                                </tr>
                                </tbody>
                            </table>
                            <form role="form" id="checkOutRoom_n" data-toggle="validator">
                                <div class="checkout-response"></div>
                                <div class="form-group col-lg-12">
                                    <label>Remaining Payment</label>
                                    <input type="text" class="form-control" id="remaining_amount"
                                           placeholder="Remaining Payment" required
                                           data-error="Please Enter Remaining Amount">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" id="getBookingId_n" value="">
                                <button type="submit" class="btn btn-primary pull-right">Payment & Checkout</button>
                            </form>
                        </div>
                    </div>
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