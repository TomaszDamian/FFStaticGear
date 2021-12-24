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

insert into currentGear(ownerID, gear)values("1", '{"head":"crafted", "body":"savage", "gloves":"normals", "legs":"tombstones", "feet":"extremes"}');
insert into currentGear(ownerID, gear)values("2", '{"head":"crafted", "body":"savage", "gloves":"normals", "legs":"tombstones", "feet":"extremes"}');
insert into currentGear(ownerID, gear)values("3", '{"head":"crafted", "body":"savage", "gloves":"normals", "legs":"tombstones", "feet":"extremes"}');
insert into currentGear(ownerID, gear)values("4", '{"head":"crafted", "body":"savage", "gloves":"normals", "legs":"tombstones", "feet":"extremes"}');

insert into neededGear(ownerID, gear)values("1", '{"head":"tombstone", "body":"extremes", "gloves":"tombstone", "legs":"tombstones", "feet":"extremes"}');
insert into neededGear(ownerID, gear)values("2", '{"head":"tombstone", "body":"extremes", "gloves":"tombstone", "legs":"tombstones", "feet":"extremes"}');
insert into neededGear(ownerID, gear)values("3", '{"head":"tombstone", "body":"savage", "gloves":"tombstone", "legs":"tombstones", "feet":"extremes"}');
insert into neededGear(ownerID, gear)values("4", '{"head":"extremes", "body":"extremes", "gloves":"extremes", "legs":"tombstones", "feet":"extremes"}');