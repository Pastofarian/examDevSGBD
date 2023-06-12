CREATE TABLE owners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    birth_date DATE NOT NULL,
    email VARCHAR(255),
    phone VARCHAR(15)
);
CREATE TABLE animals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    sex ENUM('M','F') NOT NULL,
    sterilized BOOLEAN NOT NULL,
    birth_date DATE NOT NULL,
    chip_id VARCHAR(255) NOT NULL,
    owner_id INT NOT NULL,
    FOREIGN KEY (owner_id) REFERENCES owners(id) ON DELETE RESTRICT
);

CREATE TABLE stays (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_date DATE NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    animal_id INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES animals(id) ON DELETE RESTRICT
);
INSERT INTO owners (first_name, last_name, birth_date, email, phone) VALUES
('Jean', 'Dupont', '1970-01-01', 'jean.dupont@gmail.com', '0123456789'),
('Marie', 'Durand', '1980-02-02', 'marie.durand@gmail.com', '0234567891'),
('Pierre', 'Martin', '1990-03-03', 'pierre.martin@gmail.com', '0345678921'),
('Sophie', 'Bernard', '2000-04-04', 'sophie.bernard@gmail.com', '0456789231'),
('Luc', 'Lefevre', '1960-05-05', 'luc.lefevre@gmail.com', '0567892341');

INSERT INTO animals (name, sex, sterilized, birth_date, chip_id, owner_id) VALUES
('Fifi', 'F', true, '2010-06-06', '1234567890', 1),
('Rex', 'M', false, '2011-07-07', '2345678901', 2),
('Minou', 'M', true, '2012-08-08', '3456789012', 3),
('Belle', 'F', false, '2013-09-09', '4567890123', 4),
('Spot', 'M', true, '2014-10-10', '5678901234', 5),
('Lucky', 'M', false, '2015-11-11', '6789012345', 1),
('Lady', 'F', true, '2016-12-12', '7890123456', 2);

INSERT INTO stays (reservation_date, start_date, end_date, animal_id) VALUES
('2023-01-01', '2023-01-02', '2023-01-03', 1),
('2023-02-02', '2023-02-03', '2023-02-04', 2),
('2023-03-03', '2023-03-04', '2023-03-05', 3),
('2023-04-04', '2023-04-05', '2023-04-06', 4),
('2023-05-05', '2023-05-06', '2023-05-07', 5),
('2023-06-06', '2023-06-07', '2023-06-08', 6),
('2023-08-08', '2023-08-09', '2023-08-10', 1),
('2023-07-07', '2023-07-08', '2023-07-09', 7);