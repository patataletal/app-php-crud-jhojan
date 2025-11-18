<?php
session_start();
require 'config/db.php';
include 'includes/header.php';
require 'includes/funciones.php';


$marcas = obtenerMarca($pdo);
$categorias = obtenerCategoria($pdo);

//var_dump($marcas, $categorias);
//var_dump($_SESSION);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

  $nombre = $_POST["nombre"];
  $precio = $_POST["precio"];
  $descripcion = $_POST["descripcion"];
  $stock = $_POST["stock"];
  $marca = $_POST["marca"];
  $categoria = $_POST["categoria"];
  $creado_por = $_SESSION['id_usuario'] ?? null;



  try {
    $stmt = $pdo->prepare("INSERT INTO productos (nombre, precio, descripcion, stock, id_marca, id_categoria, creado_por)VALUES(?,?,?,?,?,?,?)");
    $stmt->execute([$nombre, $precio, $descripcion, $stock, $marca, $categoria,$creado_por]);

    echo "
    <script>
  Swal.fire({
    title: 'Producto Guardado',
    text: 'Producto Registrado correctamente',
    icon: 'success'
  }).then(()=>window.location='index.php');
</script>
    
    ";
  } catch (PDOException $e) {

    $error = addslashes($e->getMessage());
    echo "
    <script>
  Swal.fire({
    title: 'Error al guardar',
    text: '$error',
    icon: 'error'
  });
</script>
    ";
  }

  //header("Location:index.php");
  //exit;
  //echo
  //var_dump
  //die
  //dd
  //var_dump($nombre, $precio, $descripcion, $stock);
}

?>
<h1>Agregar Nuevo Producto ➕</h1>
<form method="POST">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>
  <div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="text" class="form-control" id="precio" name="precio">
  </div>
  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion">
  </div>
  <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="text" class="form-control" id="stock" name="stock">
  </div>
  

  <div class="mb-3">
    <label for="marca" class="form-label">Marca</label>
    <select class="form-select" aria-label="Default select example" name="marca">
      <option selected>Seleccione una Marca</option>
      <?php foreach ($marcas as $item): ?>
        <option value="<?= $item['id_marca'] ?>"><?= $item['nombre'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="categoria" class="form-label">Categoria</label>
    <select class="form-select" aria-label="Default select example" name="categoria">
      <option selected>Seleccionar Categoria</option>
      <?php foreach ($categorias as $item): ?>
        <option value="<?= $item['id_categoria'] ?>"><?= $item['nombre'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <button type="submit" class="btn btn-outline-dark">Guardar</button>
</form>

<?php
include 'includes/footer.php'
?>