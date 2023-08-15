<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../boostrap/css/bootstrap.min.css" type="text/css">
    <script src="../../../boostrap/js/bootstrap.min.js"></script>
    <title>Usuario</title>
</head>
<body>
    <div class="container">
        <?php
         require("../../src/query/ejecuta.php");
         require("../../src/query/select.php");

         use MyApp\query\Ejecuta;
         use MyApp\query\Select;

     if (!empty($_POST["codigo"]) )
     {
        require("../../vendor/autoload.php");
        $usuarios = new Ejecuta();
        extract($_POST);
        
        $query = new Select();
        $consulta = "SELECT token FROM persona WHERE token = '$codigo' ";
        $boolean = $query->seleccionar($consulta);
        /* foreach($boolean as $datos)
        {
            echo "mira aqui esta" . $datos->token . "<br>" ;
            $ROL = 5;
            echo $cadena = "UPDATE SET ROL = $ROL ";
             /*$usuarios->ejecutar($cadena);
        } 
        */
        if ($boolean) 
        {
            // Hace un update al usuario.
            $queryC = new Ejecuta();
            $cadena = "UPDATE persona SET ROL = 10 WHERE token = '$codigo' ";
            $queryC->ejecutar($cadena);
            header("Location: ../../Vista_Usuario/login.php");
        } 
        else 
        {
            echo "El token es equivocado.";
            header("Location: ../../Vista_Usuario/register.php");
        }
        
       


     }
        /* aqui mismo hacer una comparacion entre el campo token de la base de datos y el ingresado dentro del formulario
            si es que coinciden me hagas un update al rol
            Rol = 0
            Aqui seria If = true = UPDATE ROL = 10 
        */
        
        ?>
    </div>
</body>
</html>



