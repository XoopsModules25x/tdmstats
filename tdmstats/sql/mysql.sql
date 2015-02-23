#
# PHP i-stats - MySQL schema
#

# --------------------------------------------------------
# Table structure for table 'TDMStats_count'
# --------------------------------------------------------
create table TDMStats_count(
count int(10) not null);

# -- insert count
insert into TDMStats_count values('');


# --------------------------------------------------------
# Table structure for table 'TDMStats_daycount'
# --------------------------------------------------------
create table TDMStats_daycount(
id int(10) not null auto_increment,
date date not null,
daycount int(10) not null,
primary key(id));

# --------------------------------------------------------
# Table structure for table 'TDMStats_referer'
# --------------------------------------------------------
create table TDMStats_referer(
id int(10) not null auto_increment,
url varchar(255) not null,
count int(10) not null,
primary key(id));

# --------------------------------------------------------
# Table structure for table 'TDMStats_hour'
# --------------------------------------------------------
create table TDMStats_hour(
hour varchar(2) not null,
count int(10) not null);

# -- insert hour record
insert into TDMStats_hour values('00', '');
insert into TDMStats_hour values('01', '');
insert into TDMStats_hour values('02', '');
insert into TDMStats_hour values('03', '');
insert into TDMStats_hour values('04', '');
insert into TDMStats_hour values('05', '');
insert into TDMStats_hour values('06', '');
insert into TDMStats_hour values('07', '');
insert into TDMStats_hour values('08', '');
insert into TDMStats_hour values('09', '');
insert into TDMStats_hour values('10', '');
insert into TDMStats_hour values('11', '');
insert into TDMStats_hour values('12', '');
insert into TDMStats_hour values('13', '');
insert into TDMStats_hour values('14', '');
insert into TDMStats_hour values('15', '');
insert into TDMStats_hour values('16', '');
insert into TDMStats_hour values('17', '');
insert into TDMStats_hour values('18', '');
insert into TDMStats_hour values('19', '');
insert into TDMStats_hour values('20', '');
insert into TDMStats_hour values('21', '');
insert into TDMStats_hour values('22', '');
insert into TDMStats_hour values('23', '');

# --------------------------------------------------------
# Table structure for table 'TDMStats_today_hour'
# --------------------------------------------------------
create table TDMStats_today_hour(
hour varchar(2) not null,
count int(10) not null);

# -- insert hour record
insert into TDMStats_today_hour values('00', '');
insert into TDMStats_today_hour values('01', '');
insert into TDMStats_today_hour values('02', '');
insert into TDMStats_today_hour values('03', '');
insert into TDMStats_today_hour values('04', '');
insert into TDMStats_today_hour values('05', '');
insert into TDMStats_today_hour values('06', '');
insert into TDMStats_today_hour values('07', '');
insert into TDMStats_today_hour values('08', '');
insert into TDMStats_today_hour values('09', '');
insert into TDMStats_today_hour values('10', '');
insert into TDMStats_today_hour values('11', '');
insert into TDMStats_today_hour values('12', '');
insert into TDMStats_today_hour values('13', '');
insert into TDMStats_today_hour values('14', '');
insert into TDMStats_today_hour values('15', '');
insert into TDMStats_today_hour values('16', '');
insert into TDMStats_today_hour values('17', '');
insert into TDMStats_today_hour values('18', '');
insert into TDMStats_today_hour values('19', '');
insert into TDMStats_today_hour values('20', '');
insert into TDMStats_today_hour values('21', '');
insert into TDMStats_today_hour values('22', '');
insert into TDMStats_today_hour values('23', '');

# --------------------------------------------------------
# Table structure for table 'TDMStats_browser'
# --------------------------------------------------------
create table TDMStats_browser(
browser varchar(30) not null,
count int(10) not null);

# -- insert browser data
# added 5/12/03
# Opera 6
# Opera 7
# Sqworm
# Slurp
# Avant Browser
# MyIE2
# Galeon
# SurveyBot
insert into TDMStats_browser values('Opera 7', '');
insert into TDMStats_browser values('Googlebot', '');
insert into TDMStats_browser values('msnbot', '');
insert into TDMStats_browser values('Yahoo', '');
insert into TDMStats_browser values('Opera 9', '');
insert into TDMStats_browser values('Opera 8', '');
insert into TDMStats_browser values('Opera 7', '');
insert into TDMStats_browser values('Konqueror 3', '');
insert into TDMStats_browser values('Konqueror 2', '');
insert into TDMStats_browser values('Netscape 9', '');
insert into TDMStats_browser values('Netscape 8', '');
insert into TDMStats_browser values('Netscape 7', '');
insert into TDMStats_browser values('Lynx', '');
insert into TDMStats_browser values('Links', '');
insert into TDMStats_browser values('OmniWeb', '');
insert into TDMStats_browser values('WebTV', '');
insert into TDMStats_browser values('Avant Browser', '');
insert into TDMStats_browser values('MyIE2', '');
insert into TDMStats_browser values('Internet Explorer 8', '');
insert into TDMStats_browser values('Internet Explorer 7', '');
insert into TDMStats_browser values('Internet Explorer 6', '');
insert into TDMStats_browser values('Chrome 3', '');
insert into TDMStats_browser values('Chrome 2', '');
insert into TDMStats_browser values('Chrome 1', '');
insert into TDMStats_browser values('Gecko', '');
insert into TDMStats_browser values('Other', '');
#/*firefox adding*/
insert into TDMStats_browser values('Firefox 3', '');
insert into TDMStats_browser values('Firefox 2', '');
insert into TDMStats_browser values('Firefox 1', '');
# --------------------------------------------------------
# Table structure for table 'TDMStats_os'
# --------------------------------------------------------
create table TDMStats_os(
os varchar(30) not null,
count int(10) not null);

# -- insert os data
# added 5/12/03
# Windows 98
# Windows 95
insert into TDMStats_os (os, count) values ('Windows Seven', '');
insert into TDMStats_os (os, count) values ('Windows Vista', '');
insert into TDMStats_os (os, count) values ('Windows XP', '');
insert into TDMStats_os (os, count) values ('Windows Server 2003', '');
insert into TDMStats_os (os, count) values ('Windows 2000', '');
insert into TDMStats_os (os, count) values ('Windows NT 4.''', '');
insert into TDMStats_os (os, count) values ('Windows 98', '');
insert into TDMStats_os (os, count) values ('Windows 95', '');
insert into TDMStats_os (os, count) values ('Windows 9x', '');
insert into TDMStats_os (os, count) values ('Windows Me', '');
insert into TDMStats_os (os, count) values ('Win32', '');
insert into TDMStats_os (os, count) values ('Mac Power PC', '');
insert into TDMStats_os (os, count) values ('Mac OS X', '');
insert into TDMStats_os (os, count) values ('Macintosh', '');

#/* removeX11 insert into TDMStats_os (os, count) values ('X11', ''); */
insert into TDMStats_os (os, count) values ('SunOS', '');
insert into TDMStats_os (os, count) values ('BeOS', '');
insert into TDMStats_os (os, count) values ('FreeBSD', '');
insert into TDMStats_os (os, count) values ('OpenBSD', '');
insert into TDMStats_os (os, count) values ('IRIX', '');
insert into TDMStats_os (os, count) values ('OS/2', '');
insert into TDMStats_os (os, count) values ('Plan9', '');
insert into TDMStats_os (os, count) values ('OSF', '');
insert into TDMStats_os (os, count) values ('Linux Fedora', '');
insert into TDMStats_os (os, count) values ('Linux Ubuntu', '');
insert into TDMStats_os (os, count) values ('Linux', '');
insert into TDMStats_os (os, count) values ('Other Unix', '');
insert into TDMStats_os (os, count) values ('Other', '');


# --------------------------------------------------------
# Table structure for table 'TDMStats_hostname'
# --------------------------------------------------------
create table TDMStats_hostname(
hostname varchar(100) not null,
count int(10) not null);

# --------------------------------------------------------
# Table structure for table 'TDMStats_week'
# --------------------------------------------------------
create table TDMStats_week(
day int(2) not null,
count int(10) not null);

# -- insert week_days
insert into TDMStats_week values('0', '');
insert into TDMStats_week values('1', '');
insert into TDMStats_week values('2', '');
insert into TDMStats_week values('3', '');
insert into TDMStats_week values('4', '');
insert into TDMStats_week values('5', '');
insert into TDMStats_week values('6', '');

# --------------------------------------------------------
# Table structure for table 'TDMStats_week_count'
# --------------------------------------------------------
create table TDMStats_week_count(
id int(5) not null auto_increment,
week varchar(2) not null,
year int(5) not null,
count int(10) not null,
primary key(id));

# --------------------------------------------------------
# Table structure for table 'TDMStats_mth'
# --------------------------------------------------------
create table TDMStats_mth(
id int(5) not null auto_increment,
mth varchar(2) not null,
year int(5) not null,
count int(10) not null,
primary key(id));

# --------------------------------------------------------
# Table structure for table 'TDMStats_mth_days'
# --------------------------------------------------------
create table TDMStats_mth_days(
day varchar(2) not null,
count int(10) not null);

# -- insert TDMStats_mth_days
insert into TDMStats_mth_days values('01', '');
insert into TDMStats_mth_days values('02', '');
insert into TDMStats_mth_days values('03', '');
insert into TDMStats_mth_days values('04', '');
insert into TDMStats_mth_days values('05', '');
insert into TDMStats_mth_days values('06', '');
insert into TDMStats_mth_days values('07', '');
insert into TDMStats_mth_days values('08', '');
insert into TDMStats_mth_days values('09', '');
insert into TDMStats_mth_days values('10', '');
insert into TDMStats_mth_days values('11', '');
insert into TDMStats_mth_days values('12', '');
insert into TDMStats_mth_days values('13', '');
insert into TDMStats_mth_days values('14', '');
insert into TDMStats_mth_days values('15', '');
insert into TDMStats_mth_days values('16', '');
insert into TDMStats_mth_days values('17', '');
insert into TDMStats_mth_days values('18', '');
insert into TDMStats_mth_days values('19', '');
insert into TDMStats_mth_days values('20', '');
insert into TDMStats_mth_days values('21', '');
insert into TDMStats_mth_days values('22', '');
insert into TDMStats_mth_days values('23', '');
insert into TDMStats_mth_days values('24', '');
insert into TDMStats_mth_days values('25', '');
insert into TDMStats_mth_days values('26', '');
insert into TDMStats_mth_days values('27', '');
insert into TDMStats_mth_days values('28', '');
insert into TDMStats_mth_days values('29', '');
insert into TDMStats_mth_days values('30', '');
insert into TDMStats_mth_days values('31', '');

# --------------------------------------------------------
# Table structure for table 'TDMStats_screen'
# --------------------------------------------------------
create table TDMStats_screen(
id int(5) not null auto_increment,
width varchar(20) not null,
count int(10) not null,
primary key(id));

# -- insert TDMStats_screen
insert into TDMStats_screen values('', '640 x 480', '');
insert into TDMStats_screen values('', '800 x 600', '');
insert into TDMStats_screen values('', '1024 x 768', '');
insert into TDMStats_screen values('', '1152 x 864', '');
insert into TDMStats_screen values('', '1280 x 1024', '');
insert into TDMStats_screen values('', '1600 x 1200', '');
insert into TDMStats_screen values('', '2048 x 1536', '');
insert into TDMStats_screen values('', '2560 x 2048', '');
insert into TDMStats_screen values('', '3200 x 2400', '');
insert into TDMStats_screen values('', 'Unknown', '');
#/*ading 1920 */
insert into TDMStats_screen values('', '1920 x 1200', '');
#/* */
# --------------------------------------------------------
# Table structure for table 'TDMStats_color'
# --------------------------------------------------------
create table TDMStats_color(
id int(5) not null auto_increment,
color varchar(30) not null,
count int(10) not null,
primary key(id));

# -- insert TDMStats_color
insert into TDMStats_color values('', '256 color', '');
insert into TDMStats_color values('', '16 bit', '');
insert into TDMStats_color values('', '24 bit', '');
insert into TDMStats_color values('', '32 bit', '');
insert into TDMStats_color values('', 'Unknown', '');

# --------------------------------------------------------
# Table structure for table 'TDMStats_page'
# --------------------------------------------------------
create table TDMStats_page(
id int(5) not null auto_increment,
page varchar(100) not null,
count int(10) not null,
primary key(id));

# --------------------------------------------------------
# Table structure for table 'TDMStats_module'
# --------------------------------------------------------

create table TDMStats_modules(
id int(5) not null auto_increment,
modules varchar(100) not null,
count int(10) not null,
primary key(id));

# --------------------------------------------------------
# Table structure for table 'TDMStats_pays'
# --------------------------------------------------------

create table TDMStats_pays(
id int(5) not null auto_increment,
pays varchar(100) not null,
country varchar(100) not null,
count int(10) not null,
primary key(id));

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
