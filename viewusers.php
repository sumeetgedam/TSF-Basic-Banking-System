<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TSF Banking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style media="screen">
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body{
        background-color: #ffc93c;
      }
      .heading{
        display: flex;
        justify-content: center;
        margin-top: 10px;
      }
      .parent{
        width: 80%;
        height: 80%;
        display: flex;
        margin: 10px auto;
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
    <?php

      include 'connection.php';

      $selectquery="select * from customers";
      $query=mysqli_query($conn,$selectquery);

    ?>

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

    <div class="heading">
      <h2>Select a customer you wish to transfer funds from.</h2>
    </div>


    <div class="table-responsive parent">
    <table class="table table-secondary">
      <thead>
        <tr>
          <th>id</th>
          <th>Sender</th>
          <th>Email</th>
          <th>Current Balance</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php
          while($res=mysqli_fetch_array($query))
          {
        ?>
          <tr>
            <td><?php echo $res['id']; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['email']; ?></td>
            <td><?php echo $res['amount']; ?></td>
            <td><a href="transact.php?idth=<?php echo $res['id']; ?>"><button type="button" class="btn btn-info">Transfer amount</button></a></td>
          </tr>
        <?php
          }
        ?>
      </tbody>
    </table>

    </div>
    <div class="footer ">
      <p>Copyright 2021 @ TSF Bank System </p>
      <p>Made by Sumeet Gedam</p>
    </div>
  </body>
</html>
