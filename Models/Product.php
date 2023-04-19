<?php
require_once __DIR__ . '/../Traits/Name.php';
require_once __DIR__ . '/Category.php';
/**
 * Product
 * Define the default product
 * 
 * @author Gaetano Frascolla
 */
class Product
{

    use Name {
        get_name as get_trait_name;
    }

    private $id;
    private $description;
    private $category;
    private $price;
    private $image;

    /**
     * __construct
     *
     * @param  int $_id
     * @param  string $_name
     * @param  string $_description
     * @param  Category $_category
     * @param  float $_price
     * @param  string $_image
     */
    public function __construct($_id, $_name, $_description, $_category, $_price, $_image)
    {

        $this->id = $_id;
        $this->name = $_name;
        $this->description = $_description;
        $this->category = $_category;
        //$this->price = $_price;
        $this->set_price($_price);
        $this->image = $_image;
    }

    /**
     * Get ID
     * get the product identifier
     *
     * @return int
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * Set ID
     * set the product ID
     * 
     * @param  int $_id
     */
    public function set_id($_id)
    {
        $this->name = $_id;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function set_description($_description)
    {
        $this->description = $_description;
    }

    public function get_category()
    {
        return $this->category;
    }


    public function set_category($_category)
    {
        $this->category = $_category;
    }

    public function get_price()
    {
        return $this->price;
    }


    public function set_price($_price)
    {
        if ($_price <= 0) {
            throw new Exception('Il prezzo deve essere maggiore di zero');
        }

        $this->price = $_price;
    }

    public function get_image()
    {
        return $this->image;
    }

    public function set_image($_image)
    {
        $this->image = $_image;
    }

    public function get_price_formatted()
    {
        return "{$this->price} €";
    }

    public function get_name()
    {
        return "Product: {$this->get_trait_name()}";
    }

    public static function prepare_product_category(string $id, array $categories)
    {
        if (!array_key_exists($id, $categories)) {
            throw new Exception('Product category not found');
        }
        return $categories[$id];
    }
}
