<?php

namespace App\Models;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		//tạo giỏ hàng là một mảng
		$giohang = ['qty'=>0, 'price' => $item->promotion_price, 'item' => $item];
		//nếu giỏ hàng đã chứa sản phẩm muốn thêm thì gán giỏ hàng mới tạo bằng giỏ hàng cũ
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		//thiết lập số lượng và giá cho sản phẩm mới
		$giohang['qty']++;
		$giohang['price'] = $item->promotion_price * $giohang['qty'];
		//cập nhật lại cart
		$this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $item->promotion_price;
	}

	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
