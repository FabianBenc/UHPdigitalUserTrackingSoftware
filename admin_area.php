<!DOCTYPE html>
<html>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 15px;
}
</style>

<body>
    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "test26";

    $connId = mysqli_connect($server, $username, $password) or die("Cannot connect to server");

    $selectDB = mysqli_select_db($connId, $database) or die("Cannot connect to database");

    $upit = "SELECT * FROM track";

    $rj = mysqli_query($connId, $upit);

    $tablica = '<table>' .
    '<tr>'. 
        '<th>Ip</th>'.
        '<th>Ref</th>'.
        '<th>Agent</th>'.
        '<th>Domain</th>'.
        '<th>Broj posjeta</th>'.
        '<th>Vrijeme na stranici</th>'.
    '</tr>';

    while($row = mysqli_fetch_assoc($rj)){
        $tablica .= '<tr>'. 
        '<td>'. $row['ip'] .'</td>'.
        '<td>'. $row['ref'] .'</td>'.
        '<td>'. $row['agent'] .'</td>'.
        '<td>'. $row['domain'] .'</td>'.
        '<td>'. $row['brojPosjeta'] .'</td>'.
        '<td>'. $row['vrijemeNaStranici'] .'</td>'.
    '</tr>';
    }

    $tablica .= '</table>';

    echo $tablica;
    ?>

</body>

</html>