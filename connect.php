<?php
    //the ip of the database (localhost for testing)
    $host="localhost";
    //the username for accessing the database
    $user="root";
    //the password for accessing the database
    $password="";
    //the mysqli connection variable, including the ip, username, password and the database name.
    $con=mysqli_connect($host,$user,$password,'deskbooking');
    //if statement for testing if the cliet has connected
    if(!$con) {
        //prints an error if not connected
        echo "A connection to the database cannot be found";
    }
?>