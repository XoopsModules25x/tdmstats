#
# PHP i-stats - MySQL schema
#


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
