<?php
require_once __DIR__ . "/Product.php";
require_once __DIR__ . "/Expiration.php";

class Food extends Product {
    use Expiration;

    function __construct($_brand, $_name, $_price, $_rating)
    {
        parent::__construct($_brand, $_name, $_price, $_rating);
        $this->available = $this->isAvailable();
    }

    public function isAvailable() {
        if (intval(date("m")) > 1 && intval(date("m")) < 8) {
            return true;
        }
        return false;
    }
}
?>