<?php
$db = new mysqli('localhost','root');
if($db->connect_errno){
    echo "error";
}
mysqli_select_db($db,'serie') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'serie':
        $query = "INSERT INTO
            serie
                (nombre_serie ,tipo_serie ,ano_serie ,episodios_serie , coste_serie)
            VALUES
                ('" . $_POST['nombre_serie'] . "',
                 " . $_POST['tipo_serie'] . ",
                 " . $_POST['ano_serie'] . ",
                 '" . $_POST['episodios_serie'] . "',
                 " . $_POST['coste_serie'] .");";
        break;
    case 'tiposerie':
        $query = "INSERT INTO
                tiposerie
                    (tiposerie_label)
                VALUES
                    ('" . $_POST['tiposerie_label'] . "');";
            break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'serie':
        $query = "UPDATE serie SET
                nombre_serie = '" . $_POST['nombre_serie'] . "',
                ano_serie = " . $_POST['ano_serie'] . ",
                episodios_serie = '" . $_POST['episodios_serie'] . "',
                tipo_serie = " . $_POST['tipo_serie'] . ",
                coste_serie = " . $_POST['coste_serie']."
            WHERE
                id_serie = " . $_POST['id_serie'] . ";";
        break;
    case 'tiposerie':
            $query = "UPDATE tiposerie SET
            tiposerie_label = '" . $_POST['tiposerie_label'] . "'
        WHERE
            tiposerie_id = " . $_POST['tiposerie_id'] . ";";
    break;
    }
    break;
}
if (isset($query)) {
    echo $query;
   $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>