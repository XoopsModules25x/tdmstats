#
# PHP i-stats - MySQL schema
#

# --------------------------------------------------------
# Table structure for table 'tdmstats_count'
# --------------------------------------------------------
CREATE TABLE tdmstats_count (
  count INT(10) NOT NULL
);

# -- insert count
INSERT INTO tdmstats_count VALUES (1);

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
INSERT INTO tdmstats_hour VALUES ('00', '');
INSERT INTO tdmstats_hour VALUES ('01', '');
INSERT INTO tdmstats_hour VALUES ('02', '');
INSERT INTO tdmstats_hour VALUES ('03', '');
INSERT INTO tdmstats_hour VALUES ('04', '');
INSERT INTO tdmstats_hour VALUES ('05', '');
INSERT INTO tdmstats_hour VALUES ('06', '');
INSERT INTO tdmstats_hour VALUES ('07', '');
INSERT INTO tdmstats_hour VALUES ('08', '');
INSERT INTO tdmstats_hour VALUES ('09', '');
INSERT INTO tdmstats_hour VALUES ('10', '');
INSERT INTO tdmstats_hour VALUES ('11', '');
INSERT INTO tdmstats_hour VALUES ('12', '');
INSERT INTO tdmstats_hour VALUES ('13', '');
INSERT INTO tdmstats_hour VALUES ('14', '');
INSERT INTO tdmstats_hour VALUES ('15', '');
INSERT INTO tdmstats_hour VALUES ('16', '');
INSERT INTO tdmstats_hour VALUES ('17', '');
INSERT INTO tdmstats_hour VALUES ('18', '');
INSERT INTO tdmstats_hour VALUES ('19', '');
INSERT INTO tdmstats_hour VALUES ('20', '');
INSERT INTO tdmstats_hour VALUES ('21', '');
INSERT INTO tdmstats_hour VALUES ('22', '');
INSERT INTO tdmstats_hour VALUES ('23', '');

# --------------------------------------------------------
# Table structure for table 'tdmstats_today_hour'
# --------------------------------------------------------
CREATE TABLE tdmstats_today_hour (
  hour  VARCHAR(2) NOT NULL,
  count INT(10)    NOT NULL
);

# -- insert hour record
INSERT INTO tdmstats_today_hour VALUES ('00', '');
INSERT INTO tdmstats_today_hour VALUES ('01', '');
INSERT INTO tdmstats_today_hour VALUES ('02', '');
INSERT INTO tdmstats_today_hour VALUES ('03', '');
INSERT INTO tdmstats_today_hour VALUES ('04', '');
INSERT INTO tdmstats_today_hour VALUES ('05', '');
INSERT INTO tdmstats_today_hour VALUES ('06', '');
INSERT INTO tdmstats_today_hour VALUES ('07', '');
INSERT INTO tdmstats_today_hour VALUES ('08', '');
INSERT INTO tdmstats_today_hour VALUES ('09', '');
INSERT INTO tdmstats_today_hour VALUES ('10', '');
INSERT INTO tdmstats_today_hour VALUES ('11', '');
INSERT INTO tdmstats_today_hour VALUES ('12', '');
INSERT INTO tdmstats_today_hour VALUES ('13', '');
INSERT INTO tdmstats_today_hour VALUES ('14', '');
INSERT INTO tdmstats_today_hour VALUES ('15', '');
INSERT INTO tdmstats_today_hour VALUES ('16', '');
INSERT INTO tdmstats_today_hour VALUES ('17', '');
INSERT INTO tdmstats_today_hour VALUES ('18', '');
INSERT INTO tdmstats_today_hour VALUES ('19', '');
INSERT INTO tdmstats_today_hour VALUES ('20', '');
INSERT INTO tdmstats_today_hour VALUES ('21', '');
INSERT INTO tdmstats_today_hour VALUES ('22', '');
INSERT INTO tdmstats_today_hour VALUES ('23', '');

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
INSERT INTO tdmstats_browser VALUES ('Opera 7', '');
INSERT INTO tdmstats_browser VALUES ('Googlebot', '');
INSERT INTO tdmstats_browser VALUES ('msnbot', '');
INSERT INTO tdmstats_browser VALUES ('Yahoo', '');
INSERT INTO tdmstats_browser VALUES ('Opera 9', '');
INSERT INTO tdmstats_browser VALUES ('Opera 8', '');
INSERT INTO tdmstats_browser VALUES ('Opera 7', '');
INSERT INTO tdmstats_browser VALUES ('Konqueror 3', '');
INSERT INTO tdmstats_browser VALUES ('Konqueror 2', '');
INSERT INTO tdmstats_browser VALUES ('Netscape 9', '');
INSERT INTO tdmstats_browser VALUES ('Netscape 8', '');
INSERT INTO tdmstats_browser VALUES ('Netscape 7', '');
INSERT INTO tdmstats_browser VALUES ('Lynx', '');
INSERT INTO tdmstats_browser VALUES ('Links', '');
INSERT INTO tdmstats_browser VALUES ('OmniWeb', '');
INSERT INTO tdmstats_browser VALUES ('WebTV', '');
INSERT INTO tdmstats_browser VALUES ('Avant Browser', '');
INSERT INTO tdmstats_browser VALUES ('MyIE2', '');
INSERT INTO tdmstats_browser VALUES ('Internet Explorer 8', '');
INSERT INTO tdmstats_browser VALUES ('Internet Explorer 7', '');
INSERT INTO tdmstats_browser VALUES ('Internet Explorer 6', '');
INSERT INTO tdmstats_browser VALUES ('Chrome 3', '');
INSERT INTO tdmstats_browser VALUES ('Chrome 2', '');
INSERT INTO tdmstats_browser VALUES ('Chrome 1', '');
INSERT INTO tdmstats_browser VALUES ('Gecko', '');
INSERT INTO tdmstats_browser VALUES ('Other', '');
#/*firefox adding*/
INSERT INTO tdmstats_browser VALUES ('Firefox 3', '');
INSERT INTO tdmstats_browser VALUES ('Firefox 2', '');
INSERT INTO tdmstats_browser VALUES ('Firefox 1', '');
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
INSERT INTO tdmstats_os (os, count) VALUES ('Windows Seven', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Windows Vista', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Windows XP', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Windows Server 2003', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Windows 2000', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Windows NT 4.''', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Windows 98', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Windows 95', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Windows 9x', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Windows Me', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Win32', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Mac Power PC', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Mac OS X', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Macintosh', '');

#/* removeX11 insert into tdmstats_os (os, count) values ('X11', ''); */
INSERT INTO tdmstats_os (os, count) VALUES ('SunOS', '');
INSERT INTO tdmstats_os (os, count) VALUES ('BeOS', '');
INSERT INTO tdmstats_os (os, count) VALUES ('FreeBSD', '');
INSERT INTO tdmstats_os (os, count) VALUES ('OpenBSD', '');
INSERT INTO tdmstats_os (os, count) VALUES ('IRIX', '');
INSERT INTO tdmstats_os (os, count) VALUES ('OS/2', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Plan9', '');
INSERT INTO tdmstats_os (os, count) VALUES ('OSF', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Linux Fedora', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Linux Ubuntu', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Linux', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Other Unix', '');
INSERT INTO tdmstats_os (os, count) VALUES ('Other', '');

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
INSERT INTO tdmstats_week VALUES ('0', '');
INSERT INTO tdmstats_week VALUES ('1', '');
INSERT INTO tdmstats_week VALUES ('2', '');
INSERT INTO tdmstats_week VALUES ('3', '');
INSERT INTO tdmstats_week VALUES ('4', '');
INSERT INTO tdmstats_week VALUES ('5', '');
INSERT INTO tdmstats_week VALUES ('6', '');

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
INSERT INTO tdmstats_mth_days VALUES ('01', '');
INSERT INTO tdmstats_mth_days VALUES ('02', '');
INSERT INTO tdmstats_mth_days VALUES ('03', '');
INSERT INTO tdmstats_mth_days VALUES ('04', '');
INSERT INTO tdmstats_mth_days VALUES ('05', '');
INSERT INTO tdmstats_mth_days VALUES ('06', '');
INSERT INTO tdmstats_mth_days VALUES ('07', '');
INSERT INTO tdmstats_mth_days VALUES ('08', '');
INSERT INTO tdmstats_mth_days VALUES ('09', '');
INSERT INTO tdmstats_mth_days VALUES ('10', '');
INSERT INTO tdmstats_mth_days VALUES ('11', '');
INSERT INTO tdmstats_mth_days VALUES ('12', '');
INSERT INTO tdmstats_mth_days VALUES ('13', '');
INSERT INTO tdmstats_mth_days VALUES ('14', '');
INSERT INTO tdmstats_mth_days VALUES ('15', '');
INSERT INTO tdmstats_mth_days VALUES ('16', '');
INSERT INTO tdmstats_mth_days VALUES ('17', '');
INSERT INTO tdmstats_mth_days VALUES ('18', '');
INSERT INTO tdmstats_mth_days VALUES ('19', '');
INSERT INTO tdmstats_mth_days VALUES ('20', '');
INSERT INTO tdmstats_mth_days VALUES ('21', '');
INSERT INTO tdmstats_mth_days VALUES ('22', '');
INSERT INTO tdmstats_mth_days VALUES ('23', '');
INSERT INTO tdmstats_mth_days VALUES ('24', '');
INSERT INTO tdmstats_mth_days VALUES ('25', '');
INSERT INTO tdmstats_mth_days VALUES ('26', '');
INSERT INTO tdmstats_mth_days VALUES ('27', '');
INSERT INTO tdmstats_mth_days VALUES ('28', '');
INSERT INTO tdmstats_mth_days VALUES ('29', '');
INSERT INTO tdmstats_mth_days VALUES ('30', '');
INSERT INTO tdmstats_mth_days VALUES ('31', '');

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
INSERT INTO tdmstats_screen VALUES ('', '640 x 480', '');
INSERT INTO tdmstats_screen VALUES ('', '800 x 600', '');
INSERT INTO tdmstats_screen VALUES ('', '1024 x 768', '');
INSERT INTO tdmstats_screen VALUES ('', '1152 x 864', '');
INSERT INTO tdmstats_screen VALUES ('', '1280 x 1024', '');
INSERT INTO tdmstats_screen VALUES ('', '1600 x 1200', '');
INSERT INTO tdmstats_screen VALUES ('', '2048 x 1536', '');
INSERT INTO tdmstats_screen VALUES ('', '2560 x 2048', '');
INSERT INTO tdmstats_screen VALUES ('', '3200 x 2400', '');
INSERT INTO tdmstats_screen VALUES ('', 'Unknown', '');
#/*ading 1920 */
INSERT INTO tdmstats_screen VALUES ('', '1920 x 1200', '');
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
INSERT INTO tdmstats_color VALUES ('', '256 color', '');
INSERT INTO tdmstats_color VALUES ('', '16 bit', '');
INSERT INTO tdmstats_color VALUES ('', '24 bit', '');
INSERT INTO tdmstats_color VALUES ('', '32 bit', '');
INSERT INTO tdmstats_color VALUES ('', 'Unknown', '');

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
