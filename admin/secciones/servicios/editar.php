<?php 
include("../../bd.php");//Inclucion de la base de datos.

if(isset($_GET['txtID'])){
    //Recuperar los datos del ID correspondiente (seleccionados)
    $txtID=(isset ($_GET['txtID']) )? $_GET['txtID']:"";       
    $sentencia = $conexion->prepare("SELECT * FROM tbl_servicios WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);

    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
     //Recepcionamos los valores del formulario.
        $icono =$registro['icono'];
        $Titulo =$registro['titulo']; // hay que prestar atencion a los detalles. >:V
        $Descripcion = $registro['descripcion'];

        //print_r($Descripcion); 


    }
    if($_POST){
    //print_r($_POST);
     //Actualizamos los valores del formulario.
      $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";

      $Titulo = (isset($_POST['Titulo'])) ? $_POST['Titulo'] : "";
      $Descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : "";
     
     
     
     
     $sentencia = $conexion->prepare("UPDATE tbl_servicios
     SET 
     icono=:icono,
     Titulo=:Titulo,
     Descripcion=:Descripcion
     WHERE ID=:ID");
     
      $sentencia->bindParam(":icono", $icono);  //img

      $sentencia->bindParam(":Titulo", $Titulo);
      $sentencia->bindParam(":Descripcion", $Descripcion);
      
      $sentencia->bindParam(":ID", $txtID);
      $sentencia->execute();

      if($_FILES["icono"]["tmp_name"]!=""){
        $icono = (isset($_FILES["icono"]["name"])) ? $_FILES['icono']["name"] : ""; //
        $fecha_imagen=new DateTime();
        $nombre_archivo_imagen=($icono !="")?$fecha_imagen->getTimestamp()."_".$icono:""; //
  
        $tmp_imagen = $_FILES["icono"]["tmp_name"]; 
        
        move_uploaded_file($tmp_imagen, "../../../assets/img/servicios/".$nombre_archivo_imagen);

        //Eliminar imagen anterior
        $sentencia = $conexion->prepare("SELECT icono FROM tbl_servicios WHERE ID=:ID");
        $sentencia->bindParam(":ID", $txtID);
        $sentencia->execute();
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

        if(isset($registro_imagen["icono"])){
        if(file_exists("../../../assets/img/servicios/".$registro_imagen["icono"])){
        unlink("../../../assets/img/servicios/".$registro_imagen["icono"]);
         }
     }
        
        $sentencia = $conexion->prepare("UPDATE tbl_servicios SET icono=:icono  WHERE ID=:ID");
        $sentencia->bindParam(":icono", $nombre_archivo_imagen);
        $sentencia->bindParam(":ID", $txtID);
        $sentencia->execute();
      }

      $mensaje="Registro modificado con éxito,";
    header("Location:index.php?mensaje=".$mensaje);
    }
include("../../templates/header.php");?>

<div class="card">
        <div class="card-header">Editar servicios</div>
        
        
        <div class="card-body">
        
        
        <form action="" enctype="multipart/form-data" method="post">

        <div class="mb-3">
            <label for="" class="form-label">ID:</label>
            <input
                readonly value="<?php echo $txtID;?>"
                type="text"
                class="form-control"
                name="txtID"
                id="txtID"
                aria-describedby="helpId"
                placeholder="ID"
            />
        </div>
        

        <div class="mb-3"> 
            <label for="" class="form-label">Icono:</label>
            <img width="50" height="50" src="../../../assets/img/servicios/<?php echo $icono;?>" />
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
                value="<?php echo $Titulo;?>"
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
                value="<?php echo $Descripcion;?>"
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
            Actualizar
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