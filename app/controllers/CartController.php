<?php

namespace App\Controllers;

use Core\{Controller,Cookie,H, Session, Router};
use App\Models\{Products,Carts,CartItems, Transactions, Users};
use App\Lib\Gateways\Gateway;

class CartController extends Controller
{

  public function indexAction()
  {
    $user = Users::currentUser();
    $cart_id = Cookie::get(CART_COOKIE_NAME);
    $itemCount = 0;
    $subTotal = 0;
    $shippingTotal = 0;
    $items = Carts::findAllItemsByCartId((int)$cart_id);
    foreach ($items as $item) {
      $itemCount += $item->qty;
      $shippingTotal += ($item->qty * $item->shipping);
      $subTotal += $item->qty * $item->price;
    }
    $this->view->subTotal = $subTotal;
    $this->view->shippingTotal = $shippingTotal;
    $this->view->grandTotal = $subTotal + $shippingTotal;
    $this->view->user = $user;
    $this->view->itemCount = $itemCount;
    $this->view->items = $items;
    $this->view->cartId = $cart_id;
    $this->view->render('cart/index');
  }

  public function addToCartAction($product_id)
  {
    $cart = Carts::findCurrentCartOrCreateNew();
    $item = CartItems::addProductToCart($cart->id, (int)$product_id);
    $item->qty = $item->qty + 1;
    $item->save();
    $this->view->render('cart/addToCart');
  }

  public function changeQtyAction($direction, $item_id)
  {
    $item = CartItems::findById((int)$item_id);
    if ($direction == 'down') {
      $item->qty -= 1;
    } else {
      $item->qty += 1;
    }

    if ($item->qty > 0) {
      $item->save();
    }
    Router::redirect('cart');
  }

  public function removeItemAction($item_id)
  {
    $item = CartItems::findById((int)$item_id);
    $item->delete();
    Router::redirect('cart');
  }

  public function checkoutAction($cart_id)
  {

    $gw = Gateway::build((int)$cart_id);
    $tx = new Transactions();

    if($this->request->isPost()){
      $whiteList = ['name','shipping_address','shipping_city','shipping_zip'];
      $this->request->csrfCheck();
      $tx->assign($this->request->get(),$whiteList,false);
      $step = $this->request->get('step');
      if($step == '2'){
        $resp = $gw->processForm($this->request->get());
        $tx = $resp['tx'];
        if($resp['success'] != true){
          $tx->addErrorMessage('card-element',$resp['msg']);
        } else {
          Router::redirect('cart/thankYou/'.$tx->id);
        }
      }
    }
    $this->view->displayErrors = $tx->getErrorMessages();
    $this->view->tx = $tx;
    $this->view->grandTotal = $gw->grandTotal;
    $this->view->shippingTotal = $gw->shippingTotal;
    $this->view->items = $gw->items;
    $this->view->cartId = $cart_id;
    if(!$this->request->isPost() || !$tx->validationPassed()){
      $this->view->render('cart/shipping_address_form');
    } else {
      $this->view->render($gw->getView());
    }
  }
}

