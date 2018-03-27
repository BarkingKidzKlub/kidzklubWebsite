<?php // Create a database connection.
$dbhost = "db722400680.db.1and1.com";
$dbuser = "dbo722400680";
$dbpass = "dob281085";
$dbname = "db722400680";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//Test if connection occurred.
if (mysqli_connect_errno()) {
die("Database connection failed: " .
mysqli_connect_error() .
" (" . mysqli_connect_errno() . ")"
);
}

//Perform database query
$fname = $_POST["fname"];
$sname =  $_POST["sname"];

//This function will clean the data and add slashes.
// Since I'm using the newer MySQL v. 5.7.14 I have to addslashes
$fname = mysqli_real_escape_string($connection, $fname);
$sname = mysqli_real_escape_string($connection, $sname);

//This should retrive HTML form data and insert into database
$query  = "INSERT INTO test(firstname, surname) VALUES ('$fname','$sname')";


        $result = mysqli_query($connection, $query);
        //Test if there was a query error
        if ($result) {
            //SUCCESS
        header('Location: index.html');
        } else {
            //FAILURE
            die("Database query failed. " . mysqli_error($connection));
            //last bit is for me, delete when done
        }

mysqli_close($connection);
?>
