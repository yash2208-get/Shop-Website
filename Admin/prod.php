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
    <link rel="stylesheet" href="prod.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="siderBar">
  <span  onclick="openNav()">&#9776; </span>
</div>
  
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <input type="text" name="" id="" placeholder="Search">
        <a href="index.php">Product View</a>
        <a href="prod.php">Product Add</a>
        <a href="cag.php">Catagragy</a>
        <a href="#">Message</a>
        <a href="#">Order Book</a>
    </div>
    <div id="main">
    </div>
    <div class="container-fluid">
      <div class="row mf">
        <div class="text-center">
          <h1 class=" text-capitalize display-5">Product Add</h1>
          <hr class="w-25 mx-auto">
      </div>
          <div class="col-md-10 col-10 col-xxl-4 mx-auto bcol">
            <form class="row g-3" method="post"  enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="inputEmail4" name="prod_name">
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Price</label>
                <input type="text" class="form-control" id="inputPassword4" name="pric">
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Stock</label>
                <input type="text" class="form-control" id="inputEmail4" name="stock">
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Quantity</label>
                <select id="inputState" class="form-select" name="qu">
                  <option selected>Choose...</option>
                  <option>Kg</option>
                  <option>GM</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="inputPassword4" name="img">
              </div>
              
          <div class="col-md-6">
          <label for="inputState" class="form-label">Catagragy</label>
          <select id="inputState" class="form-select" name="cagy">
          <option selected>Choose...</option>
          <?php
        $sel_query="Select * from cagy";
        $check=mysqli_query($con,$sel_query);
        while($row=mysqli_fetch_assoc($check))
        {?>
            <option ><?php echo "$row[name]"?></option>
        <?php
        }?>
          </select>
        </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    Check me out
                  </label>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary cen" name="b1">Add To Product</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <?php
          	if (isset($_POST["b1"])) 
            {
              $p_name=$_POST["prod_name"];
              $pri=$_POST["pric"];
              $stock=$_POST["stock"];
              $qu=$_POST["qu"];
              $cagy=$_POST["cagy"];
              $num=0;
              $sql2="select id from cagy where name='$cagy'";
              $che=mysqli_query($con,$sql2);
              $row1=mysqli_fetch_assoc($che);
              $i=$row1['id'];
               $img=$_FILES["img"];
              // Image Upload
              $filename=$img['name'];
              $filepath=$img['tmp_name'];
              $file_error=$img['error'];
              $filetype=$img['type'];
              $filesize=$img['size'];
              $vaid=array('jpg','jpeg','png');
              $ext=explode(".",$filename);
              $check=strtolower(end($ext));
              if($file_error==0)
              {
                if(in_array($check,$vaid))
                {
                  if($filesize<=4000000)
                  {
                    $destfile='upod/'.$filename;
                    move_uploaded_file($filepath,$destfile);
                    $sql = "INSERT INTO prod (name,price,stock,Qua,img,Catag) VALUES ( '$p_name', '$pri', '$stock','$qu','$destfile','$i')";
					          $check1=mysqli_query($con,$sql);
                    if($check1)
                    {
                      echo "Data is Insert";
                    }
                    else
                    {
                      echo "Data is NOT Insert";
                    }
                  }
                  else
                  {
                    echo "Image out of Size";
                  }
                  
                }
                else
                {
                  echo "File Dose Not Exe Changer";
                }
              }
              else
              {
                echo "File Not Supported";
              }
             
            }
          ?>
      <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "245px";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
      }
      </script>
</body>
</html>