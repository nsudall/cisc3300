CREATE DATABASE `homework-10`;

CREATE TABLE `items`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `name`      varchar(80) NOT NULL,
    `type`      varchar(80) NOT NULL,
    `price`      DECIMAL(6, 2) NOT NULL,
    `description`      text NOT NULL,
    primary key (`id`)
);

insert into items (name, type, price, description)
values ('Cutlery', 'Kitchenware', 6.99, 'A 12 piece matching spoon, knife, fork set');
insert into items (name, type, price, description)
values ('Painting', 'Decor', 79.99, 'A 18x24 inch oil on canvas');
insert into items (name, type, price, description)
values ('Mixer', 'Kitchenware', 249.99, 'A lightly used stand mixer');
insert into items (name, type, price, description)
values ('Sweater', 'Clothes', 23.49, 'A white chunky knit sweater, size L');
insert into items (name, type, price, description)
values ('Pan Set', 'Kitchenware', 59.49, 'A 4 piece stanless steel set');
insert into items (name, type, price, description)
values ('Dress', 'Clothes', 31.99, 'A light blue sundress, size M');
insert into items (name, type, price, description)
values ('Mirror', 'Decor', 49.99, 'A full length mirror');