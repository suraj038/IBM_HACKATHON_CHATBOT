<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Minimum Bootstrap HTML Skeleton</title>
</head>
<body>

    <div class="jumbotron" style="height: 200px;" >
                <div class="col-md-2 " align="center"><img src="../assets/images/bank.png"  class="animated infinite bounce img-circle" width="100" height="100" ></div>
                <div class="col-md-8">
                        <center><strong><h1>Bank Account Detail</h1></strong></center>
                </div>
                    
                <div class="col-md-2" align="center">
                    <a href="../index.php">
                        <img src="../assets/images/ebschatbot.png"  class="animated infinite bounce img-circle" width="100" height="100" />
                    </a>
                </div> 
               
    </div>
	<div class="container">

<?php


                $conn_err = 'connection error';
                $host_name = 'localhost';
                $user = 'root';
                $passwd = '';
                $database_name = 'test';
                if(!@mysql_connect($host_name, $user, $passwd) || !@mysql_select_db($database_name))
                {
                    die($conn_err);
                }
                else {
                    //   echo "connected to database";
                }


                
                    $query = "SELECT * FROM `reservation`";
                
                    $result = mysql_query($query);
                    
                    # code...
            $count = 1;
            while ($row = mysql_fetch_array($result)) {
                    ?>
                    <div class="form col-md-4 well">
                    <h4><?php
                echo "Resevation Detail :  $count";
                        ?></h2>
                    <!-- Displaying Data Read From Database -->
                    
                    <span><strong>Person Name :</strong></span> <?php echo $row['i_name']."<br>"; ?>
                    <span><strong>Address : </strong></span> <?php echo $row['i_address']."<br>"; ?>
                    <span><strong>Phone Number : <strong></span> <?php echo $row['i_phn_no']."<br>"; ?>
                    <span><strong>Age : </strong></span> <?php echo $row['i_age']."<br>"; ?>
                    <span><strong>Account Type : </strong></span> <?php echo $row['account_type']."<br>"; ?>
                    <span><strong> Status of Account : </strong></span> <?php echo $row['r_status']."<br>"; ?>
                    <span><strong>Account number : </strong></span> <?php echo $row['id']."<br>"; ?>
                    <br>
                    <!-- <button type="button" class="btn-success">Edit</button> -->
                    <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                    <!-- <button   type="button" class="btn btn-danger">Delete</button> -->
                    </div>
                    <?php
                $count++;
            }
           
?>

	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
	</script>
</body>
</html>