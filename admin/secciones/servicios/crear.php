<?php 
include("../../bd.php");
if($_POST){

    
    //Recepcionamos los valores del formulario.
    $icono=(isset($_POST['Icono']))?$_POST['Icono']:"";
    $Titulo=(isset($_POST['Titulo']))?$_POST['Titulo']:"";
    $Descripcion=(isset($_POST['Descripcion']))?$_POST['Descripcion']:"";


    $sentencia-$conexion->prepare();

} 


include("../../templates/header.php");?>


    <div class="card">
        <div class="card-header">Crear servicios</div>
            
        
        
        
        
        <div class="card-body">
        
        
        <form action="" enctype="multipart/form-data" method="post">


        <div class="mb-3">
            <label for="" class="form-label">Icono:</label>
            <input
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