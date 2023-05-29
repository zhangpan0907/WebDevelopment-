SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS RetailDB;
CREATE DATABASE RetailDB;

USE RetailDB;

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT ALL PRIVILEGES ON `retaildb`.* TO 'dbadmin'@'localhost'; 

create table Coupons (
	coupon_id		int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	code			char(20) NOT NULL,
	percent_off		float NOT NULL
);

create table OrderDetail (
	order_id 		int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	order_date		timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	credit_card		char(128) NOT NULL, -- would normaly be binary(64) but seems easier for now to save it is a longer string represntation
	email_address	char(40) NOT NULL,
	coupon_id 		int,
	FOREIGN KEY (coupon_id) references Coupons(coupon_id) ON UPDATE CASCADE ON DELETE NO ACTION
);

create table Products (
	product_id		int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name			char(60) NOT NULL,
	publisher		char(60),
	price			float NOT NULL,
	age_rating		CHAR(20) NOT NULL,
	description		TEXT(2000)
);

create table ProductPicture (
	picture_id		int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	product_id		int NOT NULL,
	file_location	CHAR(100) NOT NULL,
	FOREIGN KEY (product_id) references Products(product_id) ON UPDATE CASCADE ON DELETE NO ACTION
);

create table OrderedProduct (
	order_id		int NOT NULL,
	product_id		int NOT NULL,
	quantity		int NOT NULL,			
	PRIMARY KEY (order_id, product_id),
	FOREIGN KEY (order_id) references OrderDetail(order_id) ON UPDATE CASCADE ON DELETE NO ACTION,
	FOREIGN KEY (product_id) references Products(product_id) ON UPDATE CASCADE ON DELETE NO ACTION
);



-- add products and ProductPictures

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(1, "Beau Jeu de Société", "Industrie Amusante", 29.99, "3+", "Beau Jeu de Société is a classic French boardgame for the whole family, originally produced in 1997 by a local manufacturer but has recently been translated and remastered for a Western audience.");

INSERT INTO ProductPicture(product_id, file_location) VALUES(1, "pictures/french1.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(2, "Standard Playing Cards", "Funity", 5.99, "3+", "A standard set of playing cards with quality guaranteed, as expected from our own manufacturing team.");

INSERT INTO ProductPicture(product_id, file_location) VALUES(2, "pictures/cards1.jpg");
INSERT INTO ProductPicture(product_id, file_location) VALUES(2, "pictures/cards2.jpg");
INSERT INTO ProductPicture(product_id, file_location) VALUES(2, "pictures/cards3.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(3, "Funity Speedcube X200", "Funity", 8.99, "3+", "An expert-grade speedcube puzzle. Provides 30% less friction than our previous model.");

INSERT INTO ProductPicture(product_id, file_location) VALUES(3, "pictures/cube1.jpg");
INSERT INTO ProductPicture(product_id, file_location) VALUES(3, "pictures/cube2.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(4, "Xtreme 2 Dice Set", "Funity", 4.99, "3+", "A 2 piece Dice Set including 2x D6 dice. Features a solid transparent construct perfect for any game.");

INSERT INTO ProductPicture(product_id, file_location) VALUES(4, "pictures/dice1.jpg");
INSERT INTO ProductPicture(product_id, file_location) VALUES(4, "pictures/dice2.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(5, "Block Stack", "Funity", 15.99, "3+", "The classic Block Stack game, play by yourself or with friends.");

INSERT INTO ProductPicture(product_id, file_location) VALUES(5, "pictures/blocks1.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(6, "Glass Chess", "Funity", 49.99, "12+", "Perfectly crafted Glass Chess Set featuring 48 high quality glass chess pieces and a glass base board. A must have for any chess enthusiast.");

INSERT INTO ProductPicture(product_id, file_location) VALUES(6, "pictures/chess1.jpg");
INSERT INTO ProductPicture(product_id, file_location) VALUES(6, "pictures/chess2.jpg");
INSERT INTO ProductPicture(product_id, file_location) VALUES(6, "pictures/chess3.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(7, "Pick-Up-Sticks", "Funity", 11.99, "12+", "All time classic game, play by yourself or with friends.");

INSERT INTO ProductPicture(product_id, file_location) VALUES(7, "pictures/pus1.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(8, "Word Game", "Funity", 21.99, "8+", "Fun Word Game to play with your friends and family while challenging your mind.");

INSERT INTO ProductPicture(product_id, file_location) VALUES(8, "pictures/word1.jpg");
INSERT INTO ProductPicture(product_id, file_location) VALUES(8, "pictures/word2.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(9, "Hour Glass", "Funity", 18.49, "6+", "Carefully crafted hourglass with precise timing.");

INSERT INTO ProductPicture(product_id, file_location) VALUES(9, "pictures/hglass1.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(10, "Jigsaw Puzzle", "Funity", 14.99, "8+", "Classic Jigsaw puzzle for challenging your mind");

INSERT INTO ProductPicture(product_id, file_location) VALUES(10, "pictures/jigsaw1.jpg");
INSERT INTO ProductPicture(product_id, file_location) VALUES(10, "pictures/jigsaw2.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(11, "Pistol", "Funity", 7.99, "12+", "A suction dart pistol");

INSERT INTO ProductPicture(product_id, file_location) VALUES(11, "pictures/gun1.jpg");
INSERT INTO ProductPicture(product_id, file_location) VALUES(11, "pictures/gun2.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(12, "Snakes and Ladders", "Funity", 14.99, "9+", "A classic game of Snakes & Ladders to play with more than 2 people");

INSERT INTO ProductPicture(product_id, file_location) VALUES(12, "pictures/sl1.jpg");

INSERT INTO Products(product_id, name, publisher, price, age_rating, description) VALUES(13, "Checkers", "Funity", 13.99, "12+", "Standard checkers set made from high-quality mahogany wood.");

INSERT INTO ProductPicture(product_id, file_location) VALUES(13, "pictures/checkers1.jpg");
INSERT INTO ProductPicture(product_id, file_location) VALUES(13, "pictures/checkers2.jpg");

-- add Coupon codes

INSERT INTO Coupons(coupon_id, code, percent_off) VALUES(1, "none", 0);
INSERT INTO Coupons(code, percent_off) VALUES("2020RELEASE", 0.2);
INSERT INTO Coupons(code, percent_off) VALUES("SECRETCODE", 0.5);
