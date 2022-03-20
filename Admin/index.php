<?php
  require "cont.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Product View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/9b8b300c29.js" crossorigin="anonymous"></script>
    <style>
      .img{
        width: 150px;
        height: 150px;
      }
      i{
        cursor: pointer;
        size: 30px;
        
      }
    </style>
</head>
<body>
<div class="siderBar">
  <span  onclick="openNav()">&#9776; </span>
</div>
  
    <div id="mySidenav" class="sidenav" >

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <input type="text" name="" id="" placeholder="Search">
        <a href="#">Product View</a>
        <a href="prod.php">Product Add</a>
        <a href="cag.php">Catagragy</a>
        <a href="#">Message</a>
        <a href="#">Order Book</a>
      </div>
      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Quantity</th>
      <th scope="col">Catagragy</th>
      <th scope="col">Product Image</th>
    </tr>
  </thead>
  <tbody>
  <?php
        
        $sel_query="Select * from prod";
        $check=mysqli_query($con,$sel_query);
        while($row=mysqli_fetch_assoc($check))
        {?>
    <tr>
      <th><?php echo $row['name'];?></th>
      <td><?php echo $row['price'];?></td>
      <td><?php echo $row['stock'];?></td>
      <td><?php echo $row['Qua'];?></td>
      <?php
      $a=$row['Catag'];
      $sql2="select name from cagy where id='$a'";
      $che=mysqli_query($con,$sql2);
      $row1=mysqli_fetch_assoc($che);
      ?>
      <td><?php echo $row1['name'];?></td>
      <td><img src="<?php echo $row['img']?>" class="img"></td>
      <td><i class="fa fa-pencil"  title="Update" id="<?php echo $row['id']?>" onclick="location.href='update.php?id='+this.id"></i></td>
      <td><i class="fa fa-trash"  title="Delete"></i></td>
    </tr>
    <?php
    }?>

      <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        //document.getElementById("main").style.marginLeft = "245px";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        //document.getElementById("main").style.marginLeft= "0";
      }
      </script>
</body>
</html>