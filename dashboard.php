<!-- 
   Name: John Crawley
   Student No: x19141301
   Student Email: x19141301@student.ncirl.ie
   -->
   <?php

session_start();

if (!isset($_SESSION['username'])) 
{
  header('location: index.php');
  exit;
}
?>
   <!doctype html>
<html lang="en">
   <head>
      <title>Welcome <?php echo $_SESSION['username'] ?></title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link href="assets/css/main.css" type="text/css" rel="stylesheet" >
      <title><i class="fa fa-dashboard" aria-hidden="true"></i></title>
   </head>
   <body>
      <!-- Container -->
      <div class="container-fluid">
      <header class="header fixed-top">
        <a class="logout-link" href="logout.php">logout</a>
     </header>



        <div class="content-area row">
            <div class="col-lg-12">
                <p class="welcome-message text-center">Welcome <?php echo $_SESSION['username'] ?></p>
            </div>
        </div> 


         <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-bctGuxpvYohd/GTjmT2TnTExCEGWd2fYYIhAT9tWZc8FcdA3Y3tnqfgvJmtwTZj8"
            crossorigin="anonymous"></script>
      </div>
   </body>
</html>