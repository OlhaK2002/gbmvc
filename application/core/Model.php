<?php
namespace application\core;

use application\lib\DB;

class Model
{
    protected $db;
    public $route;
    public function __construct($route)
    {
        $this->db = new DB();
        $this->db->Connect();
        $this->route = $route;
    }

}
