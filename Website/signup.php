<?php
session_start();
// Database connection
include ("db_conn.php");
include ("functions.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $id_number = $_POST["id_number"];
        $contact_number = $_POST["contact_number"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confpass = $_POST["password"];
        $gender = $_POST["gender"];

        $contains_uppercase = preg_match('/[A-Z]/', $password); 
        $contains_lowercase = preg_match('/[a-z]/', $password);
        $contains_number = preg_match('/\d/', $password); 
        $contains_special = preg_match('/[^a-zA-Z0-9]/', $password); 


    


        // Insert data into database
        if(!empty($id_number) && is_numeric($id_number) && strlen($id_number) == 13){
            if(strlen($contact_number) == 10 && is_numeric($contact_number)){
                if ($contains_uppercase && $contains_lowercase && $contains_number && $contains_special) {
                    if($password == $confpass){

                        $user_id = $email;
                        $query = "INSERT INTO users (first_name, last_name, id_number, contact_number, email, password, gender) VALUES ('$first_name', '$last_name', '$id_number', '$contact_number', '$email', '$password' ,'$gender')";

                        mysqli_query($conn, $query);

                        header("Location: login.php? success=Your account has been created successfully");
                        exit();
                    }else{
                        echo "Passwords do not match";
                        header("Location: signup.php?");
                        exit();
                    }
                } else {
                    echo "Invalid input! Please enter a string containing at least one uppercase letter, one lowercase letter, one number, and one special character.";
                    header("Location: signup.php?");
                    exit();
                }
            }else{
                echo "Please provide a valid Contact Number, length must be 10 and be numeric";
                header("Location: signup.php?");
                exit();
            }
        }else{
            echo "error=Please provide a valid ID Number, length must be 13 and be numeric";

            header("Location: signup.php?");
            exit();            
        }
               
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <form action="signup.php" method="post">
        <div class="title" , style="color: black;">S³ TECH</div>
        <center>
            <div class="container">
                <div class="imgcontainer">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjQn7_YXx2O64Sfe9XcAkRcba_oHvYI77jTA" alt="Avatar" class="Avatar">
                </div>
                <div class="register_customer_details">
                    <div class="input-box">
                        <label for="first_name"><b>First Name :</b></label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter Your First Name"><br><br>
                        <label for="last_name">Last Name :</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter Your Last Name"><br><br>
                        <label for="id_number">ID Number* :</label>
                        <input type="number" id="id_number" name="id_number" placeholder="Enter Your ID Number" required><br><br>
                        <label for="contact_number">Contact Number :</label>
                        <input type="number" id="contact_number" name="contact_number" placeholder="Enter Your Contact Number" ><br><br>
                        <label for="email">Email* :</label>
                        <input type="email" id="email" name="email" placeholder="Enter Your Email address" required><br><br>
                        <label for="password">Password* :</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your password" required><br><br>
                        <label for="password">Confirm Password* :</label>
                        <input type="password" id="confpass" name="confpass" placeholder="Confirm Your password" required><br><br>
                    </div>
                    <div class="gender">
                        <label for='gender'><b>Gender : </b></label>
                        <input type='radio' name='gender' value='male'>
                        <label><b>Male</b></label>
                        <input type='radio' name='gender' value='female'>
                        <label><b>Female</b></label><br>
                    </div>
                <button class="submit" type="submit"><b>Signup</b></button>
                <br> Already have an Account? <a href="login.php"> login </a>
            
        </div>
        </div>

    </form>
</body>

</html>