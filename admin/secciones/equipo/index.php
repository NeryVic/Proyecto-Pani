<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    // Borrar registros
    $txtID=(isset ($_GET['txtID']) )? $_GET['txtID']:"";
    
    // Obtener nombre de la imagen para eliminarla
    $sentencia = $conexion->prepare("SELECT imagen FROM tbl_equipo WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $nombre_archivo_imagen2  =  $sentencia->fetch(PDO::FETCH_LAZY);
    
    // Verificar si la imagen existe y eliminarla
    if(isset($nombre_archivo_imagen2["imagen"])){
       // $ruta_imagen = "../../../assets/img/team/".$registro_imagen["imagen"];
        if(file_exists("../../../assets/img/team/".$nombre_archivo_imagen2["imagen"])){
            unlink("../../../assets/img/team/".$nombre_archivo_imagen2["imagen"]);
        }
    }
    // Eliminar el registro de la base de datos 
    $sentencia = $conexion->prepare("DELETE FROM tbl_equipo WHERE `tbl_equipo`.`ID`=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
}


//Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_equipo`");
$sentencia-> execute();
$lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);



include("../../templates/header.php");?>

<div class="card">
    <div class="card-header"><a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
        >Agregar registro</a></div>
    <div class="card-body">
    <div
        class="table-responsive-sm"
    >
        <table
            class="table"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Redes sociales</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($lista_equipo as $registro){ ?>    
            <tr class="">
                    <td><?php echo $registro['ID']; ?></td>
                    <td><img width="50" height="50" src="../../../assets/img/team/<?php echo $registro['imagen']; ?>" alt="Imagen del team"></td>
                    <td><?php echo $registro['nombrecompleto'];?></td>
                    <td><?php echo $registro['puesto']; ?></td>
                    <td>
                    <?php echo $registro['twitter']; ?>
                    <br><?php echo $registro['facebook']; ?></br>
                    <?php echo $registro['linkedin']; ?>
                    </td>
                    <td>
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