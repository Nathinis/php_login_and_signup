<?php
session_start();
include ("db_conn.php");
include ("functions.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        $email = validate($_POST['email']);
        $password = validate($_POST['password']);

        if (empty($email)) {
            header("Location: reference.php?error=User Name is required");
            exit();
        }else if(empty($password)){
            header("Location: reference.php?error=Password is required");
            exit();
        }else{
            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) === 1) {
                $user_data = mysqli_fetch_assoc($result);
                        if($user_data['password'] === $password)
                        {
                            $_SESSION['user_id'] = $user_data['user_id'];
                            header("Location: home.php?success=You are now logged in");
                            exit();
                        }else{
                            header("Location: reference.php?error=Incorect User name or password");
                            exit();
                }
            }else{
                header("Location: reference.php?error=Incorect User name or password");
                exit();
            }
        }
        
    }else{
        header("Location: reference.php");
        exit();
    }
?>
