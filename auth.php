<?php
    /********************************************************
       Controlla che l'utente sia già autenticato, per non 
       dover chiedere il login ad ogni volta               
    *********************************************************/
    require_once 'dbconfig.php';
    session_start();

    function checkAuth() {
        // Se esiste già una sessione, la ritorno, altrimenti ritorno 0
        if(isset($_SESSION['username'])) {
            return $_SESSION['username'];
        } else 
            return 0;
    }
?>