<?php
## HOLI MI REY HERMOSO COMO ESTA ESE QLO
require_once 'Model/UserModel.php';
class UserController extends Controller
{
    function __construct()
    {
        parent::__construct();
        /*  require_once 'View/UserView.php'; */
    }
    public function render()
    {
        $this->view->render('UserView');
    }
    public function login()
    {
        $user = new UserModel();
        $users = $user->login();
        return $users;
    }
    public function search(string $nombres,string $apellidos,string $desde,string $hasta)
    {
        $user = new UserModel();
        $user->setfirstName($nombres);
        $user->setlastName($apellidos);
        $user->setdateRegistred($desde);
        $user->sethasta($hasta);
        $users = $user->search();
        /* echo "<pre>";
        var_dump($users);
        die(); */
        return $users;
    }
    public function insert(string $first,string $second, string $date)
    {
        $user = new UserModel();
        $user->setfirstName($first);
        $user->setlastName($second);
        $user->setdateRegistred($date);
        $save = $user->insert();
 /*        var_dump($save);
        die(); */
        return $save;
    }
    public function last()
    {
        $user = new UserModel();
        $users = $user->idLast();
        return $users;
    }
}
        