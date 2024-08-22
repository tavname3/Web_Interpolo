<?php 
class UserSession {
    public function __construct() {
        session_start();
    }
    
    public function setCurrentUser($usuario) {
        $_SESSION['user'] = $usuario;
    }

    public function getCurrentUser() {
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    public function closeSession() {
        session_unset();
        session_destroy();
    }
}
?>
