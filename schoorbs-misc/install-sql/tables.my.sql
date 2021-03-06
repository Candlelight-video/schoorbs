#
# MySQL Schoorbs table creation script
#
# Notes:
# If you have decided to change the prefix of your tables from 'schoorbs_'
# to something else then you must edit each 'CREATE TABLE' line
# below.
#

CREATE TABLE schoorbs_area
(
  id               int NOT NULL auto_increment,
  area_name        varchar(30),
  area_admin_email text,

  PRIMARY KEY (id)
);

CREATE TABLE schoorbs_room
(
  id               int NOT NULL auto_increment,
  area_id          int DEFAULT '0' NOT NULL,
  room_name        varchar(25) DEFAULT '' NOT NULL,
  description      varchar(60),
  capacity         int DEFAULT '0' NOT NULL,
  room_admin_email text,

  PRIMARY KEY (id)
);

CREATE TABLE schoorbs_entry
(
  id          int NOT NULL auto_increment,
  start_time  int DEFAULT '0' NOT NULL,
  end_time    int DEFAULT '0' NOT NULL,
  entry_type  int DEFAULT '0' NOT NULL,
  repeat_id   int DEFAULT '0' NOT NULL,
  room_id     int DEFAULT '1' NOT NULL,
  timestamp   timestamp,
  create_by   varchar(80) DEFAULT '' NOT NULL,
  name        varchar(80) DEFAULT '' NOT NULL,
  type        char DEFAULT 'E' NOT NULL,
  description text,

  PRIMARY KEY (id),
  KEY idxStartTime (start_time),
  KEY idxEndTime   (end_time)
);

CREATE TABLE schoorbs_repeat
(
  id          int NOT NULL auto_increment,
  start_time  int DEFAULT '0' NOT NULL,
  end_time    int DEFAULT '0' NOT NULL,
  rep_type    int DEFAULT '0' NOT NULL,
  end_date    int DEFAULT '0' NOT NULL,
  rep_opt     varchar(32) DEFAULT '' NOT NULL,
  room_id     int DEFAULT '1' NOT NULL,
  timestamp   timestamp,
  create_by   varchar(80) DEFAULT '' NOT NULL,
  name        varchar(80) DEFAULT '' NOT NULL,
  type        char DEFAULT 'E' NOT NULL,
  description text,
  rep_num_weeks smallint NULL,
  
  PRIMARY KEY (id)
);
