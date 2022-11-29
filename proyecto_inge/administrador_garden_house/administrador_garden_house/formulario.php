<!DOCTYPE html>
<html>
<head>
  <!--Titulo.-->
  <title>Registro</title>
</head>
<!--Boddy, color de fondo naranja.-->
<body bgcolor="orange">
  <center>
    <!--Hace conexión con "Operacion_guardar.php"-->
    <!--El [Method="POST"] envia los datos de forma que no podemos ver, a diferencia del GET que los envia a travez del URL-->
    <form action="operacion_guardar.php" method="POST">
    </br></br></br></br></br></br></br></br></br>
          <h3><font face="Arial">[¡Ingrese los datos!]</h3>
      <!--Acá están los textos donde vamos a introducir el nombre, apellido y el correo, más un botón para registrarse en la base de datos.-->
      <input type="text" required name="nombre" placeholder="Nombre..." value="" /><br/><br/>
      <input type="text" required name="apellido" placeholder="Apellido..." value="" /><br/><br/>
      <input type="text" required name="correo" placeholder="Correo..." value="" /><br/><br/>
      <input type="text" required name="numero" placeholder="Numero..." value="" /><br/><br/>
      <input type="submit" value="Registrarse" />
    </form>
  </center>
</body>
</html>
