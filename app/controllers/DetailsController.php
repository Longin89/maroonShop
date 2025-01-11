<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Catalog;
use Core\H;
use Core\Router;
use Core\Session;

class DetailsController extends Controller
{

    public function detailsAction($product_id)
    {
        $product = Catalog::findById((int)$product_id);
        if(!$product) {
            Router::redirect('home');
        }
        $this->view->product = $product;
        $this->view->render('catalog/details');
    }
}
