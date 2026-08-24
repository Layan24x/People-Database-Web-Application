CREATE TABLE people (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    status TINYINT(1) NOT NULL DEFAULT 0
);

-- Example data:
-- INSERT INTO people (name, age, status) VALUES ('Ahmed', 21, 0);