
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="widh=device-width, initial-scale=1, maximun=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="estilo/login.css">
	
	 <script src="jquery/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="sweetalert/sweetalert2.min.js"></script>



  <script>
    $(document).on('ready', function() {
      $('#show-hide-passwd').on('click', function(e) {
        e.preventDefault();
        var current = $(this).attr('action');
        if (current == 'show') {
          $(this).prev().attr('type','password');
          $(this).removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').attr('action','hide');
        }
        if (current == 'hide') {
          $(this).prev().attr('type','text');
          $(this).removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').attr('action','show');
        }
        
      })
    })
  </script>
</head>

  
<body class="fondo">
  
	<div class="row" >	
  <div class=".col-xs-12	.col-sm-12	.col-md-12	.col-lg-12" >
    <div class="center-block log">
     
      <form action="proceso/Acceso.php" method="POST">
      <img src="imagenes/login.png" alt="" class="icon">
      <label class="text-center">Usuario<input type="text"  name="txtUsuario" value="" placeholder="" class="form-control" required></label><br>
      <label class="text-center">Contraseña<div class="input-group" >
    <input class="form-control"  name="txtPassword" type="password" required>
    <span id="show-hide-passwd"  action="hide" class="input-group-addon glyphicon glyphicon glyphicon-eye-close"></span>
  </div></label>
       <input type="submit"  name="btnIngresar" value="Ingresar" class="btn btn-primary" onclick="<?php  echo "<script type='text/javascript'>
              Swal.fire({
                type: 'error',
                title: 'Error',
                text: 'Error al eliminar el registro'               
              });
              </script>";?>">
       <input type="submit" name="Cancelar" value="Cancelar" class="btn btn-danger"> 
      
    </form></div>
  	</div>
</div>



</body>
</html>
