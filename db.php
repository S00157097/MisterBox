<?PHP
    define('dbUser', 'root');
    define('dbPass', '');
    define('dbHost', 'localhost');
    define('dbName', 'MisterBox');

    $dbc = mysqli_connect(dbHost, dbUser, dbPass, dbName);
    if (!$dbc) die("Connection failed: " . mysqli_connect_error());
?>