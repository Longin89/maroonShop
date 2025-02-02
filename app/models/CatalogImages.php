<?php

namespace App\Models;

use App\Lib\Utilities\Uploads;
use Core\Model;
use Core\H;

class CatalogImages extends Model
{
  public $catalog_id, $sort = 0, $id, $url, $name, $deleted=0; 
  protected static $_table = 'images';
  protected static $_softDelete = true;


  public static function uploadProductImages($product_id,$uploads){
    $lastImage = self::findFirst([
      'conditions' =>  "catalog_id = ?",
      'bind' => [$product_id],
      'order' => 'sort DESC'
    ]);
    $lastSort = (!$lastImage)? 0 : $lastImage->sort;
    $path = DS.'uploads'.DS.'catalog_images'.DS.'product_'.$product_id.DS;
    foreach($uploads->getFiles() as $file){
      $parts = explode('.',$file['name']);
      $ext = end($parts);
      $hash = sha1(time().$product_id.$file['tmp_name']);
      $uploadName = $hash . '.' . $ext;
      $image = new self();
      $image->url = $path . $uploadName;
      $image->name = $uploadName;
      $image->catalog_id = $product_id;
      $image->sort = $lastSort;
      if($image->save()){
        $uploads->upload($path,$uploadName,$file['tmp_name']);
        $lastSort++;
      }
    }
  }

  public static function deleteImages($product_id,$unlink = false){
    $images = self::find([
      'conditions' => "catalog_id = ?",
      'bind' => [$product_id]
    ]);
    foreach($images as $image){
      $image->delete();
    }
    if($unlink){
      $dirname = ROOT.DS.'uploads' . DS . 'catalog_images' . DS . 'product_' . $product_id;
      array_map('unlink', glob("$dirname/*.*"));
      rmdir($dirname);
    }
  }

  public static function deleteById($id){
    $image = self::findById($id);
    $sort = $image->sort;
    $afterImages = self::find([
      'conditions' => "catalog_id = ? and sort > ?",
      'bind' => [$image->catalog_id, $sort]
    ]);
    foreach($afterImages as $af){
      $af->sort = $af->sort -1;
      $af->save();
    }
    unlink(ROOT.DS.'uploads'.DS. 'catalog_images'.DS.'product_'.$image->catalog_id.DS. $image->name);
    return $image->delete();
  }

  public static function findByProductId($product_id){
    return self::find([
      'conditions' => "catalog_id = ?",
      'bind' => ['catalog_id'=>$product_id],
      'order' => 'sort'
    ]);
  }

  public static function updateSortByProductId($product_id,$sortOrder=[]){
    $images = self::findByProductId($product_id);
    $i = 0;
    foreach($images as $image){
      $val = 'image_'.$image->id;
      $sort = (in_array($val,$sortOrder))? array_search($val,$sortOrder) : $i;
      $image->sort = $sort;
      $image->save();
      $i++;
    }
  }

}
