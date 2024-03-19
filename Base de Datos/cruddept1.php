<?php

include 'configure.php';

if(isset($_POST['upload'])){
    $NOMBRE = $_POST['nom_prod'];
    $PRECIO = $_POST['cost_prod'];
    $IMAGEN = $_FILES['img_prod'];
    $img_loc = $_FILES['img_prod']['tmp_name'];
    $img_name = $_FILES['img_prod']['name'];
    $img_des = "uploadImage/".$img_name;
    move_uploaded_file($img_loc,'uploadImage/'.$img_name);
    $PESO = $_POST['peso_prod'];
    $EXISTENCIA = $_POST['cant_prod'];

    // insert data
  $sql="insert into `PIA_Proweb` (nom_prod, cost_prod_img_prod,peso_prod,cant_prod)
  values(`$NOMBRE`, `$PRECIO`,`$IMAGEN`,`$PESO`,`$EXISTENCIA`)";
  $result=mysqli_query($con,$sql);
  if($result){
    echo"datos insertados correctamente";
  }else{
    die(mysqli_error($con));
  }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/boton-buscar.css">
</head>
<body>
  <!-- navegador -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.html">
        <img src="./imagenes/logo-Walmart.png" alt="" width="100px" height="50px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Conócenos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./contacto.html">Contacto</a></li>
              <li><a class="dropdown-item" href="./sobreNosotros.html">Sobre Nosotros</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Departamentos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./Departament1.html">Frutas y Verduras</a></li>
              <li><a class="dropdown-item" href="./departament2.html">Carnes</a></li>
              <li><a class="dropdown-item" href="./departament3.html">Abarrotes</a></li>
            </ul>
          </li>
        </ul>
        <a href="./login.html"><i class="fa-solid fa-right-to-bracket"></i></a>
        <a class="nav-link" href=""><i class="fa-solid fa-cart-shopping"></i></a>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Buscar en 'nombre'" aria-label="Search">
          <button class="btn btn btn-dark" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
    <!-- navegador -->
    <center>
    <div class="main">
        <form action="insert.php" method="POST" enctype="multipart/form-data" >
        <label for="">Nombre:</label>
        <input type="text" name="name"><br>
        <label for="">Precio :</label>
        <input type="text" name="price" id=""><br>
        <label for="">Image:</label>
        <input type="file" name="image" id=""><br>
        <label for="">Peso:</label>
        <input type="text" name="peso"><br>
        <label for="">Existencia:</label>
        <input type="text" name="existencia"><br>
        <button type="submit" name="upload">Upload</button>

        

        </form>
    </div>
    </center>




    <script src="./Scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6cf475a9a0.js" crossorigin="anonymous"></script>
</body>
</html>