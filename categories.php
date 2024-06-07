<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
//settings per connectar amb la bbdd
$serverBD = "localhost";
$db_name = "m6"; 
$db_user = "root";
$db_pwd = "system";

//crear la connexió
$conn = mysqli_connect($serverBD, $db_user, $db_pwd, $db_name);

if (mysqli_ping($conn)) {
    $cat = 1;
    $sql = "SELECT * FROM subcategories where id_cat = $cat"; //crear la consulta sql

    //fer la consulta
    $query = mysqli_query($conn, $sql);

    $object = new stdClass();
    $rows = mysqli_fetch_all($query);
    echo $rows;

    $return = array();
    foreach ($rows as $row) {
        $object->nom = $row["nom"];
        $object->id = $row["id"];
        array_push($return, $object);
    }

    //tancar la connexió
    mysqli_close($conn);
}
?>
</body>
</html>