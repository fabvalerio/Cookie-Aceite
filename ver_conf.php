<?php
header('Content-Type: application/json');
if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];
    if (isset($_GET['confirmar'])) {
        $ip=$_GET['ip'];
        setcookie($ip, 'confimado');
        echo json_encode(['status'=>'sucesso']);
    } else {
        $ip=preg_replace('@\.@is','_',$ip);
        if (isset($_COOKIE[$ip]) && $_COOKIE[$ip] == 'confimado') {
            echo json_encode(['status' => 'sucesso']);
        } else {
            echo json_encode(['status' => 'erro']);
        }
    }
}
?>
