drop database if exists Revolutionizing_Crops;
create database Revolutionizing_Crops;
use Revolutionizing_Crops;

create table Citizen(
CitizenID int not null,
fname varchar(20),
lname varchar(20),
age int,
gender ENUM('male', 'female'), 
qualification varchar(50),
primary key (CitizenID)
);

Create table Staff(
StaffID int not null,
CitizenID int not null,
position varchar(50),
email varchar(80) not null unique,
telephone varchar(40),
primary key(StaffID),
foreign key(CitizenID) references Citizen(CitizenID)
);

CREATE table Location(
LocationID int not null, 
Region Varchar(30), 
district Varchar(30), 
sector Varchar(30), 
cell Varchar(30),
primary key(LocationID),
INDEX(LocationID)
);

create table Fertilizer(
FertilizerID int not null, 
Thename Varchar(50), 
type Varchar(30),
primary key(FertilizerID)
);


Create table Farmer(
FarmerID int not null, 
CitizenID int not null, 
LocationID int not null,
email Varchar(50) not null unique,
telephone varchar(40),
Primary key(FarmerID),
foreign key(CitizenID) references Citizen(CitizenID),
foreign key(LocationID) references Location(LocationID),
index(FarmerID)
);

Create table Market(
marketID int not null auto_increment, 
marketsize Varchar(50), 
farmerID int not null,
primary key(marketID),
foreign key(farmerID) references Farmer(FarmerID)
);

create table Crop(
CropID int not null, 
FarmerID int not null, 
FertilizerID int not null, 
LocationID int not null, 
NameofCrop varchar(50), 
typeofCrop varchar(30), 
TimeTakenToHarvest varchar(50),
price varchar(50),
PRIMARY key(CropID),
foreign key(FarmerID) references Farmer(FarmerID),
foreign key(FertilizerID) references Fertilizer(FertilizerID),
foreign key(LocationID) references Location(LocationID),
INDEX(CropID)
);

create table Stock(
FarmerID int not null, 
CropID int not null, 
marketID int not null,
foreign key(FarmerID) references Farmer(FarmerID),
foreign key(CropID) references Crop(CropID),
foreign key(marketID) references Market(marketID)
);

create table Consumer(
ConsumerID int not null, 
CitizenID int not null,
LocationID int not null,
MarketID int not null,
telephone varchar(40), 
primary key(ConsumerID),
foreign key(LocationID) references Location(LocationID),
foreign key(MarketID) references Market(marketID),
INDEX(ConsumerID)
);


create table Season(
Seasonname varchar(50),
startingDate DATE,
endingDate Date, 
CropID int not null, 
foreign key(CropID) references Crop(CropID)
);

create table Pest(
PestID int not null, 
NameofPest Varchar(50), 
typeofpest varchar(30), 
CropID int not null,
primary key(PestID),
foreign key(CropID) references Crop(CropID)
);

create table LandDetails(
landID int not null, 
typeofLand Varchar(50), 
size Varchar(40), 
CropID int not null, 
goodnessofland Varchar(70),
primary Key(landID),
foreign key(CropID) references Crop(CropID)
); 


insert into Citizen(CitizenID, fname,lname,age, gender, qualification) values
(100,"fabrice","MUKARAGE",23,"Male","bachelor degree"),
(101,"eric","MUKAMA",25,"Male","High School diploma"),
(102,"sean","MUKARAGE",33,"Male","bachelor degree"),
(103,"fabie","niyomushumba",40,"Male","PHD in agriculture"),
(104,"gong","Murwanashaka",55,"Male","bachelor degree"),
(105,"divine","babo",53,"Female","bachelor degree"),
(106,"fafa","uwanyirigira",30,"Female","certificate on management"),
(107,"claude","tuyisenge",40,"Male","bachelor degree"),
(108,"tate","shema",45,"Female","High school diploma"),
(109,"fofo","biziyaremye",63,"Female","Masters"),
(110,"benjamin","abimana",43,"Male","Masters"),
(111,"kalisa","benitha",40,"Male","bachelor degree"),
(112,"shon","ishimwe",41,"Male","O'level education"),
(113,"baba","kalisa",34,"Male","bachelor degree"),
(114,"emmanuel","babethe",33,"Male","Masters"),
(115,"bigman","mugisha",47,"Male","bachelor degree"),
(116,"freeman","kongwe",29,"Male","bachelor degree"),
(117,"freerace","kabesa",50,"Male","High school diploma"),
(118,"claudine","singizungize",39,"Male","bachelor"),
(119,"oscar","murwana",47,"Male","bachelar degree"),
(120,"roger","kabebe",55,"Male","bachelor degree"),
(121,"alain","ndihokubwayo",43,"Male","bachelor degree"),
(122,"theoneste"," nsanzimana",20,"Male","High school"),
(123,"boniface","nsengiyumva",43,"Male","bachelor degree"),
(124,"placide","shema",40,"Male","bachelor degree"),
(125,"umulisa","liliane",44,"Female","Masters"),
(126,"diedonee","keza",40,"Male","bachelor degree"),
(127,"sonia","simbi",40,"Female","bachelor degree"),
(128,"soso","sheja",40,"Female","Masters"),
(129,"placide","emmy",40,"Male","High school diploma"),
(130,"fab","musoni",40,"Male","bachelor degree");


insert into Staff(StaffID, CitizenID, position, email, telephone) values 
(1001,117,"CEO","freerace.kabesa@gmail.com","+233245421454"),
(1002,100,"Operating manager","fabrice.mukarage@gmail.com","+233244441450"),
(1003,112,"employee","shon.ishimwe@gmail.com","+233245789542"),
(1004,113,"employee","baba.kalisa@gmail.com","+233245658785"),
(1005,114,"IT manager","emmanuel.babethe@gmail.com","+233248887874"),
(1006,120,"employee","roger.kabebe@gmail.com","+233248885587"),
(1007,121,"employee","alain.ndihokubwayo@gmail.com","+233246655444"),
(1008,119,"employee","oscar.murwana@gmail.com","+233245547847"),
(1009,124,"frontend developer","placide.shema@gmail.com","+233245544414"),
(1010,115,"backend developer","bigman.mugisha@gmail.com","+233246545444");

insert into Location (LocationID, Region, district, sector, cell) values
(20, "Southern","Nyanza","Muyira","Nyundo"),
(21, "Western","Butare","Rubona","Mugari"),
(22, "estern","Ngororero","matimba","gisenyi"),
(23, "kigali","Huye","ruyenzi","nzoga"),
(24, "North-Estern","Ruhango","rarama","nzovi");

insert into Fertilizer (FertilizerID, Thename, type) values
(50,"Urea","typeA"),
(51,"Ammonium Nitrate","typeB"),
(52,"Ammonium Sulfate","typeC"),
(53,"Calcium Nitrate","typeAA"),
(54,"Diammonium Phosphate","typeBB"),
(55,"Monoammonium phosphate","typeCC"),
(56,"Triple Super Phosphate","typeDD"),
(57,"Potassium Nitrate","typeAAA"),
(58,"Miracle-Gro Fruit Spikes","typeBBB"),
(59,"Earth Pods Fertilizer","typeCCC");

insert into Farmer (FarmerID, CitizenID, LocationID, email, telephone) values
(4000,103,20,"fabio.niyomushumba@gmail.com","+250785878747"),
(4001,104,21,"gong.murwanashyaka@gmail.com","+250784578741"),
(4002,105,20,"divine.babo@gmail.com","+250787878747"),
(4003,106,24,"fafa.uwanyirigira@gmail.com","+250788787777"),
(4004,107,23,"claude.tuyisenge@gmail.com","+250784747878");

insert into Market (marketsize, farmerID) values 
("5000 people",4000),
("1000 people",4002),
("500 people",4001),
("4000 people",4003),
("3000 people",4000),
("10000 people",4004),
("5500 people",4004),
("6054 people",4002),
("4540 people",4001),
("2000 people",4004);


insert  into Crop (CropID, FarmerID, FertilizerID, LocationID, NameofCrop, typeofCrop, TimeTakenToHarvest, price) values
(2000,4000,50,21,"patatoes","Food crops"," 5 months", "1$ per kg"),
(2001,4000,51,21,"Abaca","Fiber crops"," 10 months", "2$ per kg"),
(2002,4001,55,22,"sunflower","Feed crops"," 4 months", "3$ per kg"),
(2003,4001,57,23,"Beans","Food crops"," 3 months", "1$ per kg"),
(2004,4004,59,23,"carrots","Oil crops"," 4 years", "0.5$ per piece");

insert into Stock (FarmerID, CropID, marketID) values
(4000,2003,1),
(4000,2001,1),
(4004,2004,2),
(4000,2001,3),
(4001,2003,4),
(4001,2003,5),
(4004,2004,1),
(4000,2001,2),
(4000,2000,3),
(4000,2000,4);

insert into Consumer (ConsumerID,CitizenID, LocationID, MarketID, telephone) values
(7070,126,20,2,"+250782223525"),
(7071,127,22,1,"+250781147474"),
(7072,128,22,3,"+250782225478"),
(7073,129,24,3,"+250784545477"),
(7074,130,24,4,"+250782222224");

insert into Season (Seasonname, startingDate, endingDate, CropID) values
("Spring Season","2021-03-01","2021-06-01",2000),
("Summer Season","2021-06-01","2021-09-01",2001),
("Autumn Season","2021-09-01","2021-12-01",2002),
("Winter Season","2021-12-01","2022-03-01",2003),
("Spring Season","2021-03-01","2021-06-01",2004),
("Summer Season","2021-06-01","2021-09-01",2004),
("Autumn Season","2021-09-01","2021-12-01",2003),
("Winter Season","2021-12-01","2022-03-01",2002),
("Spring Season","2021-03-01","2021-06-01",2001),
("Summer Season","2021-06-01","2021-09-01",2002);

insert into Pest (PestID, NameofPest, typeofpest, CropID) values
(101010,"bumble bees","insect",2000),
(101011,"Bryobia mite","Mites",2002),
(101012,"Insect","Rodents ",2003),
(101013,"goat","Animals",2004),
(101014,"parrots","Birds",2002),
(101015,"Bollworm","insert",2002),
(101016,"cow","animals",2000),
(101017,"humming birds","Birds",2003),
(101018,"mice","Rodents",2003),
(101019,"swift","birds",2001);

insert into LandDetails(landID, typeofLand, size, CropID, goodnessofland) values
(707070,"Sandy soil","1000*1000 square",2000, "Good"),
(707071,"Silt Soil","2000*2000 square",2001, "very Good"),
(707072,"Clay Soil","500*1000 square",2003, "Excellent"),
(707073,"Sandy soil","500*1000 square",2004, "Good"),
(707074,"Loamy Soil","1000*500 square",2002, "Excellent"),
(707075,"Loamy Soil","800*1000 square",2003, "Good"),
(707076,"Sandy soil","4000*4000 square",2004, "very Good"),
(707077,"Loamy Soil","100*2000 square",2001, "very Good"),
(707078,"Sandy soil","300*1000 square",2002, "Good"),
(707079,"Clay Soil","400*800 square",2004, "Excellent");



/*
1. turning the of farmers who cultivated beans in western province
*/
SELECT Farmer.FarmerID, Citizen.fname, Citizen.lname
FROM Citizen
	inner JOIN Farmer on Farmer.CitizenID=Citizen.CitizenID
	inner join Crop on Crop.FarmerID=Farmer.FarmerID
		where Crop.NameOfCrop="beans" and Farmer.LocationID=21; 



/*
2. displaying the type of soil where Patatoes can be cultivated during the Spring season
*/
select LandDetails.typeofLand from Crop
	inner join LandDetails on LandDetails.CropID=Crop.CropID
	inner join Season on Season.CropID=Crop.CropID
		where Crop.NameofCrop="patatoes";
	
    
/*
3. displaying farmers who have Crops in the stock
*/
SELECT Distinct Farmer.FarmerID, Citizen.fname, Citizen.lname
FROM Citizen
	inner JOIN Farmer on Farmer.CitizenID=Citizen.CitizenID
	inner join Stock on Stock.FarmerID=Farmer.FarmerID;
    
    
/*
4. displaying the name of pests that likely to attack the sunflower crop
*/
select distinct Pest.NameofPest from Pest
inner join Season on Season.CropID=Pest.CropID
where pest.CropID=2002;


/*
5.diplaying the  farmers who cultivated the patatoes or carrots
*/
select FarmerID from Crop where
 NameofCrop="Patatoes" or 
 NameofCrop="carrots" order by FarmerID DESC;
 
 
 /*
 6. displaying the fertilizer information with ID greater than 53 and with the p letter in their names on the ascending order 
 */
Select * from 
Fertilizer WHERE
   FertilizerID > 53
   AND Thename LIKE '%P%'
order by 
Thename asc;

select * from Crop;