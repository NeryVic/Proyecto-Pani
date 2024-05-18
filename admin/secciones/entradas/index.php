<?php 
include("../../bd.php");
include("../../templates/header.php");?>


<div class="card">
    <div class="card-header">Entradas</div>
    <div class="card-body">
    <a href="crear.php" class="btn btn-primary" role="button">Agregar registro</a>
    <div
    class="table-responsive-sm"
>
    <table
        class="table"
    >
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha</th>
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td scope="row">ID</td>
                <td>Fecha</td>
                <td>Título</td>
                <td>Descripción</td>
                <td>Imagen</td>
                <td>
                <a href="editar.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-info" role="button">Editar</a>
                <a href="index.php?txtID=<?php echo $registro['ID']; ?>" class="btn btn-danger" role="button">Eliminar</a>
                </td>
</tr>
        </tbody>
    </table>
</div>






</div>
</div>






<?php include("../../templates/footer.php");?>