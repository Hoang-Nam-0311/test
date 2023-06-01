<?php 
namespace App\Helper;

class Cart {
    public $items;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->totalPrice = $this->setTotalPrice();
        $this->totalQuantity = $this->setTotalQuantity();
    }


    public function checkAttrExist($dataAttr){
        foreach($this->items as $item){
            if(is_array($dataAttr['attr_id'])){
                foreach($dataAttr['attr_id'] as $attr){
                    if (in_array($attr,$item->attr_id))
                    return false;
                }
                
            }
           
        }
        return true;
    }

    public function create($prod, $dataAttr)
    {
        $id = $prod->id;
        // dd($dataAttr['attr_id'], $this->items[$id]->attr_id);
        if (isset($this->items[$id]) && $this->checkAttrExist($dataAttr)) {
            $this->items[$id]->quantity += $dataAttr['quantity'];
        } else {
            $item = (object) [
                'id' => $id,
                'name' => $prod->name,
                'image' => $prod->image,
                'price' => $prod->price,
                'quantity' => $dataAttr['quantity'],
                'attr_id' => $dataAttr['attr_id'],
            ];
            
            $this->items[$id] = $item;
            
        } 
        
        
        // dd($this->items);
        
        session(['cart' => $this->items]);
    }

    public function delete($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
            session(['cart' => $this->items]);
        }
    }

    public function update($id, $quantity = 1)
    {
        if (isset($this->items[$id])) {
            $this->items[$id]->quantity = $quantity;

            session(['cart' => $this->items]);
        }
    }

    public function clear()
    {
        session(['cart' => null]);
    }

    private function setTotalPrice()
    {
        $total = 0;

        foreach($this->items as $item) {
            
            $total += $item->quantity * $item->price;
        }

        return $total;
    }

    
    private function setTotalQuantity()
    {
        $total = 0;

        foreach($this->items as $item) {
            $total += $item->quantity;
        }

        return $total;
    }
}