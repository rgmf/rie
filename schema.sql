create table if not exists albums (
  id int(10) unsigned primary key auto_increment,
  name varchar(255) not null,
  description text default null,
  user_id int(10) unsigned not null, -- the user that creates the album
  public integer(1) default 0, -- 1 = public, 0 = private
  created_at integer not null, -- date the album was created
  updated_at integer not null, -- date the album was updated
  foreign key (user_id) references users(id)
) engine=innodb;

create table if not exists medias (
  id int(10) unsigned primary key auto_increment,
  name varchar(128) not null, -- media's name
  hash varchar(256) not null, -- sha512 from media (you can save sha512 in a varchar 128 but because I preadd a seed I need more space.
  data text not null, -- path to the file on disk
  thumbnail text not null, -- path to the thumbnail file on disk
  size integer not null, -- size in bytes
  date_created integer not null, -- date the media was shooted in seconds since 1970
  created_at integer not null, -- date the media was added in seconds since 1970
  updated_at integer not null, -- date the media was last modified in seconds since 1970
  media_type varchar(255) default null, -- see MediaStore.Files.FileColumns or Media.java class on RIE
  mime_type varchar(255) default null,
  latitude varchar(50) default null, -- decimal format latitude
  longitude varchar(50) default null, -- decimal format longitude
  unique(hash)
) engine=innodb;

create table if not exists album_media (
  id int(10) unsigned primary key auto_increment,
  album_id int(10) unsigned not null,
  media_id int(10) unsigned not null,
  created_at integer not null, -- date the media was added to the album
  updated_at integer not null, -- date this relationship was updated
  foreign key (album_id) references albums(id),
  foreign key (media_id) references medias(id),
  unique (album_id, media_id)
) engine=innodb;

create table if not exists trash (
  id int(10) unsigned primary key auto_increment,
  name varchar(128) not null, -- media's name
  hash varchar(256) not null, -- sha512 from media
  data text not null, -- path to the file on disk
  size integer not null, -- size in bytes
  date_created integer not null, -- date the media was shooted in seconds since 1970
  created_at integer not null, -- date the media was added in seconds since 1970
  updated_at integer not null, -- date the media was last modified in seconds since 1970
  media_type varchar(255) default null, -- see MediaStore.Files.FileColumns or Media.java class on RIE
  mime_type varchar(255) default null,
  latitude varchar(50) default null, -- decimal format latitude
  longitude varchar(50) default null, -- decimal format longitude
  unique(hash)
) engine=innodb;


-------------------------------------------------------------------------------
--                             TRAVEL DIARY
-------------------------------------------------------------------------------

-- A travel diary consiste on a set of destinations where we can have several
-- important points (waypoints). Each waypoint belongs to a category and in a
-- destination can be several waypoints.

create table if not exists travelogs (
  id int(10) unsigned primary key auto_increment,
  name varchar(256) not null, -- travel's name
  description text, -- general travel's description
  created_at integer not null, -- date the media was added in seconds since 1970
  updated_at integer not null -- date the media was last modified in seconds since 1970
) engine=innodb;

create table if not exists destinations (
  id int(10) unsigned primary key auto_increment,
  notes text not null, -- notes about the destination: what was done, how was about it...
  latitude varchar(50) not null, -- decimal format latitude
  longitude varchar(50) not null, -- decimal format longitude
  nominatim_name varchar(256) default null, -- nominatim name that is return as a result consulting nominatim service with latitude-longitude values (it can be save for offline)
  date_from integer not null, -- from date in seconds since 1970
  date_to integer not null, -- to date in seconds since 1970
  created_at integer not null, -- date the media was added to the album
  updated_at integer not null, -- date this relationship was updated
  travelog_id int(10) unsigned not null,
  foreign key (travelog_id) references travelogs(id)
) engine=innodb;

create table if not exists wpcategories (
  id int(10) unsigned primary key auto_increment,
  name varchar(256)
) engine=innodb;
insert into wpcategories (name) values
('Bares y restaurantes'),
('Hoteles, campings y ACs'),
('Furgoperfectos'),
('Merenderos'),
('Ríos, lagos, piscinas y playas'),
('Supermercados y compras'),
('Deportes'),
('Aparcamientos');

create table if not exists waypoints (
  id int(10) unsigned primary key auto_increment,
  name varchar(256) not null, -- name
  description text, -- general waypoint's descripcion
  latitude varchar(50) not null, -- decimal format latitude
  longitude varchar(50) not null, -- decimal format longitude
  created_at integer not null, -- date the media was added to the album
  updated_at integer not null, -- date this relationship was updated
  wpcategory_id int(10) unsigned not null,
  foreign key (wpcategory_id) references wpcategories(id)
) engine=innodb;

create table if not exists destination_waypoint (
  id int(10) unsigned primary key auto_increment,
  destination_id int(10) unsigned not null,
  waypoint_id int(10) unsigned not null,
  created_at integer not null, -- date this relationship was added
  updated_at integer not null, -- date this relationship was updated
  foreign key (destination_id) references destinations(id),
  foreign key (waypoint_id) references waypoints(id),
  unique (destination_id, waypoint_id)
) engine=innodb;