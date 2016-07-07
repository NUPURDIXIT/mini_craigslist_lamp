create table Category(Category_ID int unsigned not null auto_increment primary key,CategoryName varchar(40));

create table Region(Region_ID int unsigned not null auto_increment primary key,RegionName varchar(40));

create table SubCategory(SubCategory_ID int unsigned not null auto_increment primary key,Category_ID int unsigned not null,
			 FOREIGN KEY fk_cat_id(Category_ID) REFERENCES Category(Category_ID) ,SubCategoryName varchar(20));

create table Location(Location_ID int unsigned not null auto_increment primary key,Region_ID int unsigned not null,FOREIGN KEY (Region_ID) REFERENCES Region(Region_ID),LocationName varchar(40));

create table Posts(PostId int unsigned not null auto_increment primary key,Title char(20),price decimal,
		   Description text,Email varchar(60) not null,Agreement text,Timestamp TIMESTAMP,Image_1 LONGBLOB ,Image_2 LONGBLOB ,Image_3 LONGBLOB ,Image_4 LONGBLOB ,SubCategory_ID int unsigned not null,Location_ID int unsigned not null,
		   FOREIGN KEY fk_subcategory_id(SubCategory_ID) REFERENCES SubCategory(SubCategory_ID),
		   FOREIGN KEY fk_location_id(Location_ID) REFERENCES Location(Location_ID));


drop table if exists Login;
create table Login(
	User_ID int unsigned not null AUTO_INCREMENT PRIMARY KEY,
	Email varchar(100),
	Password varchar(60)
);

alter table Posts add column Published tinyint default 0;



Insert into Category values(20,'Automobile');
Insert into Category values(22,'Housing');


Insert into SubCategory values(1,20,'Car');
Insert into SubCategory values(2,22,'Rental');

Insert into Region values(4,'Bay Area');

Insert into Location values(1,4, 'San Mateo');
Insert into Location values(2,4, 'San Jose');



