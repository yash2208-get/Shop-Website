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
          <h1 class=" text-capitalize display-5">Product Update</h1>
          <hr class="w-25 mx-auto">
      </div>
      <?php
        $id= $_REQUEST['id'];
        $query="Select * from prod where id='".$id."'";
        $pid=$id;
        $check=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($check))
        {?>
          <div class="col-md-10 col-10 col-xxl-4 mx-auto bcol">
            <form class="row g-3" method="post"  enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Product Name</label>
                <input type="text" value="<?php echo $row['name'];?>" class="form-control" id="inputEmail4" name="prod_name">
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Price</label>
                <input type="text" value="<?php echo $row['price'];?>"class="form-control" id="inputPassword4" name="pric">
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Stock</label>
                <input type="text" value="<?php echo $row['stock'];?>" class="form-control" id="inputEmail4" name="stock">
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Quantity</label>
                <select id="inputState" value="<?php echo $row['Qua'];?>" class="form-select" name="qu" >
                  <option selected><?php echo $row['Qua'];?></option>
                  <option><?php if($row['Qua']=='kg')
                  {
                    echo 'GM';
                  }
                  else
                  {
                    echo 'Kg';
                  }?></option>
                </select>
              </div>
              <div class="col-md-6">

              
                <label for="inputPassword4" class="form-label">Product Image</label>
                <input type="file"  class="form-control" id="inputPassword4" name="new_img" >
                <input type="hidden" value="<?php echo $row['img'];?>" name="old_img">
              </div>
          <div class="col-md-6">
          <label for="inputState" class="form-label">Catagragy</label>
          <select id="inputState" class="form-select" name="cagy">
          <?php
          $n=$row['Catag'];
        $sel_query="Select * from cagy where id='$n'";
        $check=mysqli_query($con,$sel_query);
        $row3=mysqli_fetch_assoc($check);
        ?>
          <option><?php echo $row3['name'];?></option>
          <?php
          
        $sel_query="Select * from cagy where id<>'$n'";
        $check=mysqli_query($con,$sel_query);
        while($row3=mysqli_fetch_assoc($check))
        {?>
          <option><?php echo $row3['name'];?></option>
        <?php
        }
        ?>
        
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
              <?php
              }?>
              <div class="col-12">
                <button type="submit" class="btn btn-primary cen" name="b1">Update To Product</button>
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
              
               $new_img=$_FILES["new_img"];
               $old_img=$_POST["old_img"];
               $filename=$new_img['name'];
               $filepath=$new_img['tmp_name'];
               $file_error=$new_img['error'];
               $filetype=$new_img['type'];

               if($new_img !='')
               {
                  if($file_error==0)
                  {
                    $vaid=array('jpg','jpeg','png');
                  $ext=explode(".",$filename);
                  $check=strtolower(end($ext));
                    if(in_array($check,$vaid))
                    {
                      $filesize=$new_img['size'];
                      if($filesize<=4000000)
                      {

                        $destfile='upod/'.$filename;
                        $update=$destfile;
                        move_uploaded_file($filepath,$destfile);
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
              else{
                  echo $old_img;
                 $update=$old_img;
              }
              // Image Upload
                if(file_exists("upod/".$filename))
                {
                  echo "Image Alread Exity";
                }
                else
                {
                  $sql="UPDATE prod set name='$p_name',price='$pri',stock='$stock',Qua='$qu',img='$update',Catag='$i' where id='$pid'";
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
              /*
  
              
              */
 
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