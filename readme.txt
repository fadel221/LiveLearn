/*****************  DATABASE ******************/

CREATE DATABASE trelloclone;

CREATE TABLE list (
    list_id int NOT NULL,
    title TEXT NOT NULL,
    PRIMARY KEY (list_id)    
);

 FOREIGN KEY (PersonID) REFERENCES Persons(PersonID)
);

CREATE TABLE card (
    card_id int NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (card_id)    
);

 FOREIGN KEY (list_id) REFERENCES list(list_id)
);
INSERT INTO `list` (`list_id`, `title`,) VALUES (NULL, 'To do');
INSERT INTO `card` (`card_id`, `description`, `list_id`) VALUES (NULL, 'Notification by mail', '1');

