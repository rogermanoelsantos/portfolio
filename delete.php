<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require './Conn.php';
    require './User.php';

    $deleteUsers = new User();
    $deleted = 0;
    foreach ($_POST['delete'] as $id) {
        if ($deleteUsers->delete($id)) {
            $deleted++;
        }
    }

    // if ($deleted > 0) {
    //     $_SESSION['msg'] = "<p style='color:green;'>$deleted usuários excluídos com sucesso!</p>";
    // } else {
    //     $_SESSION['msg'] = "<p style='color:red;'>Erro ao excluir usuários!</p>";
    // }
}

header('Location: index.php');
exit;
