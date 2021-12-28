<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
        <title>Registration</title>
    </head>
        <body>
        <div class="background-image"></div>
            <form action="insert.php" method="POST">
                <div class="background-text">  
                    
                    <div class="input-group">
                        <h1>Add people</h1>
                    </div>
                    </br> 
                    <div class="input-group">
                    <label for="firstname"> Firstname: </label>
                    </br>   
                    <input type="text" name="firstname" id="firstname" required>
                    <br><br>
                    </div>
                    <div class="input-group">
                    <label for="lastname"> Lastname: </label>
                    </br>
                    <input type="text" name="lastname" id="lastname" required>                   
                    </div>
                    </br>
                    <div style="display: flex;">
                    <label for="gender" id="gender"> Gender: </label>
                    </div>
                    </br>           
                    <div class="gender">
                    <input type="radio" name="gender" value="male" id="male"> 
                    <label for="male">Male</label>
                    <input type="radio" name="gender" value="female" id="female"> 
                    <label for="female">Female</label>
                    <input type="radio" name="gender" value="other" id="other"> 
                    <label for="other">Other</label>
                    </div>
                    <div class="input-group">
                    <label for="birthdate"> Birthdate: </label> 
                    <br>
                    <input type="date" id="birthdate" name="birthdate" required>
                    </div>
                    <div>
                    <?php
                
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $gender = $_POST['gender'];
                    $birthdate = $_POST['birthdate'];
                    
                    if(empty($firstname) && empty($lastname) && empty($gender) && empty($birthdate)) {
                        echo "All fields required"; 
                    } 
                    ?>
                    </div>
                    <div class="input-group">
                    <button type="submit" class="button" name="button"> Add people </button>
                    </div> 
                    
                  
                </form>
        </body>
</html>
