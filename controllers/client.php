<?php

namespace controllers;

use core\Controller;

class client extends Controller
{
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
            "styled" => ["cart"],
            "script" => ["user"],
            "titleButton" => "go shop",
            "buttonLink" => "http://localhost/product"
        ];
        return $this->render("payment", $params);
    }
    public function account()
    {
        $params  = [
            "titleButton" => "go home",
            "buttonLink" => "http://localhost",
            "script" => ["validation", "login"]
        ];
        return $this->render("account", $params);
    }
    public function register()
    {
        $params  = [
            "titleButton" => "go home",
            "buttonLink" => "http://localhost"
        ];
        return $this->render("register", $params);
    }
    public function admin()
    {
        $this->setLayout("admin");
        return $this->render("admin");
    }
    public function user()
    {
        $params = [
            "styled" => ["UserNav"],
            "script" => ["user", "validation"],
            "titleButton" => "go home",
            "buttonLink" => "http://localhost"
        ];
        return $this->render("user", $params);
    }
}
