<?php 
include("../../bd.php");







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
                    <th scope="col">imagen</th>
                    <th scope="col">nombrecompleto</th>
                    <th scope="col">puesto</th>
                    <th scope="col">twitter</th>
                    <th scope="col">facebook</th>
                    <th scope="col">linkedin</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($lista_equipo as $registros){ ?>    
            <tr class="">
                    <td>1</td>
                    <td>imagen.jpg</td>
                    <td>juan carlos paniagua</td>
                    <td>CEO</td>
                    <td>@MADERASPANI/X</td>
                    <td>MADERASPANI/FB</td>
                    <td>MADERASPANI.S.R.L</td>
                    <td><a href="editar.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-info" role="button">Editar</a>
                        <a href="index.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-danger" role="button">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    


    </div>
    <div class="card-footer text-muted"></div>
</div>
















<?php include("../../templates/footer.php");?>