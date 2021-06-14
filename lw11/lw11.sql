CREATE DATABASE 
	university;

USE 
    university;

CREATE TABLE `faculty`
(
    faculty_id INT AUTO_INCREMENT 	NOT NULL,
    faculty_name NVARCHAR(50) 		NOT NULL,
    PRIMARY KEY(faculty_id)
);

INSERT INTO 
	`faculty`(faculty_name) 
VALUES
	('Радиотехнический факультет'),
	('Факультет информатики и вычислительной техники'),
	('Экономический факультет');

CREATE TABLE `study_group`
(
    group_id INT AUTO_INCREMENT		NOT NULL,
    group_name NVARCHAR(20)			NOT NULL,
    faculty_id INT					NOT NULL,
    PRIMARY KEY (group_id),
    FOREIGN KEY (faculty_id) REFERENCES faculty(faculty_id)
);

SET @faculty_id = (SELECT faculty_id FROM faculty WHERE faculty_name = 'Радиотехнический факультет');

INSERT INTO 
	`study_group`(group_name, faculty_id) 
VALUES 
	('ЭВС-11', @faculty_id),
	('УИТС-11', @faculty_id),
	('ЭВС-21', @faculty_id);

SET @faculty_id = (SELECT faculty_id FROM faculty WHERE faculty_name = 'Факультет информатики и вычислительной техники');

INSERT INTO 
	`study_group`(group_name, faculty_id)
VALUES 
	('ПС-11', @faculty_id),
	('ИВТ-11', @faculty_id),
	('БИ-11', @faculty_id);

SET @faculty_id = (SELECT faculty_id FROM faculty WHERE faculty_name = 'Экономический факультет');

INSERT INTO 
	`study_group`(group_name, faculty_id) 
VALUES 
	('ЭБ-11', @faculty_id),
	('ПИ-11', @faculty_id),
	('ЭКО-11', @faculty_id);

CREATE TABLE `student`
(
    student_id INT AUTO_INCREMENT	NOT NULL,
    last_name NVARCHAR(20)			NOT NULL,
    first_name NVARCHAR(20)			NOT NULL,
    age INT							NOT NULL,
    group_id INT 					NOT NULL,
    PRIMARY KEY (student_id),
    FOREIGN KEY (group_id) REFERENCES `study_group`(group_id)
);

SET @group_id = (SELECT group_id FROM `study_group` WHERE group_name = 'ЭВС-11');

INSERT INTO 
	`student`(last_name, first_name, age, group_id) 
VALUES
    ('Иванов', 'Иван', 18, @group_id),
    ('Петров', 'Петр', 19, @group_id),
	('Иванов', 'Петр', 19, @group_id),
	('Петров', 'Иван', 20, @group_id),
	('Петровский', 'Иван', 18, @group_id);

SET @group_id = (SELECT group_id FROM `study_group` WHERE group_name = 'УИТС-11');

INSERT INTO 
	`student`(last_name, first_name, age, group_id) 
VALUES
    ('Иванов', 'Вася', 18, @group_id),
    ('Петров', 'Вася', 18, @group_id),
    ('Сидоров', 'Петр', 19, @group_id),
    ('Петров', 'Сидор', 20, @group_id),
    ('Иванов', 'Ольга', 21, @group_id);

SET @group_id = (SELECT group_id FROM `study_group` WHERE group_name = 'ЭВС-21');

INSERT INTO 
	`student`(last_name, first_name, age, group_id) 
VALUES
	('Макаров', 'Макар', 20, @group_id),
	('Петров', 'Макар', 21, @group_id),
	('Иванов', 'Олег', 19, @group_id),
	('Петров', 'Вася', 20, @group_id),
	('Петрова', 'Наталья', 19, @group_id);

SET @group_id = (SELECT group_id FROM `study_group` WHERE group_name = 'ПС-11');

INSERT INTO 
	`student`(last_name, first_name, age, group_id) 
VALUES
	('Бананова', 'Груша', 19, @group_id),
	('Яблокова', 'Киви', 18, @group_id),
	('Лимонов', 'Лимон', 19, @group_id),
	('Апельсинов', 'Мандарин', 18, @group_id),
	('Грушевский', 'Банан', 18, @group_id);

SET @group_id = (SELECT group_id FROM `study_group` WHERE group_name = 'ИВТ-11');

INSERT INTO 
	`student`(last_name, first_name, age, group_id) 
VALUES
	('Дзюба', 'Артем', 19, @group_id),
	('Жирков', 'Юрий', 25, @group_id),
	('Миранчук', 'Алексей', 18, @group_id),
	('Кержаков', 'Александр', 20, @group_id),
	('Аршавин', 'Петя', 21, @group_id);

SET @group_id = (SELECT group_id FROM `study_group` WHERE group_name = 'БИ-11');

INSERT INTO 
	`student`(last_name, first_name, age, group_id) 
VALUES
	('Мбапе', 'Николай', 19, @group_id),
	('Головин', 'Александр', 19, @group_id),
	('Фалькао', 'Петр', 18, @group_id),
	('Рикардиньо', 'Руслан', 20, @group_id),
	('Роналдо', 'Кристина', 19, @group_id);

SET @group_id = (SELECT group_id FROM `study_group` WHERE group_name = 'ЭБ-11');

INSERT INTO 
	`student`(last_name, first_name, age, group_id) 
VALUES
	('Месси', 'Леонид', 20, @group_id),
	('Левандовский', 'Роберт', 23, @group_id),
	('Зидан', 'Зина', 19, @group_id),
	('Блохин', 'Олег', 20, @group_id),
	('Черышев', 'Денис', 19, @group_id);

SET @group_id = (SELECT group_id FROM `study_group` WHERE group_name = 'ПИ-11');

INSERT INTO 
	`student`(last_name, first_name, age, group_id) 
VALUES
	('Черенков', 'Федор', 19, @group_id),
	('Стрельцов', 'Эдуард', 20, @group_id),
	('Беланов', 'Игорь', 18, @group_id),
	('Иванов', 'Валентин', 19, @group_id),
	('Яшин', 'Лев', 19, @group_id);

SET @group_id = (SELECT group_id FROM `study_group` WHERE group_name = 'ЭКО-11');

INSERT INTO 
	`student`(last_name, first_name, age, group_id) 
VALUES
	('Торвальдс', 'Линус', 18, @group_id),
	('Гейтс', 'Билл', 19, @group_id),
	('Кнут', 'Дональд', 19, @group_id),
	('Бернерс-Ли', 'Тим', 20, @group_id),
	('Страуструп', 'Бьерн', 19, @group_id);

SELECT
    student_id,
    last_name AS 'Фамилия',
    first_name AS 'Имя',
    age AS 'Возраст'
FROM
    student
WHERE
    age = 19
ORDER BY last_name, first_name;  
  
/* Запрос для получения всех студентов из конкретной группы.*/
SELECT
    student.student_id AS 'Код',
    student.last_name AS 'Фамилия',
    student.first_name AS 'Имя',
    student.age AS 'Возраст',
    study_group.group_name AS 'Группа'
FROM
    student 
LEFT JOIN 
    study_group
ON 
    student.group_id = study_group.group_id    
WHERE
    study_group.group_name = 'ЭКО-11'
ORDER BY 
    Фамилия, Имя;
    
/* Запрос для получения всех студентов из конкретного факультета*/

SELECT
    student.student_id AS 'Код',
    student.last_name AS 'Фамилия',
    student.first_name AS 'Имя',
    student.age AS 'Возраст',
    study_group.group_name AS 'Группа',
    faculty.faculty_name AS 'Факультет'
FROM 
    student    
LEFT JOIN
    study_group
ON
    student.group_id = study_group.group_id
LEFT JOIN
    faculty
ON
    study_group.group_id = faculty.faculty_id        
WHERE
    faculty.faculty_name = 'Радиотехнический факультет'
ORDER BY 
	Фамилия, Имя;
/* запрос для получения факультета и группы конкретного студента*/    
SELECT
    student.student_id AS 'Код',
    student.last_name AS 'Фамилия',
    student.first_name AS 'Имя',
    student.age AS 'Возраст',
    study_group.group_name AS 'Группа',
    faculty.faculty_name AS 'Факультет'
FROM
    student
LEFT JOIN 
	study_group 
ON 
	student.group_id = study_group.group_id
LEFT JOIN
	faculty 
ON 
	study_group.faculty_id = faculty.faculty_id
WHERE
    student.first_name = 'Билл' AND student.last_name = 'Гейтс';






    
    
    
