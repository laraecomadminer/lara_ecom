<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    //
	protected $table = "products";
	protected $primarykey = "id";
	protected $fillable = ['productName', 'productPrice', 'productQuantity', 'productPic'];
}
