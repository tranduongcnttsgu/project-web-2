<?php

namespace models;

use PDO;
use PDOException;
use core\Model;
use dto\categories;
use dto\Author;
use dto\Order;
use dto\OrderDetail;

class ProductModel extends Model
{


    public function update()
    {
    }

    public function delete($table, $where)
    {
        try {

            $result = null;
            $conn = $this->db->connect();
            $sql = "DELETE FROM $table
               WHERE $where";


            $stmt = $conn->prepare($sql);


            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->rowCount();
            return $result ?? null;
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:productmedoel function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function getCategory()
    {
        $data = $this->getAll("product_categorys");
        $listCategory = [];
        foreach ($data as $key => $value) {
            $category = new categories();
            if (isset($value["name"])) {
                $category->setName($value["name"]);
            }
            if (isset($value["category_id"])) {
                $category->setCategory_id($value["category_id"]);
            }
            $listCategory[] = $category;
        }

        return $listCategory;
    }
    public function getAuthor()
    {
        $data = $this->getAll("authors");
        $listAuthor = [];
        foreach ($data as $key => $value) {
            $author = new Author();
            if (isset($value["name"])) {
                $author->setName($value["name"]);
            }
            if (isset($value["authorId"])) {
                $author->setAuthorId($value["authorId"]);
            }
            $listAuthor[] = $author;
        }

        return $listAuthor;
    }
    public function findByName($name = "")
    {

        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM products";
            if (strlen($name) !== 0) {
                $sql .= " WHERE name LIKE '%" . ltrim($name) . "%' ";
            }


            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?? [];
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:findname function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    function findByCateory($category  = "")
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM products ";
            if (strlen($category) !== 0) {
                $sql .= "WHERE products.category_id= '" . $category . "' ";
            }


            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?? [];
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:findname function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function findByAuthor($author = "")
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM products ";
            if (strlen($author) !== 0) {
                $sql .= "WHERE products.authorId= '" . $author . "' ";
            }


            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?? [];
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:findname function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function getCart($userId = null)
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM products,cart WHERE cart.product_id = products.product_id AND cart.user_id =?; ";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $userId);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?? [];
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:findname function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function getOrders($userId = null)
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM orders WHERE orders.customer_id =?; ";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $userId);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?? [];
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:findname function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function getOrderDetail($userId = null)
    {
        try {

            $result = [];
            $conn = $this->db->connect();
            $sql = "SELECT * FROM orders,orders_detail WHERE orders.customer_id =?
             AND orders.order_id = orders_detail.order_id
            ; ";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $userId);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?? [];
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:findname function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function addProductToCart($userId = "", $productId = "", $quantity = 1)
    {
        try {
            $checkProduct = $this->getById($productId, "product_id", "cart") ?? false;
            if ($checkProduct) {
                return false;
            }

            $result = [];
            $conn = $this->db->connect();
            $sql = "INSERT INTO cart(user_id,product_id,quantity_purchased) VALUES (?,?,?); ";


            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $userId);
            $stmt->bindValue(2, $productId);
            $stmt->bindValue(3, $quantity);
            $stmt->execute();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->lastInsertId();
            return $result ?? [];
        } catch (PDOException $e) {
            echo "ERROR! Co loi xay ra voi PDO";
            $error = date('Y/m/d H:i:s') . " index:findname function| messge:" . $e->getMessage() . "Query: $sql";
            $file = fopen("D:/web/app/runtime/PDOErrors.txt", "a");

            fwrite($file, $error . PHP_EOL);
            fclose($file);
        }
    }
    public function deleteProductOnCart($userId = "", $productId = "")
    {
        $conditions = " cart.user_id=$userId AND  cart.product_id=$productId";
        $data = $this->delete("cart", $conditions);
        return $data;
    }
    public function getInfoProductDetail($productId)
    {
        $product =  $this->getById($productId, "product_id", "products") ?? [];

        return $product[0] ?? null;
    }
    public function addOneProductToOrder(Order $order, OrderDetail $orderDetail)
    {
        $table = "orders";
        $columns = "order_id, status, customer_id, totail_product, status_payment, status_stransport, totail_price";
        $values = [
            $order->getOrder_id(),
            $order->getStatus(),
            $order->getCustomer_id(),
            $order->getTotal_product(),
            $order->getStatus_payment(),
            $order->getStatus_transport(),
            $order->getTotal_price()
        ];





        $orderDetailTable = "orders_detail";
        $orderDetailColumns = "product_id, product_name, product_image, delivered, price, totail_price, status, quantity, order_id";
        $orderDetailValues = [
            $orderDetail->getProduct_id(),
            $orderDetail->getProduct_name(),
            $orderDetail->getProductImage(),
            $orderDetail->getDelivered(),
            $orderDetail->getPrice(),
            $orderDetail->getTotal_price(),
            $orderDetail->getStatus(),
            $orderDetail->getQuantity(),
            $orderDetail->getOrder_id()
        ];

        $this->insert($table, $columns, $values);
        return $this->insert($orderDetailTable, $orderDetailColumns, $orderDetailValues) ?? false;
    }
}
