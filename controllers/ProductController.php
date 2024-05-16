<?php

namespace controllers;

use core\Controller;
use dto\Author;
use dto\categories;
use dto\Order;
use dto\OrderDetail;
use dto\Products;
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
    public function getNewProduct()
    {
        $data = $this->productModel->getNewProduct();
        if ($data === false) {
            return false;
        }
        return  $data;
    }
    public function getProduct()
    {
        $payload = $this->getPayload();
        $start = $payload["start"];
        $end = $payload["end"];
        $data = $this->productModel->getProduct($start, $end);
        return $this->responseJSON("success", true, 200, $data);
    }
    public function getTotalProduct()
    {
        $data = $this->productModel->getAll("products");
        return $this->responseJSON("success", true, 200, sizeof($data));
    }
    public function userSearch()
    {
        $payload = $this->getPayload();
        $condition = false;
        if (strcmp($payload["condition"], 'false') !== 0) {
            $condition  =  explode(":", $payload["condition"]);
        }
        $sort = false;
        if (strcmp($payload["sort"], 'false') !== 0) {
            $sort  =  explode("-", $payload["sort"]);
        }

        $data = $this->productModel->userSearch($payload["searchKey"] ?? null, $payload["limit"], $condition, $sort);

        return $this->responseJSON("success", true, 200, $data);
    }

    public function getCart()
    {
        $checkLogin = $this->getHeader("userLogin") ?? false;
        if (!$checkLogin) {

            return $this->responseJSON("Người dùng chưa đăng nhập", false, 401);
        }

        $data = $this->productModel->getCart($checkLogin);
        return $this->responseJSON("lấy dữ liệu thành công", true, 200, $data);
    }
    public function getOrders()
    {
        $checkLogin = $this->getHeader("userLogin") ?? false;
        if (!$checkLogin) {

            return $this->responseJSON("Người dùng chưa đăng nhập", false, 401);
        }
        $data = $this->productModel->getOrders($checkLogin);
        return $this->responseJSON("lấy dữ liệu thành công", true, 200, $data);
    }
    public function getOrderDetail()
    {
        $checkLogin = $this->getHeader("userLogin") ?? false;
        if (!$checkLogin) {

            return $this->responseJSON("Người dùng chưa đăng nhập", false, 401);
        }
        $data = $this->productModel->getOrderDetail($checkLogin);
        return $this->responseJSON("lấy dữ liệu thành công", true, 200, $data);
    }

    public function addProductToCart()
    {
        $checkLogin = $this->cookieGet("userLogin") ?? false;
        if (!$checkLogin) {

            return  $this->responseJSON("Người dùng chưa đăng nhập", false, 401);
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

            return $this->responseJSON("Người dùng chưa đăng nhập", false, 401);
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
    public function userProductDetailOrder()
    {
        $payload = $this->getPayloadJson();
        $check = $payload["check"];
        $product = $payload["data"];
        $userId = $this->cookieGet("userLogin");
        $res  = $this->productModel->userProductDetailOrder($check, $product, $userId);
        if ($res === false) {
            return $this->responseJSON("faild", false, 404, $payload);
        }
        return $this->responseJSON("success", true, 200, $payload);
    }
    public function usergetListProductPurchased()
    {
        $userId =  $this->cookieGet("userLogin");
        return $this->productModel->usergetListProductPurchased($userId);
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
    public function userGetOrders()
    {
        $userId =  $this->cookieGet("userLogin");
        $data = $this->productModel->userGetOrders($userId);
        return $data;
    }
    public function adminGetOrders()
    {
        return $this->productModel->adminGetOrders();
    }
    public function adminGetImports()
    {
        return $this->productModel->adminGetImports();
    }
    public function  adminGetInfoOrder()
    {
        $payload = $this->getPayload();
        $data = $this->productModel->adminGetInfoOrder($payload["orderId"]);
        return  $this->responseJSON("success", true, 200, $data);
    }
    public function adminMangerOrderSordByDate()
    {
        $paylaod = $this->getPayload();
        $date_start = $paylaod["date_start"];
        $date_end = $paylaod["date_end"];
        $data = $this->productModel->adminMangerOrderSordByDate($date_start, $date_end);

        return $this->responseJSON("success", true, 200, $data);
    }
    public function adminUpdateStatusOrder()
    {
        $payload    = $this->getPayload();
        $orderId = $payload["orderId"];
        $status =  $payload["status"];
        $status_transport = 0;
        if (strcmp($status, "đang giao hàng") === 0) {
            $status_transport = 1;
        }
        if (strcmp($status, "đã giao hàng") === 0) {
            $status_transport = 2;
        }
        if (strcmp($status, "đang chờ sử lý") === 0) {
            $status_transport = 0;
        }
        if (strcmp($status, "đơn hàng bị hủy") === 0) {
            $status_transport = -1;
        }
        $update  = $this->productModel->adminUpdateStatusOrder($orderId, $status, $status_transport);
        if ($update === false) {
            return  $this->responseJSON("success", false, 404, $payload);
        }
        return  $this->responseJSON("success", true, 200, $payload);
    }
    public  function userOrderUpdatePayment()
    {
        $payload  = $this->getPayload();
        $orderId = $payload["orderId"];
        $status = $payload["status"];
        $update  = $this->productModel->userOrderUpdatePayment($orderId, $status);
        if ($update === false) {
            return  $this->responseJSON("success", false, 404, $payload);
        }
        return  $this->responseJSON("success", true, 200, $payload);
    }
    public function adminGetListProduct($limit)
    {
        return $this->productModel->adminGetListProduct($limit);
    }
    public function  adminGetInfoProduct()
    {
        $payload = $this->getPayload();
        $data = $this->productModel->adminGetInfoProduct($payload["productId"]);
        return $this->responseJSON("success", true, 200, $data);
    }
    public function adminShowProductList()
    {
        $payload   = $this->getPayload();
        $data = $this->productModel->adminShowProductList($payload["limit"]);
        if ($data === false) {
            return $this->responseJSON("success", false, 404, $payload);
        }
        return $this->responseJSON("success", true, 200, $data);
    }
    public function  adminManagerProductSearch()
    {
        $payload = $this->getPayload();
        $searchKey = $payload["searchKey"];
        $searchKey = trim($searchKey);
        $categoryId = false;
        if (strcmp(trim($payload["category"]), 'false') !== 0) {
            $categoryId =  $payload["category"];
        }
        $data = $this->productModel->adminManagerProductSearch($searchKey, $categoryId, "0,7");
        if ($data === false) {
            return $this->responseJSON("success", false, 200, $payload);
        }
        return $this->responseJSON("success", true, 200, $data);
    }
    public function adminManagerProductUpdate()
    {
        $payload = $this->getPayloadJson();
        $data = $payload["data"];
        $productId = $payload["productId"];
        $product = new Products();
        $category = new categories();
        $author = new Author();
        $price = (int) str_replace(',', '', $data["price"]);
        $promo_price = (int)  str_replace(',', '', $data["promo_price"]);
        $import_price = (int)str_replace(',', '', $data["import_price"]);
        $product->setProduct_id($productId);
        $product->setName($data["name"]);
        $product->setMainImage($data["MainImage"]);
        $product->setPrice($price / 1000);
        $product->setPromo_price($promo_price / 1000);
        $product->setImport_price($import_price / 1000);

        $author->setName(trim($data["author"]));
        $category->setName(trim($data["category"]));
        $product->setQuantity($data["quantity"]);
        $update = $this->productModel->adminManagerProductUpdate($product, $category, $author);
        if ($update === false) {
            return $this->responseJSON("fail", false, 404, $payload);
        }
        return $this->responseJSON("success", true, 200, $payload);
    }
    public function adminManagerProductAddNew()
    {
        $payload = $this->getPayloadJson();
        $data = $payload["data"];
        $product = new Products();
        $category = new categories();
        $author = new Author();
        $product->setProduct_id($this->productModel->autoId());
        $product->setName($data["name"]);
        $price = (int) str_replace(',', '', $data["price"]);
        $product->setPrice($price / 1000);
        $promo_price = (int) str_replace(',', '', $data["promo_price"]);
        $product->setPromo_price($promo_price / 1000);
        $import_price = (int) str_replace(',', '', $data["import_price"]);
        $product->setImport_price($import_price / 1000);
        $product->setMainImage($data["MainImage"]);
        $product->setQuantity($data["quantity"]);
        $category->setCategory_id($this->productModel->autoId());
        $category->setName($data["category"]);
        $author->setAuthorId($this->productModel->autoId());
        $author->setName($data["author"]);
        $add = $this->productModel->adminManagerProductAddNew($author, $category, $product);
        if ($add === false) {
            return  $this->responseJSON("faild", false, 400, $payload);
        }
        return  $this->responseJSON("success", true, 200, $payload);
    }
    public function adminManagerOrderSortOrder()
    {
        $paylaod = $this->getPayload();
        $status_transport = false;
        if (isset($paylaod["all"])) {
            $data = $this->productModel->adminManagerOrderSortOrderGetAll();
            return  $this->responseJSON("success", true, 200, $data);
        }
        if (isset($paylaod["status_stransport"])) {
            $status_transport = $paylaod["status_stransport"];
        }
        $status_payment = false;
        if (isset($paylaod['status_payment'])) {
            $status_payment = $paylaod['status_payment'];
        }
        $data = $this->productModel->adminManagerOrderSortOrder($status_transport, $status_payment);
        if ($data === false) {
            return $this->responseJSON("faild", false, 404, $paylaod);
        }
        return $this->responseJSON("success", true, 200, $data);
    }
    public function adminManagerProductDelete()
    {
        $payload = $this->getPayload();
        $delete = $this->productModel->adminManagerProductDelete($payload["productId"]);
        if ($delete === false) {
            return $this->responseJSON("fail", false, 200, $payload);
        }
        return $this->responseJSON("success", true, 200, $payload);
    }
}
