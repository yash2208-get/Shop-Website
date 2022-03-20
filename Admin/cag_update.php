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
    <script src="https://kit.fontawesome.com/9b8b300c29.js" crossorigin="anonymous"></script>
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
        <a href="#">Catagragy</a>
        <a href="#">Message</a>
        <a href="#">Order Book</a>
    </div>
    <div id="main">
    </div>
    <div class="container-fluid">
        <div class="text-center">
            <h1 class=" text-capitalize display-5">Catagragy Update</h1>
            <hr class="w-25 mx-auto">
        </div>
      <div class="row mf">
      <?php
        $id= $_REQUEST['id'];
        $query="Select * from cagy where id='".$id."'";
        $pid=$id;
        $check=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($check))
        {?>
          <div class="col-md-10 col-10 col-xxl-4 mx-auto bcol">
            <form class="row g-3" method="post">
              
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Catagragy Name</label>
                <input type="text"  class="form-control" id="inputEmail4" name="name" value="<?php echo $row['name']?>">
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Discription</label>
                <input type="text" class="form-control"  id="inputPassword4" name="dis" value="<?php echo $row['dis']?>">
              </div>
              <?php
        }
              ?>
              <div class="col-12">
                <button type="submit" name="b1" class="btn btn-primary cen" id="add">Catagragy Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
            
      <div class="container">
        <div class="row gy-2 my-5">
            <div class="col-md-10 col-10 col-xxl-4 mx-auto ">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Catagragy Add</th>
                    <th scope="col">Discription</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sel_query="Select * from cagy";
                  $check=mysqli_query($con,$sel_query);
                  while($row=mysqli_fetch_assoc($check))
                  {?>
                  
                  <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['dis'];?></td>
                    <td ><i class="fa fa-pencil"  title="Update" id="<?php echo $row['id']?>" onclick="location.href='cag_update.php?id='+this.id"></td>
                    <td><i class="fa fa-trash"  title="Delete" id="<?php echo $row['id']?>" onclick="location.href='cag_delect.php?id='+this.id"></td>
                  </tr>
                  <?php
                  }?>
                  
                </tbody>
              </table>
            </div>
          </div>
          </div>
          <?php
          if(isset($_POST["b1"]))
          {
            $cname=$_POST["name"];
            $dis=$_POST["dis"];
            $sql ="UPDATE cagy set name='$cname',dis='$dis' where id='$id'";
			$check1=mysqli_query($con,$sql);
            if($check1)
            {?>
                <script>
                    alert("Successfully Data Inerst... ");
                </script>
                <?php
            }
            else
            {?>
                <script>
                    alert("Not Data Inerst ");
                </script>
                <?php
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