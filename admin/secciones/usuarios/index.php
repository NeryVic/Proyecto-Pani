<?php 
include("../../bd.php");

// Borrar registros
if (isset($_GET['txtID'])) {
    $txtID = $_GET['txtID'];
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        $sentencia = $conexion->prepare("DELETE FROM tbl_usuarios WHERE ID = :ID");
        $sentencia->bindParam(":ID", $txtID);
        $sentencia->execute();
        echo "<script>alert('Registro eliminado con éxito.');</script>";
    } else {
        echo "<script>
            if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
                window.location.href = 'index.php?txtID=$txtID&confirm=yes';
            }
        </script>";
    }
}


// Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM tbl_usuarios");
$sentencia->execute();
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">

    <div class="card-header"><a href="crear.php" class="btn btn-primary" role="button">Agregar registro</a></div>
    <div class="card-body">
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_usuarios as $registro) { ?>
                <tr class="">
                    <td scope="row"><?php echo $registro['usuario']; ?></td>
                    <td><?php echo $registro['correo']; ?></td>
                    <td><?php echo str_repeat("*", strlen($registro['password'])); ?></td>
                    <td scope="col">
                        <a href="editar.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-info" role="button">Editar</a>
                        <a href="index.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-danger" role="button">Eliminar</a>
                        
                    </td>




                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>
