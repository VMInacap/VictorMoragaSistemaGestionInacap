
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
            <title>SUBIDA</title>
            <?php            
            require_once 'menu.php';
            require_once 'barralateral.php';
            require_once '../clases/conexion.php';
            $c = new conectar();
            $conexion = $c->conexion();
            ?>
</head>
<body>
<div class="container">
                <div style="padding-left: 100px"><h2>Subida de documentos</h2><br></div>
                <div class="row">
                    <div class="col-sm-1">
                        
                    </div>            
            </div>
            <br>
            <div class="container" style="padding-left: 100px">
            	<div class="panel">
<form action="../procesos/upload.php" method="post" enctype="multipart/form-data">
  Elija imagén a subir:
  <input type="file" name="fileToUpload" class="btn btn-default" id="fileToUpload"><br>
  <input type="submit" value="Subir imagén" class="btn btn-primary btn-sm" name="submit">
</form>
</div></div>
</body>
</html>
