-- Active: 1678415452072@@127.0.0.1@3306@bookstore


USE DATABASE BookStore;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Salesman;
DROP TABLE IF EXISTS Manager;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Book;
DROP TABLE IF EXISTS Author;
DROP TABLE IF EXISTS Publisher;
DROP TABLE IF EXISTS Supplier;
DROP TABLE IF EXISTS ProductOrder;
DROP TABLE IF EXISTS BookFeedback;
DROP TABLE IF EXISTS OrderFeedback;
DROP TABLE IF EXISTS MakeOrder;




CREATE TABLE IF NOT EXISTS User (
	userID int PRIMARY KEY AUTO_INCREMENT,
    userName varchar(50),
    userPassword varchar(50),
    firstName varchar(50),
    lastName varchar(50),
    email varchar(50),
    age int,
    gender enum("M", "F", "Other"),

    
    CONSTRAINT UNIQUE (userName),
    
    CONSTRAINT CHECK (LENGTH(userName) >= 8),
    CONSTRAINT CHECK (LENGTH(userPassword) >= 8),
    -- TODO: contraint email check
	-- CONSTRAINT CHECK (email like "[a-zA-Z0-9]+@[a-z]+.([a-z]+.)*com"), 
    CONSTRAINT CHECK (age > 0 && age <= 100)
);

CREATE TABLE IF NOT EXISTS Customer(
    customerID INT PRIMARY KEY,
    province VARCHAR(100),
    city VARCHAR(100),
    district VARCHAR(100),
    customerAddress VARCHAR(200),
    
    CONSTRAINT FOREIGN KEY (customerID) REFERENCES User(userID) 
);


CREATE TABLE IF NOT EXISTS Salesman (
	salesmanID INT,
    position VARCHAR(30),
    startingYear year,
    
    CONSTRAINT FOREIGN KEY (salesmanID) REFERENCES User(userID) 
);

CREATE TABLE IF NOT EXISTS Manager (
	managerID INT AUTO_INCREMENT,
    position VARCHAR(30),
    startingYear year,
    
    CONSTRAINT FOREIGN KEY (managerID) REFERENCES User(userID) 
);

-- --TODO: Product Order
CREATE TABLE IF NOT EXISTS Product (
    productID INT AUTO_INCREMENT PRIMARY KEY, 
    productName VARCHAR(200),
    unitsInStock INT DEFAULT 0,
    isActive BOOLEAN DEFAULT TRUE, 
    productDescription TEXT(10000), 
    supplierID INT,

    CONSTRAINT FOREIGN KEY (supplierID) REFERENCES Supplier(supplierID) 
);



CREATE TABLE IF NOT EXISTS Book (
	bookID INT AUTO_INCREMENT PRIMARY KEY,
    bookName VARCHAR(200),
    unitsInStock INT DEFAULT 0,
    isActive BOOLEAN DEFAULT TRUE,
    isbn VARCHAR(30),
    bookDescription TEXT(10000),
    typeOfCover VARCHAR(20),
    numberOfPages INT,
    originalPrice INT,
    publisherID INT,
    
    CONSTRAINT FOREIGN KEY (publisherID) REFERENCES Publisher(publisherID) ,
    
); -- Category: multi-value, -- listOfBookImages: link & multivalue, author: multivalue

CREATE TABLE IF NOT EXISTS Author (
	authorID INT AUTO_INCREMENT PRIMARY KEY,
	fullName VARCHAR(100),
    age INT,
    home VARCHAR(50),
    -- liscense VARCHAR(65535),
    authorDescription TEXT(10000)
); -- listOfAuthorImages: link & multivalue

CREATE TABLE IF NOT EXISTS Publisher (
	publisherID INT AUTO_INCREMENT PRIMARY KEY,
	publisherName VARCHAR(300),
    publisherDescription TEXT(10000), 
    numberOfProducts INT,
    numberOfSoldProducts INT DEFAULT 0
); -- listOfPublisherLiscense: link & multivalue

-- ALTER TABLE Book
--     ADD publisherID INT AUTO_INCREMENT;
-- ALTER TABLE Book
--     ADD supplierID INT AUTO_INCREMENT;
-- ALTER TABLE Book
--     ADD CONSTRAINT FOREIGN KEY publisherID REFERENCES Publisher(publisherID);

-- ALTER TABLE Book   
--     ADD CONSTRAINT FOREIGN KEY supplierID REFERENCES Supplier(supplierID);

CREATE TABLE IF NOT EXISTS Supplier(
	supplierID INT AUTO_INCREMENT PRIMARY KEY,
    supplierName VARCHAR(300),
    supplierDescription TEXT(10000),
    numberOfProducts INT
);

CREATE TABLE IF NOT EXISTS ProductOrder(
	orderID INT AUTO_INCREMENT PRIMARY KEY,
    orderStatus ENUM('shipped' ,'shipping', 'cancelled', 'confirming', 'confirmed', 'shipping back', 'shipped back'),
    originalCost INT, 
    totalDiscount INT,
    finalCost INT,
    orderDescription TEXT(10000), 

    sourceProvince VARCHAR(100),
    sourceCity VARCHAR(100),
    sourceDistrict VARCHAR(100), 
    sourceAddress VARCHAR(500),  

    destinationProvince VARCHAR(100),
    destinationCity VARCHAR(100),
    destinationDistrict VARCHAR(100),
    destinationAddress VARCHAR(500),

    shippingMethod VARCHAR(500),
    payingMethod ENUM('Cash', 'Online banking', 'Momo', 'ZaloPay'),
    receiverPhone VARCHAR(20),
    receiverName VARCHAR(100),
    createdTime DATETIME,
    shippedTime DATETIME
);

-- --------------------------------Weak Entities--------------------------------------------
CREATE TABLE IF NOT EXISTS BookFeedback(
    feedbackID INT AUTO_INCREMENT PRIMARY KEY,
    bookID INT,
    createdTime DATETIME, 
    content TEXT(10000),

    CONSTRAINT FOREIGN KEY (bookID) REFERENCES Book(bookID)
); -- listOfImages: multivalue

CREATE TABLE IF NOT EXISTS OrderFeedback (
    feedbackID INT AUTO_INCREMENT PRIMARY KEY,
    orderID INT,
    createdTime DATETIME,   
    content TEXT(10000),

    CONSTRAINT FOREIGN KEY (orderID) REFERENCES ProductOrder(orderID)
); -- listOfImages: multivalue


-- ---------------------------------------------------------Relationship
CREATE TABLE IF NOT EXISTS MakeOrder (
    customerID INT,
    orderID INT,
    createdTime DATETIME, 

    CONSTRAINT FOREIGN KEY (customerID) REFERENCES Customer(customerID),
    CONSTRAINT FOREIGN KEY (orderID) REFERENCES ProductOrder(orderID),
    CONSTRAINT PRIMARY KEY MakeOrder_PK(customerID, orderID, createdTime)
);

CREATE TABLE IF NOT EXISTS WriteBook(
    authorID INT,
    bookID INT,

    CONSTRAINT FOREIGN KEY (authorID) REFERENCES Author(authorID),
    CONSTRAINT FOREIGN KEY (bookID) REFERENCES Book(bookID),
    CONSTRAINT PRIMARY KEY WriteBook(authorID, bookID)
);

CREATE TABLE IF NOT EXISTS PublishBook (
    bookID INT,
    publisherID INT,

    CONSTRAINT FOREIGN KEY (bookID) REFERENCES Book(bookID),
    CONSTRAINT FOREIGN KEY (publisherID) REFERENCES Publisher(publisherID),
    CONSTRAINT PRIMARY KEY PublishBook_PK(bookID, publisherID)
);

CREATE TABLE IF NOT EXISTS SupplyBook (
    bookID INT, 
    supplierID INT,

    CONSTRAINT FOREIGN KEY (bookID) REFERENCES Book(bookID),
    CONSTRAINT FOREIGN KEY (supplierID) REFERENCES Supplier(supplierID),
    CONSTRAINT PRIMARY KEY SupplyBook_PK(bookID, supplierID)
);

CREATE TABLE IF NOT EXISTS AddToCart(
    userID INT,
    bookID INT,
    addedTime DATETIME,

    CONSTRAINT FOREIGN KEY (customerID) REFERENCES Customer(customerID),
    CONSTRAINT FOREIGN KEY (bookID) REFERENCES Book(bookID),
    CONSTRAINT PRIMARY KEY AddToCart_PK(customerID, bookID)
);

CREATE TABLE IF NOT EXISTS ContainBook (
    orderID INT,   
    bookID INT, 

    CONSTRAINT FOREIGN KEY (orderID) REFERENCES ProductOrder(orderID),
    CONSTRAINT FOREIGN KEY (bookID) REFERENCES Book(bookID),
    CONSTRAINT PRIMARY KEY ContainBook_PK(orderID, bookID)
);

------------------------------------------------------------------
-- Active: 1678415452072@@127.0.0.1@3306@bookstore
INSERT INTO User(userID, userName, userPassword, firstName, email, age, gender)
	VALUES(1, "khoango2002", "uP3cq2K6", "Ngô Vũ Anh Khoa", "ngokhoa1202@gmail.com", 20, "M"),
			(2, "namnguyen2310", "nFtWhE8n", "Nguyễn Tiến Nam", "nam.nguyenbknetid@hcmut.edu", 20, "M"),
			(3, "vunguyendhbk2000", "5SC2ea6Mb5B3", "Nguyễn Duy Vũ", "vunguyen2000@gmail.com", 21, "M"),
			(4, "hainguyenSomething", "5Wm86j7TH43v", "Nguyễn Minh Hải", "hai.nguyensomething@hcmut.edu.vn", 21, "M"),
			(5, "vietBestSamurai", "legendOfSamuraiViet", "Tạ Quang Việt", "viet.tasamurai@gmail.com", 22, "M"),
			(6, "ThaoPhamTiNi", "ThaoNguyen2048523", "Phạm Ngọc Thảo", "thao.pham2048523@hcmut.edu.vn", 18, "F"),
			(7, "iamthebosshere", "iamthebosshere1809", "Ngô Vũ Vân Anh", "vivian.ngo@sydney.edu.au", 25, "F"),
			(8, "haicauancarem", "trivo2584313", "Võ Minh Trí", "minh.trivo@hcmut.edu.vn", 20, "M"),
			(9, "Ruataygackiem", "kiemsihuyenthoaidaquyan", "Phạm Đỗ Tài", "PhamTaiKiemSi1994@gmail.com", 21, "M"),
			(10, "tronghung7543", "jJ7y5bxNvkHY", "Nguyễn Đỗ Trọng Hùng", "tronghungfootballer@yahoo.com", 23, "M"),
			(11, "nguoithichaihuoc", "cuoilenchovui2548", "Lê Văn Việt", "vietle2548@outlook.com", 30, "M"),
			(12, "AliceInWonderland", "alonelystudent4839", "Alice Nguyen", "nguyenAliceStanfordUni@stanford.edu.vn", 24, "F"),
			(13, "timthayhocdao", "wvNwKV9HA5rV", "Nguyễn Thành Trung", "trungnguyenyduoc2002@gmail.com", 22, "M"),
			(14, "phuongthaohuflit", "eVWWvg3qz8Tw", "Đặng Quỳnh Phương Thảo", "phuongthaoyeudoi@huflit.edu.vn", 20, "F"),
			(15, "baochayvogioigiang", "chauvo452638", "Võ Bảo Châu", "baochauvoKhoa45@ump.edu.com", 23, "F"),
			(16, "cafedamuoi", "cafedendakhongduong", "Trịnh Minh Tân", "minhtanhaihuoc@yahoo.com", 30, "M"),
			(17, "dangquanghuyTDT", "thietsumetmoi1593", "Đặng Quang Huy", "huyquangdang2011423@tdt.edu.vn", 21, "M"),
			(18, "andrewdoan", "12345679", "Võ Đoàn Văn Quý", "quyquydeptrai@yahoo.com", 19, "M"),
			(19, "loveMathandIT", "connguoiyeulaptrinh", "Trần Đinh An", "andinh.khoa20@uit.edu.vn", 30, "M"),
			(20, "needAnAnswerForLife", "lifeismeaningful8", "John Smith", "smithPhilosophyFaculty@harvard.edu.us", 25, "M"),
			(21, "hackertuonglai", "ElonMuskandBillGates", "Võ Thành Nhơn", "thanhnhonHackerHCMUS@hcmus.edu.vn", 31, "M"),
			(22, "JosephSantarcangeloSpain", "josephdatasciencetist", "Joseph Santarcangelo", "josephlecturer@ibm.org.com", 45, "M"),
			(23, "andrewmajorinAI", "ilovemyfamilysomuch1208", "Andrew Ng", "andrewAIStanford@stanford.edu.com", 48, "M"),
			(24, "bagulindianbestIT", "iamsotirednow", "Bagul Aarti", "aarti2503bagul@stanford.edu.com", 30, "F"),
			(25, "JOHNNinja4503", "iamjohn4503", "John Rafrano", "johnragrano4503@meta.org.com", 50, "M"),
    	(26, "MoroneyDeveloper1203", "PasswordMoroney1203", "Lawrence Moroney", "moreneyintel@intel.org.com", 58, "M"),
			(27, "waltherStatistics1955", "waltermajorMathsandStatistics", "Guenther Walther", "walther1955@pennn.edu.com", 60, "M"),
			(28, "romeoandjuliet", "romeoibmteamlead1990", "Romeo Kienzler", "kienzlerdatascientist@gmail.com", 32, "M"),
			(29, "aije1998", "aijeAfricabest", "Aiej Egwakhide", "aiej1998@hotmail.com", 24, "F"),
			(30, "svetlevi1976", "svetlevi1976", "Svetlana Levitan", "svetlevi1976@albert.edu.com", 45, "F"),
    	(31, "coleen1980", "vanLentdutch", "Coleen Van Lent", "mrscolleen@gmail.com", 41, "F"),
			(32, "charlesPhD1965", "russellserverance", "Charles Russell Serverance", "charlesPhD1965@ibm.org.com", 57, "M");

SELECT * FROM User;

INSERT INTO Customer(customerID, province, city, district, customerAddress)
	VALUES(1, "Tien Giang", "Go Cong Town", "District 5", "210 Truong Dinh Street"),
				(2, "" ,"", "", ""),
				(3, "" ,"", "", ""),
				(4, "" ,"", "", ""),
				(5, "" ,"", "", ""),
				(6, "" ,"", "", ""),
				(7, "" ,"", "", ""),
				(8, "" ,"", "", ""),
				(9, "" ,"", "", ""),
				(10, "" ,"", "", ""),
				(11, "" ,"", "", ""),
				(12, "" ,"", "", ""),
				(13, "" ,"", "", ""),
				(14, "" ,"", "", ""),
				(15, "" ,"", "", "");
SELECT * FROM Customer;

INSERT INTO Salesman(salesmanID, position, startingYear)
	VALUES(16, "", 2023),
				(17, "", 2023),
				(18, "", 2023),
				(19, "", 2023),
				(20, "", 2023),
				(21, "", 2023),
				(22, "", 2023), 
				(23, "", 2023);

SELECT * FROM Salesman;


INSERT INTO Manager(managerID, position, startingYear)
	VALUES(24, "", 2023),
				(25, "", 2023),
				(26, "", 2023);

SELECT * FROM Manager;
--------------------------------------------------------------------------------------------
-- Active: 1678415452072@@127.0.0.1@3306@bookstore
-- --------------------Login-----------------------------------------------------------
DROP PROCEDURE IF EXISTS customerLogin;

DELIMITER $$
CREATE PROCEDURE customerLogin(IN _userName varchar(50), IN _userPassword varchar(50))
BEGIN
	DECLARE errorMessage VARCHAR(255);
	IF _userName IS NULL THEN
		BEGIN
			SET errorMessage = "ERROR: Username field must not be empty";
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
		END;
	ELSEIF _userPassWord IS NULL THEN
		BEGIN
			SET errorMessage = 'ERROR: Password field must not be empty';
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
		END;
	END IF;
	SELECT * 
    FROM User, Customer 
	  WHERE (User.userID = Customer.customerID) 
          AND User.userName = _userName AND User.userPassword = _userPassword;
  -- TODO
  -- IF SELECT = NULL CAN'T FIND userName or userPassword
END;
$$
DELIMITER ;

CALL customerLogin("namnguyen2310", "nFtWhE8n");
------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS salesmanLogin;

DELIMITER $$
CREATE PROCEDURE salesmanLogin(IN _userName varchar(50), IN _userPassword varchar(50))
BEGIN
	DECLARE errorMessage VARCHAR(255);
	IF _userName IS NULL THEN
		BEGIN
			SET errorMessage = "ERROR: Username field must not be empty";
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
		END;
	ELSEIF _userPassWord IS NULL THEN
		BEGIN
			SET errorMessage = 'ERROR: Password field must not be empty';
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
		END;
	END IF;
	SELECT * 
    FROM User, Salesman 
	  WHERE (User.userID = Salesman.salesmanID) 
          AND User.userName = _userName AND User.userPassword = _userPassword;
END;
$$
DELIMITER ;

CALL salesmanLogin("cafedamuoi", "cafedendakhongduong");
----------------------------------------------------------------------
DROP PROCEDURE IF EXISTS managerLogin;

DELIMITER $$
CREATE PROCEDURE managerLogin(IN _userName varchar(50), IN _userPassword varchar(50))
BEGIN
	DECLARE errorMessage VARCHAR(255);
	IF _userName IS NULL THEN
		BEGIN
			SET errorMessage = "ERROR: Username field must not be empty";
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
		END;
	ELSEIF _userPassWord IS NULL THEN
		BEGIN
			SET errorMessage = 'ERROR: Password field must not be empty';
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
		END;
	END IF;
	SELECT * 
    FROM User, Manager 
	  WHERE (User.userID = Manager.managerID) 
          AND User.userName = _userName AND User.userPassword = _userPassword;
END;
$$
DELIMITER ;

CALL managerLogin("bagulindianbestIT", "iamsotirednow");

-- --------------------------------Insert procedure-------------------------------------------
--------------------------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS insertCustomer;
DELIMITER $$
CREATE PROCEDURE insertCustomer(IN _userName VARCHAR(50), IN _userPassword VARCHAR(50))
BEGIN
	DECLARE errorMessage VARCHAR(255);
	IF _userName IS NULL THEN 
	BEGIN
		SET errorMessage = "ERROR: Username must not be empty";
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
	END;
	ELSEIF _userPassword IS NULL THEN
	BEGIN
		SET errorMessage = "ERROR: Password must not be empty";
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
	END;
	END IF;
	INSERT INTO User(userName, userPassword)
		VALUES(_userName, _userPassword); -- How to insert into Customer table with ID of new userID
	INSERT INTO Customer(customerID)
		VALUES(LAST_INSERT_ID());
END;

$$ DELIMITER;

CALL insertCustomer("johnson2504", "lovetomyfamily");
---------------------------------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS insertSalesman;
DELIMITER $$
CREATE PROCEDURE insertSalesman(IN _userName VARCHAR(50), IN _userPassword VARCHAR(50))
BEGIN
	DECLARE errorMessage VARCHAR(255);
	IF _userName IS NULL THEN 
	BEGIN
		SET errorMessage = "ERROR: Username must not be empty";
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
	END;
	ELSEIF _userPassword IS NULL THEN
	BEGIN
		SET errorMessage = "ERROR: Password must not be empty";
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
	END;
	END IF;
	INSERT INTO User(userName, userPassword)
		VALUES(_userName, _userPassword); -- How to insert into Customer table with ID of new userID
	INSERT INTO Salesman(salesmanID)
		VALUES(LAST_INSERT_ID());
END;

$$ DELIMITER;

CALL insertSalesman("michaelHavardCS", "CsismydreamatHavard2000");
--------------------------------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS insertManager;
DELIMITER $$
CREATE PROCEDURE insertManager(IN _userName VARCHAR(50), IN _userPassword VARCHAR(50))
BEGIN
	DECLARE errorMessage VARCHAR(255);
	IF _userName IS NULL THEN 
	BEGIN
		SET errorMessage = "ERROR: Username must not be empty";
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
	END;
	ELSEIF _userPassword IS NULL THEN
	BEGIN
		SET errorMessage = "ERROR: Password must not be empty";
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = errorMessage;
	END;
	END IF;
	INSERT INTO User(userName, userPassword)
		VALUES(_userName, _userPassword); -- How to insert into Customer table with ID of new userID
	INSERT INTO Manager(managerID)
		VALUES(LAST_INSERT_ID());
END;

$$ DELIMITER;

CALL insertManager("timmarketing1990", "20111990Marketing");
















