create table departments
(
    id   int auto_increment primary key,
    name varchar(45) null,
    company_id INT,
    FOREIGN KEY (company_id) REFERENCES company(id)
);