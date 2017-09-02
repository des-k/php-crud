create table db_test.passwords (
  `id` int(11) not null auto_increment primary key,
  `host` varchar(100) not null,
  `user` varchar(50) not null,
  `password` varchar(50) not null
) engine=MyISAM;

insert into `passwords` values(1, 'gmail', 'aaaaaa@gmail.com', 'lalalal24');
insert into `passwords` values(2, 'facebook', 'ffffff@gmail.com', 'gogogo434');
insert into `passwords` values(3, 'github', 'ccccccc@gmail.com', 'kukuku11111');
