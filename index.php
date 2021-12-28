<?php

function connectionWithDatabase() {
   // connectie met onze database  
$hostname = "ID328527_harrypotter.db.webhosting.be"; 
$user = "ID328527_harrypotter"; 
$password  ="Harrypotter2021"; 
$database = "ID328527_harrypotter"; 
$port = 3306; 


$conn = mysqli_connect($hostname,$user,$password,$database,$port);

// check if connection is maked
if ($conn == false) {
    echo "geen database connectie";
    die();
}
 // return connection 
 return $conn;
}

function getQuery($conn,$query) {
    return mysqli_query($conn, $query)->fetch_all(MYSQLI_ASSOC);
}

function insertQuery($conn, $query) {
    mysqli_query($conn, $query);
}

function closeConnection($conn) {
    $conn -> close();
}

