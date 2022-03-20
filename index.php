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
  </div>
    <section class="setion">
      
        
        <!--<svg class="waver" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,288L24,293.3C48,299,96,309,144,282.7C192,256,240,192,288,170.7C336,149,384,171,432,192C480,213,528,235,576,229.3C624,224,672,192,720,160C768,128,816,96,864,96C912,96,960,128,1008,170.7C1056,213,1104,267,1152,266.7C1200,267,1248,213,1296,186.7C1344,160,1392,160,1416,160L1440,160L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path></svg>-->
        <svg class="waver" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,192L120,213.3C240,235,480,277,720,277.3C960,277,1200,235,1320,213.3L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>



    <section class="main-header2 ">
        <div class="text-center">
            <h1 class=" text-capitalize display-4">Shop Image</h1>
            <hr class="w-25 mx-auto">
        </div>
        <div class="container">
          <div class="row gy-2 my-5">
              <div class="col-md-4 col-10 col-xxl-4 mx-auto">
                <figure>
                  <img src="img/1.jpg" class="img-fluid" alt="...">
                </figure>
              </div>
              <div class="col-md-4 col-10 col-xxl-4 mx-auto">
                <figure>
                  <img src="img/3.jpg" class="img-fluid" alt="...">
                </figure>
              </div>
              <div class="col-md-4 col-10 col-xxl-4 mx-auto ">
                <figure>
                  <img src="img/4.jpg" class="img-fluid " alt="...">
                </figure>
              </div>

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
  </div>













  <div class="footer">
    <p>Footer</p>
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