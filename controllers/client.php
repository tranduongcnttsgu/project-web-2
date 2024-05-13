<?php

namespace controllers;

use core\Application;
use core\Controller;

class client extends Controller
{
    private UserController $userControll;
    public function __construct()
    {
        $this->userControll = new UserController();
    }
    // trang home
    public function home()
    {
        $params = [
            "style" => "./assets/css/productPage.css",
            "styled" => ["banner"],
            "titleButton" => "go shop",
            "buttonLink" => "http://localhost/product",
            "script" => []

        ];

        return $this->render('home', $params);
    }
    // trang product
    public function products()
    {
        $params = [
            "style" => "./assets/css/productPage.css",
            "styled" => ["ListProduct", "filterProduct"],
            "titleButton" => "go home",
            "buttonLink" => "http://localhost",
            "script" => []
        ];

        return $this->render('products', $params);
    }
    public function productDetail()
    {
        $params = [
            "style" => "./assets/css/productPage.css",
            "styled" => ["detailProduct"],
            "script" => ["user"],
            "titleButton" => "go shop",
            "buttonLink" => "http://localhost/product"

        ];

        return $this->render('detailProduct', $params);
    }
    public function cart()
    {
        $params = [
            "styled" => ["cart"],
            "script" => ["user"],
            "titleButton" => "go shop",
            "buttonLink" => "http://localhost/product"
        ];
        return $this->render("cart", $params);
    }
    public function payment()
    {
        $params = [
            "styled" => ["payment"],
            "script" => ["validation", "user"],
            "titleButton" => "Go shop",
            "buttonLink" => "http://localhost/product"
        ];
        return $this->render("payment", $params);
    }
    public function account()
    {
        $params  = [
            "titleButton" => "Go home",
            "buttonLink" => "http://localhost",
            "script" => ["validation", "login"]
        ];
        return $this->render("account", $params);
    }
    public function adminViewStatics()
    {
        $this->setLayout("admin");
        $params  = [
            "styled" => ["admin-statics"],
            "script" => ['admin']
        ];
        $content = $this->getContentLayout("admin/statics", "show");
        return $this->renderLayout($content, $params);
    }
    public function register()
    {
        $params  = [
            "script" => ['validation', 'register'],
            "titleButton" => "Go home",
            "buttonLink" => "http://localhost"
        ];
        return $this->render("register", $params);
    }
    public function admin()
    {
        $params  = [
            "script" => ['admin', 'validation']
        ];
        $this->setLayout("admin");
        return $this->render("admin", $params);
    }
    public function adminLayout()
    {
        $userId = $this->cookieGet("userLogin") ?? false;

        if ($userId === false) {
            return [];
        }
        return $this->userControll->getPermission($userId);
    }
    public  function adminManagerCustomerView()
    {
        $this->setLayout("admin");
        $params  = [
            "script" => ['validation', 'admin']
        ];
        $content = $this->getContentLayout("admin/managerCustomer", "show");
        return $this->renderLayout($content, $params);
    }
    public  function adminManagerOrdersView()
    {
        $this->setLayout("admin");
        $params  = [
            "script" => ['validation', 'admin', 'adminOrder']
        ];
        $content = $this->getContentLayout("admin/managerOrder", "show");
        return $this->renderLayout($content, $params);
    }
    public  function adminManagerProductsView()
    {
        $this->setLayout("admin");
        $params  = [
            "script" => ['validation', 'admin', 'adminProduct']
        ];
        $content = $this->getContentLayout("admin/managerProduct", "show");
        return $this->renderLayout($content, $params);
    }
    public function adminManagerProductShowDetail()
    {
        $this->setLayout("admin");
        $params  = [
            "script" => ['validation', 'admin', 'adminProduct']
        ];
        $content = $this->getContentLayout("admin/mpShowDetail", "show");
        return $this->renderLayout($content, $params);
    }
    public function getContentLayout($path, $show)
    {

        return $this->renderUI($path, ["show" => $show]);
    }
    public function user()
    {
        $params = [
            "styled" => ["UserNav"],
            "script" => ["validation", "user"],
            "titleButton" => "Go home",
            "buttonLink" => "http://localhost"
        ];
        $content = $this->getContentLayout('user/info', "");
        return $this->renderLayout($content, $params);
    }
    public function  userShowOrder()
    {
        $params = [
            "styled" => ["UserNav"],
            "script" => ["validation", "user"],
            "titleButton" => "Go home",
            "buttonLink" => "http://localhost"
        ];
        $content = $this->getContentLayout('user/order', "");
        return $this->renderLayout($content, $params);
    }
    public  function userShowPurchasedProduct()
    {
        $params = [
            "styled" => ["UserNav"],
            "script" => ["validation", "user"],
            "titleButton" => "Go home",
            "buttonLink" => "http://localhost"
        ];
        $content = $this->getContentLayout('user/purchased', "");
        return $this->renderLayout($content, $params);
    }
    public function adminAddAcount()
    {
        $this->setLayout("admin");
        $params  = [
            "script" => ['validation', 'admin']
        ];
        $content = $this->getContentLayout("admin/adminAddAccount", "");
        return $this->renderLayout($content, $params);
    }
    public function adminEditAccount()
    {
        $this->setLayout("admin");
        $params  = [
            "script" => ['validation', 'admin']
        ];
        $content = $this->getContentLayout("admin/adminEditAccount", "");
        return $this->renderLayout($content, $params);
    }
    public function adminShowViewDecentralize()
    {
        $this->setLayout("admin");
        $params  = [
            "script" => ['admin', 'validation', 'decentralize']
        ];
        $content = $this->getContentLayout("admin/decentralize", "show");
        return $this->renderLayout($content, $params);
    }
    public function adminOrderViewDetail()
    {
        $this->setLayout("admin");
        $params  = [
            "script" => ['admin', 'validation', 'adminOrder']
        ];
        $content = $this->getContentLayout("admin/adminOrderDetail", "");
        return $this->renderLayout($content, $params);
    }
    public  function   adminManagerProductAddNewProduct()
    {
        $this->setLayout("admin");
        $params  = [
            "script" => ['validation', 'admin', 'adminProduct']
        ];
        $content = $this->getContentLayout("admin/mpAddProduct", "show");
        return $this->renderLayout($content, $params);
    }
}
