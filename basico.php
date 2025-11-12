<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP basico🐘</title>
     <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">

</head>
<body>
    <h1>PHP basico🐘</h1>
    <hr>
    <section>
        <h2>Vriables</h2>
        <?php
            $nombre = "Roy jhojan";
            echo "hola $nombre <br>";

            $edad = 21;

            echo $edad;
            $profesor = true;
            echo "Es profesor?". $profesor. "<br>";
            $talla = 1.7;
            echo "talla". "<br>";
            $edad = 21;
            echo $edad;
        ?>
    <hr>
        <h2>Constantes</h2>
        <?php
            define("PI",3.141516);
            echo "Valor de PI: ". PI ."<br>";
        ?>
    </section> <br>
    <section>
            <h2>Operadores Lógicos</h2>

            <h2>Operadores de Asignación</h2>

            <h2>Operadores Aritmeticos</h2>

            <h2>Operadores incremento y decremento</h2>
            
            <h2>Operadores</h2>
        </section>
    <hr>
    <section>
        <h2>Control de flujo</h2>
        <?php
        // Hora de salida (formato 24 horas)
        //setear hora horario
        date_default_timezone_set("America/Lima");
        $hora = date('H:i');
        // Obtener la hora actual en formato HH:MM
        $hora_actual = date("10:15");        
        // Comparar las horas
        if ($hora < $hora_actual) {
            echo "Ya es salida";
        } else {
            echo "Estamos en clase";
        }
        ?>
        <h3>IF ELSEIF ELSE</h3>
        <h3>SWITHc</h3>
        <h2>Bucles</h2>
        <h3>For</h3>
        <h3>While</h3>
        <h3>FOR-EACH</h3>
        <section>
            <h2></h2>
        </section>
        <section>
            <h2>Operadores Lógicos</h2>

            <h2>Operadores de Asignación</h2>

            <h2>Operadores Aritmeticos</h2>

            <h2>Operadores incremento y decremento</h2>
            
            <h2>Operadores</h2>
        </section>

    </section>
</body>
</html>