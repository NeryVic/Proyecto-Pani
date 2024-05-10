<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    // Borrar registros
    $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : "";
    
    // Obtener nombre de la imagen para eliminarla
    $sentencia = $conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro_imagen = $sentencia->fetch(PDO::FETCH_ASSOC);
    
    // Verificar si la imagen existe y eliminarla
    if(isset($registro_imagen["imagen"])){
        $ruta_imagen = "../../../assets/img/portafolio/".$registro_imagen["imagen"];
        if(file_exists($ruta_imagen)){
            unlink($ruta_imagen);
        }
    }
    
    // Eliminar el registro de la base de datos
    $sentencia = $conexion->prepare("DELETE FROM tbl_portafolio WHERE `tbl_portafolio`.`ID`=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
}

// Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM tbl_portafolio");
$sentencia->execute();
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a href="crear.php" class="btn btn-primary" role="button">Agregar registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Subtitulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_portafolio as $registro){ ?>
                    <tr>
                        <td><?php echo $registro['ID']; ?></td>
                        <td><?php echo $registro['titulo']; ?></td>
                        <td><?php echo $registro['subtitulo']; ?></td>
                        <td>
                            <img width="50" height="50" src="../../../assets/img/portfolio/<?php echo $registro['imagen']; ?>" alt="Imagen del portafolio">
                        </td>
                        <td><?php echo $registro['descripcion']; ?></td>
                        <td>
                            <a href="editar.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-info" role="button">Editar</a>
                            <a href="index.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-danger" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>
