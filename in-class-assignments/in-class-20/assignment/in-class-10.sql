CREATE DATABASE `posts`;

CREATE TABLE `posts`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `username`      varchar(80) NOT NULL,
    `commentPost`      text NOT NULL,
    primary key (`id`)
);

insert into posts (username, commentPost)
values ('jdoe', 'I own chickens');

insert into posts (username, commentPost)
values ('lsmith', 'I need to buy eggs');

insert into posts (username, commentPost)
values ('swhite', 'I sell chicken feed');