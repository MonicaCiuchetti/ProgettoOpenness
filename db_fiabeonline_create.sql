-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-02-21 18:58:08.093




-- tables
-- Table `Action`
CREATE TABLE `Action` (
    `id` int  NOT NULL,
    `actType` char(2)  NULL,
    `Sequence_seqId` int  NOT NULL,
    `Card_id` int  NOT NULL,
    CONSTRAINT `Action_pk` PRIMARY KEY (`id`)
);

-- Table `ActionPropp`
CREATE TABLE `ActionPropp` (
    `id` int  NOT NULL,
    `actTypePropp` char(2)  NULL,
    `SequenceType_id` int  NOT NULL,
    `CardType_id` int  NOT NULL,
    CONSTRAINT `ActionPropp_pk` PRIMARY KEY (`id`)
);

-- Table `Card`
CREATE TABLE `Card` (
    `id` int  NOT NULL,
    `cardDescription` varchar(25)  NULL,
    `cardFront` varchar(40)  NULL,
    `CardType_id` int  NOT NULL,
    CONSTRAINT `Card_pk` PRIMARY KEY (`id`)
);

-- Table `CardType`
CREATE TABLE `CardType` (
    `id` int  NOT NULL,
    `ctDescritpion` varchar(25)  NULL,
    `ctBack` varchar(50)  NULL,
    CONSTRAINT `CardType_pk` PRIMARY KEY (`id`)
);

-- Table `Genre`
CREATE TABLE `Genre` (
    `id` int  NOT NULL,
    `genreDescription` varchar(30)  NULL,
    CONSTRAINT `Genre_pk` PRIMARY KEY (`id`)
);

-- Table `Log`
CREATE TABLE `Log` (
    `id` int  NOT NULL,
    `logTIme` timestamp  NULL,
    `logDescription` varchar(30)  NULL,
    `User_id` int  NOT NULL,
    CONSTRAINT `Log_pk` PRIMARY KEY (`id`)
);

-- Table `Sequence`
CREATE TABLE `Sequence` (
    `seqId` int  NOT NULL,
    `seqText` text  NULL,
    `seqOrder` int  NULL,
    `Tale_id` int  NOT NULL,
    `SequenceType_id` int  NOT NULL,
    CONSTRAINT `Sequence_pk` PRIMARY KEY (`seqId`)
);

-- Table `SequenceType`
CREATE TABLE `SequenceType` (
    `id` int  NOT NULL,
    `stDescritpion` varchar(20)  NULL,
    `stColor` varchar(8)  NULL,
    CONSTRAINT `SequenceType_pk` PRIMARY KEY (`id`)
);

-- Table `Tale`
CREATE TABLE `Tale` (
    `id` int  NOT NULL,
    `taleTitle` varchar(30)  NULL,
    `taleAuthor` varchar(30)  NOT NULL,
    `taleVersion` varchar(15)  NOT NULL,
    `taleDate` date  NULL,
    `taleUpdate` date  NOT NULL,
    `taleNotes` varchar(30)  NOT NULL,
    `taleScore` int  NULL,
    `User_id` int  NOT NULL,
    `Type_id` int  NOT NULL,
    CONSTRAINT `Tale_pk` PRIMARY KEY (`id`)
);

-- Table `TaleGenre`
CREATE TABLE `TaleGenre` (
    `id` int  NOT NULL,
    `Tale_id` int  NOT NULL,
    `Genre_id` int  NOT NULL,
    CONSTRAINT `TaleGenre_pk` PRIMARY KEY (`id`)
);

-- Table `Type`
CREATE TABLE `Type` (
    `id` int  NOT NULL,
    `typeDescription` varchar(30)  NULL,
    CONSTRAINT `Type_pk` PRIMARY KEY (`id`)
);

-- Table `User`
CREATE TABLE `User` (
    `id` int  NOT NULL,
    `username` varchar(25)  NULL,
    `password` varchar(64)  NULL,
    `email` varchar(60)  NULL,
    `isActive` bool  NULL,
    `salt` varchar(40)  NULL,
    `level` int  NULL,
    `score` int  NULL,
    `birthday` date  NULL,
    CONSTRAINT `User_pk` PRIMARY KEY (`id`)
);





-- foreign keys
-- Reference:  `ActionPropp_CardType` (table: `ActionPropp`)

ALTER TABLE `ActionPropp` ADD CONSTRAINT `ActionPropp_CardType` FOREIGN KEY `ActionPropp_CardType` (`CardType_id`)
    REFERENCES `CardType` (`id`);
-- Reference:  `ActionPropp_SequenceType` (table: `ActionPropp`)

ALTER TABLE `ActionPropp` ADD CONSTRAINT `ActionPropp_SequenceType` FOREIGN KEY `ActionPropp_SequenceType` (`SequenceType_id`)
    REFERENCES `SequenceType` (`id`);
-- Reference:  `Action_Card` (table: `Action`)

ALTER TABLE `Action` ADD CONSTRAINT `Action_Card` FOREIGN KEY `Action_Card` (`Card_id`)
    REFERENCES `Card` (`id`);
-- Reference:  `Action_Sequence` (table: `Action`)

ALTER TABLE `Action` ADD CONSTRAINT `Action_Sequence` FOREIGN KEY `Action_Sequence` (`Sequence_seqId`)
    REFERENCES `Sequence` (`seqId`);
-- Reference:  `Card_CardType` (table: `Card`)

ALTER TABLE `Card` ADD CONSTRAINT `Card_CardType` FOREIGN KEY `Card_CardType` (`CardType_id`)
    REFERENCES `CardType` (`id`);
-- Reference:  `Log_User` (table: `Log`)

ALTER TABLE `Log` ADD CONSTRAINT `Log_User` FOREIGN KEY `Log_User` (`User_id`)
    REFERENCES `User` (`id`);
-- Reference:  `Sequence_SequenceType` (table: `Sequence`)

ALTER TABLE `Sequence` ADD CONSTRAINT `Sequence_SequenceType` FOREIGN KEY `Sequence_SequenceType` (`SequenceType_id`)
    REFERENCES `SequenceType` (`id`);
-- Reference:  `Sequence_Tale` (table: `Sequence`)

ALTER TABLE `Sequence` ADD CONSTRAINT `Sequence_Tale` FOREIGN KEY `Sequence_Tale` (`Tale_id`)
    REFERENCES `Tale` (`id`);
-- Reference:  `TaleGenre_Genre` (table: `TaleGenre`)

ALTER TABLE `TaleGenre` ADD CONSTRAINT `TaleGenre_Genre` FOREIGN KEY `TaleGenre_Genre` (`Genre_id`)
    REFERENCES `Genre` (`id`);
-- Reference:  `TaleGenre_Tale` (table: `TaleGenre`)

ALTER TABLE `TaleGenre` ADD CONSTRAINT `TaleGenre_Tale` FOREIGN KEY `TaleGenre_Tale` (`Tale_id`)
    REFERENCES `Tale` (`id`);
-- Reference:  `Tale_Type` (table: `Tale`)

ALTER TABLE `Tale` ADD CONSTRAINT `Tale_Type` FOREIGN KEY `Tale_Type` (`Type_id`)
    REFERENCES `Type` (`id`);
-- Reference:  `Tale_User` (table: `Tale`)

ALTER TABLE `Tale` ADD CONSTRAINT `Tale_User` FOREIGN KEY `Tale_User` (`User_id`)
    REFERENCES `User` (`id`);



-- End of file.

