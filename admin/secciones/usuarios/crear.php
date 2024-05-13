<?php 
include("../../bd.php");

if ($_POST){
    //Recepcionamos los valores del formulario.
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] :"";
    $password = (isset($_POST['password'])) ? $_POST['password'] :"";
    $correo= (isset($_POST['correo'])) ? $_POST['correo'] : "";


$sentencia = $conexion->prepare("INSERT INTO `tbl_usuarios`
    (`ID`, `usuario`, `password`, `correo`) 
    VALUES 
    (NULL, :usuario, :password, :correo);");
    
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password", $password);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->execute();
    

    $mensaje="Registro agregado con éxito,";
    header("Location:index.php?mensaje=".$mensaje);


}
include("../../templates/header.php");?>

<div class="card">
<div class="card-header">Crear usuario</div>




<form action="" method="post">
    <div class="mb-3">
        <label for="" class="form-label"><br>Nombre del usuario:</br></label>
        <input
            type="text"
            class="form-control"
            name="usuario"
            id="usuario"
            aria-describedby="helpId"
            placeholder="Nombre del usuario"
        />
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password:</label>
        <input
            type="Password"
            class="form-control"
            name="password"
            id="password"
            aria-describedby="helpId"
            placeholder="Password"
        />
    </div>
 <div class="mb-3">
    <label for="" class="form-label">Correo:</label>
    <input
        type="email"
        class="form-control"
        name="correo"
        id="correo"
        aria-describedby="emailHelpId"
        placeholder="Correo"
    /></div>
    <div class="mb-3">
        <label for="" class="form-label">Password:</label>
        <input
            type="Password"
            class="form-control"
            name="password"
            id="password"
            aria-describedby="helpId"
            placeholder="Password"
        /> </div>
    
    <button type="submit" class="btn btn-success">Agregar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>

</form>

</div>

<div class="card-footer text-muted"> </div>
    </div>




<?php include("../../templates/footer.php");?>