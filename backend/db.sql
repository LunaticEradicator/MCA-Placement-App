CREATE DATABASE IF NOT EXISTS temp;
USE temp;


CREATE TABLE students (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    rollno VARCHAR(40) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    passwords VARCHAR(255) NOT NULL,
    createdAt DATETIME NOT NULL DEFAULT CURRENT_TIME,
    backlogs VARCHAR(3) NOT NULL DEFAULT 'No',
    cgpa DECIMAL(3, 2) NOT NULL DEFAULT 0.00,  -- CGPA as decimal with 2 decimal places
    PRIMARY KEY (id)
);

CREATE TABLE teachers(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    passwords VARCHAR(255) NOT NULL,
    createdAt DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
);

CREATE TABLE providers(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    company VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    passwords VARCHAR(255) NOT NULL,
    createdAt DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
);

CREATE TABLE job_listings (
    job_id INT AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    job_description TEXT NOT NULL,
    location VARCHAR(255) NOT NULL,
    required_skills TEXT NOT NULL,
    -- company_name VARCHAR(255) NOT NULL,
    contact_email VARCHAR(255) NOT NULL,
    provider_id INT,  -- Foreign key
    FOREIGN KEY (provider_id) REFERENCES providers(id)
);

CREATE TABLE student_job_decisions (
    decision_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    job_id INT NOT NULL,
    decision ENUM('Accepted', 'Rejected', 'Open') NOT NULL DEFAULT 'Open',
    decision_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (job_id) REFERENCES job_listings(job_id)
);


INSERT INTO students (username, rollno, email, phone, passwords)
VALUES
    ('Messi', "24MCA60", 'john@example.com', 9876543210,"No",9, '123'),
    ('jane', 
    ('Cr7', "24MCA61", 'jane@example.com', 9876543211,"No",8.63, '123'),
    ('alice', 
    ('Neymar', "24MCA62", 'alice@example.com', 9876543212,"Yes",5.5, '123');

INSERT INTO teachers (username, email, phone, passwords)
VALUES
    ('james', 'james@school.com', 9123456789, 'password123'),
    ('martin', 'martin@school.com', 9123456790, 'password123'),
    ('king', 'king@school.com', 9123456791, 'password123');

INSERT INTO providers (username, company, email, phone, passwords)
VALUES 
('Gojo', 'TechCorp', 'gojo@techcorp.com', 1234567890, '123'),
('Sukuna', 'InnovateX', 'sukuna@innovatex.com', 9876543210, '123'),
('Guts', 'InnovateX', 'guts@innovatex.com', 789543210, '123'),
('Goku', 'DataSolutions', 'goku@datasolutions.com', 5551234567, '123'),
('Vegeta', 'NextGen Tech', 'vegeta@nextgen.com', 1239874560, '123'),
('Dante', 'GlobalTech Solutions', 'dante@globaltech.com', 8763452109, '123'),
('Kaneki', 'CloudVentures', 'kaneki@cloudventures.com', 5678901234, '123');


INSERT INTO job_listings (job_title, job_description, location, required_skills, company_name, contact_email, provider_id)
VALUES
('Software Engineer', 
 'Develop and maintain software applications, troubleshoot issues, and improve user experience.',
 'Bangalore', 
 'Java, DSA, SQL, React', 
 'TechCorp', 
 'hr@techcorp.com', 
 3),  

('Data Scientist', 
 'Analyze large datasets, build predictive models, and collaborate with teams to implement data-driven solutions.',
 'Trivandrum', 
 'Python, Machine Learning, SQL, Data Visualization', 
 'InnovateX', 
 'hr@innovatex.com', 
 2),
 ('Cloud Architect', 
 'Design and implement scalable cloud infrastructure, work with Kubernetes, Docker, and AWS.',
 'Kochi', 
 'AWS, Docker, Kubernetes, Python', 
 'DataSolutions', 
 'hr@datasolutions.com', 
 3),
 ('Frontend Developer', 
 'Build and maintain user interfaces using HTML, CSS, and JavaScript. Collaborate with the design team.',
 'Kochi', 
 'HTML, CSS, JavaScript, React', 
 'NextGen Tech', 
 'hr@nextgen.com', 
 4),  
('Network Engineer', 
 'Design and maintain network infrastructure. Ensure the security and efficiency of the network.',
 'Bangalore', 
 'Networking, Cisco, Security, Troubleshooting', 
 'GlobalTech Solutions', 
 'hr@globaltech.com', 
 5),  
('Cloud Engineer', 
 'Manage and scale cloud infrastructure, automate workflows, and deploy applications in the cloud.',
 'Trivandrum', 
 'AWS, Azure, Terraform, Python', 
 'CloudVentures', 
 'hr@cloudventures.com', 
 2),  
('Cybersecurity Analyst', 
 'Identify vulnerabilities, monitor systems for security threats, and respond to incidents.',
 'Kochi', 
 'Cybersecurity, Firewalls, SIEM, Linux', 
 'CyberLink Inc.', 
 'hr@cyberlink.com', 
 2), 
 ('Network Engineer', 
 'Design and maintain network infrastructure. Ensure the security and efficiency of the network.',
 'Bangalore', 
 'Networking, Cisco, Security, Troubleshooting', 
 'GlobalTech Solutions', 
 'hr@globaltech.com', 
 2),  
 ('Software Engineer', 
 'Develop and maintain software applications, troubleshoot issues, and improve user experience.',
 'Bangalore', 
 'Java, Dsa, Sql, React, Mern', 
 'TechCorp', 
 'hr@techcorp.com', 
 5);



-- SELECT 
--     jl.job_id, 
--     jl.job_title, 
--     jl.job_description, 
--     jl.location, 
--     jl.required_skills, 
--     jl.company_name, 
--     jl.contact_email, 
--     p.username AS provider_username, 
--     p.company AS provider_company, 
--     p.email AS provider_email,
--     p.phone AS provider_phone,
--     p.createdAt AS provider_createdAt
-- FROM 
--     job_listings jl
-- JOIN 
--     providers p ON jl.provider_id = p.id;
