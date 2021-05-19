
<?php

include 'connection.php';

if(isset($_POST['submit'])){

  $from=$_GET['idth'];
  $touser=$_POST['to'];
  $amt=$_POST['amount'];

  $sql1="select * from customers where id=$from";
  $q1=mysqli_query($conn,$sql1);
  $arr1=mysqli_fetch_array($q1);


  $sql2="select * from customers where id=$touser";
  $q2=mysqli_query($conn,$sql2);
  $arr2=mysqli_fetch_array($q2);


  if($amt>$arr1['amount']){
    ?>
    <script type="text/javascript">
      alert("insufficient balance");
    </script>
    <?php
  }else if($amt==0||$amt<0){
    ?>
    <script type="text/javascript">
      alert("enter more than zero");
    </script>
    <?php
  }else{
    $newcred1=$arr1['amount']-$amt;
    $newcred2=$arr2['amount']+$amt;

    $sql1="UPDATE customers set amount=$newcred1 where id=$from";
    $qq1=mysqli_query($conn,$sql1);


    $sql2="UPDATE customers set amount=$newcred2 where id=$touser";
    $qq2=mysqli_query($conn,$sql2);


    $sender=$arr1['name'];
    $receiver=$arr2['name'];

    $uquery="INSERT into history( `fromuser`, `touser`, `transamount`) values ('$sender','$receiver',$amt)";
    $que=mysqli_query($conn,$uquery);

    if($que){
      ?>
      <script type="text/javascript">
        alert("'Transaction Successful. Please check your transactions in the transactions table'");
        window.location='history.php';
      </script>
      <?php
    }
  }
}
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSF Banking System</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
    .list-customer{
      padding-left: 1100px;
    }
    body{
      background-color: #ffc93c;
    }
    .button {
      background-color: #60B3EE;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 18px;
      margin: 0px 2px;
      border-radius: 5px;
    }
    h2{
      text-align: center;
      margin-top: 20px;
    }
    .footer{
      display: flex;
      justify-content:space-between;
      align-items:center;
      background-color: #364547;
      color: white;
      padding: 0 20px;
    }
    </style>

</head>


<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-sm bg-secondary navbar-dark justify-content-between">
    <a class="navbar-brand" href="#"><i class="fa fa-university fa-lg"></i>TSF BANK</a>
    <ul class="navbar-nav navbar-right ">

      <li class="nav-item active">
        <a class="nav-link" href="index.php">HOME</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="viewusers.php">TRANSFER AMOUNT</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="history.php">TRANSACTION HISTORY</a>
      </li>
    </ul>
  </nav>


    <div class="container divStyle">
        <h2>Transaction here</h2>
        <!-- <form method="post" name="tcredit" class="tabletext"><br/> -->
            <?php
                include 'connection.php';
                $sid=$_GET['idth'];
                $sql = "SELECT * FROM  customers where id=$sid";
                $query=mysqli_query($conn,$sql);
                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_array($query);
            ?>
            <form method="post" name="tamount" class="" ><br/>
        <label> From: </label><br/>
        <div>
            <table class="table roundedCorners  tabletext table-hover table-secondary  table-striped table-condensed"  >
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount Transferred</th>
                </tr>
                <tr>
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td><?php echo $rows['amount'] ?></td>
                </tr>
            </table>
        </div>

        <br/><br/><br/>


        <label>To:</label>
        <select class=" form-control"   name="to" style="margin-bottom:5%; " required>

            <?php

                include 'connection.php';

                $sid=$_GET['idth'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $query=mysqli_query($conn,$sql);

                if(!$query)
                {
                    echo "Error ".$sql."<br/>".mysqli_error($conn);
                }

                while($rows = mysqli_fetch_array($query)) {
            ?>
                <option class="table text-center table-striped table-secondary" value="<?php echo $rows['id'];?>" >

                    <?php echo $rows['name'] ;?>
                </option>
            <?php
                }
            ?>
        </select>

        <br/><br/><br/>


            <label>Amount:</label>
            <input type="number" id="" class="form-control" name="amount" min="0" required  />  <br/><br/>
                <div class="text-center btn3" >
            <button class="button" name="submit" type="submit" id="myBtn">Proceed</button>

            </div>
        </form>
    </div>


    <div class="footer ">
      <p>Copyright 2021 @ TSF Bank System </p>
      <p>Made by Sumeet Gedam</p>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
