<?php

require_once __DIR__ . '/Product.php';

class Food extends Product
{

    private $ingredients;
    private $expire_date;

    public function set_ingredients($_ingredients)
    {
        $this->ingredients = $_ingredients;
    }

    public function get_ingredients()
    {
        return $this->ingredients;
    }

    public function set_expire_date($_date)
    {

        if (!strtotime($_date)) {
            throw new Exception('Formato di data non valido');
        }

        $expire_date = new DateTime($_date);
        $current_date = new DateTime('now');
        $_date = date('d/m/Y', strtotime($_date));


        if ($current_date > $expire_date) {
            throw new Exception("Prodotto scaduto il {$_date}");
        }

        $this->expire_date = $_date;
    }

    public function get_expire_date()
    {
        return $this->expire_date;
    }
}
