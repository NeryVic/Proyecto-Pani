<?php 
include("../../bd.php");
//seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia-> execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../templates/header.php");?>
<div class="card">
    <div class="card-header"></div>
    <a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
        >Agregar registro</a
    >
    
    
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
                            href="#"
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