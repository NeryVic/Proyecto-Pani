<?php 
include("../../bd.php");
if($_POST){

    //Recepcionamos los valores del formulario.
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $subtitulo = (isset($_POST['subtitulo'])) ? $_POST['subtitulo'] : "";
    $imagen=(isset($_FILES["imagen"]["name"])) ? $_FILES["imagen"] ["name"]:"";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";

    $sentencia = $conexion->prepare("INSERT INTO `tbl_portafolio` (`ID`, `titulo`, `subtitulo`, `imagen`, `descripcion`) 
    VALUES (NULL, 'ejemplo de implementacion del portafolio', 'creacion de la conexion de bd y la pag', 'asdsaidh', 'asdsada'");
    $sentencia->execute();

    $sentencia->bindParam(":Titulo", $Titulo);
    $sentencia->bindParam(":subtitulo", $subtitulo);
    $sentencia->bindParam(":descripcion", $descripcion);







}





include("../../templates/header.php");?>




<div class="card">
        <div class="card-header">Crear portfolio</div>
            
        
        
        
        
        <div class="card-body">
        
        
        <form action="" enctype="multipart/form-data" method="post">

        <div class="mb-3"> 
            <label for="" class="form-label">Imagen:</label>
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
    <label for="" class="form-label">Subtitulo:</label>
    <input
        type="text"
        class="form-control"
        name="Subtitulo"
        id="Subtitulo"
        aria-describedby="helpId"
        placeholder="Subtitulo"
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

