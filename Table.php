<!DOCTYPE html>
<html>

<body>

    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "test26";
    $connId = mysqli_connect($server, $username, $password) or die("Cannot connect to server");
    $sql = "CREATE DATABASE test26";

    $selectDB = mysqli_select_db($connId, $database) or die("Cannot connect to database");

    $result = "CREATE TABLE track(
    `ip` varchar(20) NOT NULL default '' PRIMARY KEY,
    `ref` varchar(250) NOT NULL default '',
    `agent` varchar(250) NOT NULL default '',
    `domain` varchar(20) NOT NULL default '',
    `brojPosjeta` INTEGER default 0,
    `vrijemeNaStranici` FLOAT default 0
    )";
    echo '<p>' .  $result;
    mysqli_query($connId, $result);
   
    $ref = $_SERVER['HTTP_REFERER'];
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    echo $host_name;
    $strSQL = "INSERT INTO track(ref, agent, ip, domain) VALUES('$ref','$agent','$ip', '$host_name')";
    echo '<p>' . $strSQL;
    $test = mysqli_query($connId, $strSQL);
    
   
    function brojPosjeta($baza, $tablica, $ip) {
        $upit = "UPDATE $tablica SET brojPosjeta = brojPosjeta + 1 WHERE ip = '$ip'";
        echo '<p>' . $upit;
        mysqli_query($baza, $upit);
    }

   
    function dodajVrijemeNaStranici($baza, $tablica, $ip){
        $vrijeme = getTime();
        echo '<p>' . $vrijeme;
        $upit = "UPDATE $tablica SET vrijemeNaStranici = (vrijemeNaStranici + $vrijeme) / 1000 WHERE ip = '$ip'";
        echo '<p>' . $upit;
        mysqli_query($baza, $upit);
    }

    function getTime(){
        if(file_exists('vrijeme.txt')){
            $a = file_get_contents("vrijeme.txt");
            echo '<p>' . $a;
            return $a;
        } else {
            return 0;
        }
    }
    
    brojPosjeta($connId, "track", $ip);
    dodajVrijemeNaStranici($connId, "track", $ip);

    ?>

</body>

</html>