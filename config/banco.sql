drop database if exists benfeitoria;

create database benfeitoria;

use benfeitoria;

create table urls(
    idurls integer auto_increment primary key,
    url varchar(255) not null,
    datacriacao datetime
);

create table listaitens(
    idlistaitens integer auto_increment primary key,
    item varchar(255),
    urls_idurls integer,
    foreign key(urls_idurls) references urls(idurls)
);

