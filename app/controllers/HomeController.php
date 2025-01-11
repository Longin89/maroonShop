<?php

namespace App\Controllers;

use App\Models\Catalog;
use Core\Controller;
use Core\H;
use App\Models\Users;


class HomeController extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
    }

    public function indexAction()
    {
        $pModel = new Catalog;
        $products = $pModel->featuredProducts();
        $user = Users::currentUser();
        //$user->addAcl($user->id, "Admin");
        $this->view->user = $user;
        $this->view->products = $products;
        $this->view->render('home/index');

    }
}
