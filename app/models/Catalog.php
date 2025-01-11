<?php

namespace App\Models;

use App\Models\{Brands, CatalogImages};
use Core\Model;
use Core\Session;
use Core\Validators\{RequiredValidator, NumericValidator};

class Catalog extends Model {
    public $id, $user_id, $title, $price, $shipping, $featured = 0, $deleted=0, $purpose, $skin, $sub_desc, $description, $compound, $howto, $capacity, $brand_id, $created, $updated;
    
    protected static $_table = 'catalog';
    protected static $_softDelete = true;

    public function beforeSave(){
      $this->timeStamps();
    }

    public function validator()
    {
        $requiredFields = ['title' => 'Название', 'price' => 'Цена', 'capacity' => 'Емкость', 'sub_desc' => 'Краткое описание', 'description' => 'Описание', 'compound' => 'Состав', 'howto' => 'Способ применения', 'skin' => 'Тип кожи', 'purpose' => 'Назначение', 'brand_id' => 'Бренд'];
        $numericFields = ['price' => 'Цена', 'capacity' => 'Емкость', 'shipping' => 'Доставка'];
        foreach($requiredFields as $key => $val) {
            $this->runValidation(new RequiredValidator($this,['field' => $key, 'msg' => 'Необходимо заполнить пункт '."<$val>"]));
        }
        foreach($numericFields as $key => $val) {
            $this->runValidation(new NumericValidator($this,['field' => $key, 'msg' => 'В поле '."<$val>".' нужно вводить только цифровые значения']));
        }
    }

    public static function findByUserId($user_id,$params=[]){
      $conditions = [
        'conditions' => "user_id = ?",
        'bind' => [(int)$user_id],
        'order' => 'id'
      ];
      $params = array_merge($conditions, $params);
      return self::find($params);
    }

    public static function findByIdAndUserId($id, $user_id){
      $conditions = [
        'conditions' => "id = ? AND user_id = ?",
        'bind' => [(int)$id, (int)$user_id]
      ];
      return self::findFirst($conditions);
    }

    public function isChecked(){
      return $this->featured === 1;
    }

    public function allProducts(){
      $sql = "SELECT 
              catalog.*,
              MAX(i.url) as url,
              brands.name as brand
            FROM catalog
            LEFT JOIN images as i
            ON catalog.id = i.catalog_id
            JOIN brands
            ON catalog.brand_id = brands.id
            WHERE catalog.deleted = '0' AND i.sort = '0'
            GROUP BY catalog.id, brands.id";
      return $this->query($sql)->results();
    }

    public function featuredProducts(){
      $sql = "SELECT 
              catalog.*,
              MAX(i.url) as url,
              brands.name as brand
            FROM catalog
            LEFT JOIN images as i
            ON catalog.id = i.catalog_id
            JOIN brands
            ON catalog.brand_id = brands.id
            WHERE catalog.featured = '1' AND catalog.deleted = '0' AND i.sort = '0'
            GROUP BY catalog.id, brands.id";
      return $this->query($sql)->results();
    }

    public function getBrandName(){
      if(empty($this->brand_id)) return '';
      $brand = Brands::findFirst([
        'conditions' => "id = ?",
        'bind' => [$this->brand_id]
      ]);
      return ($brand)? $brand->name : '';
    }

     public function displayShipping(){
       return ($this->shipping == 0)? "Бесплатная!" : $this->shipping;
     }

    public function getImages() {
      return CatalogImages::find([
        'conditions' => 'catalog_id = ?',
        'bind' => [$this->id],
        'order' => 'sort'
      ]);
    }
  }
