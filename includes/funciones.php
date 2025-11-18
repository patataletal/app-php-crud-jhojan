<?php 

function obtenerCategoria($pdo){
    $stmt = $pdo->query("SELECT * FROM CATEGORIAS");
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}

function obtenerMarca($pdo){
    $stmt = $pdo->query("SELECT * FROM MARCAS");
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}

function obtenetIdUsuario($pdo){
    $stmt = $pdo->query("SELECT * FROM USUARIOS");
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}

?>