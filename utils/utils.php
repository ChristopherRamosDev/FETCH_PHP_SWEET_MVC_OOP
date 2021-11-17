<?php
require_once 'Controller/UserController.php';
if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'search':
            search();
            break;
        case 'index':
            index();
            break;
        case 'insert':
            insert();
            break;
            // ...etc...
    }
}
function insert(){

    $data = $_POST['data'];
    $userCreate = new UserController();
    $json = array(
        'nombres' => $data[0]['value'],
        'apellidos' => $data[1]['value']
    );
    $nombres = $json['nombres'];
    $apellidos = $json['apellidos'];
    $fecha = date("Y-m-d");
    $userCreate->insert($nombres,$apellidos,$fecha); 
    $last = $userCreate->last();
    echo json_encode($last);
 
}
function index()
{
    $user = new UserController();
    $users = $user->login();
    echo json_encode($users);
}
function search()
{
    $data = $_POST['data'];
    $userCreate = new UserController();
    $json = array(
        'nombres' => $data[0]['value'],
        'apellidos' => $data[1]['value'],
        'desde' => $data[2]['value'],
        'hasta' => $data[3]['value']
    );
    $nombres = $json['nombres'];
    $apellidos = $json['apellidos'];
    $desde = $json['desde'];
    $hasta = $json['hasta'];
    switch (true) {
        case ($desde === '' && $hasta !== ''):
            $desde = $json['desde'];
            $user = $userCreate->search($nombres, $apellidos, $desde, $hasta);
            echo json_encode($user);
            break;
        case ($desde !== '' && $hasta === ''):
            $desde = $json['desde'];
            $hasta = $json['hasta'];
            $hasta = $userCreate->last();
            $hastaLast = $hasta[0][0];
            $user = $userCreate->search($nombres, $apellidos, $desde, $hastaLast);
            echo json_encode($user);
            break;
        case ($desde === '' && $hasta === ''):
            $desde = $json['desde'];
            $hasta = $userCreate->last();
            $hastaLast = $hasta[0][0];
            $user = $userCreate->search($nombres, $apellidos, $desde, $hastaLast);
            echo json_encode($user);
            break;
        case ($desde !== '' && $hasta !== ''):
            $desde = $json['desde'];
            $hasta = $json['hasta'];
            $user = $userCreate->search($nombres, $apellidos, $desde, $hasta);
            echo json_encode($user);
            break;
    }
}
