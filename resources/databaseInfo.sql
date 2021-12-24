drop table if exists users, currentGear, neededGear, characterClasses;
create table users(
	ID int auto_increment,
    CharacterName varchar(255) not null,
    constraint UserPK primary key(id)
);

create table CharacterClasses(
	ownerID int,
    ClassName varchar(25),
    constraint CharacterClass_FK foreign key(ownerID) references users(ID)
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

insert into CharacterClasses(ownerID, ClassName)values("1","Paladin");
insert into CharacterClasses(ownerID, ClassName)values("2","Samurai");
insert into CharacterClasses(ownerID, ClassName)values("3","Astrologian");
insert into CharacterClasses(ownerID, ClassName)values("3","Sage");
insert into CharacterClasses(ownerID, ClassName)values("4","Reaper");

insert into currentGear(ownerID, gear)values("1", '{"Head":"crafted", "Body":"savage", "Gloves":"normals", "Legs":"tombstones", "Feet":"extremes"}');
insert into currentGear(ownerID, gear)values("2", '{"Head":"crafted", "Body":"savage", "Gloves":"normals", "Legs":"tombstones", "Feet":"extremes"}');
insert into currentGear(ownerID, gear)values("3", '{"Head":"crafted", "Body":"savage", "Gloves":"normals", "Legs":"tombstones", "Feet":"extremes"}');
insert into currentGear(ownerID, gear)values("4", '{"Head":"crafted", "Body":"savage", "Gloves":"normals", "Legs":"tombstones", "Feet":"extremes"}');

insert into neededGear(ownerID, gear)values("1", '{"Head":"tombstone", "Body":"extremes", "Gloves":"tombstone", "Legs":"tombstones", "Feet":"extremes"}');
insert into neededGear(ownerID, gear)values("2", '{"Head":"tombstone", "Body":"extremes", "Gloves":"tombstone", "Legs":"tombstones", "Feet":"extremes"}');
insert into neededGear(ownerID, gear)values("3", '{"Head":"tombstone", "Body":"savage", "Gloves":"tombstone", "Legs":"tombstones", "Feet":"extremes"}');
insert into neededGear(ownerID, gear)values("4", '{"Head":"extremes", "Body":"extremes", "Gloves":"extremes", "Legs":"tombstones", "Feet":"extremes"}');