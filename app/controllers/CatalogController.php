<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Catalog;
use Core\H;
use Core\Router;
use Core\Session;

class CatalogController extends Controller
{
    public function indexAction()
    {
        $pModel = new Catalog;
        $products = $pModel->allProducts();
        $this->view->products = $products;
        $this->view->render('catalog/index');
    }

    public function detailsAction($product_id)
    {
        $product = Catalog::findById((int)$product_id);
        if (!$product) {
            Router::redirect('home');
        }
        $this->view->product = $product;
        $this->view->images = $product->getImages();
        $this->view->render('catalog/details');
    }
}
