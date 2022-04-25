CREATE TABLE employees (
                           id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                           name VARCHAR(100) NOT NULL,
                           hire_date DATE NOT NULL,
                           address VARCHAR(255) NOT NULL,
                           salary INT(10) NOT NULL,
                           department_id INT,
                           FOREIGN KEY (department_id) REFERENCES departments(id)
);