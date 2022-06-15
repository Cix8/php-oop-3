<?php 

class User {
    public $name;
    public $lastname;
    private $password;
    public $email;
    public $credit_card;
    public $cart = [];
    protected $registered;

    function __construct($credit_card_number, $credit_card_expiration, $_name = "", $_lastname = "", $_email = "", $_registered = false)
    {
        $this->name = $_name;
        $this->lastname = $_lastname;
        $this->email = $_email;
        $this->credit_card = [
            "number" => $credit_card_number,
            "expiration" => $credit_card_expiration
        ];
        $this->registered = $_registered;
        $this->password = $this->fakePwGen();
    }

    public function fakePwGen() {
        if ($this->registered) {
            return "safe.password1234";
        }
        return null;
    }

    public function addToCart($item) {
        if ($item->available) {
            $this->cart[] = $item;
        }
    }

    public function getFinalPrice() {
        $final_price = 0;
        foreach ($this->cart as $single_item) {
            $final_price += $single_item->price;
        }
        if ($this->registered) {
            $final_price *= 80/100;
        }
        return $final_price;
    }

    public function buyItems() {
        $card_year = intval(explode("/" ,$this->credit_card["expiration"])[1]);
        $card_month = intval(explode("/", $this->credit_card["expiration"])[0]);
        $current_year = intval(date("Y"));
        $current_month = intval(date("m"));
        if (($card_year > $current_year) || ($card_year === $current_year && $card_month > $current_month)) {
            echo "Pagamento effettuato con successo!";
            return true;
        }
        echo "Pagamento non riuscito, la tua carta è scaduta!";
        return false;
    }
}
