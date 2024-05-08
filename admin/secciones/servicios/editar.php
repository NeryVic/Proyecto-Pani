<?php 
include("../../bd.php");

// Verificar si se ha proporcionado un ID en la URL
if(isset($_GET['txtID'])){
    //Recuperar los datos del ID correspondiente (seleccionado)
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";       
    $sentencia = $conexion->prepare("SELECT * FROM tbl_servicios WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Asignar los valores del registro a las variables
    $icono = $registro['icono'];
    $Titulo = $registro['titulo']; 
    $Descripcion = $registro['descripcion'];
}

// Verificar si se ha enviado el formulario
if($_POST){
    // Recuperar los datos del formulario
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $Titulo = (isset($_POST['Titulo'])) ? $_POST['Titulo'] : "";
    $Descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
     
    // Verificar si se ha subido una nueva imagen
    if($_FILES["icono"]["tmp_name"]!=""){
        $icono = (isset($_FILES["icono"]["name"])) ? $_FILES['icono']["name"] : ""; //
        $fecha_imagen = new DateTime();
        $nombre_archivo_imagen = ($icono != "") ? $fecha_imagen->getTimestamp()."_".$icono : ""; //
  
        $tmp_imagen = $_FILES["icono"]["tmp_name"]; 
        
        move_uploaded_file($tmp_imagen, "../../../assets/img/servicios/".$nombre_archivo_imagen);

        // Eliminar imagen anterior si existe
        if(file_exists("../../../assets/img/servicios/".$icono)){
            unlink("../../../assets/img/servicios/".$icono);
        }
        
        // Actualizar la tabla con la nueva imagen
        $sentencia = $conexion->prepare("UPDATE tbl_servicios SET icono=:icono WHERE ID=:ID");
        $sentencia->bindParam(":icono", $nombre_archivo_imagen);
        $sentencia->bindParam(":ID", $txtID);
        $sentencia->execute();
    }

    // Actualizar los otros campos en la tabla
    $sentencia = $conexion->prepare("UPDATE tbl_servicios SET Titulo=:Titulo, Descripcion=:Descripcion WHERE ID=:ID");
    $sentencia->bindParam(":Titulo", $Titulo);
    $sentencia->bindParam(":Descripcion", $Descripcion);
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();

    // Redirigir después de la actualización
    $mensaje = "Registro modificado con éxito";
    header("Location: index.php?mensaje=".$mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">Editar servicios</div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input readonly value="<?php echo $txtID; ?>" type="text" class="form-control" name="txtID" id="txtID" placeholder="ID" />
            </div>
            <div class="mb-3">
                <label for="icono" class="form-label">Icono:</label>
                <img width="50" height="50" src="../../../assets/img/servicios/<?php echo $icono; ?>" />
                <input type="file" class="form-control" name="icono" id="icono" placeholder="Imagen" aria-describedby="fileHelpId" />
            </div>
            <div class="mb-3">
                <label for="Titulo" class="form-label">Titulo:</label>
                <input value="<?php echo $Titulo; ?>" type="text" class="form-control" name="Titulo" id="Titulo" aria-describedby="helpId" placeholder="Titulo" />
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <input value="<?php echo $Descripcion; ?>" type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion" />
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>
