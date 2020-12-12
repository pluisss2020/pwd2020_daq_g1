<!DOCTYPE html>
<html>
<head>
  <title>Tabla de usuarios</title>
</head>
<body>
<?php
    $Temperatura = rand(0, 50.00);
    $Humedad = rand(0, 50.00);
    $Gases = rand(0, 50.00);
    
    echo '<h6>Temperatura: '.$Temperatura.'° </h6>';
    echo '<h6>Humedad: '.$Humedad.'%</h6>';
    echo '<h6>Gases: '.$Gases.'%</h6>';
    
?>
</body>
</html>
