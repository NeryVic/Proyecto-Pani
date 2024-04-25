<?php 
include("../../bd.php");
if($_POST){

    //Recepcionamos los valores del formulario.
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $subtitulo = (isset($_POST['subtitulo'])) ? $_POST['subtitulo'] : "";
    $imagen=(isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"] ["name"]:"";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";




}





include("../../templates/header.php");?>




<div class="card">
    

    <div class="card-header">Producto del portafolio</div>
    
    
    <div class="card-body">
    
    
    <form action=""ectype="multipart/form-data" method="post">




    
    <div class="mb-3">
    <label for="" class="form-label">Título:</label>
    <input
        type="text"
        class="form-control"
        name="titulo"
        id="titulo"
        aria-describedby="titulo"
        placeholder="Título"
    />
</div>

</div>

<div class="mb-3">
    <label for="" class="form-label">Subtitulo:</label>
    <input
        type="text"
        class="form-control"
        name="Subtitulo"
        id="Subtitulo"
        aria-describedby="helpId"
        placeholder="Suptitulo"
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Imagen</label>
    <input
        type="file"
        class="form-control"
        name="imagen"
        id="imagen"
        placeholder="Imagen"
        aria-describedby="fileHelpId"
    />

</div>

<div class="mb-3">
    <label for="" class="form-label">Descripcion:</label>
    <input
        type="text"
        class="form-control"
        name="Descripcion"
        id="Descripcion"
        aria-describedby="helpId"
        placeholder="Descripcion"
    />
</div>
<button
    type="submit"
    class="btn btn-success btn-sm"
>
    Agregar
</button>

<a
    name=""
    id=""
    class="btn btn-primary btn-sm"
    href="index.php"
    role="button"
>
    Cancelar
</a>


</form>
<div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/footer.php");?>

