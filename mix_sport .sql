-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2021 at 07:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mix_sport`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `alert_emp` ()  NO SQL
BEGIN
SELECT COUNT(*) as alert FROM sell WHERE seen1=0 AND stt_id='2';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `alert_list` ()  NO SQL
BEGIN
SELECT s.sell_id,emp_name,cus_name,sum(d.qty*d.price) AS amount,stt_name,type_pay,sell_type,getmoney,img_path,s.timestamp,remark FROM sell s LEFT JOIN selldetail d ON s.sell_id=d.sell_id LEFT JOIN employee e ON s.emp_id=e.emp_id LEFT JOIN customer c ON s.cus_id=c.cus_id LEFT JOIN status_sell t ON s.stt_id=t.stt_id WHERE  seen1=0 AND s.stt_id='2' GROUP BY s.sell_id ORDER BY sell_id DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `bill_order` (IN `id` VARCHAR(10))  NO SQL
BEGIN
SELECT o.order_id,emp_name,company,o.timestamp,sum(d.qty*d.price) AS amount FROM orders o LEFT JOIN orderdetail d ON o.order_id=d.order_id LEFT JOIN employee e ON o.emp_id=e.emp_id LEFT JOIN supplier s ON o.sup_id=s.sup_id WHERE o.order_id=id GROUP BY o.order_id ORDER BY o.order_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_brand` (IN `brand_ids` VARCHAR(11))  NO SQL
BEGIN
SELECT * FROM product WHERE brand_id=brand_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_category` (IN `cate_ids` VARCHAR(11))  NO SQL
BEGIN
SELECT * FROM product WHERE cate_id=cate_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_size` (IN `id` INT(11))  NO SQL
BEGIN
SELECT * FROM product WHERE size_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_unit` (IN `unit_ids` VARCHAR(11))  NO SQL
BEGIN
SELECT * FROM product WHERE unit_id=unit_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `confirm_order` (IN `sell_ids` VARCHAR(6))  NO SQL
BEGIN
UPDATE sell SET stt_id='3' WHERE sell_id=sell_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customerdetail` (IN `sell_ids` VARCHAR(6))  NO SQL
BEGIN
SELECT cus_name,cus_surname,tel,whatsapp,img_path,type_pay,address FROM customer c LEFT JOIN sell s ON c.cus_id=s.cus_id WHERE sell_id=sell_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_alert_bill` (IN `cus_ids` INT(11))  NO SQL
BEGIN
SELECT COUNT(*) as alert FROM sell WHERE cus_id=cus_ids AND stt_id='3' AND seen2 = '0';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_bill` (IN `cus_ids` INT(11))  NO SQL
BEGIN
SELECT s.sell_id,type_pay,s.timestamp,seen2,stt_name,sum(d.qty*d.price) as total FROM sell s LEFT JOIN selldetail d ON s.sell_id=d.sell_id LEFT JOIN status_sell ss ON s.stt_id=ss.stt_id WHERE s.cus_id=cus_ids GROUP BY s.sell_id ORDER BY s.sell_id DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_login` (IN `emails` VARCHAR(150), IN `passed` VARCHAR(100))  NO SQL
BEGIN
SELECT * FROM customer WHERE email=emails and BINARY pass=passed;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_order` (IN `sell_ids` VARCHAR(6), IN `emp_ids` INT(11), IN `cus_ids` INT(11), IN `stt_ids` INT(3), IN `type_pays` VARCHAR(50), IN `sell_types` VARCHAR(50), IN `img_paths` VARCHAR(100), IN `remarks` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO sell(sell_id,emp_id,cus_id,stt_id,type_pay,sell_type,img_path,remark)
VALUES(sell_ids,emp_ids,cus_ids,stt_ids,type_pays,sell_types,img_paths,remarks);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_register` (IN `cus_names` VARCHAR(50), IN `surnames` VARCHAR(50), IN `genders` VARCHAR(10), IN `emails` VARCHAR(100), IN `passed` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO customer(cus_name,cus_surname,gender,email,pass) VALUES(cus_names,surnames,genders,emails,md5(passed));
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_acc` (IN `id` VARCHAR(11))  NO SQL
BEGIN
DELETE FROM account WHERE bank=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_brand` (IN `ids` VARCHAR(11))  NO SQL
BEGIN
DELETE FROM brand WHERE brand_id=ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_broke` (IN `id` VARCHAR(11))  NO SQL
BEGIN
DELETE FROM broke WHERE boke_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_category` (IN `ids` VARCHAR(11))  NO SQL
BEGIN
DELETE FROM category WHERE cate_id=ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_employee` (IN `id` INT(11))  NO SQL
BEGIN 
DELETE FROM employee WHERE emp_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_product` (IN `id` VARCHAR(30))  NO SQL
BEGIN
DELETE FROM product WHERE pro_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_rate` (IN `id` VARCHAR(50))  NO SQL
BEGIN
DELETE FROM rate WHERE rate_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_size` (IN `id` INT(11))  NO SQL
BEGIN
DELETE FROM size WHERE size_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_supplier` (IN `id` VARCHAR(11))  NO SQL
BEGIN
DELETE FROM supplier WHERE sup_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_unit` (IN `ids` VARCHAR(11))  NO SQL
BEGIN
DELETE FROM unit WHERE unit_id=ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_order` ()  NO SQL
BEGIN
SELECT max(order_id) as order_id FROM orders;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_sell` ()  NO SQL
BEGIN
SELECT max(sell_id) as sell_id FROM sell;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_acc` (IN `bank` VARCHAR(20), IN `acc_name` VARCHAR(200), IN `acc_no` VARCHAR(100), IN `qr_code` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO account VALUES(bank,acc_name,acc_no,qr_code);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_brand` (IN `brand_names` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO brand(brand_name) VALUES(brand_names);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_broke` (IN `pro_ids` VARCHAR(50), IN `qtys` INT(11), IN `prices` DECIMAL(11,2), IN `remarks` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO broke(pro_id,qty,price,remark) VALUES(pro_ids,qtys,prices,remarks);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_category` (IN `cate_names` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO category(cate_name) VALUES(cate_names);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_employee` (IN `emp_names` VARCHAR(50), IN `emp_surnames` VARCHAR(50), IN `genders` VARCHAR(20), IN `tels` VARCHAR(24), IN `addresss` VARCHAR(250), IN `emails` VARCHAR(100), IN `passs` VARCHAR(100), IN `statuss` INT(5), IN `profiles` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO employee(emp_name,emp_surname,gender,tel,address,email,pass,status,profile) VALUES(emp_names,emp_surnames,genders,tels,addresss,emails,md5(passs),statuss,profiles);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_import` (IN `imp_bills` VARCHAR(50), IN `order_ids` VARCHAR(6), IN `sup_ids` VARCHAR(11), IN `emp_ids` VARCHAR(11), IN `pro_ids` VARCHAR(50), IN `qtys` INT(11), IN `prices` DECIMAL(11,2), IN `remarks` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO import(imp_bill,order_id,sup_id,emp_id,pro_id,qty,price,remark) VALUES(imp_bills,order_ids,sup_ids,emp_ids,pro_ids,qtys,prices,remarks);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_order` (IN `order_ids` VARCHAR(11), IN `emp_ids` VARCHAR(50), IN `sup_ids` VARCHAR(11))  NO SQL
BEGIN
INSERT INTO orders(order_id,emp_id,sup_id) VALUES(order_ids,emp_ids,sup_ids);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_order_detail` (IN `pro_ids` VARCHAR(50), IN `qtys` INT(11), IN `prices` DECIMAL(11,2), IN `order_ids` VARCHAR(11))  NO SQL
BEGIN
INSERT INTO orderdetail(pro_id,qty,price,order_id) VALUES(pro_ids,qtys,prices,order_ids);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_product` (IN `pro_id` VARCHAR(30), IN `pro_name` VARCHAR(50), IN `qty` INT(5), IN `price` DECIMAL(11,2), IN `cate_id` INT(11), IN `unit_id` INT(11), IN `brand_id` INT(11), IN `size_id` INT(11), IN `qty_alert` INT(11), IN `img` VARCHAR(100))  NO SQL
BEGIN 
INSERT product VALUES(pro_id,pro_name,qty,price,cate_id,unit_id,brand_id,size_id,qty_alert,img);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_rate` (IN `rate_id` VARCHAR(20), IN `rate_buy` DECIMAL(11,2), IN `rate_sell` DECIMAL(11,2))  NO SQL
BEGIN
INSERT INTO rate VALUES(rate_id,rate_buy,rate_sell);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_sell` (IN `sell_ids` VARCHAR(6), IN `emp_ids` INT(11), IN `cus_ids` INT(11), IN `stt_ids` INT(3), IN `type_pays` VARCHAR(50), IN `sell_types` VARCHAR(50), IN `img_paths` VARCHAR(100), IN `seen1s` INT(11), IN `seen2s` INT(11), IN `getmoneys` DECIMAL(11,2))  NO SQL
BEGIN
INSERT INTO sell(sell_id,emp_id,cus_id,stt_id,type_pay,sell_type,img_path,seen1,seen2,getmoney) VALUES(sell_ids,emp_ids,cus_ids,stt_ids,type_pays,sell_types,img_paths,seen1s,seen2s,getmoneys);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_selldetail` (IN `pro_ids` VARCHAR(30), IN `qtys` INT(11), IN `prices` DECIMAL(11,2), IN `sell_ids` VARCHAR(6))  NO SQL
BEGIN
INSERT INTO selldetail(pro_id,qty,price,sell_id) VALUES(pro_ids,qtys,prices,sell_ids);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_size` (IN `size_names` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO size(size_name) VALUES(size_names);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_supplier` (IN `companys` VARCHAR(100), IN `tels` VARCHAR(30), IN `faxs` VARCHAR(30), IN `addresss` VARCHAR(300), IN `emails` VARCHAR(100))  NO SQL
BEGIN
INSERT INTO supplier(company,tel,fax,address,email) VALUES(companys,tels,faxs,addresss,emails);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_unit` (IN `unit_names` VARCHAR(50))  NO SQL
BEGIN
INSERT INTO unit(unit_name) VALUES(unit_names);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `emails` VARCHAR(100), IN `passed` VARCHAR(100))  NO SQL
BEGIN
SELECT * FROM employee WHERE email=emails and BINARY pass=passed;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `report_order` (IN `date1` VARCHAR(20), IN `date2` VARCHAR(20))  NO SQL
BEGIN
SELECT o.order_id,emp_name,company,o.timestamp,sum(d.qty*d.price) AS amount FROM orders o LEFT JOIN orderdetail d ON o.order_id=d.order_id LEFT JOIN employee e ON o.emp_id=e.emp_id LEFT JOIN supplier s ON o.sup_id=s.sup_id WHERE o.timestamp BETWEEN date1 and date2 GROUP BY o.order_id ORDER BY o.order_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `report_orderdetail` (IN `id` VARCHAR(10))  NO SQL
BEGIN
SELECT d.pro_id,pro_name,cate_name,brand_name,size_name,unit_name,d.qty,d.price,d.qty*d.price as total,p.img FROM orderdetail d LEFT JOIN product p ON d.pro_id=p.pro_id LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id LEFT JOIN unit u ON p.unit_id=u.unit_id WHERE d.order_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `report_order_limit` (IN `date1` VARCHAR(20), IN `date2` VARCHAR(20), IN `page` INT(5))  NO SQL
BEGIN
SELECT o.order_id,emp_name,company,o.timestamp,sum(d.qty*d.price) AS amount FROM orders o LEFT JOIN orderdetail d ON o.order_id=d.order_id LEFT JOIN employee e ON o.emp_id=e.emp_id LEFT JOIN supplier s ON o.sup_id=s.sup_id WHERE o.timestamp BETWEEN date1 and date2 GROUP BY o.order_id ORDER BY o.order_id LIMIT page,50;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `report_pay` (IN `date1` VARCHAR(20), IN `date2` VARCHAR(20))  NO SQL
BEGIN
SELECT imp_bill,i.order_id,pro_name,emp_name,company,i.remark,i.timestamp,i.pro_id,unit_name,brand_name,size_name,cate_name,i.qty,i.price,i.qty*i.price AS total FROM import i LEFT JOIN supplier su ON i.sup_id=su.sup_id LEFT JOIN employee e ON i.emp_id=e.emp_id LEFT JOIN product p ON i.pro_id=p.pro_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE i.timestamp BETWEEN date1 AND date2 ORDER BY i.timestamp ASC,i.order_id ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `report_pay_limit` (IN `date1` VARCHAR(20), IN `date2` VARCHAR(20), IN `page` INT(5))  NO SQL
BEGIN
SELECT imp_bill,i.order_id,pro_name,emp_name,company,i.remark,i.timestamp,i.pro_id,unit_name,brand_name,size_name,cate_name,i.qty,i.price,i.qty*i.price AS total FROM import i LEFT JOIN supplier su ON i.sup_id=su.sup_id LEFT JOIN employee e ON i.emp_id=e.emp_id LEFT JOIN product p ON i.pro_id=p.pro_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE i.timestamp BETWEEN date1 AND date2 ORDER BY i.timestamp ASC,i.order_id ASC LIMIT page,50;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `report_reserv` (IN `date1` VARCHAR(20), IN `date2` VARCHAR(20))  NO SQL
BEGIN
SELECT s.sell_id,emp_name,cus_name,sum(d.qty*d.price) AS amount,stt_name,type_pay,sell_type,getmoney,img_path,s.timestamp,remark FROM sell s LEFT JOIN selldetail d ON s.sell_id=d.sell_id LEFT JOIN employee e ON s.emp_id=e.emp_id LEFT JOIN customer c ON s.cus_id=c.cus_id LEFT JOIN status_sell t ON s.stt_id=t.stt_id WHERE s.stt_id='2' and s.timestamp BETWEEN date1 AND date2 GROUP BY s.sell_id ORDER BY sell_id ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `report_reserv_limit` (IN `date1` VARCHAR(20), IN `date2` VARCHAR(20), IN `page` INT(5))  NO SQL
BEGIN
SELECT s.sell_id,emp_name,cus_name,sum(d.qty*d.price) AS amount,stt_name,type_pay,sell_type,getmoney,img_path,s.timestamp,remark FROM sell s LEFT JOIN selldetail d ON s.sell_id=d.sell_id LEFT JOIN employee e ON s.emp_id=e.emp_id LEFT JOIN customer c ON s.cus_id=c.cus_id LEFT JOIN status_sell t ON s.stt_id=t.stt_id WHERE s.stt_id='2' and s.timestamp BETWEEN date1 AND date2 GROUP BY s.sell_id ORDER BY sell_id ASC LIMIT page,50;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `report_sell` (IN `date1` VARCHAR(20), IN `date2` VARCHAR(20))  NO SQL
BEGIN
SELECT s.sell_id,emp_name,cus_name,sum(d.qty*d.price) AS amount,stt_name,type_pay,sell_type,getmoney,img_path,s.timestamp,remark FROM sell s LEFT JOIN selldetail d ON s.sell_id=d.sell_id LEFT JOIN employee e ON s.emp_id=e.emp_id LEFT JOIN customer c ON s.cus_id=c.cus_id LEFT JOIN status_sell t ON s.stt_id=t.stt_id WHERE s.timestamp BETWEEN date1 AND date2 GROUP BY s.sell_id ORDER BY sell_id ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `report_sell_limit` (IN `date1` VARCHAR(20), IN `date2` VARCHAR(20), IN `page` INT(5))  NO SQL
BEGIN
SELECT s.sell_id,emp_name,cus_name,sum(d.qty*d.price) AS amount,stt_name,type_pay,sell_type,getmoney,img_path,s.timestamp,remark FROM sell s LEFT JOIN selldetail d ON s.sell_id=d.sell_id LEFT JOIN employee e ON s.emp_id=e.emp_id LEFT JOIN customer c ON s.cus_id=c.cus_id LEFT JOIN status_sell t ON s.stt_id=t.stt_id WHERE s.timestamp BETWEEN date1 AND date2 GROUP BY s.sell_id ORDER BY sell_id ASC LIMIT page,50;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_acc` ()  NO SQL
BEGIN
SELECT * FROM account ORDER BY bank ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_bill` (IN `sell_ids` VARCHAR(6))  NO SQL
BEGIN
SELECT sell_id,emp_name,cus_name,stt_name,getmoney,s.timestamp FROM sell s LEFT JOIN employee e ON s.emp_id=s.emp_id LEFT JOIN customer c ON s.cus_id=c.cus_id LEFT JOIN status_sell t ON s.sell_id=t.stt_id WHERE s.sell_id=sell_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_billdetail` (IN `sell_ids` VARCHAR(6))  NO SQL
BEGIN
SELECT d.pro_id,pro_name,d.qty,d.price,d.qty*d.price as total,unit_name,size_name,brand_name,cate_name,p.img FROM selldetail d LEFT JOIN product p ON d.pro_id=p.pro_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN size s ON p.size_id=s.size_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN category c ON p.cate_id=c.cate_id WHERE d.sell_id=sell_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_brand` (IN `name` VARCHAR(50))  NO SQL
BEGIN
SELECT * FROM brand WHERE brand_id LIKE name or brand_name LIKE name ORDER BY brand_name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_brand_limit` (IN `name` VARCHAR(50), IN `page` INT(5))  NO SQL
BEGIN
SELECT * FROM brand WHERE brand_id LIKE name or brand_name LIKE name ORDER BY brand_name ASC LIMIT page,15;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_broke` (IN `name` VARCHAR(100))  NO SQL
BEGIN
SELECT boke_id,l.pro_id,pro_name,l.qty,l.price,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,img,timestamp,l.remark FROM broke l LEFT JOIN product p ON l.pro_id=p.pro_id LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE l.pro_id LIKE name OR pro_name LIKE name OR cate_name LIKE name OR unit_name LIKE name OR brand_name LIKE name OR size_name LIKE name ORDER BY pro_name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_broke_limit` (IN `name` VARCHAR(100), IN `page` INT(5))  NO SQL
BEGIN
SELECT boke_id,l.pro_id,pro_name,l.qty,l.price,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,img,timestamp,l.remark FROM broke l LEFT JOIN product p ON l.pro_id=p.pro_id LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE l.pro_id LIKE name OR pro_name LIKE name OR cate_name LIKE name OR unit_name LIKE name OR brand_name LIKE name OR size_name LIKE name ORDER BY pro_name ASC LIMIT page,50;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_category` (IN `name` VARCHAR(50))  NO SQL
BEGIN
SELECT * FROM category WHERE cate_id LIKE name or cate_name LIKE name ORDER BY cate_name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_category_limit` (IN `name` VARCHAR(50), IN `page` INT(5))  NO SQL
BEGIN
SELECT * FROM category WHERE cate_id LIKE name or cate_name LIKE name ORDER BY cate_name ASC LIMIT page,15;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_check_product` ()  NO SQL
BEGIN 
SELECT pro_id,pro_name,qty,price,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,qty_alert,img FROM product p LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE qty<qty_alert ORDER BY pro_name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_check_product_limit` (IN `page` INT(5))  NO SQL
BEGIN 
SELECT pro_id,pro_name,qty,price,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,qty_alert,img FROM product p LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE qty<qty_alert ORDER BY pro_name ASC LIMIT page,50;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_customer` (IN `name` VARCHAR(100))  NO SQL
BEGIN
SELECT * FROM customer WHERE cus_id LIKE name OR cus_name LIKE name OR cus_surname LIKE name OR gender LIKE name OR address LIKE name OR email LIKE name ORDER BY cus_name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_customer_bill` (IN `cus_ids` INT(11))  NO SQL
BEGIN
SELECT s.sell_id,stt_name,sum(d.qty*d.price) as total FROM sell s LEFT JOIN selldetail d ON s.sell_id=d.sell_id LEFT JOIN status_sell ss ON s.stt_id=ss.stt_id WHERE s.cus_id=cus_ids AND s.stt_id=3 and seen2 = '0' GROUP BY s.sell_id ORDER BY s.sell_id DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_customer_limit` (IN `name` VARCHAR(100), IN `page` INT(5))  NO SQL
BEGIN
SELECT * FROM customer WHERE cus_id LIKE name OR cus_name LIKE name OR cus_surname LIKE name OR gender LIKE name OR address LIKE name OR email LIKE name ORDER BY cus_name ASC LIMIT page,50;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_employee` (IN `name` TEXT)  NO SQL
BEGIN
SELECT emp_id,emp_name,emp_surname,gender,tel,address,email,pass,e.status,status_name FROM employee e LEFT JOIN emp_status s ON e.status=s.status WHERE emp_id LIKE name OR emp_name LIKE name OR emp_surname LIKE name OR gender LIKE name OR email LIKE name OR status_name LIKE name ORDER BY emp_name asc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_employee_limit` (IN `name` TEXT, IN `page` INT(5))  NO SQL
BEGIN
SELECT emp_id,emp_name,emp_surname,gender,tel,address,email,pass,e.status,status_name,profile FROM employee e LEFT JOIN emp_status s ON e.status=s.status WHERE emp_id LIKE name OR emp_name LIKE name OR emp_surname LIKE name OR gender LIKE name OR email LIKE name OR status_name LIKE name ORDER BY emp_name ASC LIMIT page,50;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_product` (IN `name` VARCHAR(50))  NO SQL
BEGIN 
SELECT pro_id,pro_name,qty,price,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,qty_alert,img FROM product p LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE pro_id LIKE name or pro_name LIKE name or cate_name LIKE name or unit_name LIKE name or brand_name LIKE name or size_name LIKE name ORDER BY pro_name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_product_limit` (IN `name` VARCHAR(50), IN `page` INT(5))  NO SQL
BEGIN 
SELECT pro_id,pro_name,qty,price,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,qty_alert,img FROM product p LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE pro_id LIKE name or pro_name LIKE name or cate_name LIKE name or unit_name LIKE name or brand_name LIKE name or size_name LIKE name ORDER BY pro_name ASC LIMIT page,50;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_rate` ()  NO SQL
BEGIN
SELECT * FROM rate ORDER BY rate_id ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_revenue` (IN `date1` VARCHAR(20), IN `date2` VARCHAR(20))  NO SQL
BEGIN
SELECT d.sell_id,emp_name,cus_name,se.timestamp,d.pro_id,pro_name,d.qty,d.price,d.qty*d.price as total,stt_name,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,se.remark,img FROM sell se LEFT JOIN status_sell st ON se.stt_id=st.stt_id LEFT JOIN employee e ON se.emp_id=e.emp_id LEFT JOIN customer cu ON se.cus_id=cu.cus_id LEFT JOIN selldetail d ON se.sell_id=d.sell_id LEFT JOIN product p ON d.pro_id=p.pro_id LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE st.stt_id != '2' AND se.timestamp BETWEEN date1 and date2 ORDER BY d.sell_id ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_revenue_limit` (IN `date1` VARCHAR(20), IN `date2` VARCHAR(20), IN `page` INT(5))  NO SQL
BEGIN
SELECT d.sell_id,emp_name,cus_name,se.timestamp,d.pro_id,pro_name,d.qty,d.price,d.qty*d.price as total,stt_name,p.cate_id,cate_name,p.unit_id,unit_name,p.brand_id,brand_name,p.size_id,size_name,se.remark,img FROM sell se LEFT JOIN status_sell st ON se.stt_id=st.stt_id LEFT JOIN employee e ON se.emp_id=e.emp_id LEFT JOIN customer cu ON se.cus_id=cu.cus_id LEFT JOIN selldetail d ON se.sell_id=d.sell_id LEFT JOIN product p ON d.pro_id=p.pro_id LEFT JOIN category c ON p.cate_id=c.cate_id LEFT JOIN unit u ON p.unit_id=u.unit_id LEFT JOIN brand b ON p.brand_id=b.brand_id LEFT JOIN size s ON p.size_id=s.size_id WHERE st.stt_id != '2' AND se.timestamp BETWEEN date1 and date2 ORDER BY d.sell_id ASC LIMIT page,50;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_size` (IN `name` VARCHAR(50))  NO SQL
BEGIN
SELECT * FROM size WHERE size_name LIKE name ORDER BY size_name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_size_limit` (IN `name` VARCHAR(50), IN `page` INT(5))  NO SQL
BEGIN
SELECT * FROM size WHERE size_name LIKE name ORDER BY size_name ASC LIMIT page,15;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_supplier` (IN `name` VARCHAR(200))  NO SQL
BEGIN
SELECT * FROM supplier WHERE sup_id LIKE name OR company LIKE name OR email LIKE name ORDER BY company ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_supplier_limit` (IN `name` VARCHAR(200), IN `page` INT(5))  NO SQL
BEGIN
SELECT * FROM supplier WHERE sup_id LIKE name OR company LIKE name OR email LIKE name ORDER BY company ASC LIMIT page,50;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_unit` (IN `name` VARCHAR(50))  NO SQL
BEGIN
SELECT * FROM unit WHERE unit_id LIKE name or unit_name LIKE name ORDER BY unit_name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_unit_limit` (IN `name` VARCHAR(50), IN `page` INT(5))  NO SQL
BEGIN
SELECT * FROM unit WHERE unit_id LIKE name or unit_name LIKE name ORDER BY unit_name ASC LIMIT page,15;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_acc` (IN `banks` VARCHAR(30), IN `acc_names` VARCHAR(100), IN `acc_nos` VARCHAR(100), IN `qr_codes` VARCHAR(100))  NO SQL
BEGIN
UPDATE account SET account_name=acc_names,account_no=acc_nos,qr_code=qr_codes WHERE bank=banks;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_brand` (IN `brand_ids` VARCHAR(11), IN `brand_names` VARCHAR(50))  NO SQL
BEGIN
UPDATE brand SET brand_name=brand_names WHERE brand_id=brand_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_broke` (IN `broke_ids` VARCHAR(11), IN `qtys` INT(11), IN `remarks` VARCHAR(100))  NO SQL
BEGIN
UPDATE broke SET qty=qtys,remark=remarks WHERE boke_id=broke_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_category` (IN `cate_ids` VARCHAR(11), IN `cate_names` VARCHAR(50))  NO SQL
BEGIN
UPDATE category SET cate_name=cate_names WHERE cate_id=cate_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_employee` (IN `emp_ids` INT(11), IN `emp_names` VARCHAR(50), IN `emp_surnames` VARCHAR(50), IN `genders` VARCHAR(10), IN `tels` VARCHAR(30), IN `addresss` VARCHAR(250), IN `emails` VARCHAR(100), IN `passs` VARCHAR(100), IN `statuss` INT(5), IN `profiles` VARCHAR(100))  NO SQL
BEGIN
UPDATE employee SET emp_name=emp_names,emp_surname=emp_surnames,gender=genders,tel=tels,address=addresss,email=emails,pass=passs,status=statuss,profile=profiles WHERE emp_id=emp_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_product` (IN `pro_ids` VARCHAR(30), IN `pro_names` VARCHAR(50), IN `qtys` INT(11), IN `prices` DECIMAL(12), IN `cate_ids` INT(11), IN `unit_ids` INT(11), IN `brand_ids` INT(11), IN `size_ids` INT(11), IN `qty_alerts` INT(11), IN `imgs` VARCHAR(100))  NO SQL
BEGIN
UPDATE product SET pro_name=pro_names,qty=qtys,price=prices,cate_id=cate_ids,unit_id=unit_ids,brand_id=brand_ids,size_id=size_ids,qty_alert=qty_alerts,img=imgs WHERE pro_id=pro_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_rate` (IN `rate_ids` VARCHAR(50), IN `rate_buys` DECIMAL(11,2), IN `rate_sells` DECIMAL(11,2))  NO SQL
BEGIN
UPDATE rate SET rate_buy=rate_buys,rate_sell=rate_sells WHERE rate_id=rate_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_size` (IN `size_ids` INT(11), IN `size_names` VARCHAR(50))  NO SQL
BEGIN
UPDATE size SET size_name=size_names WHERE size_id=size_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_supplier` (IN `sup_ids` VARCHAR(11), IN `companys` VARCHAR(100), IN `tels` VARCHAR(30), IN `faxs` VARCHAR(30), IN `addresss` VARCHAR(300), IN `emails` VARCHAR(100))  NO SQL
BEGIN
UPDATE supplier SET company=companys,tel=tels,fax=faxs,address=addresss,email=emails WHERE sup_id=sup_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_unit` (IN `unit_ids` VARCHAR(11), IN `unit_names` VARCHAR(50))  NO SQL
BEGIN
UPDATE unit SET unit_name=unit_names WHERE unit_id=unit_ids;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `web_order` ()  NO SQL
BEGIN
SELECT s.sell_id,emp_name,cus_name,sum(d.qty*d.price) AS amount,stt_name,type_pay,sell_type,getmoney,img_path,s.timestamp,remark FROM sell s LEFT JOIN selldetail d ON s.sell_id=d.sell_id LEFT JOIN employee e ON s.emp_id=e.emp_id LEFT JOIN customer c ON s.cus_id=c.cus_id LEFT JOIN status_sell t ON s.stt_id=t.stt_id WHERE s.stt_id=2 GROUP BY s.sell_id ORDER BY sell_id DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `web_order_limit` (IN `page` INT(2))  NO SQL
BEGIN
SELECT s.sell_id,emp_name,cus_name,sum(d.qty*d.price) AS amount,seen1,stt_name,type_pay,sell_type,getmoney,img_path,s.timestamp,remark FROM sell s LEFT JOIN selldetail d ON s.sell_id=d.sell_id LEFT JOIN employee e ON s.emp_id=e.emp_id LEFT JOIN customer c ON s.cus_id=c.cus_id LEFT JOIN status_sell t ON s.stt_id=t.stt_id WHERE s.stt_id=2 GROUP BY s.sell_id ORDER BY sell_id DESC LIMIT page,100;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `bank` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `account_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qr_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`bank`, `account_name`, `account_no`, `qr_code`) VALUES
('BCEL', 'Souksavath PHONGPHAYOSITH', '1100 20000 33000 44000', 'Mix_60cb522b1e1bc.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Adidas'),
(4, 'Nike'),
(5, 'Marshall');

-- --------------------------------------------------------

--
-- Table structure for table `broke`
--

CREATE TABLE `broke` (
  `boke_id` int(11) NOT NULL,
  `pro_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `remark` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `broke`
--

INSERT INTO `broke` (`boke_id`, `pro_id`, `qty`, `price`, `remark`, `timestamp`) VALUES
(6, '1093016000002', 12, '1000000', 'remark', '2021-05-27 13:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'ເສື້ອເຕະບານ'),
(13, 'ເສື້ອຕີດອກ'),
(14, 'ເກີບ'),
(15, 'ໝວກ');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_surname`, `gender`, `address`, `tel`, `whatsapp`, `email`, `pass`, `timestamp`) VALUES
(1, 'ລູກຄ້າທົ່ວໄປ', 'ສຸລະວະດີ', 'ຊາຍ', 'asfdasfasdf', '', '', '', '', '2021-06-09 13:06:11'),
(2, 'ນວນທອງ', 'ສຸລະວະດີ', 'ຍິງ', NULL, '+856 20 5232 9555', '+856 20 5232 9555', NULL, '202cb962ac59075b964b07152d234b70', '2021-06-09 13:06:11'),
(3, 'ບຸນພິທັກ', 'ໄຊປັນຍາ', 'ຊາຍ', NULL, '+856 20 5232 9555', '+856 20 5232 9555', NULL, '202cb962ac59075b964b07152d234b70', '2021-06-09 12:44:42'),
(4, 'ta', 'souksavath', 'Male', NULL, NULL, NULL, 'test@hotmail.com', '202cb962ac59075b964b07152d234b70', '2021-06-16 11:42:43'),
(5, 'ສົມຈິດ', 'test', 'ຊາຍ', 'Lao Airlines Building 7th Floor, Manthatourath Road, Xiengyeun Village, Chantabouly District, Vientiane Capital, Lao P.D.R (Headquarter)', '020-5555-6633', '55099269', 'customer@hotmail.com', '202cb962ac59075b964b07152d234b70', '2021-06-17 16:06:23'),
(6, 'ສົມຈິດ2', 'tests', 'ຊາຍ', NULL, NULL, NULL, 'customer2@hotmail.com', '202cb962ac59075b964b07152d234b70', '2021-06-17 12:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `profile` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_surname`, `gender`, `tel`, `address`, `email`, `pass`, `status`, `profile`) VALUES
(1, 'Mix', '', 'ຊາຍ', '+856 20 5232 95552', '', 'mix@hotmail.com', '202cb962ac59075b964b07152d234b70', 2, ''),
(6, '2', '', 'ຊາຍ', '2', '2', 'thilatda2@mangkone.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 'Mix_60c76efacd5e7.jpeg'),
(7, 'Mix Sport Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emp_status`
--

CREATE TABLE `emp_status` (
  `status` int(5) NOT NULL,
  `status_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emp_status`
--

INSERT INTO `emp_status` (`status`, `status_name`) VALUES
(1, 'ເຈົ້າຂອງຮ້ານ'),
(2, 'ພະນັກງານຂາຍ');

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `imp_id` int(11) NOT NULL,
  `imp_bill` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `sup_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `pro_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(5) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `remark` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `import`
--

INSERT INTO `import` (`imp_id`, `imp_bill`, `order_id`, `sup_id`, `emp_id`, `pro_id`, `qty`, `price`, `remark`, `timestamp`) VALUES
(7, 'IMP01', '000001', 6, 1, '1093016000002', 12, '10000.00', 'remark', '2021-05-26 13:53:04'),
(8, 'IMP01', '000001', 6, 1, '1093016000002', 100, '10000.00', '', '2021-05-26 13:56:34'),
(9, 'IMP01', '000001', 6, 1, '1093016000002', 1, '10000.00', '', '2021-05-26 14:03:22'),
(10, '', '000001', 6, 1, '1093016000002', 12, '10000.00', '', '2021-05-26 14:04:02'),
(11, '', '000001', 6, 1, '001', 12, '10000.00', '', '2021-05-26 14:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `detail_id` int(11) NOT NULL,
  `pro_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `order_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`detail_id`, `pro_id`, `qty`, `price`, `order_id`) VALUES
(2, '1093016000002', 3, '20000.00', '000001'),
(3, '1093016000002', 12, '90000.00', '000003'),
(4, '007', 12, '100000.00', '000004'),
(5, '008', 2, '12345.00', '000004');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(11) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `emp_id`, `sup_id`, `timestamp`) VALUES
('000001', 1, 6, '2021-05-26 06:21:57'),
('000002', 1, 6, '2021-05-26 13:33:23'),
('000003', 1, 6, '2021-05-26 13:34:03'),
('000004', 1, 9, '2021-06-18 04:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pro_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `qty_alert` int(11) DEFAULT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `qty`, `price`, `cate_id`, `unit_id`, `brand_id`, `size_id`, `qty_alert`, `img`) VALUES
('001', 'ເສື້ອເຕະບານ', 22, '50000.00', 1, 1, 1, 1, 10, 'Mix_60afa532097f2.jpg'),
('002', 'ເສືອກັກ', 32, '10000.00', 13, 1, 4, 1, 10, 'Mix_60b4f226182d1.jpg'),
('003', 'ສະກ໋ອດ', 9, '20000.00', 1, 4, 5, 10, 10, 'Mix_60b4f2d1aa640.jpg'),
('004', 'ສະກ໋ອດ', 97, '30000.00', 1, 5, 1, 1, 20, 'Mix_60b4f2f8eee33.jpg'),
('005', 'ເສື້ອລີເວີພູ', 96, '10000.00', 1, 1, 1, 11, 10, 'Mix_60b4f902de5b5.jpg'),
('007', 'Real Maris', 19, '50000.00', 13, 1, 1, 7, 10, 'Mix_60b616328938c.jpg'),
('008', 'Sper', 0, '50000.00', 1, 1, 5, 1, 10, 'Mix_60b61b0ec39a1.jpg'),
('1093016000002', 'Manchestor', 110, '1000000.00', 1, 1, 1, 1, 1000, 'Mix_60afa5214d23f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rate_buy` decimal(11,2) DEFAULT NULL,
  `rate_sell` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `rate_buy`, `rate_sell`) VALUES
('THB', '330.00', '332.00'),
('USD', '10000.00', '11000.00');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `sell_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `stt_id` int(3) DEFAULT NULL,
  `type_pay` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sell_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `getmoney` decimal(11,2) DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seen1` int(2) DEFAULT NULL,
  `seen2` int(2) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remark` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`sell_id`, `emp_id`, `cus_id`, `stt_id`, `type_pay`, `sell_type`, `getmoney`, `img_path`, `seen1`, `seen2`, `timestamp`, `remark`) VALUES
('000001', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000002', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000003', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000004', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000005', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000006', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000007', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000008', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:49:33', NULL),
('000009', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000010', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000011', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000012', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000013', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:50:05', NULL),
('000014', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000015', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000016', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000017', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000018', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:13:54', NULL),
('000019', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', NULL, '', 0, 0, '2021-06-18 15:49:24', NULL),
('000020', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '0.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000021', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '50000.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000022', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '100000.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000023', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '0.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000024', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '20000.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000025', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '100000.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000026', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '0.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000027', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '0.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000028', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '0.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000029', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '0.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000030', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '0.00', 'Mix_60bf5075b0f4b.jpeg', 0, 0, '2021-06-18 15:48:53', NULL),
('000031', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '0.00', 'Mix_60bf50d73006e.jpeg', 0, 0, '2021-06-18 15:13:54', NULL),
('000032', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '0.00', '', 0, 0, '2021-06-18 15:48:38', NULL),
('000033', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '100000.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000034', 7, 5, 2, 'ເງິນໂອນ', 'ອອນລາຍ', NULL, 'Mix_60cb7089a687a.png', 0, 0, '2021-06-18 15:13:54', ''),
('000035', 7, 5, 2, 'ເງິນໂອນ', 'ອອນລາຍ', NULL, '', 0, 0, '2021-06-18 15:13:54', ''),
('000036', 7, 5, 2, 'ເງິນໂອນ', 'ອອນລາຍ', NULL, '', 0, 0, '2021-06-18 15:13:54', ''),
('000037', 7, 5, 2, 'ເງິນໂອນ', 'ອອນລາຍ', NULL, '', 0, 0, '2021-06-18 15:13:54', ''),
('000038', 7, 5, 2, 'ເງິນສົດ', 'ອອນລາຍ', NULL, '', 0, 0, '2021-06-18 15:13:54', ''),
('000039', 7, 5, 2, 'ເງິນສົດ', 'ອອນລາຍ', NULL, '', 0, 0, '2021-06-18 15:13:54', ''),
('000040', 7, 5, 2, 'ເງິນສົດ', 'ອອນລາຍ', NULL, '', 0, 0, '2021-06-18 15:13:54', ''),
('000041', 7, 5, 3, 'ເງິນສົດ', 'ອອນລາຍ', NULL, '', 2, 1, '2021-06-18 16:52:40', ''),
('000042', 7, 5, 3, 'ເງິນສົດ', 'ອອນລາຍ', NULL, '', 0, 1, '2021-06-18 15:20:34', ''),
('000043', 7, 5, 3, 'ເງິນສົດ', 'ອອນລາຍ', NULL, '', 0, 1, '2021-06-18 15:20:22', ''),
('000044', 1, 1, 1, 'ເງິນສົດ', 'ໜ້າຮ້ານ', '0.00', '', 0, 0, '2021-06-18 15:13:54', NULL),
('000045', 7, 5, 3, 'ເງິນສົດ', 'ອອນລາຍ', NULL, '', 2, 0, '2021-06-18 16:51:29', '');

-- --------------------------------------------------------

--
-- Table structure for table `selldetail`
--

CREATE TABLE `selldetail` (
  `id` int(11) NOT NULL,
  `pro_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `sell_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `selldetail`
--

INSERT INTO `selldetail` (`id`, `pro_id`, `qty`, `price`, `sell_id`) VALUES
(5, '001', 1, '50000.00', '000001'),
(6, '002', 1, '10000.00', '000001'),
(7, '004', 1, '30000.00', '000002'),
(8, '005', 1, '10000.00', '000002'),
(9, '001', 1, '50000.00', '000003'),
(10, '002', 1, '10000.00', '000004'),
(11, '004', 1, '30000.00', '000005'),
(12, '005', 1, '10000.00', '000006'),
(13, '001', 1, '50000.00', '000007'),
(14, '002', 1, '10000.00', '000008'),
(15, '003', 1, '20000.00', '000009'),
(16, '003', 1, '20000.00', '000010'),
(17, '003', 1, '20000.00', '000011'),
(18, '005', 1, '10000.00', '000012'),
(19, '005', 1, '10000.00', '000013'),
(20, '002', 1, '10000.00', '000014'),
(21, '001', 1, '50000.00', '000015'),
(22, '002', 1, '10000.00', '000016'),
(23, '003', 1, '20000.00', '000017'),
(24, '002', 1, '10000.00', '000018'),
(25, '002', 1, '10000.00', '000019'),
(26, '002', 1, '10000.00', '000020'),
(27, '003', 1, '20000.00', '000021'),
(28, '001', 1, '50000.00', '000022'),
(29, '002', 1, '10000.00', '000022'),
(30, '003', 1, '20000.00', '000022'),
(31, '002', 1, '10000.00', '000023'),
(32, '002', 1, '10000.00', '000024'),
(33, '001', 1, '50000.00', '000025'),
(34, '002', 1, '10000.00', '000026'),
(35, '002', 1, '10000.00', '000027'),
(36, '002', 1, '10000.00', '000028'),
(37, '002', 1, '10000.00', '000029'),
(38, '001', 1, '50000.00', '000030'),
(39, '001', 1, '50000.00', '000031'),
(40, '002', 1, '10000.00', '000032'),
(41, '001', 1, '50000.00', '000033'),
(42, '002', 1, '10000.00', '000033'),
(43, '003', 1, '20000.00', '000033'),
(50, '008', 1, '50000.00', '000034'),
(51, '007', 2, '50000.00', '000035'),
(52, '008', 1, '50000.00', '000036'),
(53, '007', 1, '50000.00', '000037'),
(54, '008', 2, '50000.00', '000037'),
(55, '007', 1, '50000.00', '000038'),
(56, '008', 1, '50000.00', '000038'),
(57, '007', 1, '50000.00', '000039'),
(58, '008', 1, '50000.00', '000040'),
(59, '1093016000002', 1, '1000000.00', '000041'),
(60, '004', 1, '30000.00', '000042'),
(61, '1093016000002', 2, '1000000.00', '000043'),
(62, '002', 1, '10000.00', '000043'),
(63, '001', 1, '50000.00', '000044'),
(64, '008', 1, '50000.00', '000045');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`) VALUES
(1, 'M'),
(7, 'S'),
(8, 'L'),
(9, 'XL'),
(10, 'X'),
(11, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `status_sell`
--

CREATE TABLE `status_sell` (
  `stt_id` int(3) NOT NULL,
  `stt_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_sell`
--

INSERT INTO `status_sell` (`stt_id`, `stt_name`) VALUES
(1, 'ຈ່າຍແລ້ວ'),
(2, 'ສັ່ງຊື້'),
(3, 'ສັ່ງຊື້ສຳເລັດ');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `company`, `tel`, `fax`, `address`, `email`) VALUES
(6, 'THAI AIRWAYS INTERNATIONAL, Lao P.D.R.', '020-5555-6633', '', '', 'it@hotmail.com'),
(9, 'ສັນຕິພາບ ຄອມພິວເຕີ', '020-5555-6633', '+856 20 5464 9656', '', 'santi@hotmail.com'),
(10, 'ທະນາຄານ ພັດທະນາລາວ', '+856 20 5232 9555', '+856 20 5464 9656', '', 'bcel@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'ຜືນ'),
(4, 'ໂຕ'),
(5, 'ຊຸດ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `broke`
--
ALTER TABLE `broke`
  ADD PRIMARY KEY (`boke_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `emp_status`
--
ALTER TABLE `emp_status`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`imp_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`sell_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `stt_id` (`stt_id`);

--
-- Indexes for table `selldetail`
--
ALTER TABLE `selldetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `sell_id` (`sell_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `status_sell`
--
ALTER TABLE `status_sell`
  ADD PRIMARY KEY (`stt_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `broke`
--
ALTER TABLE `broke`
  MODIFY `boke_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `imp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `selldetail`
--
ALTER TABLE `selldetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `broke`
--
ALTER TABLE `broke`
  ADD CONSTRAINT `broke_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`status`) REFERENCES `emp_status` (`status`);

--
-- Constraints for table `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `import_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `import_ibfk_2` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`),
  ADD CONSTRAINT `import_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `import_ibfk_4` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`),
  ADD CONSTRAINT `sell_ibfk_3` FOREIGN KEY (`stt_id`) REFERENCES `status_sell` (`stt_id`);

--
-- Constraints for table `selldetail`
--
ALTER TABLE `selldetail`
  ADD CONSTRAINT `selldetail_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`),
  ADD CONSTRAINT `selldetail_ibfk_2` FOREIGN KEY (`sell_id`) REFERENCES `sell` (`sell_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
