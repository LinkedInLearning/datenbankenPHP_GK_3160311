

CREATE TABLE `konto` (
  `konto_id` int(11) NOT NULL,
  `name` varchar(255)  NOT NULL,
  `kontostand` int(11) NOT NULL
) ;



INSERT INTO `konto` (`konto_id`, `name`, `kontostand`) VALUES
(1, 'Mia Maier', 4750),
(2, 'Nora Nordpol', 5450);

ALTER TABLE `konto`
  ADD PRIMARY KEY (`konto_id`);


ALTER TABLE `konto`
  MODIFY `konto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

