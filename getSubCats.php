<?php
$serverBD = "localhost";
$db_name = "m6"; 
$db_user = "root";
$db_pwd = "system";

$conn = mysqli_connect($serverBD, $db_user, $db_pwd, $db_name);

if (mysqli_ping($conn)) {
    $cat = $_POST["cat"];
    $sql = "SELECT * FROM subcategories where id_cat = $cat";

    $query = mysqli_query($conn, $sql);

    $object = new stdClass();

    $return = array();
    while ($row = $query->fetch_assoc()) {
        $object = new stdClass();
        $object->id = $row["id"];
        $object->nom = $row["nom"];
    
        array_push($return, $object);
    }

    echo json_encode($return);
    mysqli_close($conn);
}