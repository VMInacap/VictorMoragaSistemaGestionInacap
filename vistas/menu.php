<!DOCTYPE html>
<html>
<head>
	<title>OJEDA Y ASOCIADOS - MENU</title>
	<?php require_once "dependencias.php";
   ?>
</head>
<body>
<div id="nav">
    <div class="navbar navbar-default navbar-fixed-top" style="background-color: white;" data-spy="affix" data-offset-top="0px">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>         
          <a class="navbar-brand" href="../vistas/inicio.php" style="height: 100px;width: 100px"><img class="img-responsive logo img-thumbnail" src="../img/logo.png" alt="" style="height: 100%;width: 100%;object-fit: contain;"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
<div style="height: 30px"></div>
          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            </li>

           
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tasks"></span> Causas y miscelaneos <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="causas.php">Causas</a></li>
              <li><a href="misc.php">Miscelaneos</a></li>
              <li><a href="subida.php">Subida</a></li>
            </ul>
          </li>

            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit"></span> Cartera de clientes <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="clientes.php">Lista de clientes</a></li>              
            </ul>
          </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-calendar"></span> Fechas y pendientes <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Tickets.php">Fechas</a></li>
              <li><a href="Soluciones.php">Pendientes</a></li>              
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>Trabajadores<span class="caret"></span> </a>
            <ul class="dropdown-menu">
              <li><a href="trabajadores.php">Lista de trabajdores</a></li>              
              <li><a href="perfil.php">Mi cuenta</a></li>              
            </ul>
           </li>
              <li> <a style="color: red" href="../procesos/salir.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>

            </ul>
          </li>
        </ul>
    
      </div>
    
    </div>

  </div>

</div>
</body>
</html>
