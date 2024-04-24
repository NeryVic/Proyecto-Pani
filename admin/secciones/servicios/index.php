<?php 
include("../../bd.php");
if(isset($_GET['txtID'])){
//Borrar registros
$txtID=(isset ($_GET['txtID']) )? $_GET['txtID']:"";
$sentencia = $conexion->prepare("SELECT icono FROM tbl_servicios WHERE ID=:ID");
$sentencia->bindParam(":ID", $txtID);
$sentencia->execute();
$registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

if(isset($registro_imagen["icono"])){
    if(file_exists("../../../assets/img/servicios/".$registro_imagen["icono"])){
        unlink("../../../assets/img/servicios/".$registro_imagen["icono"]);
    }
}


$sentencia = $conexion->prepare("DELETE FROM tbl_servicios WHERE ID=:ID");
$sentencia->bindParam(":ID", $txtID);
$sentencia->execute();
}
//Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia-> execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");?>
<div class="card">
    <div class="card-header">
    <a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
        >Agregar registro</a
    ></div>
    
    
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
                        <th scope="col">Icono</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_servicios as $registros){ ?>
                    <tr class="">
                        <td><?php echo $registros['ID']; ?></td>
                        <td>
                            <img width="50" height="50" src="../../../assets/img/servicios/<?php echo $registros['icono']; ?>" alt="...">
                        </td>
                        <td><?php echo $registros['titulo']; ?></td>
                        <td><?php echo $registros['descripcion']; ?></td>
                        <td>
                            
                        <a
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
                </tbody>
            </table>
        </div>
        



    </div>
    <div class="card-footer text-muted"></div>
</div>







<?php include("../../templates/footer.php");?>