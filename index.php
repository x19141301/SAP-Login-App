<!-- 
   Name: John Crawley
   Student No: x19141301
   Student Email: x19141301@student.ncirl.ie
   -->
   <?php
session_start();
 include('db/connection.php');
// Define the sanitize function
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// Check if the user submitted the login form
if(isset($_POST['login']))
{
    // Get the username and password from the form data
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    // Function to check if user exists in the users table and returns true/false
    function user_exists($username, $password) 
    {
        global $conn;
        $username = sanitize($username);
        $password = sanitize($password); 
        $result = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
        return (mysqli_num_rows($result) == 1) ? true : false; 
    }
    // if true, send user to the dashboard
    if (user_exists($username, $password) == true)
    {
        echo "true";
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    }
    else
    {
      echo "<div class='alert alert-danger' role='alert'>
      Wrong username and / or password!.
    </div>";
    }
    // Close the database connection
    mysqli_close($conn);
}
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
      <title>Login</title>
   </head>
   <body>
      <!-- Container -->
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <!-- Login form -->
               <form action="" method="POST" name="login" class="form border rounded p-4">
                  <h1 class="text-title text-center mb-6">Login</h1>
                  <!-- Output error if any -->
                  <?php 
                  if (isset($_GET['error'])) 
                  { 
                  ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php 
                  } 
                  ?>
                  <!-- Username and password login fields -->
                  <div class="mb-6">
                     <input placeholder="Username" name="username" type="text" class="form-control" id="username">
                  </div>
                  <div class="mb-6">
                     <input placeholder="password" name="password" type="password" class="form-control" id="password">
                  </div>
                  <!-- Login button / register link -->
                  <button type="submit" name="login" class="btn btn-primary">Login</button>
                  <a class="register-link" href="register.php">Register</a>
                </form>
            </div>
         </div>
         <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-bctGuxpvYohd/GTjmT2TnTExCEGWd2fYYIhAT9tWZc8FcdA3Y3tnqfgvJmtwTZj8"
            crossorigin="anonymous"></script>
      </div>
   </body>
</html>