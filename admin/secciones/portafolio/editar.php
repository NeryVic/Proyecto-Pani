<?php 
include("../../bd.php");

if(isset($_GET['txtID'])){
    //Recuperar los datos del ID correspondiente (seleccionados)
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";       
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_portafolio` WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    $Titulo = $registro['titulo']; 
    $Subtitulo = $registro['subtitulo'];
    $imagen= $registro['imagen'];
    $Descripcion = $registro['descripcion'];

    
}

if($_POST){
        //Recepcionamos los valores del formulario.
        $Titulo = (isset($_POST['Titulo'])) ? $_POST['Titulo'] : "";
        $subtitulo = (isset($_POST['Subtitulo'])) ? $_POST['Subtitulo'] : "";
        $imagen = (isset($_FILES["icono"]["name"])) ? $_FILES["icono"]["name"] : "";
        $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
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
                    value="<?php echo $Titulo; ?>"
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
                    value="<?php echo $Subtitulo; ?>"
                    name="Subtitulo"
                    id="Subtitulo"
                    placeholder="Subtitulo"
                />
            </div>
            <div class="mb-3"> 
                <label for="icono" class="form-label">Imagen:</label>
                <?php echo $imagen;?>
                <input
                    type="file"
                    class="form-control"
                    value="<?php echo $icono; ?>"
                    name="icono"
                    id="icono"
                    placeholder="Imagen"
                />
            </div>
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripcion:</label>
                <input
                    type="text"
                    class="form-control"
                    value="<?php echo $Descripcion; ?>"
                    name="Descripcion"
                    id="Descripcion"
                    placeholder="Descripcion"
                />
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>
