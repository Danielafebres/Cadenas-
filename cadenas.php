<!DOCTYPE html>
<html>
<head>
    <title>Validar dirección de correo electrónico</title>
    <style >
    	
    	body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

h1 {
    text-align: center;
}

form {
    width: 50%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 16px;
    margin-bottom: 20px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    font-size: 16px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #3e8e41;
}

p {
    text-align: center;
    font-size: 18px;
    margin-top: 20px;
}
    </style>
</head>
<body>
    <h1>Validar dirección de correo electrónico</h1>
    <form method="post" action="">
        <label for="direccionCorreo">Dirección de correo electrónico:</label>
        <input type="text" id="direccionCorreo" name="direccionCorreo">
        <br><br>
        <input type="submit" value="Validar">
    </form>
    <?php
    function validarDireccionCorreo($direccionCorreo) {
        // Separar la dirección de correo electrónico en partes utilizando el caracter @
        $partesDireccionCorreo = explode("@", $direccionCorreo);

        // Verificar si la dirección de correo electrónico contiene solo un carácter @
        if (count($partesDireccionCorreo) != 2) {
            return false;
        }

        // Obtener las partes individuales de la dirección de correo electrónico
        $usuario = $partesDireccionCorreo[0];
        $partesDominio = explode(".", $partesDireccionCorreo[1]);

        // Verificar si el dominio tiene el formato correcto y su tipo es válido
        if (count($partesDominio) != 2 || strlen($partesDominio[1]) != 3 || !in_array($partesDominio[1], array("com", "net", "org", "edu", "gov"))) {
            return false;
        }

        // Devolver verdadero si la dirección de correo electrónico cumple todas las reglas
        return true;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $direccionCorreo = $_POST["direccionCorreo"];
        if (validarDireccionCorreo($direccionCorreo)) {
            echo "<p>La dirección de correo electrónico es válida</p>";
        } else {
            echo "<p>La dirección de correo electrónico no es válida</p>";
        }
    }
    ?>
</body>
</html>