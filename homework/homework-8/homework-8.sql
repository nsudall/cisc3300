CREATE DATABASE `homework-8`;

CREATE TABLE `notes`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `title`      varchar(80) NOT NULL,
    `description`      text NOT NULL,
    primary key (`id`)
);

insert into notes (title, description)
values ('Note 1', 'This is the description of the first note');
insert into notes (title, description)
values ('Note 2', 'This is the description of the second note');
insert into notes (title, description)
values ('Note 3', 'This is the description of the third note');
insert into notes (title, description)
values ('Note 4', 'This is the description of the forth note');

delete from notes where id = 3;

update notes SET title = 'Note 3' where id = 1;
update notes SET description = 'This is now the description of the third note' where id = 1;

select * from notes order by title desc;
select * from notes limit 1 offset 1;
select * from notes where description like '%a%' or description like '%e%' or description like '%i%'
or description like '%o%' or description like '%u%';
