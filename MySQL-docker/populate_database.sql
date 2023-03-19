use amazon;

LOAD DATA INFILE '/var/lib/mysql-files/allusers_pipe.txt'
    INTO TABLE users
    FIELDS TERMINATED BY '|'
    LINES TERMINATED BY '\n'
    (userid,
     username,
     firstname,
     lastname,
     city,
     state,
     email,
     phone,
     @likesports,
     @liketheatre,
     @likeconcerts,
     @likejazz,
     @likeclassical,
     @likeopera,
     @likerock,
     @likevegas,
     @likebroadway,
     @likemusicals)
    SET likesports = NULLIF(@likesports, ''),
        liketheatre = NULLIF(@liketheatre, ''),
        likeconcerts = NULLIF(@likeconcerts, ''),
        likejazz = NULLIF(@likejazz, ''),
        likeclassical = NULLIF(@likeclassical, ''),
        likeopera = NULLIF(@likeopera, ''),
        likerock = NULLIF(@likerock, ''),
        likevegas = NULLIF(@likevegas, ''),
        likebroadway = NULLIF(@likebroadway, ''),
        likemusicals = NULLIF(@likemusicals, ' ' or '' OR '');

LOAD DATA INFILE '/var/lib/mysql-files/venue_pipe.txt'
    INTO TABLE venue
    FIELDS TERMINATED BY '|'
    LINES TERMINATED BY '\n'
    (venueid, venuename, venuecity, venuestate, venueseats);

LOAD DATA INFILE '/var/lib/mysql-files/category_pipe.txt'
    INTO TABLE category
    FIELDS TERMINATED BY '|'
    LINES TERMINATED BY '\n'
    (catid, catgroup, catname, catdesc);

LOAD DATA INFILE '/var/lib/mysql-files/date2008_pipe.txt'
    INTO TABLE date
    FIELDS TERMINATED BY '|'
    LINES TERMINATED BY '\n'
    (dateid, caldate, day, week, month, qtr, year, holiday);

LOAD DATA INFILE '/var/lib/mysql-files/allevents_pipe.txt'
    INTO TABLE event
    FIELDS TERMINATED BY '|'
    LINES TERMINATED BY '\n'
    (eventid, venueid, catid, dateid, eventname, @starttime)
    SET starttime = STR_TO_DATE(@starttime, '%Y-%m-%d %H:%i:%s');


LOAD DATA INFILE '/var/lib/mysql-files/listings_pipe.txt'
    INTO TABLE listing
    FIELDS TERMINATED BY '|'
    LINES TERMINATED BY '\n'
    (listid, sellerid, eventid, dateid, numtickets, priceperticket, totalprice, @listtime)
    SET listtime = STR_TO_DATE(REPLACE(@listtime, '\r', ' '), '%Y-%m-%d %H:%i:%s');


LOAD DATA INFILE '/var/lib/mysql-files/sales_tab.txt'
    INTO TABLE sales
    FIELDS TERMINATED BY '|'
    LINES TERMINATED BY '\n'
    (salesid, listid, sellerid, buyerid, eventid, dateid, qtysold, pricepaid, commission, @saletime)
    SET saletime = str_to_date(@saletime, '%m-%d-%Y %H:%i:%s');
