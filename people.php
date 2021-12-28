<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
        <title>Put people in a house</title>
    </head>
        <body>
            <div class="background-image"></div>

                <div class="background-text">
                    <h1>
                        Put people in a house
                    </h1>
                    </br> </br>
                    <div>

                    <?php
                        include "db/index.php";

                        $conn = connectionWithDatabase();
                        $id = $_GET["id"];
                        if ($id == "") {
                            $id = 1;
                        }

                        $sql = "SELECT firstname, lastname, gender, birthdate FROM users where id=$id";

                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "</br>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "</br>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "</br>";
                                        echo "<td>" . $row['birthdate'] . "</td>";
                                    echo "</tr>";
                                }
                                mysqli_free_result($result);
                            } else{
                                echo "That is it. You rated them all!";
                            } 
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                        
                        echo "</br>";

                        $getsql = "select * from houses where id_user = $id";
                        
                        if($result2 = mysqli_query($conn, $getsql)){
                            if(mysqli_num_rows($result2) > 0){
                            while($row2 = mysqli_fetch_array($result2)){
                            
                            echo "<tr>"; 
                            echo "<br>";
                            echo "<td> gryffindor " . $row2['votes_gryffindor'] . "</td>"; 
                            echo "</br>";
                            echo "<td> slytherin " . $row2['votes_slytherin'] . "</td>";
                            echo "</br>";
                            echo "<td> ravenclaw " . $row2['votes_ravenclaw'] . "</td>";
                            echo "</br>";
                            echo "<td> hufflepuff " . $row2['votes_hufflepuff'] . "</td>";
                            echo "</tr>";
                            
                            $gryffindor=$row2['votes_gryffindor'];
                            $slytherin=$row2['votes_slytherin'];
                            $ravenclaw=$row2['votes_ravenclaw'];
                            $hufflepuff=$row2['votes_hufflepuff'];

                            }
                            mysqli_free_result($result2);
                            } else{
                             echo "No records matching your query were found.";
                            }
                            } else{
                                echo "ERROR: Could not able to execute $getsql. " . mysqli_error($conn);
                            }


                            if($_GET["vote"]=="gryffindor") {
                                insertQuery($conn,"update houses set votes_gryffindor=$gryffindor +1 where id_house=$id");
                            }
                        
                            elseif($_GET["vote"]=="slytherin") {
                                insertQuery($conn,"update houses set votes_slytherin=$slytherin +1 where id_house=$id");
                            }
                        
                            elseif($_GET["vote"]=="ravenclaw") {
                                insertQuery($conn,"update houses set votes_ravenclaw=$ravenclaw +1 where id_house=$id");
                            }
                        
                            elseif($_GET["vote"]=="hufflepuff") {
                                insertQuery($conn,"update houses set votes_hufflepuff=$hufflepuff +1 where id_house=$id");
                            }

                        mysqli_close($conn);
                        ?>
                    </div>

                  
                    <div>
                        <form method="GET" action="people.php?id= test<?php $id; ?>">
                   
                        <button class="button2" name="votes_gryffindor" id="votes_gryffindor">
                            Gryffindor
                        </button>  
              
                        <button class="button2" name="votes_slytherin" id="votes_slytherin">
                            Slytherin
                        </button>
                   
                        <button class="button2" name="votes_ravenclaw" id="votes_ravenclaw">  
                                Ravenclaw
                        </button>
                        
                        <button class="button2" name="votes_hufflepuff" id="votes_hufflepuff">
                                Hufflepuff
                        </button>
                    </div>
                    </br>
                    </br>
                    <div>
                    <form method="GET" action="people.php">
                    <input type="hidden" name="id" value="<?php echo $id+1; ?>">
                    <button class="button">
                        Go to the next person
                    </button>
                    </form>
                    </div>
                </div>
        </body>
</html>
