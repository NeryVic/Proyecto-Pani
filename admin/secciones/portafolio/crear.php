<?php 
include("../../bd.php");
if($_POST){

    //Recepcionamos los valores del formulario.
    $titulo = (isset($_POST['Titulo'])) ? $_POST['Titulo'] : "";
    $subtitulo = (isset($_POST['Subtitulo'])) ? $_POST['Subtitulo'] : "";
    $imagen = (isset($_FILES["Imagen"]["name"])) ? $_FILES["Imagen"]["name"] : "";
    $descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : "";

    $sentencia = $conexion->prepare("INSERT INTO `tbl_portafolio` (`ID`, `titulo`, `subtitulo`, `imagen`, `descripcion`) 
    VALUES (NULL, :titulo, :subtitulo, :imagen, :descripcion)");

    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":subtitulo", $subtitulo);
    $sentencia->bindParam(":imagen", $imagen); // Corregido el nombre del parámetro
    $sentencia->bindParam(":descripcion", $descripcion);

    $sentencia->execute();
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">Producto portfolio</div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="Titulo" class="form-label">Titulo:</label>
                <input
                    type="text"
                    class="form-control"
                    name="Titulo"
                    id="Titulo"
                    placeholder="Titulo"
                />
            </div>
            <div class="mb-3">
                <label for="Subtitulo" class="form-label">Subtitulo:</label>
                <input
                    type="text"
                    class="form-control"
                    name="Subtitulo"
                    id="Subtitulo"
                    placeholder="Subtitulo"
                />
            </div>
            <div class="mb-3"> 
                <label for="Imagen" class="form-label">Imagen:</label>
                <input
                    type="file"
                    class="form-control"
                    name="Imagen"
                    id="Imagen"
                    placeholder="Imagen"
                />
            </div>
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripcion:</label>
                <input
                    type="text"
                    class="form-control"
                    name="Descripcion"
                    id="Descripcion"
                    placeholder="Descripcion"
                />
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>


