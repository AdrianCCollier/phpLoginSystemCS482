<?php // open php tag needed to run 

// database connection parameters
$db_host = "localhost";
$db_user = "dbuser";
$db_password = "Iwilldowell";
$db_name = "cs482502";

// php to mysql connection
try {
    // create connection with PDO, enhanced sql security
    $db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);

    // set up database attributes for later troubleshooting
    $db->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} // end try 
catch(PDOEXCEPTION $e){
    // display error messages if try fails
    echo $e->getMessage();
}
