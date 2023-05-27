CREATE TABLE person (
    person_id   SERIAL PRIMARY KEY,
    first_name  VARCHAR(64),
    last_name   VARCHAR(64)
);

INSERT INTO person (first_name, last_name)
VALUES ('Reio', 'Opromei');

INSERT INTO person (first_name)
VALUES ('Hendrik');

INSERT INTO person (last_name)
VALUES ('Opromei');

INSERT INTO person (first_name)
VALUES (NULL);

CREATE TABLE book (
    book_id   SERIAL PRIMARY KEY,
    title  VARCHAR(128)
);

INSERT INTO book (title) VALUES ('Eating bricks - the art of coping');
INSERT INTO book (title) VALUES ('Home schooling for dummies');
INSERT INTO book (title) VALUES ('Home Alone 77');
INSERT INTO book (title) VALUES ('Home Alone 78');
