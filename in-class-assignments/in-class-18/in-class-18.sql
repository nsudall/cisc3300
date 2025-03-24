CREATE DATABASE `in-class-17`;

CREATE TABLE `users`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `username`      varchar(80) NOT NULL,
    primary key (`id`)
);

-- create student addresses table, student has one
CREATE TABLE `userComments`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `comment`   varchar(254) NOT NULL,
--     foreign key
    `userID` int(11) NOT NULL,
    primary key (`id`)
);

insert into users (username)
values ('happy25');
insert into users (username)
values ('bsmith47');
insert into users (username)
values ('jdoe2');
insert into users (username)
values ('ljackson53');

insert into userComments (comment, userID)
values ('I loved this product', 2);
insert into userComments (comment, userID)
values ('I hated this product', 4);
insert into userComments (comment, userID)
values ('This product sucks', 4);

select * from users left join userComments on users.id = userComments.userID;
select * from users join userComments on users.id = userComments.userID;
