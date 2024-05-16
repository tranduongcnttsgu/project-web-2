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
$app->router->get("/account/user", [client::class, "user"]);
$app->router->get('/account/user/order', [client::class, "userShowOrder"]);
$app->router->get('/account/user/purchased', [client::class, "userShowPurchasedProduct"]);
$app->router->get("/admin", [client::class, 'admin']);

$app->router->get('/product', [client::class, 'products']);
$app->router->get('/detail-product', [client::class, 'productDetail']);
$app->router->get("/checkout/cart", [client::class, "cart"]);
$app->router->get("/checkout/payment", [client::class, "payment"]);
$app->router->get("/admin/manager/statics", [client::class, "adminViewStatics"]);
$app->router->get("/admin/addAccount", [client::class, "adminAddAcount"]);
$app->router->get("/admin/adminEditAccount", [client::class, "adminEditAccount"]);
$app->router->get("/admin/order/detail", [client::class, "adminOrderViewDetail"]);
$app->router->get("/admin/import/detail", [client::class, "adminImportViewDetail"]);
$app->router->get("/admin/manager/customer", [client::class, "adminManagerCustomerView"]);
$app->router->get("/admin/manager/products", [client::class, "adminManagerProductsView"]);
$app->router->get("/admin/manager/importproducts", [client::class, "adminManagerImportProductsView"]);
$app->router->get("/admin/manager/orders", [client::class, "adminManagerOrdersView"]);
$app->router->get("/admin/product/detail", [client::class, "adminManagerProductShowDetail"]);
$app->router->get("/admin/product/addNew", [client::class, "adminManagerProductAddNewProduct"]);
$app->router->get("/admin/decentralize", [client::class, "adminShowViewDecentralize"]);

$app->router->get("/admin/managerCustomer/showInfoUser", [client::class, "adminManagerCustomerShowInfo"]);
//   get data

// get post product

$app->router->get("/product-cart", [ProductController::class, "getCart"]);
$app->router->post('/product', [ProductController::class, "getProduct"]);
$app->router->get('/total-product', [ProductController::class, "getTotalProduct"]);
$app->router->post('/user/search', [ProductController::class, "userSearch"]);

$app->router->post("/product-detail", [ProductController::class, "getInfoProductDetail"]);
$app->router->get("/orders", [ProductController::class, "getOrders"]);
$app->router->get("/orderDetail", [ProductController::class, "getOrderDetail"]);
$app->router->get("/imports", [ProductController::class, "getIrders"]);
$app->router->get("/importDetail", [ProductController::class, "getImportDetail"]);
$app->router->post("/add-one-product-to-order", [ProductController::class, "addOneProductToOrder"]);


$app->router->post("/user/addManyProductToOrder", [ProductController::class, "addManyProductToOrder"]);
$app->router->post("/user/deleteManyProductToOrder", [ProductController::class, "deleteManyProductToOrder"]);
$app->router->post("/delete-one-product-in-order", [ProductController::class, "deleteOneProductInOrder"]);
$app->router->post('/user/order/update/status-order/payment', [ProductController::class, "userOrderUpdatePayment"]);
$app->router->post("/user/product-detail/order", [ProductController::class, "userProductDetailOrder"]);


$app->router->post("/delete-product-on-cart", [ProductController::class, "deleteProductOnCart"]);
$app->router->post("/user/addProductToCart", [ProductController::class, "addProductToCart"]);
$app->router->post("/admin/getOrderCustomer", [ProductController::class, "adminGetInfoOrder"]);
$app->router->post("/admin/order/update/status-order", [ProductController::class, "adminUpdateStatusOrder"]);
$app->router->post('/admin/manager-product/info-product', [ProductController::class, "adminGetInfoProduct"]);
$app->router->post("/admin/manager-product/show-product", [ProductController::class, "adminShowProductList"]);
$app->router->post("/admin/manager-product/search-product", [ProductController::class, "adminManagerProductSearch"]);
$app->router->post('/admin/manager-product/update-product', [ProductController::class, "adminManagerProductUpdate"]);
$app->router->post('/admin/manager-product/add-product', [ProductController::class, "adminManagerProductAddNew"]);
$app->router->post("/admin/manager-order/sort-order", [ProductController::class, "adminManagerOrderSortOrder"]);
$app->router->post('/admin/manager-product/delete', [ProductController::class, "adminManagerProductDelete"]);
// rou

//routerbb  admin
// router login
$app->router->post("/account/login", [UserController::class, "login"]);
$app->router->get("/account/user-info-login", [UserController::class, "getInfoLoginUser"]);
$app->router->post("/user/order", [UserController::class, "userOrder"]);
$app->router->get("/account/logout", [UserController::class, "logout"]);
$app->router->post("/user/update-info", [UserController::class, "updateInfo"]);
$app->router->get('/user/get/user-order', [UserController::class, "getUserOrder"]);
$app->router->post("/user/account/register", [UserController::class, "register"]);


$app->router->get('/admin/check-permission', [UserController::class, "adminCheckPermision"]);
$app->router->post('/admin/addAccount', [UserController::class, "adminAddnewAccount"]);
$app->router->post("/admin/deleteAccount", [UserController::class, "adminDeleteAccount"]);
$app->router->post('/admin/edit/getAccount', [UserController::class, "adminEditGetAccount"]);
$app->router->post("/admin/editAccount", [UserController::class, "adminEditAccount"]);
$app->router->post("/admin/managerCustomer/getInfoCustomer", [UserController::class, "adminManagerCustomerGetInfoCus"]);
$app->router->post("/admin/managerCustomer/UpdateStatus", [UserController::class, "adminManagerCustomerUpdate"]);
$app->run();
