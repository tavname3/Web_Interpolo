<?php
session_start();
if (!isset($_SESSION['state']) || !$_SESSION['state']) {
    header("Location: Credenciales.html");
    exit();
}
$servername = "localhost";
$database = "interpolo";
$username = "root";
$password = "";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);
$user = isset($_SESSION['user']) ? $_SESSION['user'] : 'Invitado';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/recargas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Recargas</title>
</head>
<body>
    <header>
        <nav>
            <a href="../../home.php">
            <p><img alt="Cambiar imagen" height="100px" width="100px" onmouseout="this.src='https://i.pinimg.com/originals/46/5b/ac/465baca50ce17350b78b1cc648d838cc.png';" onmouseover="this.src='https://i.pinimg.com/736x/fd/1d/cb/fd1dcb83390f10a1f7e8578a9ae63e4f.jpg';" src="https://i.pinimg.com/originals/46/5b/ac/465baca50ce17350b78b1cc648d838cc.png" /></p>
            <ul>
                <li>
                    <a href="../Acerca_de_Nosotros.php">
                    <div class="buttona">
                        <div class="box1">A</div>
                        <div class="box1">C</div>
                        <div class="box1">E</div>
                        <div class="box1">R</div>
                        <div class="box1">C</div>
                        <div class="box1">A</div>
                        <div class="box1"> </div>
                        <div class="box1">D</div>
                        <div class="box1">E</div>
                    </div>
                    </a>    
                </li>
                <li>
                    <a href="../Nuestros_Servicios.php">
                    <div class="buttona">
                        <div class="box2">N</div>
                        <div class="box2">U</div>
                        <div class="box2">E</div>
                        <div class="box2">S</div>
                        <div class="box2">T</div>
                        <div class="box2">R</div>
                        <div class="box2">O</div>
                        <div class="box2">S</div>
                        <div class="box2"> </div>
                    </div>
                </a>    
            </li>
            <li>
                <a href="../Credenciales.html">
                <div class="buttona">
                    <div class="box3">I</div>
                    <div class="box3">N</div>
                    <div class="box3">I</div>
                    <div class="box3">C</div>
                    <div class="box3">I</div>
                    <div class="box3">A</div>
                    <div class="box3">R</div>
                </div>
                </a>    
            </li>
            <li>
                <a href="../arealogin.php">
                <i class="fa-solid fa-user fa-2xl"></i>
            </li> 
            <li>
                    <a>
                        <button class="btn-cssbuttons">
                            <span>Contacto</span><span>
                            <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                            <path fill="#ffffff" d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z"></path>
                            </svg>
                            </span>
                            <ul>
                            <li>
                            <a href="https://x.com/InterpoloC3438"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
                            <path fill="white" d="M962.267429 233.179429q-38.253714 56.027429-92.598857 95.451429 0.585143 7.972571 0.585143 23.990857 0 74.313143-21.723429 148.260571t-65.974857 141.970286-105.398857 120.32-147.456 83.456-184.539429 31.158857q-154.843429 0-283.428571-82.870857 19.968 2.267429 44.544 2.267429 128.585143 0 229.156571-78.848-59.977143-1.170286-107.446857-36.864t-65.170286-91.136q18.870857 2.852571 34.889143 2.852571 24.576 0 48.566857-6.290286-64-13.165714-105.984-63.707429t-41.984-117.394286l0-2.267429q38.838857 21.723429 83.456 23.405714-37.741714-25.161143-59.977143-65.682286t-22.308571-87.990857q0-50.322286 25.161143-93.110857 69.12 85.138286 168.301714 136.265143t212.260571 56.832q-4.534857-21.723429-4.534857-42.276571 0-76.580571 53.979429-130.56t130.56-53.979429q80.018286 0 134.875429 58.294857 62.317714-11.995429 117.174857-44.544-21.138286 65.682286-81.115429 101.741714 53.174857-5.705143 106.276571-28.598857z"></path></svg></a>
                            </li>
                            <li>
                            <a href="https://wa.me/2214087154"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path fill="#ffffff" d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path></svg> 
                            </li>
                            <li>
                            <a href="https://www.facebook.com/profile.php?id=61560950710877&sk=about"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path fill="#ffffff" d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path></svg></a>
                    </a>    
                </li>
            </ul>
        </nav>
    </header>
<center>
    <table style="border-color: black;">
        <td><h1 style="color: black;">Recargas</h1></td>
    </table>
    
<table>
    <tr>
        <td>
    <div class="card">
        <div class="card-img"><img src="data:image/png;base64,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" width="180px" height="180px"></div>
        <div class="card-title">Telcel</div>
        <div class="card-subtitle"></div>
        <hr class="card-divider">
        <div class="card-footer">
        <div class="card-price"><span></span>
            <form action="../arealogin.php" method="POST">
            <select name="monto" id="clic">
            <option value="monto">Selecciona un Monto</option>
            <option value="30">$  30.00</option>
            <option value="50">$  50.00</option>
            <option value="100">$  100.00</option>
            </select>
            <input type="hidden" name="Tipo_serv" value="Telcel">
            <input type="hidden" name="valor_pre" value="recargas">
            <input type="hidden" name="totalValue" id="totalValue">
            <input type="submit" value="Enviar"/>
        </form></div>
    </div>
    <script>
function updateHiddenValue() {
    // Obtener el valor seleccionado del campo select
    var selectedValue = document.getElementById('clic').value;
    
    // Asignar el valor seleccionado al campo oculto
    document.getElementById('totalValue').value = selectedValue;
}
</script>
        </td>
        <td>
    <div class="card">
        <div class="card-img"><img src="data:image/png;base64,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" width="180px" height="180px"></div>
        <div class="card-title">Movistar</div>
        <div class="card-subtitle"></div>
        <hr class="card-divider">
        <div class="card-footer">
        <div class="card-price"><span></span>
            <form action="../pedidos.php" method="POST">
                <select name="monto" id="clic">
                    <option value="monto">Selecciona un Monto</option>
                    <option value="30">$ 30.00</option>
                    <option value="50">$ 50.00</option>
                    <option value="100">$ 100.00</option>
                </select>
                <input type="hidden" name="Tipo_serv" value="Movistar">
                <input type="hidden" name="valor_pre" value="recargas">
                <input type="hidden" name="totalValue" id="totalValue">
                <input type="submit" value="Enviar"/>
            </form></div>
    </div>
    <script>
function updateHiddenValue() {
    // Obtener el valor seleccionado del campo select
    var selectedValue = document.getElementById('clic').value;
    
    // Asignar el valor seleccionado al campo oculto
    document.getElementById('totalValue').value = selectedValue;
}
</script>
        <td>
        <div class="card">
            <div class="card-img"><img src="data:image/png;base64,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" width="180px" height="180px"></div>
            <div class="card-title">AT&T</div>
            <div class="card-subtitle"></div>
            <hr class="card-divider">
            <div class="card-footer">
            <div class="card-price"><span></span> 
                <form action="../pedidos.php" method="POST">
                    <select name="monto" id="clic">
                    <option value="monto">Selecciona un Monto</option>
                    <option value="30">$ 30.00</option>
                    <option value="50">$ 50.00</option>
                    <option value="100">$ 100.00</option>
                    </select>
                    <input type="hidden" name="Tipo_serv" value="AT&T">
                    <input type="hidden" name="valor_pre" value="recargas">
                    <input type="hidden" name="totalValue" id="totalValue">
                    <input type="submit" value="Enviar"/>
                </form></div>
        </div>
        <script>
function updateHiddenValue() {
    // Obtener el valor seleccionado del campo select
    var selectedValue = document.getElementById('clic').value;
    
    // Asignar el valor seleccionado al campo oculto
    document.getElementById('totalValue').value = selectedValue;
}
</script>
</table>
</center>
</body>
</html>