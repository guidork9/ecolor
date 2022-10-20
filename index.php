<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="boot/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/offcanvas.css">
    <link rel="stylesheet" type="text/css" href="css/sticky-footer-navbar.css">
    

    <title>DISALTI</title>
  </head>
  <body class="d-flex flex-column h-100">
    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">DISALTI</a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="reportes/reporte.php">Pre-venta Diaria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pre-venta mensual</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Beta</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="#">Avance</a></li>
            <li><a class="dropdown-item" href="#">KPI</a></li>
            <li><a class="dropdown-item" href="#">Consulta DNI</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>


</header>

<!-- Begin page content -->

  <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-6 fw-bold lh-1">CONSULTA DNI</h1>
        <div class="row">
        <div class="btn-group">
            <input type="text" id="documento" class="form-control" onclick="buscar();" maxlength="8">
            <span>
            <button type="button" class="btn btn-dark" id="buscar">Buscar</button>

            </span>
        </div>

            <div class="col-sm-3"></div>
            <div >
                <label  class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellidoPaterno" disabled>
            </div>

            <div class="col-sm-5"></div>
            <div >
              <label  class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="apellidoMaterno" disabled>
            </div>

            <div class="col-sm-5"></div>
            <div >
              <label  class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombre" disabled>
            </div>
            <div class="col-sm-5"></div>

            <div class="col-sm-5"></div>
            <div >
              <label  class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nom_completo" disabled>
            </div>
            <div class="col-sm-5"></div>
        </div>
      </div>
      -
    </div>
  </div>



<footer class="footer mt-auto py-3 bg-dark">
  <div class="container">
    <span class="text-muted">Derechos Reservados © 2022 - XO</span>
  </div>
</footer>



   <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="boot/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/offcanvas.js"></script>
    <script src="js/jquery.min.js"></script>


      
  </body>
  <script>
    $('#documento').keyup(function(e){
     if(e.keyCode == 13)
     {
       $('#buscar').click();
     }
   });
    $('#buscar').click(function(){
        dni=$('#documento').val();
        $.ajax({
           url:'Controlador/consultaDNI.php',
           type:'post',
           data: 'dni='+dni,
           dataType:'json',
           success:function(r){
            if(r.numeroDocumento==dni){
                $('#apellidoPaterno').val(r.apellidoPaterno);
                $('#apellidoMaterno').val(r.apellidoMaterno);
                $('#nombre').val(r.nombres);
                $("#nom_completo").val(r.apellidoPaterno+" "+r.apellidoMaterno+", "+r.nombres);
            }else{
                alert(r.error);
            }
            console.log(r)
           }
        });
    });
</script>
</html>