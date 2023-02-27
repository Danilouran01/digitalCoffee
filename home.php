 <?php session_start();
if ($_SESSION['usuario']){
   
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>

<style>
    body{
         
      
         background-image: url("images/h.jpg.png");
    
   background-size: cover; 
     /* background-size: 60rem;    */
  background-repeat: no-repeat;
   background-position: center center; 
   background-attachment: fixed; 
   /*color: #ffffff; */

   width:"100";
    height:"100";
   filter:"blur(6px)";
    }
</style>
    <title>home</title>
</head>

<body>
    
    <?php
    require("navar.php");
    ?>
    
     <!-- <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <img src="images/logo.jpg" alt="" height="500"  >
                    </div>
                </div>
            </div>
        </div> -->
    
   
   
</body>

</html>


    
    <?php
}
else{
    header("location:index.php");
}?>
