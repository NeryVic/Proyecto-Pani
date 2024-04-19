<?php 
include("../../bd.php");
if(isset($_GET['txtID'])){
//Borrar registros
        
        $txtID=(isset($_GET['txtID']) ) ?$_GET['txtID']:"";
        
        $sentencia = $conexion->prepare("DELETE * FROM tbl_servicios WHERE id=:id "); 
        $sentencia->bindParam(":id", $id);
    
        $sentencia->execute();

}
//Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia-> execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");?>
<div class="card">
<<<<<<< HEAD
    <div class="card-header">
=======
    <div class="card-header">     
>>>>>>> 1592cadbc88098e568de505062159fe0c34ae39d
    <a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
<<<<<<< HEAD
        >Agregar registro</a
    ></div>
    
=======
        >Agregar registro</a>
       
        </div>
>>>>>>> 1592cadbc88098e568de505062159fe0c34ae39d
    
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
                        <td><?php echo $registros['icono']; ?></td>
                        <td><?php echo $registros['titulo']; ?></td>
                        <td><?php echo $registros['descripcion']; ?></td>
                        <td>
                            
                        <a
                            name=""
                            id=""
                            class="btn btn-info"
                            href="#"
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