<?php 
include("../../bd.php");
if ($_POST){
    $imagen = (isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"]["name"] : "";
    $nombrecompleto = (isset($_POST['nombrecompleto'])) ? $_POST['nombrecompleto'] : "";
    $puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : "";
    $twitter = (isset($_POST['twitter'])) ? $_POST['twitter'] : "";
    $facebook = (isset($_POST['facebook'])) ? $_POST['facebook'] : "";
    $linkedin = (isset($_POST['linkedin'])) ? $_POST['linkedin'] : "";    
    
    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen2=($imagen !="")?$fecha_imagen->getTimestamp()."_".$imagen:"";
    $tmp_imagen = $_FILES["imagen"]["tmp_name"]; 
    if($tmp_imagen != "") {
    move_uploaded_file($tmp_imagen, "../../../assets/img/team/".$nombre_archivo_imagen2); 
    }

    $sentencia=$conexion->prepare("INSERT INTO tbl_equipo 'ID', 'imagen', 'nombrecompleto', 'puesto', 'twitter', 'facebook', 'linkedin')
    VALUES (NULL,:imagen, :nombrecompleto, :puesto, :twitter, :facebook, :linkedin);");

    $sentencia->bindParam(":imagen",$nombre_archivo_imagen2);
    $sentencia->bindParam(":nombrecompleto",$nombrecompleto);
    $sentencia->bindParam(":puesto",$puesto);
    $sentencia->bindParam(":twitter",$twitter);
    $sentencia->bindParam(":facebook",$facebook);
    $sentencia->bindParam(":linkedin",$linkedin);

    $sentencia->execute();

}



include("../../templates/header.php");?>

<form action="" method="post" enctype="multipart/form-data">
<div class="card">
    <div class="card-header"><b>Datos de la persona</b></div>
    <div class="card-body">
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen:</label>
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
                class="form-control"
                name="linkedin"
                id="linkedin"
                aria-describedby="helpId"
                placeholder="Linkedin"
            />
            
        </div>
        </div>
        
        
        <button type="submit" class="btn btn-success">Agregar</button>
        <a href="index.php" class="btn btn-primary">Cancelar</a>

    </form>


        
    </div>
    
    </div>

</div>

<?php include("../../templates/footer.php");?>