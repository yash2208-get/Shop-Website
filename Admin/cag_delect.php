<?php
	require_once "cont.php";
$id=$_REQUEST["id"]; 
$query="Delete from cagy where id= '" . $id ."'";
$check1=mysqli_query($con,$query);
if($check1)
            {?>
                <script>
                    alert("Successfully Delete... ");
                </script>
                <?php
                header("Location:cag.php");
            }
            else
            {?>
                <script>
                    alert("Not Delete! ");
                </script>
                <?php
            }
?>