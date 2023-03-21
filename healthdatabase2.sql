-- Active: 1677873705099@@127.0.0.1@3306
CREATE DATABASE healthinsurance;
USE healthinsurance;

CREATE TABLE Doctors (
    NPI INT(10) PRIMARY KEY NOT NULL,
    Specialty VARCHAR(50) NOT NULL
);

CREATE TABLE Hospitals (
    HospitalID INT(6) PRIMARY KEY NOT NULL,
    NameforHospital VARCHAR(50) NOT NULL,
    AddressforHospital VARCHAR(50) NOT NULL
);

CREATE TABLE Plan (
    Planname VARCHAR(18) PRIMARY KEY NOT NULL,
    Premium DECIMAL(5,2) NOT NULL,
    Deductible DECIMAL(6,2) NOT NULL,
    Copay DECIMAL(4,2) NOT NULL,
    Coinsurance DECIMAL(3,2) NOT NULL
);

CREATE TABLE Policy (
    PolicyID INT(8) PRIMARY KEY NOT NULL,
    Startdate DATE NOT NULL,
    Deductibletodate DECIMAL(6,2) NOT NULL,
    Planname VARCHAR(18) NOT NULL,
    FOREIGN KEY (Planname) REFERENCES Plan(Planname)
);

CREATE TABLE Services (
    Medicalcode VARCHAR(5) PRIMARY KEY NOT NULL,
    Description VARCHAR(50) NOT NULL,
    Cost DECIMAL(6,2) NOT NULL
);

CREATE TABLE Policyholders (
    SSN VARCHAR(11) PRIMARY KEY NOT NULL,
    NameforPolicyholder VARCHAR(50) NOT NULL,
    AddressforPolicyholder VARCHAR(50) NOT NULL,
    PhoneforPolicyholder VARCHAR(12) NOT NULL,
    EmailforPolicyholder VARCHAR(50) NOT NULL,
    Birthday Date NOT NULL,
    Gender VARCHAR(11) NOT NULL,
    PolicyID INT(8) NOT NULL,
    FOREIGN KEY (PolicyID) REFERENCES Policy(PolicyID)
);

CREATE TABLE Claims (
    ClaimID INT(5) PRIMARY KEY NOT NULL,
    PolicyID INT(8) NOT NULL,
    FOREIGN KEY (PolicyID) REFERENCES Policy(PolicyID),
    SSN VARCHAR(11) NOT NULL,
    FOREIGN KEY (SSN) REFERENCES Policyholders(SSN),
    NPI INT(10) NOT NULL,
    FOREIGN KEY (NPI) REFERENCES Doctors(NPI),
    HospitalID INT(6) NOT NULL,
    FOREIGN KEY (HospitalID) REFERENCES Hospitals(HospitalID),
    Medicalcode VARCHAR(5) NOT NULL,
    FOREIGN KEY (Medicalcode) REFERENCES Services(Medicalcode),
    DateofService DATE NOT NULL,
    Amountcharged DECIMAL(6,2) NOT NULL
);

LOAD DATA LOCAL INFILE '/Users/aubreymoulton/ComputerScience/DatabaseSystems/Project1/Doctors.csv'
INTO TABLE healthinsurance.Doctors
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
Lines TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE '/Users/aubreymoulton/ComputerScience/DatabaseSystems/Project1/Hospitals.csv'
INTO TABLE healthinsurance.Hospitals
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
Lines TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE '/Users/aubreymoulton/ComputerScience/DatabaseSystems/Project1/Plan.csv'
INTO TABLE healthinsurance.Plan
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
Lines TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE '/Users/aubreymoulton/ComputerScience/DatabaseSystems/Project1/InsurancePolicies.csv'
INTO TABLE healthinsurance.Policy
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
Lines TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE '/Users/aubreymoulton/ComputerScience/DatabaseSystems/Project1/Services.csv'
INTO TABLE healthinsurance.Services
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
Lines TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE '/Users/aubreymoulton/ComputerScience/DatabaseSystems/Project1/Policyholder.csv'
INTO TABLE healthinsurance.Policyholders
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
Lines TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA LOCAL INFILE '/Users/aubreymoulton/ComputerScience/DatabaseSystems/Project1/claims.csv'
INTO TABLE healthinsurance.Claims
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
Lines TERMINATED BY '\r\n'
IGNORE 1 LINES;
