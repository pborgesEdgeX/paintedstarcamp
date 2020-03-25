<?php
// Initialize the session
session_start();
require_once "credentials.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Camp Website Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        body {
            color: #566787;
            background: #f5f5f5;
    		font-family: 'Roboto', sans-serif;
    	}
      table {
        width: 100%;
      }


      td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

      #email_col #text_col #id_col #age_col #student_col #student_col {
        width: 1%;
      }
      #email_col_1{
        width: 18%;
      }

      #week_col{
        width: 18%;
      }

      #phone_col{
        width: 10%;
      }

      #parents_col {
        width: 10%;
      }
    	.table-wrapper {
            width: 100%;
            overflow-y:scroll;
            overflow-x:scroll;
            background: #fff;
            padding: 20px 30px 5px;
            margin: 10px auto;
            box-shadow: 0 0 1px 0 rgba(0,0,0,.25);
        }
    	.table-title .btn-group {
    		float: right;
    	}
    	.table-title .btn {
    		min-width: 50px;
    		border-radius: 2px;
    		border: none;
    		padding: 6px 12px;
    		font-size: 95%;
    		outline: none !important;
    		height: 30px;
    	}
        .table-title {
    		border-bottom: 1px solid #e9e9e9;
    		padding-bottom: 15px;
    		margin-bottom: 5px;
    		background: rgb(0, 50, 74);
    		margin: -20px -31px 10px;
    		padding: 15px 30px;
    		color: #fff;
        }
        .table-title h2 {
    		margin: 2px 0 0;
    		font-size: 24px;
    	}
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
    		padding: 12px 15px;
    		vertical-align: middle;
        }
    	table.table tr th:first-child {
    		width: 40px;
    	}
    	table.table tr th:last-child {
    		width: 100px;
    	}
        table.table-striped tbody tr:nth-of-type(odd) {
        	background-color: #fcfcfc;
    	}
    	table.table-striped.table-hover tbody tr:hover {
    		background: #f5f5f5;
    	}
        table.table td a {
            color: #2196f3;
        }
    	table.table td .btn.manage {
    		padding: 2px 10px;
    		background: #37BC9B;
    		color: #fff;
    		border-radius: 2px;
    	}
    	table.table td .btn.manage:hover {
    		background: #2e9c81;
    	}
    </style>
    <script type="text/javascript">

    $(document).ready(function(){
    	$(".btn-group .btn").click(function(){
    		var inputValue = $(this).find("input").val();
    		if(inputValue != 'all'){
    			var target = $('table tr[data-status="' + inputValue + '"]');
    			$("table tbody tr").not(target).hide();
    			target.fadeIn();
    		} else {
    			$("table tbody tr").fadeIn();
    		}
    	});
    	// Changing the class of status label to support Bootstrap 4
        var bs = $.fn.tooltip.Constructor.VERSION;
        var str = bs.split(".");
        if(str[0] == 4){
            $(".label").each(function(){
            	var classStr = $(this).attr("class");
                var newClassStr = classStr.replace(/label/g, "badge");
                $(this).removeAttr("class").addClass(newClassStr);
            });
        }
    });
    </script>

</head>
<body>
    <div class="page-header">
        <h1><b>Shannen's</b> Admin Dashboard</h1>
    </div>
        <div class="limiter" style="background-color: white;"><a href="logout.php" class="btn btn-danger">Logout</a>
      		<div class="container-table100" style="background-color: #3f93d3;">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6"><input id="myInput" class="form-control" type="text" placeholder="Search.."></div>
                        <div class="col-sm-6">
                          <div class="col-sm-4">
                					</div>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-info active">
                                    <input type="radio" name="status" value="all" checked="checked"> All
                                </label>
                                <label class="btn btn-success">
                                    <input type="radio" name="status" value="paid"> Paid
                                </label>
                                <label class="btn btn-danger">
                                    <input type="radio" name="status" value="unpaid"> Not Paid
                                </label>
                                <label class="btn btn-warning">
                                    <input type="radio" name="status" value="inactive"> Inactive
                                </label>
                                <label class="btn btn-danger">
                                    <input type="radio" name="status" value="cancelled"> Cancelled
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>

                          <tr class="row100 head">
                            <th class="cell100 column1" id="id_col">ID</th>
                            <th class="cell100 column1" id="parents_col">Parents</th>
                            <th class="cell100 column2" id="email_col_1">Email</th>
                            <th class="cell100 column3" id="phone_col">Phone</th>
                            <th class="cell100 column4" id="student_col">Student Name</th>
                            <th class="cell100 column5" id="age_col">Age</th>
                            <th class="cell100 column6" id="week_col">Week</th>
                            <th class="cell100 column6" id="status_col">Status</th>
                            <th class="cell100 column9">Waitlisted</th>
                            <th class="cell100 column9"></th>
                          </tr>

                    </thead>
                    <tbody id="myTable">
                        <?php
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT CustomersID, parentName, lastName, email, phone, studentName, age, week, email_sent, text_sent, waitlisted, payment FROM customers ORDER BY CustomersID DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              switch($row['payment']){
                                case 'unpaid':
                                    echo '<tr data-status="unpaid">';
                                    echo '<td>'.$row['CustomersID'].'</td>';
                                    echo '<td style="word-break:break-all;">'.$row['parentName'].' '.$row['lastName'].'</td>';
                                    echo '<td style="word-break:break-all; white-space:nowrap;">'.$row['email'].'</td>';
                                    echo '<td>'.$row['phone'].'</td>';
                                    echo '<td style="word-break:break-all;">'.$row['studentName'].'</td>';
                                    echo '<td>'.$row['age'].'</td>';
                                    echo '<td style="word-break:break-all;">'.$row['week'].'</td>';
                                    echo '<td><span class="label label-danger">Unpaid</span></td>';
                                    //echo '<td>'.$row['email_sent'].'</td>';
                                    //echo '<td>'.$row['text_sent'].'</td>';
                                    echo '<td id="waitList">'.$row['waitlisted'].'</td>';
                                    echo '<td><a href="#myModal" data-toggle="modal" data-id="'.$row['CustomersID'].'" data-pay="unpaid" data-parent-name="'.$row['parentName'].'" data-waitlisted="'.$row['waitlisted'].'" data-last-name="'.$row['lastName'].'" data-email="'.$row['email'].'" data-phone="'.$row['phone'].'" data-student-name="'.$row['studentName'].'" data-age="'.$row['age'].'" data-week="'.$row['week'].'" class="btn btn-sm manage">Manage</a></td>';
                                    echo "</tr>";
                                    break;
                                case 'paid':
                                    echo '<tr data-status="paid">';
                                    echo '<td>'.$row['CustomersID'].'</td>';
                                    echo '<td style="word-break:break-all;">'.$row['parentName'].' '.$row['lastName'].'</td>';
                                    echo '<td style="word-break:break-all; white-space:nowrap;">'.$row['email'].'</td>';
                                    echo '<td>'.$row['phone'].'</td>';
                                    echo '<td style="word-break:break-all;">'.$row['studentName'].'</td>';
                                    echo '<td>'.$row['age'].'</td>';
                                    echo '<td style="word-break:break-all;">'.$row['week'].'</td>';
                                    echo '<td>'.'<span class="label label-success">Paid</span>'.'</td>';
                                    //echo '<td>'.$row['email_sent'].'</td>';
                                    //echo '<td>'.$row['text_sent'].'</td>';
                                    echo '<td id="waitList">'.$row['waitlisted'].'</td>';
                                    echo '<td><a href="#myModal" data-toggle="modal" data-id="'.$row['CustomersID'].'" data-pay="paid" data-parent-name="'.$row['parentName'].'" data-waitlisted="'.$row['waitlisted'].'" data-last-name="'.$row['lastName'].'" data-email="'.$row['email'].'" data-phone="'.$row['phone'].'" data-student-name="'.$row['studentName'].'" data-age="'.$row['age'].'" data-week="'.$row['week'].'" class="btn btn-sm manage">Manage</a></td>';
                                    echo "</tr>";
                                    break;
                                case 'cancelled':
                                    echo '<tr data-status="cancelled">';
                                    echo '<td>'.$row['CustomersID'].'</td>';
                                    echo '<td style="word-break:break-all;">'.$row['parentName'].' '.$row['lastName'].'</td>';
                                    echo '<td style="word-break:break-all; white-space:nowrap">'.$row['email'].'</td>';
                                    echo '<td>'.$row['phone'].'</td>';
                                    echo '<td>'.$row['studentName'].'</td>';
                                    echo '<td>'.$row['age'].'</td>';
                                    echo '<td style="word-break:break-all;">'.$row['week'].'</td>';
                                    echo '<td>'.'<span class="label label-warning">Cancelled</span>'.'</td>';
                                    //echo '<td>'.$row['email_sent'].'</td>';
                                    //echo '<td>'.$row['text_sent'].'</td>';
                                    echo '<td id="waitList">'.$row['waitlisted'].'</td>';
                                    echo '<td><a href="#myModal" data-toggle="modal" data-id="'.$row['CustomersID'].'" data-pay="cancelled" data-parent-name="'.$row['parentName'].'" data-waitlisted="'.$row['waitlisted'].'" data-last-name="'.$row['lastName'].'" data-email="'.$row['email'].'" data-phone="'.$row['phone'].'" data-student-name="'.$row['studentName'].'" data-age="'.$row['age'].'" data-week="'.$row['week'].'" class="btn btn-sm manage">Manage</a></td>';
                                    echo '</tr>';

                                    break;
                                default:
                                    echo '<tr data-status="inactive">';
                                    echo '<td>'.$row['CustomersID'].'</td>';
                                    echo '<td style="word-break:break-all;">'.$row['parentName'].' '.$row['lastName'].'</td>';
                                    echo '<td style="word-break:break-all; white-space:nowrap">'.$row['email'].'</td>';
                                    echo '<td>'.$row['phone'].'</td>';
                                    echo '<td style="word-break:break-all;">'.$row['studentName'].'</td>';
                                    echo '<td>'.$row['age'].'</td>';
                                    echo '<td style="word-break:break-all;">'.$row['week'].'</td>';
                                    echo '<td><span class="label label-warning">Inactive</span></td>';
                                    //echo '<td>'.$row['email_sent'].'</td>';
                                    //echo '<td>'.$row['text_sent'].'</td>';
                                    echo '<td id="waitList">'.$row['waitlisted'].'</td>';
                                    echo '<td><a href="#myModal" data-toggle="modal" data-id="'.$row['CustomersID'].'" data-pay="inactive" data-parent-name="'.$row['parentName'].'" data-waitlisted="'.$row['waitlisted'].'" data-last-name="'.$row['lastName'].'" data-email="'.$row['email'].'" data-phone="'.$row['phone'].'" data-student-name="'.$row['studentName'].'" data-age="'.$row['age'].'" data-week="'.$row['week'].'" class="btn btn-sm manage">Manage</a></td>';
                                    echo '</tr>';
                              }
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <!-- Edit Modal HTML -->
          	<div id="myModal" class="modal fade">
          		<div class="modal-dialog">
          			<div class="modal-content">
          				<form>
          					<div class="modal-header">
          						<h4 class="modal-title">Edit Client Information</h4>
          						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          					</div>
          					<div class="modal-body">
                      <div class="form-group">
          							<label>Customer ID:</label>
          							<input type="text" name="id" id="id" class="form-control" readonly>
          						</div>
          						<div class="form-group">
          							<label>Name</label>
          							<input type="text" name="parentName" id="parentName" class="form-control" required>
          						</div>
                      <div class="form-group">
          							<label>Last Name</label>
          							<input type="text" name="lastName" id="lastName" class="form-control" required>
          						</div>
          						<div class="form-group">
          							<label>Email</label>
          							<input type="email" name="email" id="email" class="form-control" required>
          						</div>
          						<div class="form-group">
          							<label>Phone</label>
          							<input type="tel" name="phone" id="phone" class="form-control" required>
          						</div>
          						<div class="form-group">
          							<label>Student Name</label>
          							<input type="text" name="studentName" id="studentName" class="form-control" required>
          						</div>
                      <div class="form-group">
          							<label>Week</label>
                          <select id="week"  name="week" class="form-control" required>
                              <option value="" disabled selected>Camp Week</option>
                              <option value="June 22nd - 26th">June 22nd - 26th</option>
                              <option value="July 6th - 10th">July 6th - 10th</option>
                              <option value="July 13th - 17th">July 13th - 17th</option>
                              <option value="July 20th - 24th">July 20th - 24th</option>
                              <option value="July 27th - 31st">July 27th - 31st</option>
                          </select>
          						</div>
                      <div class="form-group">
                        <label>Waitlist</label>
                        <select id="waitlist"  name="waitlist" class="form-control" required>
                          <option value="" disabled selected>Status</option>
                          <option value="NO">NO</option>
                          <option value="YES">YES</option>
                        </select>
                      </div>
                      <div class="form-group">
          							<label>Payment</label>
                        <select id="pay"  name="pay" class="form-control" required>
                          <option value="" disabled selected>Status</option>
                          <option value="paid">Paid</option>
                          <option value="unpaid">Unpaid</option>
                          <option value="cancelled">Cancelled</option>
                          <option value="inactive">Inactive</option>
                        </select>
          						</div>
          					</div>
          					<div class="modal-footer">
                      <input id="delete_btn"  style="background-color:#eb5234;" type="submit" class="btn btn-info pull-left" value="Delete">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          						<input id="save_btn" type="submit" class="btn btn-info" value="Save">
          					</div>
          				</form>
          			</div>
          		</div>
          	</div>
      	</div>
        <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });

        $('#myModal').on('show.bs.modal', function(e) {
            var parentName= $(e.relatedTarget).data('parent-name');
            var lastName = $(e.relatedTarget).data('last-name');
            var email = $(e.relatedTarget).data('email');
            var phone = $(e.relatedTarget).data('phone');
            var studentName= $(e.relatedTarget).data('student-name');
            var age = $(e.relatedTarget).data('age');
            var week = $(e.relatedTarget).data('week');
            var pay = $(e.relatedTarget).data('pay');
            var id = $(e.relatedTarget).data('id');
            var waitlisted = $(e.relatedTarget).data('waitlisted');
            $(e.currentTarget).find('input[name="id"]').val(id);
            $(e.currentTarget).find('input[name="parentName"]').val(parentName);
            $(e.currentTarget).find('input[name="lastName"]').val(lastName);
            $(e.currentTarget).find('input[name="email"]').val(email);
            $(e.currentTarget).find('input[name="phone"]').val(phone);
            $(e.currentTarget).find('input[name="studentName"]').val(studentName);
            $(e.currentTarget).find('#week').val(week);
            $(e.currentTarget).find('#pay').val(pay);
            $(e.currentTarget).find('#waitlist').val(waitlisted);
            $("#save_btn").click(function()
            {
              var identification = $('#id').val();
              var firstName = $('#parentName').val();
              var lName = $('#lastName').val();
              var email = $('#email').val();
              var phone = $('#phone').val();
              var sName = $('#studentName').val();
              var p = $('#pay').val();
              var weekdates = $('#week').val();
              var waitlisted = $('#waitlist').val();
              var data = {id:identification, firstName: firstName, lastName: lName, email:email, phone:phone, studentName: sName, pay: p, week: weekdates, waitlisted: waitlisted};
              //alert(data.id + ' ' + data.firstName + ' ' + data.lastName+ ' '+data.email+ ' '+ data.phone+ ' '+ data.studentName+ ' '+ data.pay + ' ' + data.week);
              $.ajax(
                {
                  type: 'POST',
                  url: "server/admin.php",
                  data: data,
                  success: function(data)
                  {
                    location.reload(true);
                    //alert('Client: Data Updated Successfully');
                  }
                });
                <?php header("Refresh:0"); ?>
            });
            $("#delete_btn").click(function()
            {
              var identification = $('#id').val();
              var data = {id:identification};
              //alert(data.id + ' ' + data.firstName + ' ' + data.lastName+ ' '+data.email+ ' '+ data.phone+ ' '+ data.studentName+ ' '+ data.pay + ' ' + data.week);
              $.ajax(
                {
                  type: 'POST',
                  url: "server/del.php",
                  data: data,
                  success: function(data)
                  {
                    location.reload(true);
                    //alert('Client: Data Updated Successfully');
                  }
                });
                <?php header("Refresh:0"); ?>
            });
        });
        </script>
</body>
</html>
