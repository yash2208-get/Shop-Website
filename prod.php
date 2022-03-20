<?php
  require "cont.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily News Ganel store</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="prod.css">
</head>
<body>
  <div class="topnav" id="myTopnav">
    <a href="index.php" class="active">Home</a>
    <a href="prod.php">Product</a>
    <a href="cont1.php">Contact</a>
    
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    <a href="" class="user"><i class="fa fa-user"></i></a>
    </a>
    <div class="search-container">
        <form action="/action_page.php">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
  </div>

  <section class="main-header2 ">
    <div class="text-center">
        <h1 class=" text-capitalize display-4">Product View</h1>
        <hr class="w-25 mx-auto">
    </div>
    <div class="container">
      <div class="row gy-2 my-5">
      <?php
        $sel_query="Select * from prod";
        $check=mysqli_query($con,$sel_query);
        while($row=mysqli_fetch_assoc($check))
        {?>
          <div class="col-md-4 col-10 col-xxl-4 mx-auto cilp">
            <figure>
            <img src="admin/<?php echo $row['img']?>" class="img-fluid" style="cursor: pointer;" id="<?php echo $row['id']?>" onclick="location.href='detail.php?id='+this.id">
            </figure>
            <h5><?php echo $row['name'];?></h5>
            <h6>Price <?php echo $row['price'];?></h6>
          </div>
        <?php
        }?>     
      </div>
    </div>
</section>

<div class="icon-bar">
  <a href="" class="facebook">
  <i class="fa fa-facebook-square" target='_blank'></i>
</a>
<a href="tel:917414864128" class="call">
  <i class="fa fa-phone" style="color:#000"></i>
</a>
<a href="https://wa.me/917414864128" target="_blank" class="whatsapp">
<i class="fa fa-whatsapp" style="color:#fff"></i>
</a>
<a href="card.html" target="_blank" class="whatsapp">
<i class="fa fa-shopping-cart" style="color:#fff"></i>
</a>
</div>
  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
    </script>
  </body>
  </html>