<?php

class NotificacoesController extends Controller
{


  private $data = array();

  public function __construct()
  {
    $users = new Users();

    if (!$users->isLogged()) {
      header("Location: " . BASE_URL . "Login");
      exit;
    } else {
      $users->setLoggedUser();
      $this->data["name"] = $users->getName();
      $this->data["id"] = $users->getId();
      $this->data["id_group"] = $users->getIdGroup();
    }

    if ($users->getIdGroup() == 4) {
      header('Location: ' . BASE_URL . 'HomeAluno');
      exit;
    }
  }


  public function index()
  {
    $this->data['nivel-1'] = 'Notificações';
    $this->data['nivel-2'] = 'Notificações';

    $home = new Home();

    $this->data['list_notificacoes'] = $home->getNotificacoes();
    $this->data['total_notificacoes'] = $home->getTotalNotificacoes();


    // echo 'foi';
    // // var_dump($this->data['list_notificacoes']);
    // exit;
    $this->loadTemplateAdmin('Admin/Notificacoes/index', $this->data);
  }
}

?>