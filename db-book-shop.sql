CREATE TABLE `product_categorys` (
  `category_id` varchar(255) PRIMARY KEY,
  `name` varchar(255),
  `seoTile` varchar(255),
  `sort` int,
  `status` int,
  `parentId` int,
  `MetaKeyWord` varchar(255),
  `MetaDescription` varchar(255),
  `create_by` varchar(255),
  `create_at` datetime,
  `update_at` datetime
);

CREATE TABLE `products` (
  `product_id` varchar(255) PRIMARY KEY,
  `name` varchar(255),
  `seoTile` varchar(255),
  `status` int,
  `images_id` varchar(500),
  `price` decimal(18,0),
  `promo_price` decimal(18,0),
  `quantity` int,
  `description` nvarchar(300),
  `deital` nvarchar(300),
  `viewTotail` int,
  `rating` float(1),
  `category_id` int,
  `totail_pay` int,
  `totail_rating` int,
  `totail_start` int,
  `MetaKeyWord` varchar(255),
  `MetaDescription` varchar(255),
  `create_by` varchar(255),
  `create_at` datetime,
  `update_at` datetime
);

CREATE TABLE `images` (
  `iamge_id` varchar(255) PRIMARY KEY,
  `url` varchar(255),
  `name_image` varchar(255)
);

CREATE TABLE `orders` (
  `order_id` varchar(255) PRIMARY KEY,
  `order_date` datetime,
  `status` int,
  `customer_id` int,
  `totail_product` int,
  `totail_discount` int,
  `status_payment` int,
  `status_stransport` int,
  `note` varchar(255),
  `price` int,
  `totail_price` int,
  `create_at` datetime,
  `update_at` datetime
);

CREATE TABLE `orders_detail` (
  `order_id` varchar(255),
  `product_id` varchar(255),
  `product_name` varchar(255),
  `product_image` varchar(255),
  `delivered` bit,
  `delivered_date` datetime,
  `price` float,
  `discount` int,
  `totail_price` int,
  `status` int,
  `quantity` int,
  `create_at` datetime,
  `update_at` datetime
);

CREATE TABLE `invoices` (
  `invoice_id` varchar(255) PRIMARY KEY,
  `status` int,
  `supplier_id` varchar(255),
  `create_by` varchar(255),
  `create_date` datetime,
  `update_date` datetime,
  `delete_by` varchar(255),
  `delete_date` datetime
);

CREATE TABLE `invoices_detail` (
  `invoice_id` varchar(255),
  `product_id` varchar(255),
  `product_name` varchar(255),
  `price` float,
  `quantity` int
);

CREATE TABLE `ratings` (
  `rating_id` int PRIMARY KEY,
  `product_id` varchar(255),
  `detail` varchar(255),
  `user_id` varchar(255),
  `create_at` datetime,
  `update_at` datetime
);

CREATE TABLE `comments` (
  `rating_id` varchar(255) PRIMARY KEY,
  `product_id` varchar(255),
  `detail` varchar(255),
  `user_id` varchar(255),
  `create_at` datetime,
  `update_at` datetime
);

CREATE TABLE `users` (
  `user_id` varchar(255) PRIMARY KEY,
  `name` varchar(255),
  `password` varchar(255),
  `email` varchar(255),
  `address` varchar(255),
  `avatar` varchar(255),
  `status` int,
  `create_at` datetime,
  `update_at` datetime
);

CREATE TABLE `permission` (
  `permision_id` varchar(255),
  `actions` varchar(255)
);

CREATE TABLE `users_permission` (
  `user_permission_id` varchar(255),
  `user_id` varchar(255)
);

CREATE TABLE `sliders` (
  `slider_id` varchar(255) PRIMARY KEY,
  `name` varchar(255),
  `image` varchar(255),
  `link` varchar(255),
  `status` int,
  `note` varchar(255),
  `create_at` datetime,
  `update_at` datetime
);

ALTER TABLE `products` ADD FOREIGN KEY (`images_id`) REFERENCES `images` (`iamge_id`);

ALTER TABLE `products` ADD FOREIGN KEY (`category_id`) REFERENCES `product_categorys` (`category_id`);

ALTER TABLE `orders_detail` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

ALTER TABLE `orders_detail` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

ALTER TABLE `ratings` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

ALTER TABLE `ratings` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `comments` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

ALTER TABLE `comments` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `users_permission` ADD FOREIGN KEY (`user_permission_id`) REFERENCES `permission` (`permision_id`);

ALTER TABLE `users_permission` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
