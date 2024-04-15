<?php

namespace dto;

class OrderDetail
{
    private $order_id;
    private $product_id;
    private $product_name;
    private $productImage;
    private $delivered;
    private $delivered_date;
    private $price;
    private $discount;
    private $total_price;
    private $status;
    private $quantity;

    // Getter và Setter cho $order_id
    public function getOrder_id()
    {
        return $this->order_id;
    }

    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
    }

    // Getter và Setter cho $product_id
    public function getProduct_id()
    {
        return $this->product_id;
    }

    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;
    }

    // Getter và Setter cho $product_name
    public function getProduct_name()
    {
        return $this->product_name;
    }

    public function setProduct_name($product_name)
    {
        $this->product_name = $product_name;
    }

    // Getter và Setter cho $productImage
    public function getProductImage()
    {
        return $this->productImage;
    }

    public function setProductImage($productImage)
    {
        $this->productImage = $productImage;
    }

    // Getter và Setter cho $delivered
    public function getDelivered()
    {
        return $this->delivered;
    }

    public function setDelivered($delivered)
    {
        $this->delivered = $delivered;
    }

    // Getter và Setter cho $delivered_date
    public function getDelivered_date()
    {
        return $this->delivered_date;
    }

    public function setDelivered_date($delivered_date)
    {
        $this->delivered_date = $delivered_date;
    }

    // Getter và Setter cho $price
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    // Getter và Setter cho $discount
    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    // Getter và Setter cho $total_price
    public function getTotal_price()
    {
        return $this->total_price;
    }

    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;
    }

    // Getter và Setter cho $status
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    // Getter và Setter cho $quantity
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}
