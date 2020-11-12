#
# PHP i-stats - MySQL schema
#

# --------------------------------------------------------
# Table structure for table 'tdmstats_counter'
# --------------------------------------------------------
CREATE TABLE tdmstats_counter (
  counter INT(10) NOT NULL
);

# -- insert count
INSERT INTO tdmstats_counter VALUES (1);

# --------------------------------------------------------
# Table structure for table 'tdmstats_daycount'
# --------------------------------------------------------
CREATE TABLE tdmstats_daycount (
  id       INT(10) NOT NULL AUTO_INCREMENT,
  date     DATE    NOT NULL,
  daycount INT(10) NOT NULL,
  PRIMARY KEY (id)
);

# --------------------------------------------------------
# Table structure for table 'tdmstats_referer'
# --------------------------------------------------------
CREATE TABLE tdmstats_referer (
  id    INT(10)      NOT NULL AUTO_INCREMENT,
  url   VARCHAR(255) NOT NULL,
  count INT(10)      NOT NULL,
  PRIMARY KEY (id)
);

# --------------------------------------------------------
# Table structure for table 'tdmstats_hour'
# --------------------------------------------------------
CREATE TABLE tdmstats_hour (
  hour  VARCHAR(2) NOT NULL,
  count INT(10)    NOT NULL
);

# -- insert hour record
INSERT INTO tdmstats_hour VALUES ('00', 0);
INSERT INTO tdmstats_hour VALUES ('01', 0);
INSERT INTO tdmstats_hour VALUES ('02', 0);
INSERT INTO tdmstats_hour VALUES ('03', 0);
INSERT INTO tdmstats_hour VALUES ('04', 0);
INSERT INTO tdmstats_hour VALUES ('05', 0);
INSERT INTO tdmstats_hour VALUES ('06', 0);
INSERT INTO tdmstats_hour VALUES ('07', 0);
INSERT INTO tdmstats_hour VALUES ('08', 0);
INSERT INTO tdmstats_hour VALUES ('09', 0);
INSERT INTO tdmstats_hour VALUES ('10', 0);
INSERT INTO tdmstats_hour VALUES ('11', 0);
INSERT INTO tdmstats_hour VALUES ('12', 0);
INSERT INTO tdmstats_hour VALUES ('13', 0);
INSERT INTO tdmstats_hour VALUES ('14', 0);
INSERT INTO tdmstats_hour VALUES ('15', 0);
INSERT INTO tdmstats_hour VALUES ('16', 0);
INSERT INTO tdmstats_hour VALUES ('17', 0);
INSERT INTO tdmstats_hour VALUES ('18', 0);
INSERT INTO tdmstats_hour VALUES ('19', 0);
INSERT INTO tdmstats_hour VALUES ('20', 0);
INSERT INTO tdmstats_hour VALUES ('21', 0);
INSERT INTO tdmstats_hour VALUES ('22', 0);
INSERT INTO tdmstats_hour VALUES ('23', 0);

# --------------------------------------------------------
# Table structure for table 'tdmstats_today_hour'
# --------------------------------------------------------
CREATE TABLE tdmstats_today_hour (
  hour  VARCHAR(2) NOT NULL,
  count INT(10)    NOT NULL
);

# -- insert hour record
INSERT INTO tdmstats_today_hour VALUES ('00', 0);
INSERT INTO tdmstats_today_hour VALUES ('01', 0);
INSERT INTO tdmstats_today_hour VALUES ('02', 0);
INSERT INTO tdmstats_today_hour VALUES ('03', 0);
INSERT INTO tdmstats_today_hour VALUES ('04', 0);
INSERT INTO tdmstats_today_hour VALUES ('05', 0);
INSERT INTO tdmstats_today_hour VALUES ('06', 0);
INSERT INTO tdmstats_today_hour VALUES ('07', 0);
INSERT INTO tdmstats_today_hour VALUES ('08', 0);
INSERT INTO tdmstats_today_hour VALUES ('09', 0);
INSERT INTO tdmstats_today_hour VALUES ('10', 0);
INSERT INTO tdmstats_today_hour VALUES ('11', 0);
INSERT INTO tdmstats_today_hour VALUES ('12', 0);
INSERT INTO tdmstats_today_hour VALUES ('13', 0);
INSERT INTO tdmstats_today_hour VALUES ('14', 0);
INSERT INTO tdmstats_today_hour VALUES ('15', 0);
INSERT INTO tdmstats_today_hour VALUES ('16', 0);
INSERT INTO tdmstats_today_hour VALUES ('17', 0);
INSERT INTO tdmstats_today_hour VALUES ('18', 0);
INSERT INTO tdmstats_today_hour VALUES ('19', 0);
INSERT INTO tdmstats_today_hour VALUES ('20', 0);
INSERT INTO tdmstats_today_hour VALUES ('21', 0);
INSERT INTO tdmstats_today_hour VALUES ('22', 0);
INSERT INTO tdmstats_today_hour VALUES ('23', 0);

# --------------------------------------------------------
# Table structure for table 'tdmstats_browser'
# --------------------------------------------------------
CREATE TABLE tdmstats_browser (
  browser VARCHAR(30) NOT NULL,
  count   INT(10)     NOT NULL
);

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
INSERT INTO tdmstats_browser VALUES ('Opera 7', 0);
INSERT INTO tdmstats_browser VALUES ('Googlebot', 0);
INSERT INTO tdmstats_browser VALUES ('msnbot', 0);
INSERT INTO tdmstats_browser VALUES ('Yahoo', 0);
INSERT INTO tdmstats_browser VALUES ('Opera 9', 0);
INSERT INTO tdmstats_browser VALUES ('Opera 8', 0);
INSERT INTO tdmstats_browser VALUES ('Opera 7', 0);
INSERT INTO tdmstats_browser VALUES ('Konqueror 3', 0);
INSERT INTO tdmstats_browser VALUES ('Konqueror 2', 0);
INSERT INTO tdmstats_browser VALUES ('Netscape 9', 0);
INSERT INTO tdmstats_browser VALUES ('Netscape 8', 0);
INSERT INTO tdmstats_browser VALUES ('Netscape 7', 0);
INSERT INTO tdmstats_browser VALUES ('Lynx', 0);
INSERT INTO tdmstats_browser VALUES ('Links', 0);
INSERT INTO tdmstats_browser VALUES ('OmniWeb', 0);
INSERT INTO tdmstats_browser VALUES ('WebTV', 0);
INSERT INTO tdmstats_browser VALUES ('Avant Browser', 0);
INSERT INTO tdmstats_browser VALUES ('MyIE2', 0);
INSERT INTO tdmstats_browser VALUES ('Internet Explorer 8', 0);
INSERT INTO tdmstats_browser VALUES ('Internet Explorer 7', 0);
INSERT INTO tdmstats_browser VALUES ('Internet Explorer 6', 0);
INSERT INTO tdmstats_browser VALUES ('Chrome 3', 0);
INSERT INTO tdmstats_browser VALUES ('Chrome 2', 0);
INSERT INTO tdmstats_browser VALUES ('Chrome 1', 0);
INSERT INTO tdmstats_browser VALUES ('Gecko', 0);
INSERT INTO tdmstats_browser VALUES ('Other', 0);
#/*firefox adding*/
INSERT INTO tdmstats_browser VALUES ('Firefox 3', 0);
INSERT INTO tdmstats_browser VALUES ('Firefox 2', 0);
INSERT INTO tdmstats_browser VALUES ('Firefox 1', 0);
# --------------------------------------------------------
# Table structure for table 'tdmstats_os'
# --------------------------------------------------------
CREATE TABLE tdmstats_os (
  os    VARCHAR(30) NOT NULL,
  count INT(10)     NOT NULL
);

# -- insert os data
# added 5/12/03
# Windows 98
# Windows 95
INSERT INTO tdmstats_os (os, count) VALUES ('Windows Seven', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Windows Vista', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Windows XP', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Windows Server 2003', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Windows 2000', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Windows NT 4.0', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Windows 98', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Windows 95', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Windows 9x', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Windows Me', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Win32', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Mac Power PC', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Mac OS X', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Macintosh', 0);

#/* removeX11 insert into tdmstats_os (os, count) values ('X11', 0); */
INSERT INTO tdmstats_os (os, count) VALUES ('SunOS', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('BeOS', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('FreeBSD', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('OpenBSD', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('IRIX', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('OS/2', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Plan9', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('OSF', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Linux Fedora', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Linux Ubuntu', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Linux', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Other Unix', 0);
INSERT INTO tdmstats_os (os, count) VALUES ('Other', 0);

# --------------------------------------------------------
# Table structure for table 'tdmstats_hostname'
# --------------------------------------------------------
CREATE TABLE tdmstats_hostname (
  hostname VARCHAR(100) NOT NULL,
  count    INT(10)      NOT NULL
);

# --------------------------------------------------------
# Table structure for table 'tdmstats_week'
# --------------------------------------------------------
CREATE TABLE tdmstats_week (
  day   INT(2)  NOT NULL,
  count INT(10) NOT NULL
);

# -- insert week_days
INSERT INTO tdmstats_week VALUES ('0', 0);
INSERT INTO tdmstats_week VALUES ('1', 0);
INSERT INTO tdmstats_week VALUES ('2', 0);
INSERT INTO tdmstats_week VALUES ('3', 0);
INSERT INTO tdmstats_week VALUES ('4', 0);
INSERT INTO tdmstats_week VALUES ('5', 0);
INSERT INTO tdmstats_week VALUES ('6', 0);

# --------------------------------------------------------
# Table structure for table 'tdmstats_week_count'
# --------------------------------------------------------
CREATE TABLE tdmstats_week_count (
  id    INT(5)     NOT NULL AUTO_INCREMENT,
  week  VARCHAR(2) NOT NULL,
  year  INT(5)     NOT NULL,
  count INT(10)    NOT NULL,
  PRIMARY KEY (id)
);

# --------------------------------------------------------
# Table structure for table 'tdmstats_mth'
# --------------------------------------------------------
CREATE TABLE tdmstats_mth (
  id    INT(5)     NOT NULL AUTO_INCREMENT,
  mth   VARCHAR(2) NOT NULL,
  year  INT(5)     NOT NULL,
  count INT(10)    NOT NULL,
  PRIMARY KEY (id)
);

# --------------------------------------------------------
# Table structure for table 'tdmstats_mth_days'
# --------------------------------------------------------
CREATE TABLE tdmstats_mth_days (
  day   VARCHAR(2) NOT NULL,
  count INT(10)    NOT NULL
);

# -- insert tdmstats_mth_days
INSERT INTO tdmstats_mth_days VALUES ('01', 0);
INSERT INTO tdmstats_mth_days VALUES ('02', 0);
INSERT INTO tdmstats_mth_days VALUES ('03', 0);
INSERT INTO tdmstats_mth_days VALUES ('04', 0);
INSERT INTO tdmstats_mth_days VALUES ('05', 0);
INSERT INTO tdmstats_mth_days VALUES ('06', 0);
INSERT INTO tdmstats_mth_days VALUES ('07', 0);
INSERT INTO tdmstats_mth_days VALUES ('08', 0);
INSERT INTO tdmstats_mth_days VALUES ('09', 0);
INSERT INTO tdmstats_mth_days VALUES ('10', 0);
INSERT INTO tdmstats_mth_days VALUES ('11', 0);
INSERT INTO tdmstats_mth_days VALUES ('12', 0);
INSERT INTO tdmstats_mth_days VALUES ('13', 0);
INSERT INTO tdmstats_mth_days VALUES ('14', 0);
INSERT INTO tdmstats_mth_days VALUES ('15', 0);
INSERT INTO tdmstats_mth_days VALUES ('16', 0);
INSERT INTO tdmstats_mth_days VALUES ('17', 0);
INSERT INTO tdmstats_mth_days VALUES ('18', 0);
INSERT INTO tdmstats_mth_days VALUES ('19', 0);
INSERT INTO tdmstats_mth_days VALUES ('20', 0);
INSERT INTO tdmstats_mth_days VALUES ('21', 0);
INSERT INTO tdmstats_mth_days VALUES ('22', 0);
INSERT INTO tdmstats_mth_days VALUES ('23', 0);
INSERT INTO tdmstats_mth_days VALUES ('24', 0);
INSERT INTO tdmstats_mth_days VALUES ('25', 0);
INSERT INTO tdmstats_mth_days VALUES ('26', 0);
INSERT INTO tdmstats_mth_days VALUES ('27', 0);
INSERT INTO tdmstats_mth_days VALUES ('28', 0);
INSERT INTO tdmstats_mth_days VALUES ('29', 0);
INSERT INTO tdmstats_mth_days VALUES ('30', 0);
INSERT INTO tdmstats_mth_days VALUES ('31', 0);

# --------------------------------------------------------
# Table structure for table 'tdmstats_screen'
# --------------------------------------------------------
CREATE TABLE tdmstats_screen (
  id    INT(5)      NOT NULL AUTO_INCREMENT,
  width VARCHAR(20) NOT NULL,
  count INT(10)     NOT NULL,
  PRIMARY KEY (id)
);

# -- insert tdmstats_screen
INSERT INTO tdmstats_screen VALUES (0, '640 x 480', 0);
INSERT INTO tdmstats_screen VALUES (0, '800 x 600', 0);
INSERT INTO tdmstats_screen VALUES (0, '1024 x 768', 0);
INSERT INTO tdmstats_screen VALUES (0, '1152 x 864', 0);
INSERT INTO tdmstats_screen VALUES (0, '1280 x 1024', 0);
INSERT INTO tdmstats_screen VALUES (0, '1600 x 1200', 0);
INSERT INTO tdmstats_screen VALUES (0, '2048 x 1536', 0);
INSERT INTO tdmstats_screen VALUES (0, '2560 x 2048', 0);
INSERT INTO tdmstats_screen VALUES (0, '3200 x 2400', 0);
INSERT INTO tdmstats_screen VALUES (0, 'Unknown', 0);
#/*ading 1920 */
INSERT INTO tdmstats_screen VALUES (0, '1920 x 1200', 0);
#/* */
# --------------------------------------------------------
# Table structure for table 'tdmstats_color'
# --------------------------------------------------------
CREATE TABLE tdmstats_color (
  id    INT(5)      NOT NULL AUTO_INCREMENT,
  color VARCHAR(30) NOT NULL,
  count INT(10)     NOT NULL,
  PRIMARY KEY (id)
);

# -- insert tdmstats_color
INSERT INTO tdmstats_color VALUES (0, '256 color', 0);
INSERT INTO tdmstats_color VALUES (0, '16 bit', 0);
INSERT INTO tdmstats_color VALUES (0, '24 bit', 0);
INSERT INTO tdmstats_color VALUES (0, '32 bit', 0);
INSERT INTO tdmstats_color VALUES (0, 'Unknown', 0);

# --------------------------------------------------------
# Table structure for table 'tdmstats_page'
# --------------------------------------------------------
CREATE TABLE tdmstats_page (
  id    INT(5)       NOT NULL AUTO_INCREMENT,
  page  VARCHAR(100) NOT NULL,
  count INT(10)      NOT NULL,
  PRIMARY KEY (id)
);

# --------------------------------------------------------
# Table structure for table 'tdmstats_module'
# --------------------------------------------------------

CREATE TABLE tdmstats_modules (
  id      INT(5)       NOT NULL AUTO_INCREMENT,
  modules VARCHAR(100) NOT NULL,
  count   INT(10)      NOT NULL,
  PRIMARY KEY (id)
);

# --------------------------------------------------------
# Table structure for table 'tdmstats_module'
# --------------------------------------------------------

CREATE TABLE tdmstats_pays (
  id      INT(5)       NOT NULL AUTO_INCREMENT,
  pays    VARCHAR(100) NOT NULL,
  country VARCHAR(100) NOT NULL,
  count   INT(10)      NOT NULL,
  PRIMARY KEY (id)
);

# --------------------------------------------------------
# Table structure for table 'tdmstats_usercount'
# --------------------------------------------------------
CREATE TABLE tdmstats_usercount (
  id     INT(10)      NOT NULL AUTO_INCREMENT,
  userid VARCHAR(255) NOT NULL,
  ip     VARCHAR(255) NOT NULL,
  date   DATE         NOT NULL,
  count  INT(10)      NOT NULL,
  PRIMARY KEY (id)
);
