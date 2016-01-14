DROP TABLE IF EXISTS xref_address;
DROP TABLE IF EXISTS phone;
DROP TABLE IF EXISTS phone_type;
DROP TABLE IF EXISTS email;
DROP TABLE IF EXISTS xref_comp_addr;
DROP TABLE IF EXISTS address_type;
DROP TABLE IF EXISTS address;
DROP TABLE IF EXISTS state;
DROP TABLE IF EXISTS xref_role;
DROP TABLE IF EXISTS role;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS xref_contact;
DROP TABLE IF EXISTS person;
DROP TABLE IF EXISTS xref_comp_addr;
DROP TABLE IF EXISTS contact;
DROP TABLE IF EXISTS company;

CREATE TABLE person (
  person_id INT AUTO_INCREMENT PRIMARY KEY,
  l_name VARCHAR(50), 
  f_name VARCHAR(50), 
  created_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_by INT,
  last_modified_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_modified_by INT
);

#INSERT INTO person (l_name, f_name) VALUES ('Manni','Inna');

CREATE TABLE phone_type (
  phone_type_id INT AUTO_INCREMENT PRIMARY KEY,
  phone_type VARCHAR(20)
);

CREATE TABLE phone (
  phone_id INT AUTO_INCREMENT PRIMARY KEY,
  phone_number VARCHAR(20),
  person_id INT NOT NULL,
  phone_type_id INT NOT NULL,
  FOREIGN KEY (person_id) REFERENCES person(person_id),
  FOREIGN KEY (phone_type_id) REFERENCES phone_type(phone_type_id),
  CONSTRAINT uc_PersonPhone UNIQUE (phone_type_id, person_id),
  created_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_by INT,
  last_modified_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_modified_by INT
);

CREATE TABLE address_type (
  address_type_id INT AUTO_INCREMENT PRIMARY KEY,
  address_type VARCHAR(20)
);

CREATE TABLE state (
  state_id INT AUTO_INCREMENT PRIMARY KEY,
  abbr CHAR(2) NOT NULL,
  descr VARCHAR(20)
);

INSERT INTO state (abbr, descr) VALUES 
('AL', 'Alabama'),
('AK', 'Alaska'),
('AZ', 'Arizona'),
('AR', 'Arkansas'),
('CA', 'California'),
('CO', 'Colorado'),
('CT', 'Connecticut'),
('DE', 'Delaware'),
('DC', 'District of Columbia'),
('FL', 'Florida'),
('GA', 'Georgia'),
('HI', 'Hawaii'),
('ID', 'Idaho'),
('IL', 'Illinois'),
('IN', 'Indiana'),
('IA', 'Iowa'),
('KS', 'Kansas'),
('KY', 'Kentucky'),
('LA', 'Louisiana'),
('ME', 'Maine'),
('MD', 'Maryland'),
('MA', 'Massachusetts'),
('MI', 'Michigan'),
('MN', 'Minnesota'),
('MS', 'Mississippi'),
('MO', 'Missouri'),
('MT', 'Montana'),
('NE', 'Nebraska'),
('NV', 'Nevada'),
('NH', 'New Hampshire'),
('NJ', 'New Jersey'),
('NM', 'New Mexico'),
('NY', 'New York'),
('NC', 'North Carolina'),
('ND', 'North Dakota'),
('OH', 'Ohio'),
('OK', 'Oklahoma'),
('OR', 'Oregon'),
('PA', 'Pennsylvania'),
('PR', 'Puerto Rico'),
('RI', 'Rhode Island'),
('SC', 'South Carolina'),
('SD', 'South Dakota'),
('TN', 'Tennessee'),
('TX', 'Texas'),
('UT', 'Utah'),
('VT', 'Vermont'),
('VA', 'Virginia'),
('WA', 'Washington'),
('WV', 'West Virginia'),
('WI', 'Wisconsin'),
('WY', 'Wyoming');

CREATE TABLE address (
  address_id INT AUTO_INCREMENT PRIMARY KEY,
  street1 VARCHAR(50),
  street2 VARCHAR(50),
  state_id INT,
  city VARCHAR(20),
  zip INT(10),
  FOREIGN KEY (state_id) REFERENCES state(state_id),
  created_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_by INT,
  last_modified_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_modified_by INT
);

CREATE TABLE xref_address (
  person_id INT NOT NULL,
  address_id INT NOT NULL,
  address_type_id INT NOT NULL,
  FOREIGN KEY (person_id) REFERENCES person(person_id),
  FOREIGN KEY (address_id) REFERENCES address(address_id),
  FOREIGN KEY (address_type_id) REFERENCES address_type(address_type_id),
  CONSTRAINT pk_Pers_addr PRIMARY KEY (person_id, address_id, address_type_id)
);

CREATE TABLE email (
  email_id INT AUTO_INCREMENT PRIMARY KEY,
  email_address VARCHAR(20),
  person_id INT NOT NULL,
  FOREIGN KEY (person_id) REFERENCES person(person_id),
  created_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_by INT,
  last_modified_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_modified_by INT
);

CREATE TABLE user (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(50), 
  password VARCHAR(50),
  created_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_by INT,
  last_modified_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_modified_by INT
);

CREATE TABLE role (
  role_id INT AUTO_INCREMENT PRIMARY KEY,
  role_type VARCHAR(20),
  created_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_by INT,
  last_modified_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_modified_by INT
);

CREATE TABLE xref_role (
  user_id INT NOT NULL,
  role_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES user(user_id),
  FOREIGN KEY (role_id) REFERENCES role(role_id),
  CONSTRAINT pk_usr_role PRIMARY KEY (user_id, role_id)
);

CREATE TABLE company (
  company_id INT AUTO_INCREMENT PRIMARY KEY,
  company_name VARCHAR(50),
  created_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_by INT,
  last_modified_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_modified_by INT
);

CREATE TABLE xref_comp_addr (
  company_id INT NOT NULL,
  address_id INT NOT NULL,
  address_type_id INT NOT NULL,
  FOREIGN KEY (company_id) REFERENCES company(company_id),
  FOREIGN KEY (address_id) REFERENCES address(address_id),
  FOREIGN KEY (address_type_id) REFERENCES address_type(address_type_id),
  CONSTRAINT pk_comp_addr PRIMARY KEY (company_id, address_id, address_type_id)
);

CREATE TABLE xref_contact (
  person_id INT NOT NULL,
  company_id INT NOT NULL,
  descr VARCHAR(50),
  comment VARCHAR(500),
  FOREIGN KEY (person_id) REFERENCES person(person_id),
  FOREIGN KEY (company_id) REFERENCES company(company_id),
  CONSTRAINT pk_comp_cont PRIMARY KEY (company_id, person_id),
  created_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_by INT,
  last_modified_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  last_modified_by INT
);

