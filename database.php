<?php

//ENTER YOUR DATABASE CONNECTION INFO BELOW:
$hostname="db722400680.db.1and1.com";
$database="db722400680";
$username="dbo722400680";
$password="dob281085";

//DO NOT EDIT BELOW THIS LINE
$link = mysql_connect($hostname, $username, $password);
if (!$link) {
die('Connection failed: ' . mysql_error());
}
else{
     echo "Connection to MySQL server " .$hostname . " successful!
" . PHP_EOL;
}

$db_selected = mysql_select_db($database, $link);
if (!$db_selected) {
    die ('Can\'t select database: ' . mysql_error());
}
else {
    echo 'Database ' . $database . ' successfully selected!';
}

//Perform database query
$fname = $_POST['fname'];
$sname = $_POST['sname'];


//This should retrive HTML form data and insert into database
$query  = "INSERT INTO test(firstname, surname)
          VALUES ('$fname','$sname')";

        $result = mysql_query($link, $query);
        //Test if there was a query error
        if ($result) {
            //SUCCESS
        header('Location: index.html');
        } else {
            //FAILURE
            die("Database query failed. " . mysql_error($link));
            //last bit is for me, delete when done
        }

mysql_close($link);

?>
