<?php
  namespace App\Lib\Gateways;
  use App\Lib\Gateways\AbstractGateway;
  use Stripe\{Stripe,Charge};
  use App\Models\{Transactions,Carts};
  use Core\{H};

  class StripeGateway extends AbstractGateway{

    public static $gateway = 'robo';

    public function getView(){
      return 'card_forms/robo';
    }

    public function processForm($post){
        $data = [
          'amount' => $this->grandTotal * 100,
          'currency' => 'usd',
          'description' => 'Ruah purchase: ' . $this->itemCount . 'items. Cart ID: ' . $this->cart_id,
          'source' => $post['stripeToken'],
          'shipping' => ['address'=>$this->parseShippingAddress($post),'name'=>$post['name']]
        ];
  
        $ch = $this->charge($data);
        H::dnd($ch);
        $this->handleChargeResp($ch);
        $tx = $this->createTransaction($ch);
      }
  
      public function charge($data){
        Stripe::setApiKey(ROBO_PASS2);
        $charge = Charge::create($data);
        return $charge;
      }
  
      public function handleChargeResp($ch){
        $this->chargeSuccess = $ch->outcome->network_status == 'approved_by_network';
        $this->msgToUser = $ch->outcome->seller_message;
      }
  
      protected function parseShippingAddress($post){
        return [
          'line1' => $post['shipping_address'],
          'city' => $post['shipping_city'],
          'postal_code' => $post['shipping_zip']
        ];
      }
  
      public function createTransaction($ch){
        $tx = new Transactions();
        $tx->cart_id = $this->cart_id;
        $tx->gateway = static::$gateway;
        $tx->type = $ch->payment_method_details->type;
        $tx->amount = $this->grandTotal;
        $tx->success = ($this->chargeSuccess)? 1 : 0;
        $tx->charge_id = $ch->id;
        $tx->reason = $ch->outcome->reason;
        $tx->card_brand = $ch->payment_method_details->card->brand;
        $tx->last4 = $ch->payment_method_details->card->last4;
        $tx->name = $ch->shipping->name;
        $tx->shipping_address = $ch->shipping->address->line1;
        $tx->shipping_city = $ch->shipping->address->city;
        $tx->shipping_zip = $ch->shipping->address->postal_code;
        $tx->save();
        return $tx;
      }
  
      public function getToken(){
        return false;
      }
  }
