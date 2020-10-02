Hi all,
My name is Prudhvi,
This repository for credit management portal.

About Portal:
The link for the website : http://prudhviscreditmanagementapp.atwebpages.com/homepage.php

This is hosted as free sub domain at awardspace. This website consists of total three visible pages and links for the same:
http://prudhviscreditmanagementapp.atwebpages.com/transactions.php
http://prudhviscreditmanagementapp.atwebpages.com/transfer.php
http://prudhviscreditmanagementapp.atwebpages.com/homepage.php

The first page is homepage.php, which shows the users table
and second page(transfer.php) is used for transfer, The third one(transactions.php) is used to show transactions.

Database description:
--
-- Database name: `creditmanagement`
--

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `users`
--
 create table users(id int not null auto_increment primary key, user_name varchar(40) not null, user_email varchar(255), current_credit float not null)engine=InnoDB default charset=utf8mb4;

 --
 -- Data in `users` table
 --
insert into users(user_name,user_email,current_credit) values("Prudhvi","prudhvi@gmail.com",800),("Honey","honey@gmail.com",1000),("Praveena","praveena@gmail.com",700),("Siva","siva@gmail.com",150),("janvi","janvi@gmail.com",300),("Sai","sai@gmail.com",400),("Siri","siri@gmail.com",600),("Mahesh","mahesh@gmail.com",200),("Kumari","kumari@gmail.com",600),("Reddy","reddy@gmail.com",700);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--
 create table transactions(trans_id int auto_increment,from_id int,to_id int,transfered_amount float,primary key(trans_id),constraint `from_id_key` foreign key (from_id) references users(id),constraint `to_id_key` foreign key(to_id) references users(id))engine=InnoDB default charset=utf8mb4;