<?php 
include("../../bd.php");
if($_POST){
    //Recepcionamos los valores del formulario.
    $icono = (isset($_FILES["icono"]["name"])) ? $_FILES['icono']["name"] : "";
    $Titulo = (isset($_POST['Titulo'])) ? $_POST['Titulo'] : "";
    $Descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : "";

    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen=($icono !="")?$fecha_imagen->getTimestamp()."_".$icono:""; //

    $tmp_imagen = $_FILES["icono"]["tmp_name"]; 
    if($tmp_imagen!="") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/servicios/".$nombre_archivo_imagen);
    }

    $sentencia = $conexion->prepare("INSERT INTO `tbl_servicios` (`ID`, `icono`, `titulo`, `descripcion`) 
    VALUES (NULL, :icono, :Titulo, :Descripcion);");

    //
    $sentencia->bindParam(":icono", $nombre_archivo_imagen);
    $sentencia->bindParam(":Titulo", $Titulo);
    $sentencia->bindParam(":Descripcion", $Descripcion);

    $sentencia->execute();

    $mensaje="Registro agregado con éxito,";
    header("Location:index.php?mensaje=".$mensaje);
}



include("../../templates/header.php");?>


    <div class="card">
        <div class="card-header">Crear servicios</div>
            
        
        
        
        
        <div class="card-body">
        
        
        <form action="" enctype="multipart/form-data" method="post">

        <div class="mb-3"> 
            <label for="" class="form-label">Icono:</label>
            <input
                type="file"
                class="form-control"
                name="icono"
                id="icono"
                placeholder="Imagen"
                aria-describedby="fileHelpId"
            />
            
        </div>
        


        <div class="mb-3">
            <label for="" class="form-label">Titulo:</label>
            <input
                type="text"
                class="form-control"
                name="Titulo"
                id="Titulo"
                aria-describedby="helpId"
                placeholder="Titulo"
            />
        
        </div>
        

        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripcion:</label>
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
            class="btn btn-success"
        >
            Agregar
        </button>
        
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="index.php"
            role="button"
            >Cancelar</a
        >
        


        </form>



    </div>
    
    
    
    
    
    <div class="card-footer text-muted">




        </div>
    </div>
    



<?php include("../../templates/footer.php");?>