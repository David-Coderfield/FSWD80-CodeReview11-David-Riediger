SELECT * FROM locations
LEFT JOIN sights ON sights.location_id=locations.location_id
LEFT JOIN restaurants ON restaurants.location_id=locations.location_id
LEFT JOIN concerts ON concerts.location_id=locations.location_id
WHERE concerts.name LIKE '%%' OR restaurants.name LIKE '%%' OR sights.name LIKE '%%';

create table restaurants (
restaurant_id int unsigned AUTO_INCREMENT not null primary key,
location_id int unsigned not null,
name varchar(30) not null,
kitchen varchar(15) not null,
description varchar(255) not null default 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et iusto quasi error maiores est harum dolore voluptates modi vitae magni.',
phone varchar(15) not null,
www varchar(100) not null
)

create table sights (
sight_id int unsigned AUTO_INCREMENT not null primary key,
location_id int unsigned not null,
name varchar(30) not null,
type varchar(15) not null,
description varchar(255) not null default 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et iusto quasi error maiores est harum dolore voluptates modi vitae magni.',
www varchar(100) not null
)

create table concerts (
sight_id int unsigned AUTO_INCREMENT not null primary key,
location_id int unsigned not null,
name varchar(30) not null,
`date` date not null,
`time` time not null,
ticket decimal(5,2) unsigned not null
www varchar(100) not null
)