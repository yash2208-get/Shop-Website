<?php
  require "cont.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="cont.css">
</head>
<body>
<?php
          	if (isset($_POST["b1"])) 
            {
				$user=$_POST['user'];
				$mail=$_POST['email'];
				$phone=$_POST['phone'];
				$meg=$_POST['meg'];
				$sql = "INSERT INTO cont (name,email,cont,meg) VALUES ( '$user', '$mail', '$phone','$meg')";
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
?>
    <div class="topnav" id="myTopnav">
        <a href="index.php" class="active">Home</a>
        <a href="prod.php">Product</a>
        <a href="#">Contact</a>
        
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        <a href="" class="user"><i class="fa fa-user"></i></a>
        </a>
      </div>
    <section class="main-header2 pt-5">
        <div class="text-center">
            <h1 class=" text-capitalize display-4">contact form</h1>
            <hr class="w-25 mx-auto">
        </div>
        <div class="container">
          <div class="row gy-2 my-5">
              <div class="col-md-8 col-10 col-xxl-8 mx-auto">
                <form method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="user" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your name with anyone else.</div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contact Number</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>
				  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Message</label>
                    
					<textarea name="meg" class="form-control"   cols="98" rows="4" required></textarea>
					<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>
                  
                  
                  <button type="submit" name="b1" class="btn btn-primary">Submit</button>
                </form>

                </div>
                </div>
                </div>
                </section>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1160.7951441372832!2d74.63418195159338!3d26.4175842956993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396be1ce25aa2d69%3A0xd7cdec70ff54811e!2sDaily%20needs%20general%20store%20subhash%20nagar!5e0!3m2!1sen!2sin!4v1640249931162!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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