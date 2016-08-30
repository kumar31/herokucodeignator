<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Migration_Initial_db_import extends CI_Migration {
  public function up() {
    $this->db->query( "
    -- CREATE TABLE `USERS` ------------------------------------
    CREATE TABLE IF NOT EXISTS `USERS` ( 
      `ID` Int( 11 ) AUTO_INCREMENT NOT NULL,
      `EMAIL` VarChar( 255 ) NOT NULL,
      `PASSWORD` VarChar( 255 ) NOT NULL,
      PRIMARY KEY ( `ID` ) )
    ENGINE = InnoDB
    AUTO_INCREMENT = 7;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `added_talents` ----------------------------
    CREATE TABLE IF NOT EXISTS `added_talents` ( 
      `addid` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `client_id` Int( 100 ) NOT NULL,
      `talent_id` VarChar( 255 ) NOT NULL,
      PRIMARY KEY ( `addid` ) )
    ENGINE = InnoDB
    AUTO_INCREMENT = 1;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `admin` ------------------------------------
    CREATE TABLE IF NOT EXISTS `admin` ( 
      `admin_id` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `username` VarChar( 255 ) NOT NULL,
      `password` VarChar( 255 ) NOT NULL,
      PRIMARY KEY ( `admin_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 2;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `agent_details` ----------------------------
    CREATE TABLE IF NOT EXISTS `agent_details` ( 
      `agent_id` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `name` VarChar( 255 ) NOT NULL,
      `email` VarChar( 255 ) NOT NULL,
      `address` VarChar( 255 ) NOT NULL,
      `password` VarChar( 255 ) NOT NULL,
      `percentage` VarChar( 10 ) NOT NULL,
      `outfit_fee` VarChar( 255 ) NOT NULL,
      `stripe_id` VarChar( 255 ) NOT NULL,
      `bank_id` VarChar( 255 ) NOT NULL,
      `recp_id` VarChar( 255 ) NOT NULL,
      `card_fname` VarChar( 255 ) NOT NULL,
      `card_lname` VarChar( 255 ) NOT NULL,
      `routing_number` VarChar( 255 ) NOT NULL,
      `account_number` VarChar( 255 ) NOT NULL,
      `tax_id` VarChar( 255 ) NOT NULL,
      `status` Int( 10 ) NOT NULL COMMENT '1=active,2=inactive',
      PRIMARY KEY ( `agent_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 6;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `agent_payment_details` --------------------
    CREATE TABLE IF NOT EXISTS `agent_payment_details` ( 
      `agent_payment_details_id` Int( 10 ) AUTO_INCREMENT NOT NULL,
      `talent_id` Int( 100 ) NOT NULL,
      `event_id` Int( 100 ) NOT NULL,
      `agent_id` Int( 100 ) NOT NULL,
      `transaction_id` VarChar( 255 ) NOT NULL,
      `description` Text NOT NULL,
      `amount` VarChar( 100 ) NOT NULL,
      `datetime` DateTime NOT NULL,
      PRIMARY KEY ( `agent_payment_details_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 15;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `checkin` ----------------------------------
    CREATE TABLE IF NOT EXISTS `checkin` ( 
      `checkinid` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `event_id` Int( 100 ) NOT NULL,
      `client_id` Int( 100 ) NOT NULL,
      `talent_id` Int( 100 ) NOT NULL,
      `agent_id` Int( 100 ) NOT NULL,
      `checkin_datetime` DateTime NOT NULL,
      `checkout_datetime` DateTime NOT NULL,
      `number_of_days` Int( 100 ) NOT NULL,
      `number_of_hours` Int( 100 ) NOT NULL,
      `number_of_minutes` Int( 100 ) NOT NULL,
      `comments` Text NOT NULL,
      `checkin_status` Int( 10 ) NOT NULL COMMENT '0 - checkdin, 1 - checkedout , 2 - talent agreed, 3 - talent requested recheck',
      `talent_rating` Int( 100 ) NOT NULL,
      `payment_status` Int( 255 ) NOT NULL COMMENT '0 - not paid, 1 - paid',
      PRIMARY KEY ( `checkinid` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 3;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `client_details` ---------------------------
    CREATE TABLE IF NOT EXISTS `client_details` ( 
      `client_id` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `email` VarChar( 255 ) NOT NULL,
      `password` VarChar( 255 ) NOT NULL,
      `first_name` VarChar( 255 ) NOT NULL,
      `last_name` VarChar( 255 ) NOT NULL,
      `profile_url` VarChar( 255 ) NOT NULL,
      `phone_number` VarChar( 255 ) NOT NULL,
      `gender` Int( 100 ) NOT NULL COMMENT '0 - female, 1 - male',
      `company` VarChar( 255 ) NOT NULL,
      `address` VarChar( 255 ) NOT NULL,
      `postal_code` VarChar( 255 ) NOT NULL,
      `latitude` VarChar( 255 ) NOT NULL,
      `longitude` VarChar( 255 ) NOT NULL,
      `email_verification` Int( 10 ) NOT NULL COMMENT '0 - Not verified, 1 - Verified',
      `phone_verification` Int( 10 ) NOT NULL COMMENT '0 - Not verified, 1 - Verified',
      `phone_verification_code` Int( 255 ) NOT NULL,
      `login_type` VarChar( 255 ) NOT NULL,
      `facebook_id` VarChar( 255 ) NOT NULL,
      `stripe_id` VarChar( 255 ) NOT NULL,
      `date` DateTime NOT NULL,
      `email_notification` Int( 10 ) NOT NULL COMMENT '0 - No, 1 - Yes',
      `email_frequency` VarChar( 255 ) NOT NULL COMMENT 'No.of emails',
      `status` Int( 10 ) NOT NULL COMMENT ' 0 - Inactive, 1 - Active, 2 - Closed',
      `deviceid` VarChar( 255 ) NOT NULL,
      `devicetype` VarChar( 255 ) NOT NULL,
      PRIMARY KEY ( `client_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 4;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `client_payment_details` -------------------
    CREATE TABLE IF NOT EXISTS `client_payment_details` ( 
      `client_payment_details_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
      `client_id` Int( 100 ) NOT NULL,
      `event_id` Int( 100 ) NOT NULL,
      `no_of_talents_requested` VarChar( 255 ) NOT NULL,
      `no_of_talents_hired` Int( 100 ) NOT NULL,
      `transaction_id` VarChar( 255 ) NOT NULL,
      `description` Text NOT NULL,
      `amount` Float( 12, 0 ) NOT NULL,
      `datetime` DateTime NOT NULL,
      `date` Date NOT NULL,
      PRIMARY KEY ( `client_payment_details_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 3;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `device` -----------------------------------
    CREATE TABLE IF NOT EXISTS `device` ( 
      `deviceautoid` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `client_id` VarChar( 255 ) NOT NULL,
      `deviceid` VarChar( 255 ) NOT NULL,
      `devicetype` VarChar( 255 ) NOT NULL,
      PRIMARY KEY ( `deviceautoid` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 1;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `event_detail` -----------------------------
    CREATE TABLE IF NOT EXISTS `event_detail` ( 
      `event_id` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `client_id` Int( 100 ) NOT NULL,
      `email` VarChar( 255 ) NOT NULL,
      `first_name` VarChar( 255 ) NOT NULL,
      `last_name` VarChar( 255 ) NOT NULL,
      `event_name` VarChar( 255 ) NOT NULL,
      `event_pic` VarChar( 255 ) NOT NULL,
      `event_contact` VarChar( 255 ) NOT NULL,
      `start_datetime` DateTime NOT NULL,
      `end_datetime` DateTime NOT NULL,
      `location` VarChar( 255 ) NOT NULL,
      `locality` VarChar( 255 ) NOT NULL,
      `sublocality` VarChar( 255 ) NOT NULL,
      `borough` VarChar( 255 ) NOT NULL,
      `district` VarChar( 255 ) NOT NULL,
      `state` VarChar( 255 ) NOT NULL,
      `country` VarChar( 255 ) NOT NULL,
      `postalcode` VarChar( 255 ) NOT NULL,
      `latitude` VarChar( 255 ) NOT NULL,
      `longitude` VarChar( 255 ) NOT NULL,
      `number_of_guests` VarChar( 255 ) NOT NULL,
      `description` Text NOT NULL,
      `starting_instructions` Text NOT NULL,
      `uniform` Int( 10 ) NOT NULL COMMENT '1 - black tie, 2 - white shirt black tie, 3 - custom',
      `uniform_description` Text NOT NULL,
      `uniform_image` VarChar( 255 ) NOT NULL,
      `uniform_provided` Int( 10 ) NOT NULL COMMENT '0 - No ,1 - Yes',
      `event_type` VarChar( 255 ) NOT NULL,
      `talent_type` VarChar( 255 ) NOT NULL COMMENT '1= Employee,2=Contractors',
      `number_of_waiters` VarChar( 255 ) NOT NULL,
      `talent_requested_for` VarChar( 255 ) NOT NULL,
      `is_advance_paid` Int( 100 ) NOT NULL COMMENT '0 - not paid, 1 - paid',
      `open_to_all` Int( 100 ) NOT NULL COMMENT '0 - yes, 1 - handpicked',
      `status` Int( 10 ) NOT NULL COMMENT '0 - Open, 1 - Close, 2 - Delete',
      `launch_status` Int( 10 ) NOT NULL COMMENT '0 - Not launched, 1 - launched',
      `refund_status` Int( 11 ) NOT NULL COMMENT '0 - not , 1 - refunded',
      `launch_datetime` DateTime NOT NULL,
      PRIMARY KEY ( `event_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 7;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `event_review` -----------------------------
    CREATE TABLE IF NOT EXISTS `event_review` ( 
      `event_review_id` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `event_id` Int( 100 ) NOT NULL,
      `talent_id` Int( 100 ) NOT NULL,
      `review_star` Int( 100 ) NOT NULL,
      `review_comments` Text NOT NULL,
      `datetime` DateTime NOT NULL,
      PRIMARY KEY ( `event_review_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 1;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `event_type` -------------------------------
    CREATE TABLE IF NOT EXISTS `event_type` ( 
      `event_type_id` Int( 10 ) AUTO_INCREMENT NOT NULL,
      `name` VarChar( 255 ) NOT NULL,
      `percentage` VarChar( 10 ) NOT NULL,
      `status` Int( 11 ) NOT NULL DEFAULT '1' COMMENT '0=active,1=inactive',
      PRIMARY KEY ( `event_type_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 1;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `faq` --------------------------------------
    CREATE TABLE IF NOT EXISTS `faq` ( 
      `faq_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
      `question` Text NOT NULL,
      `answer` Text NOT NULL,
      PRIMARY KEY ( `faq_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 25;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `fb` ---------------------------------------
    CREATE TABLE IF NOT EXISTS `fb` ( 
      `fb_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
      `facebook_id` VarChar( 255 ) NOT NULL,
      `login_type` VarChar( 100 ) NOT NULL,
      `email` VarChar( 255 ) NOT NULL,
      `first_name` VarChar( 255 ) NOT NULL,
      `last_name` VarChar( 255 ) NOT NULL,
      `profile_url` VarChar( 255 ) NOT NULL,
      `latitude` VarChar( 255 ) NOT NULL,
      `longitude` VarChar( 255 ) NOT NULL,
      `date` DateTime NOT NULL,
      `typeid` Int( 100 ) NOT NULL,
      PRIMARY KEY ( `fb_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 1;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `invite_talent_to_event` -------------------
    CREATE TABLE IF NOT EXISTS `invite_talent_to_event` ( 
      `invite_id` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `event_id` Int( 100 ) NOT NULL,
      `client_id` Int( 100 ) NOT NULL,
      `talent_id` Int( 100 ) NOT NULL,
      `agent_id` Int( 100 ) NOT NULL,
      `client_reject_reason` Text NOT NULL,
      `talent_reject_reason` Text NOT NULL,
      `status` Int( 10 ) NOT NULL COMMENT '0 - New, 1 - Talent accept, 2 - Talent reject, 3 - Client Hired, 4 - Client reject, 5 - Talent apply, 6  - Client closed',
      `datetime` DateTime NOT NULL,
      `start_datetime` DateTime NOT NULL,
      `end_datetime` DateTime NOT NULL,
      PRIMARY KEY ( `invite_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 6;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `payment_details` --------------------------
    CREATE TABLE IF NOT EXISTS `payment_details` ( 
      `paymentid` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `client_id` Int( 100 ) NOT NULL,
      `event_id` Int( 100 ) NOT NULL,
      `amount` VarChar( 255 ) NOT NULL,
      PRIMARY KEY ( `paymentid` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 1;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `support` ----------------------------------
    CREATE TABLE IF NOT EXISTS `support` ( 
      `supportid` Int( 10 ) AUTO_INCREMENT NOT NULL,
      `email` VarChar( 255 ) NOT NULL,
      `message` Text NOT NULL,
      PRIMARY KEY ( `supportid` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 1;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `talent_details` ---------------------------
    CREATE TABLE IF NOT EXISTS `talent_details` ( 
      `talent_id` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `email` VarChar( 255 ) NOT NULL,
      `password` VarChar( 255 ) NOT NULL,
      `first_name` VarChar( 255 ) NOT NULL,
      `last_name` VarChar( 255 ) NOT NULL,
      `user_name` VarChar( 255 ) NOT NULL,
      `profile_url` VarChar( 255 ) NOT NULL,
      `pic1` VarChar( 255 ) NOT NULL,
      `pic2` VarChar( 255 ) NOT NULL,
      `w9_form` VarChar( 255 ) NOT NULL,
      `w4_form` VarChar( 255 ) NOT NULL,
      `i9_form` VarChar( 255 ) NOT NULL,
      `phone_number` VarChar( 255 ) NOT NULL,
      `dob` VarChar( 255 ) NOT NULL,
      `address` Text NOT NULL,
      `city` VarChar( 255 ) NOT NULL,
      `zipcode` VarChar( 255 ) NOT NULL,
      `country` VarChar( 255 ) NOT NULL,
      `company` VarChar( 255 ) NOT NULL,
      `experience` Text NOT NULL,
      `special_skills` VarChar( 255 ) NOT NULL,
      `gender` VarChar( 255 ) NOT NULL COMMENT '0 - female, 1 - male, 2 - other',
      `hair_color` VarChar( 255 ) NOT NULL,
      `eye_color` VarChar( 255 ) NOT NULL,
      `height` VarChar( 100 ) NOT NULL,
      `languages` VarChar( 255 ) NOT NULL,
      `amount` Int( 100 ) NOT NULL,
      `total_events_attended` Int( 100 ) NOT NULL,
      `average_rating` Int( 100 ) NOT NULL,
      `reg_type` VarChar( 255 ) NOT NULL COMMENT '1= Employee,2=Contractors',
      `agency` Int( 100 ) NOT NULL,
      `timezone` VarChar( 255 ) NOT NULL,
      `email_notification` Int( 10 ) NOT NULL COMMENT '0 - No , 1 - Yes',
      `email_frequency` Int( 100 ) NOT NULL COMMENT 'No. of email counts',
      `latitude` VarChar( 255 ) NOT NULL,
      `longitude` VarChar( 255 ) NOT NULL,
      `email_verification` Int( 10 ) NOT NULL COMMENT '0 - Not verified, 1 - Verified',
      `phone_verification` Int( 10 ) NOT NULL COMMENT '0 - Not verified, 1 - Verified',
      `phone_verification_code` VarChar( 255 ) NOT NULL,
      `login_type` VarChar( 255 ) NOT NULL,
      `facebook_id` VarChar( 255 ) NOT NULL,
      `stripe_id` VarChar( 100 ) NOT NULL,
      `bank_id` VarChar( 255 ) NOT NULL,
      `recp_id` VarChar( 255 ) NOT NULL,
      `card_fname` VarChar( 255 ) NOT NULL,
      `card_lname` VarChar( 255 ) NOT NULL,
      `routing_number` VarChar( 255 ) NOT NULL,
      `account_number` VarChar( 255 ) NOT NULL,
      `tax_id` VarChar( 255 ) NOT NULL,
      `date` DateTime NOT NULL,
      `status` Int( 10 ) NOT NULL COMMENT ' 0 - Active, 1 - InActive, 2 - Closed',
      `deviceid` VarChar( 255 ) NOT NULL,
      `devicetype` VarChar( 255 ) NOT NULL,
      PRIMARY KEY ( `talent_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 3;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `talent_hourly_pay` ------------------------
    CREATE TABLE IF NOT EXISTS `talent_hourly_pay` ( 
      `talent_hourly_pay_id` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `per_hour` VarChar( 255 ) NOT NULL,
      `outfit_fee` VarChar( 255 ) NOT NULL,
      `stripe_fee` VarChar( 255 ) NOT NULL,
      `agent_fee` VarChar( 255 ) NOT NULL,
      PRIMARY KEY ( `talent_hourly_pay_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 2;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `talent_payment_details` -------------------
    CREATE TABLE IF NOT EXISTS `talent_payment_details` ( 
      `talent_payment_details_id` Int( 10 ) AUTO_INCREMENT NOT NULL,
      `talent_id` Int( 100 ) NOT NULL,
      `event_id` Int( 100 ) NOT NULL,
      `agent_id` Int( 100 ) NOT NULL,
      `transaction_id` VarChar( 255 ) NOT NULL,
      `description` Text NOT NULL,
      `amount` VarChar( 100 ) NOT NULL,
      `datetime` DateTime NOT NULL,
      PRIMARY KEY ( `talent_payment_details_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 3;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `talent_review` ----------------------------
    CREATE TABLE IF NOT EXISTS `talent_review` ( 
      `talent_review_id` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `event_id` Int( 100 ) NOT NULL,
      `client_id` Int( 100 ) NOT NULL,
      `talent_id` Int( 100 ) NOT NULL,
      `review_star` Int( 100 ) NOT NULL,
      `review_comments` Text NOT NULL,
      `datetime` DateTime NOT NULL,
      PRIMARY KEY ( `talent_review_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 1;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `timeline` ---------------------------------
    CREATE TABLE IF NOT EXISTS `timeline` ( 
      `timeline_id` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `event_id` Int( 100 ) NOT NULL,
      `talent_id` Int( 100 ) NOT NULL,
      `client_id` Int( 100 ) NOT NULL,
      `number_of_days` Int( 100 ) NOT NULL,
      `number_of_hours` Int( 100 ) NOT NULL,
      `number_of_minutes` Int( 100 ) NOT NULL,
      `comments` Text NOT NULL,
      `datetime` DateTime NOT NULL,
      `status` Int( 11 ) NOT NULL COMMENT ' 0 - New, 1 - Approved, 2 - Rejected',
      PRIMARY KEY ( `timeline_id` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 1;
    -- ---------------------------------------------------------
    " );


    $this->db->query( "
    -- CREATE TABLE `type` -------------------------------------
    CREATE TABLE IF NOT EXISTS `type` ( 
      `typeid` Int( 100 ) AUTO_INCREMENT NOT NULL,
      `type` Int( 100 ) NOT NULL COMMENT '1 - Client, 2 - Talent',
      PRIMARY KEY ( `typeid` ) )
    ENGINE = MyISAM
    AUTO_INCREMENT = 1;
    -- ---------------------------------------------------------
    " );
  }

  public function down() {
    throw new Exception( 'This migration is irreversible ' . __FILE__ );
  }
}
