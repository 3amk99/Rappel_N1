Create Database if not exists blog_db;
use blog_db;

create table if not exists users (
    id int primary key auto_increment,
    username varchar(50) not null unique,
    status enum('author', 'viewer') default 'viewer',
    created_at timestamp default current_timestamp

);

create table if not exists category(
    id int primary key auto_increment,
    name varchar(50) not null unique,
    created_at timestamp default current_timestamp
);

create table if not exists images (
    id int primary key auto_increment,
    image_url varchar(255) not null,
    created_at timestamp default current_timestamp
);

create table if not exists articles (
    id int primary key auto_increment,
    user_id int not null,
    title varchar(100) not null,
    content text not null,
    category_id int,
    image_id int,
    created_at timestamp default current_timestamp,
    foreign key (user_id) references users(id) on delete cascade,
    foreign key (category_id) references category(id) on delete set null,
    foreign key (image_id) references images(id) on delete set null

);