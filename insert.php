<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
        <title>InsertPage</title>
    </head>
    <body>
        <div class="background-image"></div>
            <div class="background-text"> 
                
            <?php

            // Take all 4 values
            $firstname = $_REQUEST['firstname'];
            $lastname = $_REQUEST['lastname'];
            $gender = $_REQUEST['gender'];
            $birthdate = $_REQUEST['birthdate'];
            
          
            include "db/index.php";

            $conn = connectionWithDatabase();

            // insert into database
            $sql = "INSERT INTO `users`(`id`, `firstname`, `lastname`, `gender`, `birthdate`) VALUES (' ','$firstname','$lastname','$gender','$birthdate')";

            $sql2 = "declare id_user int default 0; 
                 select id into id_user from users order by id desc limit 1; 
                 insert into houses (id_user) values (id_user);";

            mysqli_query($conn, $sql2);

            if(mysqli_query($conn, $sql)){
                echo "<h3>Your account is successfully created.</h3>";
            } else{
                echo "ERROR $sql. "
                    . mysqli_error($conn);
            }

            // Close connection
           $conn -> close();
            ?>
            
            </br>
            <form method="POST" action="people.php">
                <button class="button">
                    Put people in a house
                </button>
            </form>
            </div>
    </body>
</html>

