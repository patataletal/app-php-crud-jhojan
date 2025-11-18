<?php
session_start();
require 'config/db.php';
include 'includes/header.php';

//var_dump($productos);   

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $correo = $_POST["correo"];
    $password = $_POST["password"];
    //var_dump($correo,$password);
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if($usuario && $password == $usuario['contraseña']){

        $_SESSION ['id_usuario'] = $usuario['id_usuario'] ; 
        $_SESSION ['Nombre'] = $usuario['nombre'] ;
        $_SESSION ['Rol'] = $usuario['rool'];

        header('location: index.php');

        echo("Exelente Ingresaste con Exito 😎");
    }else{
        echo "Usuario o Contraseña Incorrecto weee Corrige Credenciales🤦‍♂️";
    }

}

?>

<!-- CONTENEDOR CENTRADO -->
<div style="display:flex; justify-content:center; align-items:center; flex-direction:column; min-height:70vh;">

    <h1 style="text-align:center; margin-bottom:20px;">Login</h1>

    <!-- FORMULARIO CENTRADO DENTRO DE UN DIV -->
    <div style="width:350px; padding:20px; border:1px solid #ccc; border-radius:10px;">

        <form method="POST">
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-outline-dark w-100">Ingresar</button>
        </form>

    </div>

</div>

<?php  include 'includes/footer.php'; ?>