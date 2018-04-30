CREATE SCHEMA duo_system;

USE duo_system;


CREATE TABLE status(
  id INT AUTO_INCREMENT,
  name VARCHAR(60) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_status_unique (id ASC),
  UNIQUE INDEX name_unique (name ASC)
) ENGINE = InnoDB;

CREATE TABLE activity(
  id INT AUTO_INCREMENT,
  status_id INT NOT NULL,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(600) NOT NULL,
  situation TINYINT(1) NOT NULL DEFAULT 1,
  begin_date DATE NOT NULL,
  end_date DATE NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX  id_unique (id ASC),
  INDEX fk_activity_status_idx (status_id ASC),
  CONSTRAINT fk_activity_status FOREIGN KEY (status_id) REFERENCES status(id) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE = InnoDB;


INSERT INTO status (name)
VALUES ('Pendente'), ('Em Desenvolvimento'), ('Em Teste'), ('Concluido');