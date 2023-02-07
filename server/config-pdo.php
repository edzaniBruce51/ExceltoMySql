<?Php
    $host_name = "localhost";
    $username = "root";          // Your database user id
    $password = "";          // Your password
    $database = "epfdb"; // Change your database nae

    //////// Do not Edit below /////////
    try {
        $dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
    } catch (PDOException $e) {
        print "<br>Error!: " . $e->getMessage() . "<br/>";
        echo "<br><br><font color=red>
        Check MySQL login details inside <b>config.php</b> file</font>";
        die();
    }
?>