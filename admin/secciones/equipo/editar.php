<?php 
include("../../bd.php");

// Verificar si se ha proporcionado un ID en la URL
if(isset($_GET['txtID'])){
    // Recuperar los datos del ID correspondiente
    $txtID = $_GET['txtID'];      
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_equipo` WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Asignar los valores del registro a las variables
    $imagen_actual = $registro['imagen']; 
    $nombrecompleto = $registro['nombrecompleto'];
    $puesto = $registro['puesto'];
    $twitter = $registro['twitter'];
    $facebook = $registro['facebook'];
    $linkedin = $registro['linkedin'];
}

// Procesar el formulario cuando se envía
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Recuperar los datos del formulario
    $txtID = $_POST['ID'];
    $nombrecompleto = $_POST['nombrecompleto'];
    $puesto = $_POST['puesto'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $linkedin = $_POST['linkedin'];
    $nombre_archivo_imagen = $imagen_actual;

    // Verificar si se ha subido una nueva imagen
    if(isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0){
        $imagen = $_FILES["imagen"]["name"];
        $fecha_imagen = new DateTime();
        $nombre_archivo_imagen = $fecha_imagen->getTimestamp()."_".$imagen;
        $tmp_imagen = $_FILES["imagen"]["tmp_name"];

        // Mover la nueva imagen al servidor
        move_uploaded_file($tmp_imagen, "../../../assets/img/team/".$nombre_archivo_imagen);

        // Eliminar imagen anterior si existe y es diferente de la nueva
        if($imagen_actual && $imagen_actual != $nombre_archivo_imagen && file_exists("../../../assets/img/team/".$imagen_actual)){
            unlink("../../../assets/img/team/".$imagen_actual);
        }
    }

    // Actualizar los datos en la base de datos
    $sentencia = $conexion->prepare("UPDATE `tbl_equipo` SET imagen=:imagen, nombrecompleto=:nombrecompleto, puesto=:puesto, twitter=:twitter, facebook=:facebook, linkedin=:linkedin WHERE ID=:ID");
    $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
    $sentencia->bindParam(":nombrecompleto", $nombrecompleto);
    $sentencia->bindParam(":puesto", $puesto);
    $sentencia->bindParam(":twitter", $twitter);
    $sentencia->bindParam(":facebook", $facebook);
    $sentencia->bindParam(":linkedin", $linkedin);
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();

    // Redirigir después de la actualización
    header("Location: index.php?mensaje=Registro modificado con éxito");
    exit();
}

include("../../templates/header.php");
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header"><b>Editar datos de la persona</b></div>
        <div class="card-body">
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <img width="50" height="50" src="../../../assets/img/team/<?php echo htmlspecialchars($imagen); ?>" alt="Imagen actual">
                <input
                    type="file"
                    class="form-control"
                    name="imagen"
                    id="imagen"
                    aria-describedby="helpId"
                    placeholder="Imagen"
                />
            </div>
            <div class="">
                <div class=""><br>Nombre completo:</br></div>
                <div class="card-body">
                    <div class="mb-3">
                        <input
                            type="text"
                            class="form-control"
                            value="<?php echo htmlspecialchars($nombrecompleto);?>"
                            name="nombrecompleto"
                            id="nombrecompleto"
                            aria-describedby="helpId"
                            placeholder="Nombre completo"
                        />    
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Puesto:</label>
                        <input
                            type="text"
                            class="form-control"
                            value="<?php echo htmlspecialchars($puesto);?>"
                            name="puesto"
                            id="puesto"
                            aria-describedby="helpId"
                            placeholder="Puesto"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Twitter:</label>
                        <input
                            type="text"
                            class="form-control"
                            value="<?php echo htmlspecialchars($twitter);?>"
                            name="twitter"
                            id="twitter"
                            aria-describedby="helpId"
                            placeholder="Twitter"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Facebook:</label>
                        <input
                            type="text"
                            class="form-control"
                            value="<?php echo htmlspecialchars($facebook);?>"
                            name="facebook"
                            id="facebook"
                            aria-describedby="helpId"
                            placeholder="Facebook"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Linkedin:</label>
                        <input
                            type="text"
                            value="<?php echo htmlspecialchars($linkedin);?>"
                            class="form-control"
                            name="linkedin"
                            id="linkedin"
                            aria-describedby="helpId"
                            placeholder="Linkedin"
                        />
                    </div>
                </div>
                
                <input type="hidden" name="ID" value="<?php echo htmlspecialchars($txtID); ?>">
                
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="index.php" class="btn btn-primary">Cancelar</a>
            </div>
        </div>
    </div>
</form>

<?php include("../../templates/footer.php");?>
