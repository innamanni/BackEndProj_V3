drop table person;

create table person (
  person_id INT AUTO_INCREMENT PRIMARY KEY,
  person_type ENUM('Parent', 'Student', 'Other'), 
  l_name VARCHAR(200), 
  f_name VARCHAR(200), 
  age INT(11), 
  grade INT(11), 
  gender ENUM('F', 'M', 'Other')
);

drop table phone;

CREATE TABLE phone (
  phone_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(40),
  phone_number VARCHAR(20),
  person_id int NOT NULL,
  phone_type_id int NOT NULL,
  FOREIGN KEY (person_id) REFERENCES person(person_id),
  FOREIGN KEY (phone_type_id) REFERENCES phone_type(phone_type_id),
  CONSTRAINT uc_PersonPhone UNIQUE (phone_type_id, person_id)
);

drop table address_type;

CREATE TABLE address_type (
  address_type_id INT AUTO_INCREMENT PRIMARY KEY,
  address_type ENUM ('Home', 'Business', 'Other')
);

drop table address;

CREATE TABLE address (
  address_id INT AUTO_INCREMENT PRIMARY KEY,
  street1 VARCHAR(200),
  street1 VARCHAR(200),
  state VARCHAR(200),
  city VARCHAR(200),
  zip INT(10),
  FOREIGN KEY (person_id) REFERENCES person(person_id),
  FOREIGN KEY (phone_type_id) REFERENCES phone_type(phone_type_id),
  CONSTRAINT uc_PersonPhone UNIQUE (phone_type_id, person_id)
);

CREATE TABLE phone (
  phone_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(40),
  phone_number VARCHAR(20),
  person_id int NOT NULL,
  phone_type_id int NOT NULL,
  FOREIGN KEY (person_id) REFERENCES person(person_id),
  FOREIGN KEY (phone_type_id) REFERENCES phone_type(phone_type_id),
  CONSTRAINT uc_PersonPhone UNIQUE (phone_type_id, person_id)
);

CREATE TABLE email (
  email_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(40),
  email_address VARCHAR(20),
  person_id int NOT NULL,
  FOREIGN KEY (person_id) REFERENCES person(person_id)
);

CREATE TABLE transportation (
  transportation_id INT AUTO_INCREMENT PRIMARY KEY,
  passenger_id INT, 
  driver_id INT, 
  event_id INT,
  FOREIGN KEY (passenger_id) REFERENCES person(person_id),
  FOREIGN KEY (driver_id) REFERENCES person(person_id),
  FOREIGN KEY (event_id) REFERENCES event(event_id),
  CONSTRAINT uc_PassengerEvent UNIQUE (passenger_id, event_id)
);

CREATE TABLE medical (
  medical_id INT AUTO_INCREMENT PRIMARY KEY,
  medical_description VARCHAR(800),
  permission ENUM('Yes', 'No'),
  student_id INT, 
  parent_id INT, 
  FOREIGN KEY (student_id) REFERENCES person(person_id),
  FOREIGN KEY (parent_id) REFERENCES person(person_id)
);

CREATE TABLE xref_address (
  xref_address_id INT AUTO_INCREMENT PRIMARY KEY,
  person_id INT, 
  address_id INT, 
  address_type_id INT, 
  FOREIGN KEY (person_id) REFERENCES person(person_id),
  FOREIGN KEY (address_id) REFERENCES address(address_id),
  FOREIGN KEY (address_type_id) REFERENCES address_type(address_type_id)
);

CREATE TABLE xref_attend (
  xref_attend_id INT AUTO_INCREMENT PRIMARY KEY,
  person_id INT, 
  event_id INT, 
  FOREIGN KEY (person_id) REFERENCES person(person_id),
  FOREIGN KEY (event_id) REFERENCES event(event_id)
);

CREATE TABLE xref_guardian (
  xref_guardian_id INT AUTO_INCREMENT PRIMARY KEY,
  student_person_id INT, 
  parent_person_id INT, 
  event_id INT, 
  FOREIGN KEY (student_person_id) REFERENCES person(person_id),
  FOREIGN KEY (parent_person_id) REFERENCES person(person_id),
  FOREIGN KEY (event_id) REFERENCES event(event_id)
);

CREATE TABLE disclaimer (
  disclaimer_id INT AUTO_INCREMENT PRIMARY KEY,
  disclaimer_text VARCHAR(1000),
  event_id INT, 
  FOREIGN KEY (event_id) REFERENCES event(event_id)
);

CREATE TABLE xref_disclaimer (
  xref_guardian_id INT AUTO_INCREMENT PRIMARY KEY,
  date DATE, 
  guardian_id INT, 
  disclaimer_id INT, 
  FOREIGN KEY (guardian_id) REFERENCES person(person_id),
  FOREIGN KEY (disclaimer_id) REFERENCES disclaimer(disclaimer_id)
);



INSERT INTO `event`(`event_id`, `name`, `date`, `start_time`, `end_time`, `description`, `address_id`) VALUES ('1','Orlando Teen Dance','04/25/15','6pm','9pm','Epic Spring Party','4');



