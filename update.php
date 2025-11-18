<?php
require 'config/db.php';
require 'includes/funciones.php';
include 'includes/header.php';

$marcas = obtenerMarca($pdo);
$categorias = obtenerCategoria($pdo);

$id_producto = $_GET['id_producto'];
$stmt = $pdo->prepare("select * from productos where id_producto = ?");
$stmt->execute([$id_producto]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

//var_dump($producto);



if ($_SERVER["REQUEST_METHOD"] === 'POST') {


    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $stock = $_POST["stock"];
    $marca = $_POST["marca"];
    $categoria = $_POST["categoria"];


    try {
        $stmt = $pdo->prepare("UPDATE productos  SET nombre = ?, precio = ?, descripcion = ?, stock = ?, id_categoria = ?, id_marca = ? WHERE id_producto = ?");
        $stmt->execute([$nombre, $precio, $descripcion, $stock, $categoria, $marca, $producto['id_producto']]);

        echo "
    <script>
  Swal.fire({
    title: 'Producto Editado',
    text: 'Producto Actualizado correctamente',
    icon: 'success'
  }).then(()=>window.location='index.php');
</script>
    
    ";
    } catch (PDOException $e) {

        $error = addslashes($e->getMessage());
        echo "
    <script>
  Swal.fire({
    title: 'Error al editar',
    text: '$error',
    icon: 'error'
  });
</script>
    ";
    }

    //header("Location:index.php");
    exit;
    //echo
    //var_dump
    //die
    //dd
    //var_dump($nombre, $precio, $descripcion, $stock);
}

?>
<h1>Actualizar Producto 🖋️</h1>
<form method="POST">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $producto['nombre'] ?>">
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="text" class="form-control" id="precio" name="precio" value="<?= $producto['precio'] ?>">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $producto['descripcion'] ?>">
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="text" class="form-control" id="stock" name="stock" value="<?= $producto['stock'] ?>">
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

    <button type="submit" class="btn btn-outline-dark">Actualizar </button>
</form>

<?php
include 'includes/footer.php'
?>