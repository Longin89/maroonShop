<?php 
namespace App\Models;

use Core\{Model};

class Transactions extends Model {
    protected static $_table = 'transactions';
    protected static $_softDelete = true;

    public $id, $created, $updated, $cart_id, $gateway, $type, $amount, $success = 0, $year, $month;
    public $charge_id, $reason, $card_brand, $last4, $name, $shipping_address;
    public $shipping_city, $shipping_zip, $deleted = 0;

    public function beforeSave()
    {
        $this->timeStamps();
    }
}
?>