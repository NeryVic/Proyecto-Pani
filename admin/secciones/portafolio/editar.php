<?php 
include("../../bd.php");

// Inicializar las variables
$Titulo = $Subtitulo = $imagen = $Descripcion = "";

if(isset($_GET['txtID'])){
    // Recuperar los datos del ID correspondiente
    $txtID = $_GET['txtID'];      
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_portafolio` WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Asignar los valores del registro a las variables
    $Titulo = $registro['titulo']; 
    $Subtitulo = $registro['subtitulo'];
    $imagen = $registro['imagen'];
    $Descripcion = $registro['descripcion'];
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Recuperar los datos del formulario
    $txtID = $_POST['txtID'];
    $Titulo = $_POST['Titulo'];
    $Subtitulo = $_POST['Subtitulo'];
    $Descripcion = $_POST['Descripcion'];

    // Verificar si se ha subido una nueva imagen
    if(isset($_FILES["icono"]["name"]) && !empty($_FILES["icono"]["name"])){
        $icono = $_FILES["icono"]["name"];
        $tmp_imagen = $_FILES["icono"]["tmp_name"];
        $nombre_archivo_imagen = date("YmdHis") . "_" . $icono;
        move_uploaded_file($tmp_imagen, "../../../assets/img/portfolio/" . $nombre_archivo_imagen);

        // Eliminar imagen anterior si existe
        if(file_exists("../../../assets/img/portfolio/" . $imagen)){
            unlink("../../../assets/img/portfolio/" . $imagen);
        }
        
        // Actualizar la tabla con la nueva imagen
        $sentencia = $conexion->prepare("UPDATE `tbl_portafolio` SET imagen=:imagen WHERE ID=:ID");
        $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
        $sentencia->bindParam(":ID", $txtID);
        $sentencia->execute();
    }

    // Actualizar los otros campos en la tabla
    $sentencia = $conexion->prepare("UPDATE `tbl_portafolio` SET titulo=:Titulo, subtitulo=:Subtitulo, descripcion=:Descripcion WHERE ID=:ID");
    $sentencia->bindParam(":Titulo", $Titulo);
    $sentencia->bindParam(":Subtitulo", $Subtitulo);
    $sentencia->bindParam(":Descripcion", $Descripcion);
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();

    // Redirigir después de la actualización
    header("Location: index.php?mensaje=Registro modificado con éxito");
    exit();
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">Producto portfolio</div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <input type="hidden" name="txtID" value="<?php echo htmlspecialchars($txtID); ?>">
            <div class="mb-3">
                <label for="Titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($Titulo); ?>" name="Titulo" id="Titulo" placeholder="Titulo">
            </div>
            <div class="mb-3">
                <label for="Subtitulo" class="form-label">Subtitulo:</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($Subtitulo); ?>" name="Subtitulo" id="Subtitulo" placeholder="Subtitulo">
            </div>
            <div class="mb-3"> 
                <label for="icono" class="form-label">Imagen:</label>
                <img width="50" height="50" src="../../../assets/img/portfolio/<?php echo htmlspecialchars($imagen); ?>" alt="Imagen actual">
                <input type="file" class="form-control" name="icono" id="icono" placeholder="Imagen">
            </div>
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripcion:</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($Descripcion); ?>" name="Descripcion" id="Descripcion" placeholder="Descripcion">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>
