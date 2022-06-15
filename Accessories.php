<?php 
require_once __DIR__ . "/Product.php";
require_once __DIR__ . "/Color.php";

class Accessories extends Product {
    use Color;

    function __construct($_brand, $_name, $_price, $_rating)
    {
        parent::__construct($_brand, $_name, $_price, $_rating);
    }
}
?>