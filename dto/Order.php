<?php

namespace dto;

class Order
{
    private $order_id;
    private $order_date;
    private $status;
    private  $messge_status;
    private $message_status_payment;
    private $message_admin;
    private $customer_id;
    private $total_product;
    private $total_discount;
    private $status_payment;
    private $status_transport;
    private $note;
    private $price;
    private $total_price;
    public function __construct()
    {
        $this->order_id = $this->autoId();
        $this->messge_status = "Đang chờ xác nhận";
        $this->message_status_payment = "Chưa thanh toán";
    }
    function autoId()
    {
        $timestamp = time();
        $id = date('YmdHis', $timestamp); // Năm + tháng + ngày + giờ + phút + giây
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = 10;
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $id .= $characters[mt_rand(0, $max)];
        }

        return $id;
    }
    public  function  getMessage_status()
    {
        return $this->messge_status;
    }
    public   function getMessage_status_payment()
    {
        return  $this->message_status_payment;
    }
    public  function getMessage_admin()
    {
        return  $this->message_admin;
    }
    public  function setMessage_status($mes)
    {
        $this->messge_status = $mes;
    }
    public  function setMessae_status_payment($mes)
    {
        $this->message_status_payment = $mes;
    }
    public  function setMessage_admin($mes)
    {
        $this->message_admin = $mes;
    }
    // Getter và Setter cho $order_id
    public function getOrder_id()
    {
        return $this->order_id;
    }

    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
    }

    // Getter và Setter cho $order_date
    public function getOrder_date()
    {
        return $this->order_date;
    }

    public function setOrder_date($order_date)
    {
        $this->order_date = $order_date;
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

    // Getter và Setter cho $customer_id
    public function getCustomer_id()
    {
        return $this->customer_id;
    }

    public function setCustomer_id($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    // Getter và Setter cho $total_product
    public function getTotal_product()
    {
        return $this->total_product;
    }

    public function setTotal_product($total_product)
    {
        $this->total_product = $total_product;
    }

    // Getter và Setter cho $total_discount
    public function getTotal_discount()
    {
        return $this->total_discount;
    }

    public function setTotal_discount($total_discount)
    {
        $this->total_discount = $total_discount;
    }

    // Getter và Setter cho $status_payment
    public function getStatus_payment()
    {
        return $this->status_payment;
    }

    public function setStatus_payment($status_payment)
    {
        $this->status_payment = $status_payment;
    }

    // Getter và Setter cho $status_transport
    public function getStatus_transport()
    {
        return $this->status_transport;
    }

    public function setStatus_transport($status_transport)
    {
        $this->status_transport = $status_transport;
    }

    // Getter và Setter cho $note
    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;
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

    // Getter và Setter cho $total_price
    public function getTotal_price()
    {
        return $this->total_price;
    }

    public function setTotal_price($total_price)
    {
        $this->total_price = $total_price;
    }
}
