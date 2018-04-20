INSERT INTO category (CategoryName, IsActive)VALUES
('Motherboard', 1),
('Processor', 1),
('Memory', 1);

INSERT INTO bar_code (BarCode) VALUES
('0002000000000001'),
('0002000000000002'),
('0002000000000003'),
('0002000000000004'),
('0002000000000005'),
('0002000000000006'),
('0002000000000007'),
('0002000000000008'),
('0002000000000009'),
('0002000000000010'),
('0003000000000001'),
('0003000000000002'),
('0003000000000003'),
('0003000000000004'),
('0003000000000005'),
('0003000000000006'),
('0003000000000007'),
('0003000000000008'),
('0003000000000009'),
('0003000000000010'),
('0001000000000001'),
('0001000000000002'),
('0001000000000003'),
('0001000000000004'),
('0001000000000005'),
('0001000000000006'),
('0001000000000007'),
('0001000000000008'),
('0001000000000009'),
('0001000000000010');

INSERT INTO part_number (BarCodeID, PartNumber) VALUES
(1, 'SL9XN'),
(2, 'TMM520DBO22GQ'),
(3, 'SLBQG'),
(4, 'SLBZW'),
(5, 'SLBUK'),
(6, 'SMS3400HAX3CM'),
(7, 'TMRM70DAM22GG'),
(8, 'SLBJG'),
(9, 'SLA4E'),
(10, 'AMM300DBO22GQ'),
(11, 'M470T5663QZ3-CF7'),
(12, 'CT102464BF160B'),
(13, 'CT2K4G3S1339M'),
(14, 'KTD-PE316/16G'),
(15, 'M378T5663EH3'),
(16, 'CT2K16G4SFD8213'),
(17, 'KTH-PL424/32G'),
(18, 'CMK16GX4M2B3000C15'),
(19, 'CMSA16GX3M2A1333C9'),
(20, 'CMR16GX4M2C3200C16'),
(21, 'Z370P D3'),
(22, 'Z270 SLI PLUS'),
(23, '7A36-002R'),
(24, 'GA-F2A68HM-H'),
(25, 'GA-AX370-Gaming 5'),
(26, '78LMT-USB3 R2'),
(27, 'Strix Z370-E Gaming'),
(28, 'Prime Z370-A'),
(29, 'GA-Z97X-UD5H'),
(30, 'B350M PRO-VD PLUS');

INSERT INTO processor (BarCodeID, CategoryID, Quanity, IsNew, IsTested, Brand, Model, Cores, ClockRate, Socket, CodeName) VALUES
(1, 2, 1, 0, 1, 'Intel', 'Celeron', '1', '1.80GHz', 'LGA775', 'Conroe'),
(2, 2, 2, 0, 1, 'AMD', 'Turion II Mobile M520', '2', '2.30GHz', 'S1', 'Caspian'),
(3, 2, 1, 0, 1, 'Intel', 'Core i7 Mobile', '4', '1.73GHz', 'rPGA988A', 'Clarksfield'),
(4, 2, 3, 0, 1, 'Intel', 'Core i5 Mobile', '2', '2.53GHz', 'rPGA988A', 'Arrandale'),
(5, 2, 1, 0, 1, 'Intel', 'Core i3 Mobile', '2', '2.4GHz', 'rPGA988A', 'Arrandale'),
(6, 2, 2, 0, 1, 'AMD', 'Sempron Mobile', '1', '1.80GHz', 'S1', 'Keene'),
(7, 2, 3, 0, 1, 'AMD', 'Turion 64 X2 Mobile', '2', '2.00GHz', 'S1', 'Puma'),
(8, 2, 1, 0, 1, 'Intel', 'Core i7', '4', '2.93GHz', 'LGA1156', 'Lynnfield'),
(9, 2, 2, 0, 1, 'Intel', 'Core 2 Duo Mobile', '2', '1.83GHz', 'p', 'Merom'),
(10, 2, 2, 0, 1, 'AMD', 'Athlon II Mobile', '2', '2.00GHz', 'S1', 'Caspian');

INSERT INTO memory (BarCodeID, CategoryID, Quanity, IsNew, IsTested, Brand, Size, Type, Rate, StandardName, ModuleName, IsLaptop, IsLowVoltage) VALUES
(11, 3, 1, 1, 0, 'Samsung', '2GB', 'DDR2', '800MHz', 'PC2-6400', 'PC2-6400', 1, 0),
(12, 3, 3, 0, 1, 'Crucial', '8GB', 'DDR3', '1600MHz', 'PC3-12800', 'PC3-12800', 1, 1),
(13, 3, 11, 1, 0, 'Crucial', '4GB', 'DDR3', '1333MHz', 'PC3-10600', 'PC3-10600', 0, 1),
(14, 3, 4, 1, 0, 'Kingston', '16GB', 'DDR4', '3200MHz', 'PC4-25600', 'PC4-25600', 0, 0),
(15, 3, 9, 1, 0, 'Samsung', '2GB', 'DDR2', '1600MHz', 'PC2-6400', 'PC2-6400', 0, 1),
(16, 3, 10, 0, 1, 'Crucial', '16GB', 'DDR4', '2100MHz', 'PC4-17000', 'PC4-17000', 1, 1),
(17, 3, 21, 1, 0, 'Kingston', '32GB', 'DDR4', '2400MHz', 'PC4-19200', 'PC4-19200', 1, 1),
(18, 3, 7, 0, 1, 'Corsair', '8GB', 'DDR3', '1600MHz', 'PC3-12800', 'PC3-12800', 1, 0),
(19, 3, 4, 0, 1, 'Corsair', '4GB', 'DDR3', '1600MHz', 'PC3-12800', 'PC3-12800', 0, 1),
(20, 3, 1, 0, 1, 'Corsair', '16GB', 'DDR3', '1600MHz', 'PC3-12800', 'PC3-12800', 1, 1);

INSERT INTO motherboard (BarCodeID, CategoryID, Quanity, IsNew, IsTested, Brand, Model, Revision, FormFactor, CpuBrand, Socket, Chipset) VALUES
(21, 1, 1, 1, 0, 'Gigabyte', 'Z370P D3', 'Rev: 1.0 ', 'ATX', 'Intel', 'LGA1151', 'Z370'),
(22, 1, 1, 0, 1, 'MSI', 'Z270', 'Rev: 1.0 ', 'ATX', 'Intel', 'LGA1151', 'Z270'),
(23, 1, 1, 1, 0, 'MSI', 'B350 TOMAHAWK', 'Rev: 1.0 ', 'ATX', 'AMD', 'AM4', 'B370'),
(24, 1, 1, 1, 0, 'Gigabyte', 'GA-F2A68HM-H', 'Rev: 1.0 ', 'ATX', 'AMD', 'FM2+', 'A68H'),
(25, 1, 1, 1, 0, 'Gigabyte', 'AORUS GA-AX370-Gaming 5', 'Rev: 1.0 ', 'ATX', 'AMD', 'AM4', 'X370'),
(26, 1, 1, 1, 0, 'Gigabyte', '78LMT-USB3 R2', 'Rev: 1.0 ', 'ATX', 'AMD', 'AM3+', '760G'),
(27, 1, 1, 0, 1, 'ASUS', 'ROG STRIX Z370-E GAMING', 'Rev: 1.0 ', 'ATX', 'Intel', 'LGA1151', 'Z370'),
(28, 1, 1, 1, 0, 'ASUS', 'PRIME Z370-A', 'Rev: 1.0 ', 'ATX', 'Intel', 'LGA1151', 'Z370'),
(29, 1, 1, 1, 0, 'Gigabyte', 'GA-Z97X-UD5H', 'Rev: 1.0 ', 'ATX', 'Intel', 'LGA1150', 'Z97'),
(30, 1, 1, 0, 1, 'MSI', 'B350M PRO-VD PLUS', 'Rev: 1.0 ', 'ATX', 'AMD', 'AM4', 'B350');