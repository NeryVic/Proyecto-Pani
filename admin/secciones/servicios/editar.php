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
        $Titulo =$registro['Titulo'];
        $Descripcion = $registro['Descripcion'];



    }
    if($_POST){
    print_r($_POST);
     //Actualizamos los valores del formulario.
     $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
     $icono = (isset($_POST['icono'])) ? $_POST['icono'] : "";
     $Titulo = (isset($_POST['Titulo'])) ? $_POST['Titulo'] : "";
     $Descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : "";
 
     $sentencia = $conexion->prepare("UPDATE tbl_servicios
     SET 
     icono=:icono,
     Titulo=:Titulo,
     Descripcion=:Descripcion
     WHERE ID=:ID");
     $sentencia->bindParam(":icono", $icono);
     $sentencia->bindParam(":Titulo", $Titulo);
     $sentencia->bindParam(":Descripcion", $Descripcion);
     
     $sentencia->bindParam(":ID", $txtID);
     
     
     $sentencia->execute();


    }
include("../../templates/header.php");?>

<div class="card">
        <div class="card-header">Editar servicios</div>
        
        
        <div class="card-body">
        
        
        <form action="" enctype="multipart/form-data" method="post">

        <div class="mb-3">
            <label for="" class="form-label">ID:</label>
            <input
                value="<?php echo $txtID;?>"
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
            <input
                value="<?php echo $icono;?>"
                type="text"
                class="form-control"
                name="icono"
                id="icono"
                aria-describedby="helpId"
                placeholder="Icono"
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