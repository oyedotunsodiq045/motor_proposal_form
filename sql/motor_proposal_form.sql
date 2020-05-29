DROP DATABASE motor_proposal_form;

CREATE DATABASE motor_proposal_form;

CREATE TABLE `motor_proposal_form`.`motor_proposal_form_corporate` 
(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name_of_firm` VARCHAR(100) NOT NULL,
    `business_address` VARCHAR(100) NOT NULL,
    `town` VARCHAR(100) NOT NULL,
    `city` VARCHAR(100) NOT NULL,
    `state` VARCHAR(100) NOT NULL,
    `country` VARCHAR(100) NOT NULL,
    `registration_number` VARCHAR(100) NOT NULL,
    `registration_date` VARCHAR(100) NOT NULL,
    `registration_state` VARCHAR(100) NOT NULL,
    `registration_country` VARCHAR(100) NOT NULL,
    `business_phone` VARCHAR(100) NOT NULL,
    `fax` VARCHAR(100) NOT NULL,
    `url` VARCHAR(100) NOT NULL,
    `tin` VARCHAR(100) NOT NULL,
    `bvn` VARCHAR(100) NOT NULL,
    `risk_address` VARCHAR(100) NOT NULL,
    `cover_type` VARCHAR(100) NOT NULL,
    `cover_period` VARCHAR(100) NOT NULL,
    `property_value` VARCHAR(100) NOT NULL,
    `beneficiary` VARCHAR(100) NOT NULL,
    `other_policy` VARCHAR(100) NOT NULL,
    `director_one` VARCHAR(100) NOT NULL,
    `director_two` VARCHAR(100) NOT NULL,
    `director_three` VARCHAR(100) NOT NULL,
    `certificate_of_incorporation` VARCHAR(100) NOT NULL,
    `memorandum` VARCHAR(100) NOT NULL,
    `cac_forms` VARCHAR(100) NOT NULL,
    `proof_of_address` VARCHAR(100) NOT NULL,
    `valid_id` VARCHAR(100) NOT NULL,
    `vehicle_type` VARCHAR(100) NOT NULL,
    `cover_required` VARCHAR(100) NOT NULL,
    `period_from` VARCHAR(100) NOT NULL,
    `period_to` VARCHAR(100) NOT NULL,
    `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `sign_of_proposal` VARCHAR(100) NOT NULL,
    `name_of_proposal` VARCHAR(100) NOT NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `motor_proposal_form`.`motor_proposal_form_individual` 
(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name_of_proposal_one` VARCHAR(100) NOT NULL,
    `address` VARCHAR(100) NOT NULL,
    `town` VARCHAR(100) NOT NULL,
    `city` VARCHAR(100) NOT NULL,
    `state` VARCHAR(100) NOT NULL,
    `country` VARCHAR(100) NOT NULL,
    `business_phone` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `fax` VARCHAR(100) NOT NULL,
    `url` VARCHAR(100) NOT NULL,
    `tin` VARCHAR(100) NOT NULL,
    `bvn` VARCHAR(100) NOT NULL,
    `risk_address` VARCHAR(100) NOT NULL,
    `cover_type` VARCHAR(100) NOT NULL,
    `cover_period` VARCHAR(100) NOT NULL,
    `property_value` VARCHAR(100) NOT NULL,
    `beneficiary` VARCHAR(100) NOT NULL,
    `other_policy` VARCHAR(100) NOT NULL,
    `means_of _id` VARCHAR(100) NOT NULL,
    `proof_of_address` VARCHAR(100) NOT NULL,
    `vehicle_type` VARCHAR(100) NOT NULL,
    `cover_required` VARCHAR(100) NOT NULL,
    `period_from` VARCHAR(100) NOT NULL,
    `period_to` VARCHAR(100) NOT NULL,
    `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `sign_of_proposal` VARCHAR(100) NOT NULL,
    `name_of_proposal_two` VARCHAR(100) NOT NULL,
PRIMARY KEY (`id`) 
);

CREATE TABLE `motor_proposal_form`.`motor_vehicle_inspection_form` 
(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name_of_proposer` VARCHAR(100) NOT NULL,
    `address` VARCHAR(100) NOT NULL,
    `registration_number` VARCHAR(100) NOT NULL,
    `vehicle_make` VARCHAR(100) NOT NULL,
    `vehicle_colour` VARCHAR(100) NOT NULL,
    `chassis_number` VARCHAR(100) NOT NULL,
    `engine_number` VARCHAR(100) NOT NULL,
    `body_type` VARCHAR(100) NOT NULL,
    `manufacture_year` VARCHAR(100) NOT NULL,
    `speedometer_reading` VARCHAR(100) NOT NULL,
    `estimate_value` VARCHAR(100) NOT NULL,
    `accessory_value` VARCHAR(100) NOT NULL,
    `anti_theft` VARCHAR(100) NOT NULL,
    `previous_damage` VARCHAR(100) NOT NULL,
    `inspection_time` VARCHAR(100) NOT NULL,
    `remarks` VARCHAR(100) NOT NULL,
    `inspector_name` VARCHAR(100) NOT NULL,
    `inspector_sign` VARCHAR(100) NOT NULL,
    `insured_name` VARCHAR(100) NOT NULL,
    `insured_sign` VARCHAR(100) NOT NULL,
    `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `inspection_location` VARCHAR(100) NOT NULL,
    `vehicle_front` VARCHAR(100) NOT NULL,
    `vehicle_back` VARCHAR(100) NOT NULL,
    `vehicle_left` VARCHAR(100) NOT NULL,
    `vehicle_right` VARCHAR(100) NOT NULL,
PRIMARY KEY (`id`) 
);