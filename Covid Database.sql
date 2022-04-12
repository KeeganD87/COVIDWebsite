drop database covidDB;
create database covidDB;

CREATE TABLE VaccineCompany(
    CompanyName 		VARCHAR(20) NOT NULL,
    CompanyAddress 		VARCHAR(30),
    CompanyCity			VARCHAR(15),
    CompanyProvince		CHAR(2),
    CompanyPostalCode 	CHAR(6),
    PRIMARY KEY(CompanyName));
    
CREATE TABLE VaccinationSite(
    SiteName			VARCHAR(30) NOT NULL,
    SiteAddress			VARCHAR(15),
    SiteCity			VARCHAR(15),
    SiteProvince		CHAR(2),
    SitePostalCode		CHAR(6),
    PRIMARY KEY(SiteName)); 
    
CREATE TABLE VaccineLot(
    ProductionDate		DATE,
    ExpiryDate			DATE,
    LotNumber			CHAR(6) NOT NULL,
    NumDoses			DECIMAL(5,0),
    CompanyName		VARCHAR(20),
    ShippedToSite		VARCHAR(30) NOT NULL,
    PRIMARY KEY(LotNumber),
    FOREIGN KEY(ShippedToSite) REFERENCES VaccinationSite(SiteName) on delete cascade,
    FOREIGN KEY(CompanyName) REFERENCES VaccineCompany(CompanyName) on delete cascade);
    
CREATE TABLE Patient(
    PatientOHIPNum		CHAR(12) NOT NULL,
    PatientName			VARCHAR(20),
    DateOfBirth			DATE,
    VaccinatedAt		DATETIME(0),
    DoseNum			TINYINT(4),
    VaccineLotNum		CHAR(6),
    VaccinationSiteName VARCHAR(30) NOT NULL,
    PRIMARY KEY(PatientOHIPNum),
    FOREIGN KEY(VaccinationSiteName) REFERENCES VaccinationSite(SiteName)on delete cascade);
    
CREATE TABLE Spouse(
    OHIPNum				CHAR(12) NOT NULL,
    SpouseName			VARCHAR(20),
    SpousePhoneNumber	CHAR(10),
    SpouseOHIPNum		CHAR(12) NOT NULL,
    PRIMARY KEY(OHIPNum),
    FOREIGN KEY(SpouseOHIPNum) REFERENCES Patient(PatientOHIPNum) on delete cascade);
    
CREATE TABLE MedicalPractice(
    PracticeName		VARCHAR(30) NOT NULL,
    PracticePhoneNumber	CHAR(10),
    PRIMARY KEY(PracticeName));   
    
CREATE TABLE HealthcareWorker(
    WorkerID			VARCHAR(10) NOT NULL,
    WorkerName			VARCHAR(20),
    Credentials			VARCHAR(10),
    Profession			VARCHAR(6),
    VaccinationSiteName	VARCHAR(30),
    PracticeName		VARCHAR(30),
    PRIMARY KEY(WorkerID),
    FOREIGN KEY(VaccinationSiteName) REFERENCES VaccinationSite(SiteName) on delete cascade,
    FOREIGN KEY(PracticeName) REFERENCES MedicalPractice(PracticeName) on delete cascade);
    
	
insert into VaccineCompany values
("Pfizer","390 Johnson St","Kingston","ON","K7L1Z2"),
("Moderna","2360 Leslie St","Newmarket","ON","L3Y2A3"),
("Astrazeneca","2358 Glover Rd","Langley","BC","V3A1Z3"),
("Johnson&Johnson","1152 Duke St","Montreal","QC","H3C5K4");

insert into VaccinationSite values
("Greendale Community College", "42 Pelton Rd", "Whitby", "ON", "L1R2K5"),
("Willy Wonka's Factory", "812 Chocolate Ave", "Winnipeg", "MN", "R2C0G1"),
("Ajax Community Centre", "75 Centennial Rd", "Ajax", "ON", "L1S4S4"),
("Jesse's House", "15 Crystal Cr", "Montreal", "QC", "H1A1A1"),
("Stirling Hall", "64 Bader Ln", "Kingston", "ON", "K7L 3N6"),
("99th Precinct", "99 Peralta Dr", "Kelowna", "BC", "V1P1B5");
    
insert into VaccineLot values  
("2021-12-25","2022-12-25","PF1234",9000,"Pfizer","Stirling Hall"),
("2021-12-25","2022-12-25","PF1235",9001,"Pfizer","Greendale Community College"),
("2021-10-31","2022-10-31","JJ9998",7890,"Johnson&Johnson","Willy Wonka's Factory"),
("2021-10-31","2022-10-31","JJ9999",7890,"Johnson&Johnson","Jesse's House"),
("2021-12-01","2022-12-01","AZ0424",9776,"Astrazeneca","Ajax Community Centre"),
("2021-12-01","2022-12-01","MD0002",8888,"Moderna","99th Precinct"); 

insert into Patient values
("1234100000WR","Pete Davidson","1990-03-21","2021-12-05 11:11:11", 2, "AZ0424","Jesse's House"),
("1234000001AX","Walter White","1960-09-12","2021-12-07 09:30:01", 1, "MD0002","99th Precinct"),
("1234000002VC","Peter Griffin","1900-01-01","2021-11-20 20:40:59", 2, "JJ9998","Greendale Community College"),
("1234000003PT","Mario Brother","2001-04-24","2021-11-17 14:13:12", 1, "JJ9999","Jesse's House"),
("1234000004BG","Sheldon Cooper","1975-07-17","2021-11-02 12:34:56", 2, "JJ9999","Jesse's House"),
("9999999999XD","Tyler Blevins","1887-02-28","2021-12-31 23:59:59", 2, "PF1234","Greendale Community College");

insert into Spouse values 
("8596473267RQ", "Kimberly Davidson", "9054882323", "1234100000WR"),
("5968123450SA", "Skyler White", "4163204567", "1234000001AX"),
("4059681235OU", "Lois Griffin", "8890043265", "1234000002VC"),
("6950439184FD", "Luigi Brother", "6194567788", "1234000003PT"),
("1948572346LM", "Amy Cooper", "3254863219", "1234000004BG"),
("4958217560HR", "Jessica Blevins", "9057768295", "9999999999XD");

insert into MedicalPractice values 
("The Healing Clinic", "9052954059"),
("Fair Medical Centre", "4163054968"),
("Sports Medicine Clinic", "6194966507"),
("Fortnite Hospital", "9056942847"),
("WishyWave Centre", "4162954857"),
("Not Fake Hospital", "6195555555");

insert into HealthcareWorker values 
("1001001000", "Kermit Thefrog", "MD", "Doctor", "Ajax Community Centre", "Fortnite Hospital"),
("1001001001", "Michelle Michael", "MD", "Doctor", "Jesse's House", "Fortnite Hospital"),
("1001001002", "Sarah Johnson", "PHD, MD", "Doctor", "Stirling Hall","The Healing Clinic"),
("1001001003", "Mike Tyson", "MD", "Doctor", "99th Precinct","Not Fake Hospital"),
("1001001004", "Ben Dover", "RN", "Nurse", "Greendale Community College", NULL),
("1001001005", "Travis Scott", "RN, BSN", "Nurse", "Willy Wonka's Factory", NULL);
