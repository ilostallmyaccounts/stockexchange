DROP DATABASE IF EXISTS stockexchange;

CREATE DATABASE stockexchange;

USE stockexchange;


CREATE TABLE Groupes(
	id int PRIMARY KEY AUTO_INCREMENT,
	groupname varchar(32) NOT NULL,
	created date,
	modified date
);

CREATE TABLE Users(
	id int PRIMARY KEY AUTO_INCREMENT,
	firstname varchar(20) NOT NULL,
	lastname varchar(20) NOT NULL,
	email varchar(40) NOT NULL,
	phone varchar(10) NOT NULL,
	password varchar(255) NOT NULL,
	isadmin tinyint(1) NOT NULL DEFAULT 0,
	joindate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	created date,
	modified date
);

CREATE TABLE Products(
	id int PRIMARY KEY AUTO_INCREMENT,
	name varchar(60) NOT NULL,
	user_id int NOT NULL,
	price float NOT NULL,
	created date,
	modified date
);

CREATE TABLE Orders(
	id int PRIMARY KEY AUTO_INCREMENT,
	user_id int NOT NULL,
	date_purchase datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	created date,
	modified date
);

CREATE TABLE OrderLines(
	id int PRIMARY KEY AUTO_INCREMENT,
	order_id int NOT NULL,
	product_id int NOT NULL,
	quantity int NOT NULL DEFAULT 1,
	created date,
	modified date
);

CREATE TABLE users_products(
	user_id int NOT NULL,
	product_id int NOT NULL,
	created date,
	modified date
);

CREATE TABLE users_groupes(
	user_id int NOT NULL,
	groupe_id int NOT NULL,
	created date,
	modified date
);

ALTER TABLE Products
	ADD KEY user_id (user_id),
	ADD CONSTRAINT products_ibfk_1 FOREIGN KEY (user_id) REFERENCES Users (id);

ALTER TABLE Orders
	ADD KEY user_id (user_id),
	ADD CONSTRAINT orders_ibfk_1 FOREIGN KEY (user_id) REFERENCES Users (id);

ALTER TABLE OrderLines
	ADD KEY order_id (order_id),
	ADD KEY product_id (product_id),
	ADD CONSTRAINT orderlines_ibfk_1 FOREIGN KEY (order_id) REFERENCES Orders (id),
	ADD CONSTRAINT orderlines_ibfk_2 FOREIGN KEY (product_id) REFERENCES Products (id);

ALTER TABLE users_products
	ADD KEY user_id (user_id),
	ADD KEY product_id (product_id),
	ADD CONSTRAINT users_products_ibfk_1 FOREIGN KEY (user_id) REFERENCES Users (id),
	ADD CONSTRAINT users_products_ibfk_2 FOREIGN KEY (product_id) REFERENCES Products (id);

ALTER TABLE users_groupes
	ADD KEY user_id (user_id),
	ADD KEY groupe_id (groupe_id),
	ADD CONSTRAINT users_groupes_ibfk_1 FOREIGN KEY (user_id) REFERENCES Users (id),
	ADD CONSTRAINT users_groupes_ibfk_2 FOREIGN KEY (groupe_id) REFERENCES Groupes (id);

CREATE TABLE `files` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `created` datetime NOT NULL,
    `modified` datetime NOT NULL,
    `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive',
    PRIMARY KEY (`id`)
);

CREATE TABLE i18n (
    id int NOT NULL auto_increment,
    locale varchar(6) NOT NULL,
    model varchar(255) NOT NULL,
    foreign_key int(10) NOT NULL,
    field varchar(255) NOT NULL,
    content text,
    PRIMARY KEY     (id),
    UNIQUE INDEX I18N_LOCALE_FIELD(locale, model, foreign_key, field),
    INDEX I18N_FIELD(model, foreign_key, field)
);