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
<title>Acerca de Nosotros</title>
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <header>
        <nav>
            <a href="../home.php">
            <p><img alt="Cambiar imagen" height="100px" width="100px" onmouseout="this.src='https://i.pinimg.com/originals/46/5b/ac/465baca50ce17350b78b1cc648d838cc.png';" onmouseover="this.src='https://i.pinimg.com/736x/fd/1d/cb/fd1dcb83390f10a1f7e8578a9ae63e4f.jpg';" src="https://i.pinimg.com/originals/46/5b/ac/465baca50ce17350b78b1cc648d838cc.png" /></p>
            <ul>
                <li>
                    <a ref="Acerca_de_Nosotros.php">
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
                    <a href="Nuestros_Servicios.php">
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
                    <a href="Credenciales.html">
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
                    <a href="arealogin.php">
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
    <img src="https://i.pinimg.com/736x/f4/b3/3d/f4b33d9d60dcd6c95a04ece4f5414670.jpg" height="400px" width="450px">
<p>
    Nos ubicamos en la colonia Infonavit Rivera Analla, en la calle Jesus Castillo Sosa al lado de la Misc.La Vaquita.</p>
<br></br>

<p>
    Somos  una empresa dedicada a mejorar y atender  el servicio del  cliente acudiendo a las problemáticas que se presenten
    de acuerdo a las necesidades; la elaboración de este proyecto nos permitirá conocer a fondo la oportunidad de negocio que
    deseamos aprovechar, permitiéndonos cuantificar de forma realista la inversión, así como los medios materiales y humanos 
    necesarios para ponerlo en marcha, además de valorar la marcha del negocio y detectar posibles desviaciones respecto a las 
    previsiones planificadas inicialmente.</p>
</center>
</body>
    </html>
