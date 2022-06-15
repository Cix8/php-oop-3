<?php 
require_once __DIR__ . "/Product.php";
require_once __DIR__ . "/DedicatedTo.php";

class Parapharmacy extends Product {
    use DedicatedTo;

    function __construct($_brand, $_name, $_price, $_rating)
    {
        parent::__construct($_brand, $_name, $_price, $_rating);
    }
}
?>