<?php
require_once __DIR__ . '/../Traits/Name.php';

class Category
{

    use Name;

    private $icon;

    public function __construct($_name, $_icon)
    {
        $this->name = $_name;
        $this->icon = $_icon;
    }

    public function get_icon()
    {
        return $this->icon;
    }

    public function set_icon($_icon)
    {
        $this->icon = $_icon;
    }

    public function get_category_info()
    {
        return "{$this->icon} {$this->name}";
    }
}
