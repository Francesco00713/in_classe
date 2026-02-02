CREATE DATABASE IF NOT EXISTS Users;

CREATE TABLE utenti (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    passwordd VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO utenti (username, passwordd) VALUES ('Franco', '123');
INSERT INTO utenti (username, passwordd) VALUES ('Nick', '1234');