<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign-up</title>
        <link rel="website icon" type="png" href="add-user.png">
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
                $name = $_POST['Name'];
                $age = $_POST['age'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];

            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

            if(mysqli_num_rows($verify_query) !=0){
                echo "<div class= 'message'>
                    <p> This email is used, try another one, please!</p>
                    </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }

            else{
                mysqli_query($con, "INSERT INTO users(Name,Age,Email,Username,Password) VALUES('$name','$age','$email','$username','$password')") or die ("Error Occured");

                echo "<div class= 'message'>
                <p> You are now registered! </p>
                </div> <br>";
                echo "<a href='login.php'><button class='btn'>Login Now</button>"; 

            }

            }else{

            ?>
                <header>Sign-up</header>
                <form action="" method="post">

                    <div class="field input">
                        <label for="name">Name</label>
                        <input type="text" name="Name" id="name" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Sign-in" required>
                    </div>

                    <div class="links">
                        Already have an account? <a href="login.php">Login Now</a>
                    </div>

                </form>
            </div>
        </div>
        <?php } ?>
    </body>
</html>