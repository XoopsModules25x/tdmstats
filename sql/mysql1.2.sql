#
# PHP i-stats - MySQL schema
#


# --------------------------------------------------------
# Table structure for table 'TDMStats_usercount'
# --------------------------------------------------------
create table TDMStats_usercount(
id int(10) not null auto_increment,
userid varchar(255) not null,
ip varchar(255) not null,
date date not null,
count int(10) not null,
primary key(id));