<?php 
include("../../bd.php");
include("../../templates/header.php");?>
<div class="card">
<div class="card-header">Editar usuario</div>


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
    
    <button type="submit" class="btn btn-success">Agregar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>

</form>

</div>
<div class="card-footer text-muted"></div>
</div>



<?php include("../../templates/footer.php");?>