<?php
include("../../bd.php");

// Verificar si se ha proporcionado un ID en la URL
if(isset($_GET['txtID'])){
    //Recuperar los datos del ID correspondiente (seleccionado)
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";       
    $sentencia = $conexion->prepare("SELECT * FROM tbl_usuarios WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Asignar los valores del registro a las variables
    $usuario = $registro['usuario'];
    $correo = $registro['correo']; 
    $password = $registro['password'];



}







include("../../templates/header.php");
?>


<div class="card">
    <div class="card-header"><b>Editar usuario</b></div>
    <div class="card-body">
    <form action="" method="post">
    
    
    <div class="mb-3">
        <label for="txtID" class="form-label">ID:</label>
        <input
            type readonly="text"
            class="form-control"
            value="<?php echo $txtID;?>"
            name="ID"
            id="ID"
            aria-describedby="helpId"
            placeholder="ID"
        />
    </div>
    
    
    <div class="mb-3">
        <label for="" class="form-label">Nombre del usuario:</label>
        <input
            type="text"
            class="form-control"
            value="<?php echo $usuario;?>"
            name="usuario"
            id="usuario"
            aria-describedby="helpId"
            placeholder="Nombre del usuario"
        />
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo:</label>
        <input
            type="text"
            class="form-control"
            value="<?php echo $correo;?>"
            name="correo"
            id="correo"
            aria-describedby="helpId"
            placeholder="Correo"
        />
    </div>

    
    
    
    
    
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input
            type="password"
            class="form-control"
            value="<?php echo $password;?>"
            name="password"
            id="password"
            aria-describedby="helpId"
            placeholder="Password"
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
    <div class="card-footer text-muted"></div>
</div>



<?php include("../../templates/footer.php");?>


