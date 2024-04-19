<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// import functionn autoload -> tu dong load file php dung trong file index
require_once __DIR__ . "/utils/AutoLoad.php";
require_once __DIR__ . "/config/db.config.php";

use controllers\client;
use controllers\ProductController;
use controllers\UserController;
use core\Application;

$basePath = dirname(__DIR__);
$appPath = $basePath . DIRECTORY_SEPARATOR . 'app';
// khoi  tao app
$app = new Application();
$app->init($appPath, $config);
// router page
$app->router->get('/', [client::class, 'home']);
$app->router->get('/account', [client::class, 'account']);
$app->router->get('/account/register', [client::class, 'register']);
$app->router->get('/product', [client::class, 'products']);
$app->router->get('/detail-product', [client::class, 'productDetail']);
$app->router->get("/checkout/cart", [client::class, "cart"]);
$app->router->get("/checkout/payment", [client::class, "payment"]);
//   get data
$app->router->get('/api/sell-product', [ProductController::class, 'getSellProduct']);
// get post product
$app->router->get("/product-lists", [ProductController::class, "getProducts"]);
$app->router->get("/product-cart", [ProductController::class, "getCart"]);
$app->router->post('/product', [ProductController::class, 'searchProductByName']);
$app->router->post('/product-category', [ProductController::class, 'searchProductByCategory']);
$app->router->post('/product-author', [ProductController::class, 'searchProductByAuthor']);
$app->router->post("/product-detail", [ProductController::class, "getInfoProductDetail"]);
$app->router->get("/orders", [ProductController::class, "getOrders"]);
$app->router->get("/orderDetail", [ProductController::class, "getOrderDetail"]);
$app->router->post("/add-one-product-to-order", [ProductController::class, "addOneProductToOrder"]);
$app->router->post("/user/addManyProductToOrder", [ProductController::class, "addManyProductToOrder"]);
$app->router->post("/user/deleteManyProductToOrder", [ProductController::class, "deleteManyProductToOrder"]);
$app->router->post("/delete-one-product-in-order", [ProductController::class, "deleteOneProductInOrder"]);
$app->router->post("/delete-product-on-cart", [ProductController::class, "deleteProductOnCart"]);
$app->router->post("/user/addProductToCart", [ProductController::class, "addProductToCart"]);
// rou

//routerbb  admin
$app->router->get("/admin", [client::class, 'admin']);
// router login
$app->router->post("/account/login", [UserController::class, "login"]);
$app->router->get("/account/user-info-login", [UserController::class, "getInfoLoginUser"]);
$app->router->get("/account/user", [client::class, "user"]);
$app->router->post("/user/order", [UserController::class, "userOrder"]);
$app->router->get("/account/logout", [UserController::class, "logout"]);
$app->router->post("/user/update-info", [UserController::class, "updateInfo"]);
$app->router->get('/user/get/user-order', [UserController::class, "getUserOrder"]);
$app->run();
