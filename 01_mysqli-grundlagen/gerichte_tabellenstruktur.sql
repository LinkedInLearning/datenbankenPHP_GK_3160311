CREATE TABLE IF NOT EXISTS gerichte  (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  beschreibung TEXT,
  kategorie_id INT(11),
  PRIMARY KEY (id)
);