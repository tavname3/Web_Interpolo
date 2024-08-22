<?php
$servername = "localhost";
$database = "interpolo";
$username = "root";
$password = "";
// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);
// Verificar Conexión
if (!$conn) {
    die("Error en la conexión de bases de datos: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Preparar la consulta SQL
    $sql = "SELECT * FROM cliente WHERE Usuario = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 's', $usuario);
    if (!mysqli_stmt_execute($stmt)) {
        die("Error en la ejecución de la consulta: " . mysqli_stmt_error($stmt));
    }

    $result = mysqli_stmt_get_result($stmt);
    
    if (!$result) {
        die("Error al obtener el resultado: " . mysqli_stmt_error($stmt));
    }

    // Verificar si el usuario existe
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['Contraseña'];

        // Verificar la contraseña
        $cont = 0;

        for ($i = 0; $i < strlen($hashed_password); $i++) {
                if ($hashed_password[$i] == $password[$i]) {
                    $cont++;
                } else {
                    $cont += 0;
                }
        }
        if ($cont == strlen($hashed_password)) {
            echo "La contraseña es correcta\n";
            echo "Login exitoso. Bienvenido, " . $usuario . "!";
            session_start();
            $_SESSION['user'] = $usuario; // Aquí guardas el nombre de usuario en la sesión
            $_SESSION['state'] = true;
            header("Location: arealogin.php");            
        } else {
            echo "La contraseña es incorrecta\n";
            echo "Hash almacenado: $hashed_password<br>";
            echo "Contraseña ingresada: $password<br>";
            $_SESSION['state'] = false;
            header("Location: credenciales.html");
        }
        // Cerrar la conexión
    mysqli_close($conn);
    } else {
        echo "Usuario no encontrado.<br> Registrate para poder iniciar sesión";
    }
}
?>
