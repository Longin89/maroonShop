<?php 
namespace App\Lib\Gateways;
use App\Lib\Gateways\{RoboGateway};

class Gateway {
    public static function build($cart_id) {
        if(GATEWAY == 'robo') {
            return new RoboGateway($cart_id);
        }
    }
}
?>