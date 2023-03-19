create database if not exists amazon;

use amazon;

-- Disable foreign key constraint checks
SET FOREIGN_KEY_CHECKS = 0;

-- Generate SQL statements to drop all tables in the "amazon" database
SELECT CONCAT('DROP TABLE IF EXISTS amazon.', table_name, ' CASCADE;')
FROM information_schema.tables
WHERE table_schema = 'amazon';

DROP TABLE IF EXISTS amazon.category CASCADE;
DROP TABLE IF EXISTS amazon.date CASCADE;
DROP TABLE IF EXISTS amazon.event CASCADE;
DROP TABLE IF EXISTS amazon.listing CASCADE;
DROP TABLE IF EXISTS amazon.sales CASCADE;
DROP TABLE IF EXISTS amazon.users CASCADE;
DROP TABLE IF EXISTS amazon.venue CASCADE;

-- Re-enable foreign key constraint checks
SET FOREIGN_KEY_CHECKS = 1;

create table if not exists users
(
    userid        integer not null PRIMARY KEY,
    username      char(8),
    firstname     varchar(30),
    lastname      varchar(30),
    city          varchar(30),
    state         char(2),
    email         varchar(100),
    phone         char(14),
    likesports    boolean default null,
    liketheatre   boolean default null,
    likeconcerts  boolean default null,
    likejazz      boolean default null,
    likeclassical boolean default null,
    likeopera     boolean default null,
    likerock      boolean default null,
    likevegas     boolean default null,
    likebroadway  boolean default null,
    likemusicals  boolean default null
);

create table if not exists venue
(
    venueid    smallint not null PRIMARY KEY,
    venuename  varchar(100),
    venuecity  varchar(30),
    venuestate char(2),
    venueseats integer
);

create table if not exists category
(
    catid    smallint not null PRIMARY KEY,
    catgroup varchar(10),
    catname  varchar(10),
    catdesc  varchar(50)
);

create table if not exists date
(
    dateid  smallint     not null PRIMARY KEY,
    caldate date         not null,
    day     character(3) not null,
    week    smallint     not null,
    month   character(5) not null,
    qtr     character(5) not null,
    year    smallint     not null,
    holiday boolean default false
);

CREATE TABLE if not exists event
(
    eventid   INT      NOT NULL PRIMARY KEY,
    venueid   SMALLINT NOT NULL,
    catid     SMALLINT NOT NULL,
    dateid    SMALLINT NOT NULL,
    eventname VARCHAR(200),
    starttime datetime
);


create table if not exists listing
(
    listid         integer  not null PRIMARY KEY,
    sellerid       integer  not null,
    eventid        integer  not null,
    dateid         smallint not null,
    numtickets     smallint not null,
    priceperticket decimal(8, 2),
    totalprice     decimal(8, 2),
    listtime       datetime
);

create table if not exists sales
(
    salesid    integer  not null PRIMARY KEY,
    listid     integer  not null,
    sellerid   integer  not null,
    buyerid    integer  not null,
    eventid    integer  not null,
    dateid     smallint not null,
    qtysold    smallint not null,
    pricepaid  decimal(8, 2),
    commission decimal(8, 2),
    saletime   datetime
);