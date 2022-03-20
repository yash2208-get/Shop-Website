<?php
  require "cont.php";
  $num1=0;
  session_start();
  if(isset($_SESSION['sign'])) 
  {
    $num1=1;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="detail.css">
</head>
<body>
    <div class="topnav" id="myTopnav">
        <a href="index.php" class="active">Home</a>
        <a href="prod.php">Product</a>
        <a href="cont.php">Contact</a>
        
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        <a href="prod.html" class="user" ><i class="fa fa-user" ></i></a>
        </a>
    
        <div class="search-container">
            <form action="/action_page.php">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
      </div>
      <section class="main-header2">
        <div class="text-center">
            <h1 class=" text-capitalize display-4">Product View</h1>
            <hr class="w-25 mx-auto">
        </div>
        <div class="container">
            <div class="row gy-2 my-5">
           <?php
            $id= $_REQUEST['id'];
            $_SESSION["addp"]=$id;
        $query="Select * from prod where id='".$id."'";
        $check=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($check))
        {?>
                <div class="col-md-5 col-10 col-xxl-5">
                    <figure>
                        <img src="admin/<?php echo $row['img']?>" class="img-fluid img2" alt="...">
                    </figure>
                </div>

                <div class="col-md-7 col-10 col-xxl-7 ml-2 view">
                    <h2>
                    <?php echo $row['name'];?>
                    </h2>
                    <p>Price <b><?php echo $row['price'];?> Rs</b></p>
                      
                    <center><a id="b" href="login.php"><button>Add to Card</button></a></center>
                </div>
              <?php
              }?>
            </div>

                </div>

                </section>
                <div class="container">
                    <div class="row gy-2 my-5">
                    <?php
                      $sel_query="Select * from prod";
                      $check=mysqli_query($con,$sel_query);
                      while($row1=mysqli_fetch_assoc($check))
                    {?>
                        <div class="col-md-4 col-10 col-xxl-4 mx-auto cilp">
                          <figure>
                            <img src="admin/<?php echo $row1['img']?>" class="img-fluid img2" alt="..." id="<?php echo $row1['id']?>" onclick="location.href='detail.php?id='+this.id">            
                          </figure>
                        </div>
                      <?php
                    }?>
                    </div>
                </div>
                <div class="icon-bar">
                  <a href="tel:917414864128" class="call">
                    <i class="fa fa-phone" style="color:#000"></i>
                  </a>
                  <a href="https://wa.me/917414864128" target="_blank" class="whatsapp">
                  <i class="fa fa-whatsapp" style="color:#fff"></i>
                  </a>
                  <a href="add_card.php" class="whatsapp">
                    <i class="fa fa-shopping-cart" style="color:#fff"></i>
                    </a>
                  </div>
<script>
    var a='<?= $num1?>';
  //alert(a);
  if (a==1) 
  {
    document.getElementById('b').href='add_card.php';
  }
</script>                 
</body>
</html>