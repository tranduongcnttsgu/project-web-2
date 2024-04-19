<?php

namespace controllers;

use core\Controller;
use dto\Order;
use dto\OrderDetail;
use models\ProductModel;


class ProductController extends Controller
{
    private  ProductModel $productModel;
    public  function __construct()
    {
        $this->productModel = new ProductModel;
    }
    public function getCategory()
    {
        return $this->productModel->getCategory();
    }
    public function getAuthor()
    {
        return $this->productModel->getAuthor();
    }
    public function getProducts()
    {
        $data =  $this->productModel->getAll("products");


        return json_encode($data);
    }
    public function getCart()
    {
        $checkLogin = $this->getHeader("userLogin") ?? false;
        if (!$checkLogin) {

            return $this->responseJSON("Người dùng chưa đăng nhập", false, 404);
        }

        $data = $this->productModel->getCart($checkLogin);
        return $this->responseJSON("lấy dữ liệu thành công", true, 200, $data);
    }
    public function getOrders()
    {
        $checkLogin = $this->getHeader("userLogin") ?? false;
        if (!$checkLogin) {

            return $this->responseJSON("Người dùng chưa đăng nhập", false, 404);
        }
        $data = $this->productModel->getOrders($checkLogin);
        return $this->responseJSON("lấy dữ liệu thành công", true, 200, $data);
    }
    public function getOrderDetail()
    {
        $checkLogin = $this->getHeader("userLogin") ?? false;
        if (!$checkLogin) {

            return $this->responseJSON("Người dùng chưa đăng nhập", false, 404);
        }
        $data = $this->productModel->getOrderDetail($checkLogin);
        return $this->responseJSON("lấy dữ liệu thành công", true, 200, $data);
    }
    public function searchProductByName()
    {
        $payload = $this->getPayload();
        $data = $this->productModel->findByName($payload["searchKey"]);
        return $this->responseJSON("success", true, 200, $data);
    }
    public function searchProductByCategory()
    {
        $payload = $this->getPayload();
        $data = $this->productModel->findByCateory($payload["category"]);
        return  $this->responseJSON("success", true, 200, $data);
    }
    public function  searchProductByAuthor()
    {
        $payload = $this->getPayload();
        $data = $this->productModel->findByCateory($payload["author"]);
        return $this->responseJSON("success", true, 200, $data);
    }
    public function addProductToCart()
    {
        $checkLogin = $this->cookieGet("userLogin") ?? false;
        if (!$checkLogin) {

            return  $this->responseJSON("Người dùng chưa đăng nhập", false, 404);
        }
        $payload = $this->getPayload();
        $data = $this->productModel->addProductToCart($checkLogin, $payload["productId"], $payload["quantity"]);
        if (!$data) {

            return $this->responseJSON("Thêm không thành công", false, 404, $data);
        }

        return $this->responseJSON("Thêm thành công", true, 200, $data);
    }
    public function addManyProductToOrder()
    {
        $payload = $this->getPayloadJson();
        $data = $payload["data"];
        foreach ($data  as $key => $value) {
            $userId = $this->cookieGet("userLogin");
            $quantity = (int)$value["quantity_purchased"];
            $price = (int)$value["promo_price"];
            $totalPrice = $quantity * $price;
            $order = new Order();
            $order->setCustomer_id($this->cookieGet("userLogin"));
            $order->setStatus("1");
            $order->setTotal_product(1);
            $order->setStatus_payment(0);
            $order->setStatus_transport(0);
            $order->setTotal_price($totalPrice);
            $orderDetail = new OrderDetail();
            $orderDetail->setOrder_id($order->getOrder_id());
            $orderDetail->setProduct_id($value["product_id"]);
            $orderDetail->setProduct_name($value["name"]);
            $orderDetail->setProductImage($value["MainImage"]);
            $orderDetail->setTotal_price($totalPrice);
            $orderDetail->setStatus(1);
            $orderDetail->setQuantity($quantity);
            $orderDetail->setDelivered(0);
            $orderDetail->setPrice($price);
            $add = $this->productModel->addOneProductToOrder($userId, $order, $orderDetail);
        }
        return $this->responseJSON("success", true, 200, $payload);
    }
    public function deleteManyProductToOrder()
    {
        $userId = $this->cookieGet("userLogin");
        $delete = $this->productModel->deleteManyProductToOrder($userId);
        if ($delete === false) {
            return $this->responseJSON("lỗi xóa nhiều order", false, 400, $delete);
        }
        return $this->responseJSON("xóa thành công", true, 200, $delete);
    }
    public function deleteProductOnCart()
    {
        $checkLogin = $this->getHeader("userLogin") ?? false;
        if (!$checkLogin) {

            return $this->responseJSON("Người dùng chưa đăng nhập", false, 404);
        }
        $payload = $this->getPayload();
        $result = $this->productModel->deleteProductOnCart($checkLogin, $payload["productId"]);

        return $this->responseJSON("xóa thành công", true, 200, $result);
    }
    public function getInfoProductDetail()
    {
        $payload = $this->getPayload();
        $data = $this->productModel->getInfoProductDetail($payload["productId"]);

        return $this->responseJSON("success", true, 200, $data);
    }
    public function addOneProductToOrder()
    {
        $userId = $this->cookieGet("userLogin");
        $payload = $this->getPayloadJson();
        $quantity = $payload["data"]["quantity_purchased"];
        $price = (int)$payload["data"]["promo_price"];
        $totalPrice = $quantity * $price;
        $order = new Order();
        $order->setCustomer_id($this->cookieGet("userLogin"));
        $order->setStatus("1");
        $order->setTotal_product(1);
        $order->setStatus_payment(0);
        $order->setStatus_transport(0);
        $order->setTotal_price($totalPrice);
        $orderDetail = new OrderDetail();
        $orderDetail->setOrder_id($order->getOrder_id());
        $orderDetail->setProduct_id($payload["data"]["product_id"]);
        $orderDetail->setProduct_name($payload["data"]["name"]);
        $orderDetail->setProductImage($payload["data"]["MainImage"]);
        $orderDetail->setTotal_price($totalPrice);
        $orderDetail->setStatus(1);
        $orderDetail->setQuantity($quantity);
        $orderDetail->setDelivered(0);
        $orderDetail->setPrice($price);

        $add = $this->productModel->addOneProductToOrder($userId, $order, $orderDetail);
        if (!$add) {
            return $this->responseJSON("thêm không thành công", false, 404, $payload["data"]);
        }
        return $this->responseJSON("thêm thành công 1 sản phẩm", true, 200, $payload["data"]);
    }
    public function deleteOneProductInOrder()
    {
        $userId = $this->cookieGet("userLogin");
        $payload = $this->getPayload();
        $data = $this->productModel->deleteOneProductInOrder($userId, $payload["productId"]);
        if (!$data) {
            return $this->responseJSON("xóa không thành công", false, 400, $data);
        }
        return $this->responseJSON("success", true, 200, $data);
    }
}
