<?php
require 'config/db.php';
include 'includes/header.php';


$stmt = $pdo->query("SELECT 
        p.id_producto,
        p.nombre,
        p.descripcion,
        p.precio,
        p.stock,
        m.nombre AS nombre_marca,
        c.nombre AS nombre_categoria
    FROM productos p
    LEFT JOIN marcas m ON p.id_marca = m.id_marca
    LEFT JOIN categorias c ON p.id_categoria = c.id_categoria");
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
      <th scope="col">Marca</th>
      <th scope="col">Categoria</th>
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
        <td><?= $item["nombre_marca"] ?></td>
        <td><?= $item["nombre_categoria"] ?></td>
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