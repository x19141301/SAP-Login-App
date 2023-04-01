<!-- 
   Name: John Crawley
   Student No: x19141301
   Student Email: x19141301@student.ncirl.ie
   -->
   <?php
    require('db/connection.php');
    ?>
   <!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link href="assets/css/main.css" type="text/css" rel="stylesheet" >
      <title>Register</title>
   </head>
   <body>
   <!-- Container-->
      <div class="container-fluid">
    <?php
    require('db/connection.php');
   // When form submitted, insert values into the database.
if (isset($_REQUEST['username']) && isset($_REQUEST['password']) ) 
{
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    // Check if the username already exists in the database
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();
    // Display that the username is taken already
    if ($user) 
    {
        echo "<div class='alert alert-danger' role='alert'>
        Username already taken!.
      </div>";
      ?>
  <div class="row">
            <div class="col-lg-12">
               <form action="register.php" method="POST" class="form border rounded p-4">
                  <h1 class="text-center mb-6">Register</h1>
                  <!-- Username and password fields to create account-->
                  <div class="mb-6">
                     <input placeholder="username" name="username" type="text" class="form-control" id="username" required>
                  </div>
                  <div class="mb-6">
                     <input placeholder="password" name="password" type="password" class="form-control" id="password" required>
                  </div>
                  <!-- Register button and login link -->
                  <button name="submit" type="submit" class="btn btn-primary">Register</button>
                  <a class="login-link" href="index.php">Login</a>
                </form>
            </div>
         </div>
<?php
    } 
    else 
    {
        // Insert the new user into the database
        $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        $stmt->execute(['username' => $username, 'password' => $password]);
        echo "<div class='alert alert-success' role='alert'>
        Account Created Succesfully!. <a href='index.php'>Login</a>
      </div>";
    }
} 
else
{
    // Handle form not submitted
?>
         <div class="row">
            <div class="col-lg-12">
               <form action="register.php" method="POST" class="form border rounded p-4">
                  <h1 class="text-center mb-6">Register</h1>
                  <!-- Username and password fields to create account-->
                  <div class="mb-6">
                     <input placeholder="username" name="username" type="text" class="form-control" id="username" required>
                  </div>
                  <div class="mb-6">
                     <input placeholder="password" name="password" type="password" class="form-control" id="password" required>
                  </div>
                  <!-- Register button and login link -->
                  <button name="submit" type="submit" class="btn btn-primary">Register</button>
                  <a class="login-link" href="index.php">Login</a>
                </form>
            </div>
         </div>
         <?php
            }
         ?>
         <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-bctGuxpvYohd/GTjmT2TnTExCEGWd2fYYIhAT9tWZc8FcdA3Y3tnqfgvJmtwTZj8"
            crossorigin="anonymous"></script>
      </div>
   </body>
</html>