<?php 
include("../../bd.php");

//Seleccionar registros
$sentencia = $conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia-> execute();
$lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);




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
        >  
    </div>

    <div
        class="table-responsive"
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Subtitulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                <td scope="col">ID</td>
                    <td scope="col">Titulo</td>
                    <td scope="col">Subtitulo</td>
                    <td scope="col">Descripcion</td>
                    <td scope="col">Imagen</td>
                    <td scope="col">Editar|Elminar</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
</div>


<?php include("../../templates/footer.php");?>