<?php
require 'config/db.php';
include 'includes/header.php';


$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($productos);   
?>

<h2>Gestión de productos</h2>
<a href="create.php" type="button" class="btn btn-outline-success">El nuevo producto</a>


<table class="table" table-hover>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($productos as $item): ?>
      <tr>
        <th scope="row"><?= $item["id_producto"] ?></th>
        <td><?= $item["nombre"] ?></td>
        <td><?= $item["descripcion"] ?></td>
        <td><?= $item["precio"] ?></td>
        <td><?= $item["stock"] ?></td>
        <td>
          <div style="display: flex;">
            <a href="delete.php?id_producto=<?= $item["id_producto"] ?>" type="button" class="mx-2 btn btn-outline-danger">🗑️</a>
            <a href="update.php?id_producto=<?= $item["id_producto"] ?>" type="button" class="mx-2 btn btn-outline-info">✏️</a>
          </div>
          <a href=""></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- <script>
  Swal.fire({
    title: "Producto Guardado",
    text: "Producto Registrado correctamente",
    icon: "success"
  }).then(()=>window.location='index.php');
</script> -->

<?php
include 'includes/footer.php'
?>