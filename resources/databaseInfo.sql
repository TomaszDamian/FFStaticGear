drop table if exists users, currentGear, neededGear, characterClasses, ClassNames;
create table users(
	ID int auto_increment,
    CharacterName varchar(255) not null,
    constraint UserPK primary key(id)
);

create table ClassNames(
	ClassID int auto_increment,
    ClassName varchar(25),
    constraint ClassName_PK primary key(ClassID)
);

create table CharacterClasses(
	ownerID int,
    ClassID int,
    constraint CharacterClass_PK primary key(ownerID, ClassID),
    constraint CharacterClass_FK foreign key(ownerID) references users(ID),
    constraint ChacaterClass_ClassName_FK foreign key(ClassID) references ClassNames(ClassID)
);

create table currentGear(
	ownerID int,
    gear longtext,
    constraint cGear_PK primary key(ownerID),
    constraint cGear_FK foreign key(ownerID) references users(ID)
);

create table neededGear(
	ownerID int,
    gear longtext,
    constraint nGear_PK primary key(ownerID),
    constraint nGear_FK foreign key(ownerID) references users(id)
);

# test group 
insert into users(CharacterName)values("Vorgrout Gledant");
insert into users(CharacterName)values("Kestiel Cisro");
insert into users(CharacterName)values("Ivory Valiri");
insert into users(CharacterName)values("Aevlyn Aoi");

insert into ClassNames(ClassName)values("Paladin");			#1
insert into ClassNames(ClassName)values("Warrior");			#2
insert into ClassNames(ClassName)values("Dark Knight");		#3
insert into ClassNames(ClassName)values("Gunbreaker");		#4
insert into ClassNames(ClassName)values("Scholar");			#5
insert into ClassNames(ClassName)values("Sage");			#6
insert into ClassNames(ClassName)values("White Mage");		#7
insert into ClassNames(ClassName)values("Astrologian");		#8
insert into ClassNames(ClassName)values("Samurai");			#9
insert into ClassNames(ClassName)values("Ninja");			#10
insert into ClassNames(ClassName)values("Reaper");			#11
insert into ClassNames(ClassName)values("Monk");			#12
insert into ClassNames(ClassName)values("Dragoon");			#13
insert into ClassNames(ClassName)values("Machinist");		#14
insert into ClassNames(ClassName)values("Dancer");			#15
insert into ClassNames(ClassName)values("Bard");			#16
insert into ClassNames(ClassName)values("Summoner");		#17
insert into ClassNames(ClassName)values("Black Mage");		#18
insert into ClassNames(ClassName)values("Red Mage");		#19

insert into CharacterClasses(ownerID, ClassID)values("1","1");
insert into CharacterClasses(ownerID, ClassID)values("2","9");
insert into CharacterClasses(ownerID, ClassID)values("3","8");
insert into CharacterClasses(ownerID, ClassID)values("3","6");
insert into CharacterClasses(ownerID, ClassID)values("4","11");

insert into currentGear(ownerID, gear)values("1", '{"Head":"crafted", "Body":"savage", "Gloves":"normals", "Legs":"tombstones", "Feet":"extremes"}');
insert into currentGear(ownerID, gear)values("2", '{"Head":"crafted", "Body":"savage", "Gloves":"normals", "Legs":"tombstones", "Feet":"extremes"}');
insert into currentGear(ownerID, gear)values("3", '{"Head":"crafted", "Body":"savage", "Gloves":"normals", "Legs":"tombstones", "Feet":"extremes"}');
insert into currentGear(ownerID, gear)values("4", '{"Head":"crafted", "Body":"savage", "Gloves":"normals", "Legs":"tombstones", "Feet":"extremes"}');

insert into neededGear(ownerID, gear)values("1", '{"Head":"tombstone", "Body":"extremes", "Gloves":"tombstone", "Legs":"tombstones", "Feet":"extremes"}');
insert into neededGear(ownerID, gear)values("2", '{"Head":"tombstone", "Body":"extremes", "Gloves":"tombstone", "Legs":"tombstones", "Feet":"extremes"}');
insert into neededGear(ownerID, gear)values("3", '{"Head":"tombstone", "Body":"savage", "Gloves":"tombstone", "Legs":"tombstones", "Feet":"extremes"}');
insert into neededGear(ownerID, gear)values("4", '{"Head":"extremes", "Body":"extremes", "Gloves":"extremes", "Legs":"tombstones", "Feet":"extremes"}');