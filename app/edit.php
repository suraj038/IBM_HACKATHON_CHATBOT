<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>






<div class="container">




<?php


require 'connection.php';

$id = $_GET['id'];

// echo "$id";


              $sql = "SELECT * FROM reservation WHERE id='$id'";
             
                              
              // $result1 = mysql_query($query1);
              // echo "$result1";

              $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["id"]. " - Name: " . $row["i_name"]. " " . $row["i_address"]. "<br>";
    



              // $row1 = mysql_fetch_array($result1);
              // echo "$row1";

              // while ($row1 = mysql_fetch_array($result1)) {

              //   // echo "$row1['id']";
              //   // echo "$row1['i_name']";
              // }
              
              
?>






  <h2>Update Information</h2>
  <form class="" action="update.php?id=<?php echo $row['id'];?>" method="POST">


    <div class="form-group">
      <label for="email">Person Name</label>
      <input type="text" class="form-control" id="email" placeholder="<?php echo $row['i_name']; ?>" name="i_name">
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control" id="pwd" placeholder="<?php echo $row['i_address']; ?>" name="i_address">
    </div>

    <div class="form-group">
            <label for="email">Phone Number</label>
            <input type="text" class="form-control" id="email" placeholder="<?php echo $row['i_phn_no']; ?>" name="i_phn_no">
          </div>
          <div class="form-group">
            <label for="pwd">No of People:</label>
            <input type="text" class="form-control" id="pwd" placeholder="<?php echo $row['i_age']; ?>" name="i_age">
        </div>


        <div class="form-group">
                <label for="email">Account Type:</label>
                <input type="text" class="form-control" id="email" placeholder="<?php echo $row['account_type']; ?>" name="account_type">
              </div>
              <div class="form-group">
                <label for="pwd">Status of Account:</label>
                <input type="text" class="form-control" id="pwd" placeholder="<?php echo $row['r_status']; ?>" name="r_status">
              </div>

    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
   
  </form>

  <?php
              }
} else {
  echo "0 results";
}







  ?>
</div>

</body>
</html>
