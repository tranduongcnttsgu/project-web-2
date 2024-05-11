<?php

namespace dto;

class Products
{
    private $product_id;
    private $name;
    private $status;
    private $images_id;
    private $price;
    private $promo_price;
    private $quantity;
    private $description;
    private $detail;
    private $rating;
    private $category_id;
    private $total_pay;
    private $total_rating;
    private $total_star;
    private $authorId;
    private $mainImage;
    private $import_prie;
    public function getImport_price()
    {
        return $this->import_prie;
    }
    public function setImport_price($i)
    {
        $this->import_prie = $i;
    }
    public function getMainImage()
    {
        return $this->mainImage;
    }
    public function setMainImage($url)
    {
        $this->mainImage = $url;
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

    // Getter và Setter cho $name
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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

    // Getter và Setter cho $images_id
    public function getImages_id()
    {
        return $this->images_id;
    }

    public function setImages_id($images_id)
    {
        $this->images_id = $images_id;
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

    // Getter và Setter cho $promo_price
    public function getPromo_price()
    {
        return $this->promo_price;
    }

    public function setPromo_price($promo_price)
    {
        $this->promo_price = $promo_price;
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

    // Getter và Setter cho $description
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    // Getter và Setter cho $detail
    public function getDetail()
    {
        return $this->detail;
    }

    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    // Getter và Setter cho $rating
    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    // Getter và Setter cho $category_id
    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    // Getter và Setter cho $total_pay
    public function getTotal_pay()
    {
        return $this->total_pay;
    }

    public function setTotal_pay($total_pay)
    {
        $this->total_pay = $total_pay;
    }

    // Getter và Setter cho $total_rating
    public function getTotal_rating()
    {
        return $this->total_rating;
    }

    public function setTotal_rating($total_rating)
    {
        $this->total_rating = $total_rating;
    }

    // Getter và Setter cho $total_star
    public function getTotal_star()
    {
        return $this->total_star;
    }

    public function setTotal_star($total_star)
    {
        $this->total_star = $total_star;
    }

    // Getter và Setter cho $authorId
    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }
}
