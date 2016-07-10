drop table if exists Posts;
drop table if exists Login;
drop table if exists SubCategory;
drop table if exists Category;
drop table if exists Location;
drop table if exists Region;

create table Login(
	User_ID int unsigned not null AUTO_INCREMENT PRIMARY KEY,
	Email varchar(100),
	Password varchar(60)
);


create table Category(
	Category_ID int unsigned not null auto_increment primary key,
	CategoryName varchar(40)
);


create table Region(
	Region_ID int unsigned not null auto_increment primary key,
	RegionName varchar(40)
);


create table SubCategory(
	SubCategory_ID int unsigned not null auto_increment primary key,
	Category_ID int unsigned not null,
	SubCategoryName varchar(20),
	FOREIGN KEY fk_cat_id(Category_ID) REFERENCES Category(Category_ID)
);


create table Location(
	Location_ID int unsigned not null auto_increment primary key,
	Region_ID int unsigned not null,
	LocationName varchar(40),
	FOREIGN KEY (Region_ID) REFERENCES Region(Region_ID)
);

create table Posts(
	PostId int unsigned not null auto_increment primary key,
	User_ID int unsigned not null,
	SubCategory_ID int unsigned not null,
	Location_ID int unsigned not null,	
	Title char(128),
	price decimal,
	Description text,
	Email varchar(60) not null,
	Agreement text,
	Timestamp TIMESTAMP,
	Image_1 LONGBLOB ,
	Image_2 LONGBLOB ,
	Image_3 LONGBLOB ,
	Image_4 LONGBLOB ,
	Published tinyint default 0,
	FOREIGN KEY fk_user_id(User_ID) REFERENCES Login(User_ID),
	FOREIGN KEY fk_subcategory_id(SubCategory_ID) REFERENCES SubCategory(SubCategory_ID),
	FOREIGN KEY fk_location_id(Location_ID) REFERENCES Location(Location_ID)
);