<?php 
include("../../bd.php");
if($_POST){

    //Recepcionamos los valores del formulario.
    $titulo = (isset($_POST['Titulo'])) ? $_POST['Titulo'] : "";
    $subtitulo = (isset($_POST['Subtitulo'])) ? $_POST['Subtitulo'] : "";
    $imagen = (isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"]["name"] : "";
    $descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : "";

    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen2=($imagen !="")?$fecha_imagen->getTimestamp()."_".$imagen:""; //

    $tmp_imagen = $_FILES["imagen"]["tmp_name"]; 
    if($tmp_imagen!="") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/portfolio/".$nombre_archivo_imagen2);
    }

    $sentencia = $conexion->prepare("INSERT INTO `tbl_portafolio` (`ID`, `titulo`, `subtitulo`, `imagen`, `descripcion`) 
    VALUES (NULL, :titulo, :subtitulo, :imagen, :descripcion)");

    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":subtitulo", $subtitulo);
    $sentencia->bindParam(":imagen", $nombre_archivo_imagen2); // Corregido el nombre del parámetro
    $sentencia->bindParam(":descripcion", $descripcion);

    $sentencia->execute();

    $mensaje="Registro agregado con éxito,";
    header("Location:index.php?mensaje=".$mensaje);
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
                <label for="imagen" class="form-label">Imagen:</label>
                <input
                    type="file"
                    class="form-control"
                    name="imagen"
                    id="imagen"
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


