<?php
namespace App\Models;
use Core\{Model,Session,Cookie};
use App\Models\{Carts,Catalog};

class CartItems extends Model {

  public $id, $created, $updated, $cart_id, $catalog_id, $qty=0, $deleted=0;
  protected static $_table = 'cart_items';
  protected static $_softDelete = true;

  public function beforeSave(){
    $this->timeStamps();
  }

  public static function findByProductIdOrCreate($cart_id,$product_id){
    $item = self::findFirst([
      'conditions' => "cart_id = ? AND catalog_id = ?",
      'bind' => [$cart_id,$product_id]
    ]);
    if(!$item){
      $item = new self();
      $item->cart_id = $cart_id;
      $item->catalog_id = $product_id;
      $item->save();
    }
    return $item;
  }

  public static function addProductToCart($cart_id,$product_id){
    $product = Catalog::findById((int)$product_id);
    if($product){
      $item = self::findByProductIdOrCreate($cart_id,$product_id);
    }
    return $item;
  }

}
