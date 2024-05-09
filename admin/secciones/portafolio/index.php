<?php 
include("../../bd.php");
if(isset($_GET['txtID'])){
    //Borrar registros
    $txtID=(isset ($_GET['txtID']) )? $_GET['txtID']:"";
    
    $sentencia = $conexion->prepare("SELECT imagen FROM `tbl_portafolio` WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
    
    if(isset($registro_imagen["imagen"])){
        if(file_exists("../../../assets/img/portfolio/".$registro_imagen["imagen"])){
            unlink("../../../assets/img/portfolio/".$registro_imagen["imagen"]);
        }
    }
    
    
    $sentencia = $conexion->prepare("DELETE FROM `tbl_portafolio` WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
}

//Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia->execute();
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header"></div>
    <a href="crear.php" class="btn btn-primary" role="button">Agregar registro</a>
    <div class="card-body">
<<<<<<< HEAD

    <div
        class="table-responsive-sm"
    >
        <table
            class="table"
        >
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
            <?php foreach($lista_portafoilio as $registros){ ?>
                    
                
                    <tr class="">
                <td scope="col"><?php echo $registros['ID']; ?></td>
                    <td scope="col"><?php echo $registros['titulo']; ?></td>
                    <td scope="col"><?php echo $registros['subtitulo']; ?></td>
                    <td scope="col" <?php echo $registros['imagen']; ?> ></td>
                    <td scope="col"><?php echo $registros['descripcion']; ?></td>
                    <td scope="col"><a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="editar.php?txtID=<?php echo $registros['ID'];?>"
                            role="button"
                            >Editar</a
                        >
                        
                        <a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="index.php?txtID=<?php echo $registros['ID'];?>"
                            role="button"
                            >Eliminar</a
                        >
                    </td>
                </tr>
            
            <?php }?>
=======
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
                        <td><img src="<?php echo $registro['imagen'];?>" alt="Imagen del portafolio"></td>
                        <td><?php echo $registro['descripcion']; ?></td>
                        <td>
                            <a href="editar.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-info" role="button">Editar</a>
                            <a href="eliminar.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-danger" role="button">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
>>>>>>> 4e183b1c23b81cf40b462254a1f90b454452b8c1
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php");?>
