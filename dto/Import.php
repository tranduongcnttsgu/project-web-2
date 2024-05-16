<?php

namespace dto;

class Import
{
    private $import_id;
    private $supplier_id;
    private $import_date;
    private $total_price;
    private $total_product;
    private $status;

    public function __construct($import_id, $supplier_id, $import_date, $total_price, $total_product, $status)
    {
        $this->import_id = $import_id;
        $this->supplier_id = $supplier_id;
        $this->import_date = $import_date;
        $this->total_price = $total_price;
        $this->total_product = $total_product;
        $this->status = $status;
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

    public function getImportId()
    {
        return $this->import_id;
    }

    public function getSupplierId()
    {
        return $this->supplier_id;
    }

    public function getImportDate()
    {
        return $this->import_date;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function getTotalProduct()
    {
        return $this->total_product;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setImportId($import_id)
    {
        $this->import_id = $import_id;
    }

    public function setSupplierId($supplier_id)
    {
        $this->supplier_id = $supplier_id;
    }

    public function setImportDate($import_date)
    {
        $this->import_date = $import_date;
    }

    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
    }

    public function setTotalProduct($total_product)
    {
        $this->total_product = $total_product;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
