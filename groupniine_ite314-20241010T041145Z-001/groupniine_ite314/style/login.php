<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <link rel="website icon" type="png" href="login.png">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="design.css">
    </head>
    <body>

        <div class="container">
            <div class="box form-box">

            <?php 
            
            include('C:\xampp2\htdocs\groupniine_ite314\php\config.php');
            if(isset($_POST['submit'])){
                $Email= mysqli_real_escape_string($con,$_POST['Email']);
                $password = mysqli_real_escape_string($con,$_POST['Password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email = '$Email' AND Password='$Password'") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                }
                else{
                    echo "<div class='message'>
                    <p>Wrong Email or Password!</p>
                    </div> <br>";
                    echo "<a href='login.php><button class='btn'>Go Back</button>";
                }

                if(isset($_SESSION['valid'])){
                    header("Location: homepage.php");                   
                }
            }else{
            
            ?>
                <header>Login</header>
                <form action="" method="post">

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Sign-in" required>
                    </div>

                    <div class="links">
                        Doesn't have an account yet? <a href="signup.php">Sign-up Now</a>
                    </div>

                </form>
            </div>

            <?php } ?>
        </div>

    </body>
</html>