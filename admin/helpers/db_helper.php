<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 11:44 AM
 */

function AllCounts($table){
    $db = new Database();
    $db->query("select * from {$table}");
    $db->execute();
    $count = $db->rowCount();
    return $count;
}

function CalcAmount($table, $column){
    $db = new Database();
    $db->query("select sum({$column}) from {$table}");
    $total = $db->sum();
//    print_r($total);
    return $total;
}


function CustomerName($id){
    $db = new Database();
    $db->query("SELECT request.*, customers.customer_id, customers.first_name, customers.last_name
                       FROM request
                       INNER JOIN customers ON 
                       request.customer_id = customers.customer_id ;");
    $db->bind(':id', $id);

    $result = $db->single();
    return $result->first_name . ' '. $result->last_name;
}

