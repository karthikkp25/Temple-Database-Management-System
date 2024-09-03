-- Manager Table
CREATE TABLE Manager (
    ManagerID INT PRIMARY KEY,
    ManagerName VARCHAR(255),
    ContactNumber VARCHAR(15),
    Email VARCHAR(255),
    Address VARCHAR(255),
    Username VARCHAR(50),
    Password VARCHAR(50)
);

-- Priest Table
CREATE TABLE Priest (
    PriestID INT PRIMARY KEY,
    PriestName VARCHAR(255),
    ContactNumber VARCHAR(15),
    Email VARCHAR(255),
    Address VARCHAR(255),
    PoojaExpertise VARCHAR(255),
    Salary DECIMAL(10, 2)
);

-- Seva Table
CREATE TABLE Seva (
    SevaID INT PRIMARY KEY,
    SevaName VARCHAR(255),
    Description TEXT,
    Duration INT,
    Cost DECIMAL(10, 2),
    PriestID INT,
    Date DATE,
    FOREIGN KEY (PriestID) REFERENCES Priest(PriestID)
);

-- Marriage Hall Table
CREATE TABLE MarriageHall (
    HallID INT PRIMARY KEY,
    HallName VARCHAR(255),
    Capacity INT,
    Amenities TEXT,
    BookingDate DATE,
    BookingTime TIME,
    ManagerID INT,
    FOREIGN KEY (ManagerID) REFERENCES Manager(ManagerID)
);

-- Special Events Table
CREATE TABLE SpecialEvents (
    EventID INT PRIMARY KEY,
    EventName VARCHAR(255),
    Description TEXT,
    Date DATE,
    Time TIME,
    Venue VARCHAR(255),
    ManagerID INT,
    FOREIGN KEY (ManagerID) REFERENCES Manager(ManagerID)
);
