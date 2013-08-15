CREATE DATABASE books CHARACTER SET utf8 COLLATE utf8_general_ci;
USE books;
CREATE TABLE authors (id_author int(8) PRIMARY KEY auto_increment,
						firstName VARCHAR(40),
						lastName VARCHAR(40));
						
CREATE TABLE genres (id_genre tinyint(2) PRIMARY KEY auto_increment,
						title VARCHAR(40));		
						
CREATE TABLE books(ISBN int(8) PRIMARY KEY auto_increment,
					title VARCHAR(100),
					image MEDIUMBLOB) ENGINE = FILES;
					
CREATE TABLE books_author(ISBN int(8),
							id_author int(8));
							
CREATE TABLE books_genre(ISBN int(8),
							id_genre int(8));		
							
INSERT INTO authors(firstName, lastName) VALUES('Айн', 'Рейд'), ('Архимандрит', 'Тихон'), ('Эва', 'Хансен'), ('Макс', 'Фрай'), ('Ник', 'Вуйчич'), ('Виктор', 'Пелевин'),
			('Стивен', 'Кинг'), ('Дэвид', 'Робертс');
			
INSERT INTO genres(title) VALUES('Фантастика'), ('Детектив'), ('Исторический роман'), ('Проза'), ('Поэзия'), ('Биографии'), 
			('Любовные романы'), ('Афоризмы'), ('Комиксы');			
			
			
CREATE TRIGGER delbook BEFORE DELETE ON books
    FOR EACH ROW
    BEGIN
   		DELETE FROM books_author WHERE OLD.ISBN = ISBN;
   		DELETE FROM books_genre WHERE OLD.ISBN = ISBN;
    END;
			