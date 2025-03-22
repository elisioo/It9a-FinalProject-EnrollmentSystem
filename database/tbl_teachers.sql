CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    age INT NOT NULL,
    nationality VARCHAR(50) NOT NULL,
    address VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    
    degree VARCHAR(100) NOT NULL,
    major VARCHAR(100) NOT NULL,
    university VARCHAR(100) NOT NULL,
    year_graduated VARCHAR(10) NOT NULL,
    
    prc_license VARCHAR(50) NOT NULL,
    license_validity DATE NOT NULL,
    let_date DATE NOT NULL,
    specialization ENUM('Academic', 'TVL', 'Sports', 'Arts') NOT NULL,
    
    previous_school VARCHAR(100),
    position VARCHAR(50),
    years_experience INT DEFAULT 0,
    employment_status ENUM('Full-time', 'Part-time') NOT NULL,
    teaching_schedule ENUM('Morning', 'Afternoon', 'Evening') NOT NULL,
    subjects VARCHAR(255) NOT NULL,
    
    certifications TEXT,
    medical_info TEXT,
    accommodations TEXT,
    
    date_hired DATE NOT NULL,
    employee_id VARCHAR(20) NOT NULL UNIQUE,
    
    profile_picture VARCHAR(255),
    resume VARCHAR(255),
    transcript VARCHAR(255),
    prc_copy VARCHAR(255),
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);