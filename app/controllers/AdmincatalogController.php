<?php

namespace App\Controllers;

use Core\Controller;
use Core\H;
use Core\Session;
use Core\Router;
use App\Models\Catalog;
use App\Models\CatalogImages;
use App\Lib\Utilities\Uploads;
use App\Models\Brands;
use App\Models\Users;

class AdmincatalogController extends Controller
{

  public function onConstruct()
  {
    $this->view->setLayout('admin');
    $this->currentUser = Users::currentUser();
  }

  public function indexAction()
  {
    $this->view->products = Catalog::findByUserId($this->currentUser->id);
    $this->view->render('admincatalog/index');
  }

  public function addAction()
  {
    $product = new Catalog();
    $catalogImage = new CatalogImages();
    if ($this->request->isPost()) {
      $this->request->csrfCheck();
      $files = $_FILES['catalogImages'];
      if ($files['tmp_name'][0] == '') {
        $product->addErrorMessage('catalogImages', 'Вы должны выбрать изображение');
      } else {
        $uploads = new Uploads($files);
        $uploads->runValidation();
        $imagesErrors = $uploads->validates();
        if (is_array($imagesErrors)) {
          $msg = "";
          foreach ($imagesErrors as $name => $message) {
            $msg .= $message . " ";
          }
          $product->addErrorMessage('catalogImages', trim($msg));
        }
      }
      $product->assign($this->request->get());
      $product->featured = ($this->request->get('featured') == 'on') ? 1 : 0;
      $product->user_id = $this->currentUser->id;
      $product->save();
      if ($product->validationPassed()) {
        //upload images
        CatalogImages::uploadProductImages($product->id, $uploads);
        //redirect
        Session::addMsg('success', 'Товар сохранен!');
        Router::redirect('admincatalog');
      }
    }
    $this->view->product = $product;
    $this->view->brands = Brands::getOptionsForForm(Users::currentUser()->id);
    $this->view->formAction = PROOT . 'admincatalog/add';
    $this->view->displayErrors = $product->getErrorMessages();
    $this->view->render('admincatalog/add');
  }

  public function deleteAction(){
    $resp = ['success'=>false,'msg'=>'Something went wrong...'];
    if($this->request->isPost()){
      $id = $this->request->get('id');
      $product = Catalog::findByIdAndUserId($id, $this->currentUser->id);
      if($product){
        CatalogImages::deleteImages($id);
        $product->delete();
        $resp = ['success' => true, 'msg' => 'Product Deleted.','model_id' => $id];
      }
    }
    $this->jsonResponse($resp);
  }

  public function toggleFeaturedAction()
  {
    $resp = ['success' => false, 'msg' => 'Something went wrong...'];
    if ($this->request->isPost()) {
      $id = $this->request->get('id');
      $product = Catalog::findByIdAndUserId($id, $this->currentUser->id);
      if ($product) {
        $product->featured = ($product->featured == 1) ? 0 : 1;
        $product->save();
        $msg = ($product->featured == 1) ? "Акция включена" : "Акция выключена";
        $resp = ['success' => true, 'msg' => $msg, 'model_id' => $id, 'featured' => $product->featured];
      }
    }
    $this->jsonResponse($resp);
  }

  public function editAction($id)
  {
    $user = Users::currentUser();
    $product = Catalog::findByIdAndUserId((int)$id, $user->id);
    if (!$product) {
      Session::addMsg('danger', 'У вас нет прав для редактирования');
      Router::redirect('admincatalog');
    }
    $images = CatalogImages::findByProductId($product->id);
    if ($this->request->isPost()) {
      $this->request->csrfCheck();
      $files = $_FILES['catalogImages'];
      $isFiles = $files['tmp_name'][0] != '';
      if ($isFiles) {
        // $productImage = new ProductImages();
        $uploads = new Uploads($files);
        $uploads->runValidation();
        $imagesErrors = $uploads->validates();
        if (is_array($imagesErrors)) {
          $msg = "";
          foreach ($imagesErrors as $name => $message) {
            $msg .= $message . " ";
          }
          $product->addErrorMessage('catalogImages', trim($msg));
        }
      }
      $product->assign($this->request->get());
      $product->featured = ($this->request->get('featured') == 'on') ? 1 : 0;
      $product->user_id = $this->currentUser->id;
      $product->save();
      if ($product->validationPassed()) {
        if ($isFiles) {
          //upload images
          CatalogImages::uploadProductImages($product->id, $uploads);
        }
        $sortOrder = json_decode($_POST['images_sorted']);
        CatalogImages::updateSortByProductId($product->id, $sortOrder);
        //redirect
        Session::addMsg('success', 'Товар сохранен!');
        Router::redirect('admincatalog');
      }
    }
    $this->view->brands = Brands::getOptionsForForm($user->id);
    $this->view->images = $images;
    $this->view->product = $product;
    $this->view->displayErrors = $product->getErrorMessages();
    $this->view->render('admincatalog/edit');
  }

  function deleteImageAction()
  {
    $resp = ['success' => false];
    if ($this->request->isPost()) {
      $user = Users::currentUser();
      $id = $this->request->get('image_id');
      $image = CatalogImages::findById($id);
      $product = Catalog::findByIdAndUserId($image->catalog_id, $user->id);
      if ($product && $image) {
        CatalogImages::deleteById($image->id);
        $resp = ['success' => true, 'model_id' => $image->id];
      }
    }
    $this->jsonResponse($resp);
  }
}
