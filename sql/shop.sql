CREATE TABLE IF NOT EXISTS products (
  id int(11) NOT NULL,
  category int(3) NOT NULL,
  name varchar(255) NOT NULL,
  description text NOT NULL,
  price decimal(11,2) NOT NULL,
  picture varchar(255) DEFAULT NULL,
  rating decimal(2,1) NULL DEFAULT 0.0,
  date DATETIME NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;