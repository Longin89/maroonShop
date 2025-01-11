<?php

namespace App\Lib\Gateways;

use App\Models\Carts;

abstract class AbstractGateway
{
    public $cart_id, $items, $itemCount = 0, $subTotal, $shippingTotal, $grandTotal = 0;
    public $chargeSuccess = false, $msgToUser = '';

    public function __construct($cart_id)
    {
        $this->cart_id = $cart_id;
        $this->items = Carts::findAllItemsByCartId($cart_id);
        foreach ($this->items as $item) {
            $this->itemCount += $item->qty;
            $this->subTotal += ($item->price * $item->qty);
            $this->shippingTotal += ($item->shipping * $item->qty);
        }

        $this->grandTotal = $this->subTotal + $this->shippingTotal;
    }

    abstract public function getView();
}
