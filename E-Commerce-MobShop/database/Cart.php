<?php

class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    //insert into cart table
    public function insertIntoCart($params = null, $table = "cart")
    {
        if($this->db->con != null){
            if($params != null){
                //"Insert into cart(user_id) values (0)"
                // get table columns 
                $columns = implode(',',array_keys($params));
                $values = implode(',', array_values($params));
                
                //Create SQL query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table,$columns,$values);

                //Execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    //to get user_id and item_id and insert into Cart Table
    public function addToCart($userid, $itemid){
        if(isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            //Insert data into Cart
            $result = $this->insertIntoCart($params);
            if($result){
                //reload page
                header("Location:" . $_SERVER['PHP_SELF']);
            }
        }
    }

    //Calculate sub total
    public function getSum($arr)
    {
        if(isset($arr)){
            $sum = 0;
            foreach($arr as $item)
            {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    //Delete Cart item using cart item_id
    public function deleteCart($item_id = null, $table = 'cart')
    {
        if($item_id != null){
        $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id = {$item_id}");
            if($result){
                //Reload page
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            sprintf($result);
            return $result;
        }
    }

    //Get item_id of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id")
    {
        if($cartArray != null){
            $cart_id = array_map(function($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    //Save for later
    public function saveForLater($item_id = null, $saveTable = 'wishlist', $fromTable = 'cart')
    {
        if($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id ={$item_id};";
            $query.="DELETE FROM {$fromTable} WHERE item_id = {$item_id};";
        }
        //execute multi query
        $result = $this->db->con->multi_query($query);
        if($result){
            header("Location:" . $_SERVER['PHP_SELF']);
        }
    }

}

?>