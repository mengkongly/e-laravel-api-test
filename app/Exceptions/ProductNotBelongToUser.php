<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongToUser extends Exception
{
    public function render(){
        return ['errors'=>'Product Not Belong to User.'];
    }
    
}
