create database dbname;

use dbname;

//varcharをprimary keyにする場合auto_incrementは書かない
create table tbname (
    customer_id VARCHAR(5) NOT NULL PRIMARY KEY,
    customer_name VARCHAR(50),
    point INT,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
