# Yêu cầu
Xây dựng 1 CSDL, viết chương trình so sánh chi phí thời gian thực hiện các thao tác: select, insert, update, delete giữa 5 mô hình

1. SQL (SQL server)

2. NoSQL (cặp khóa - giá trị): Redis, MemcacheDB

3. NoSQL(hướng tài liệu): MongoDB, Couchbase

4. NoSQL(hướng cột): Cassandra, HBase(Hadoop)

5. NoSQL(đồ thị): OrientDB, Neo4J

http://nosql-database.org/

https://www.digitalocean.com/community/tutorials/a-comparison-of-nosql-database-management-systems-and-models
# Ngôn ngữ
PHP

# Framework Codeigniter
https://codeigniter.com

https://codeigniter.com/user_guide/


# Database

1. SQL: SQL server

2. NoSQL (cặp khóa - giá trị): Redis, MemcacheDB

3. NoSQL(hướng tài liệu): MongoDB, Couchbase

4. NoSQL(hướng cột): Cassandra, HBase(Hadoop)

5. NoSQL(đồ thị): OrientDB, Neo4J


# How to install
1. Install Xampp(https://www.apachefriends.org/index.html) and run Xampp
=> Configure virtual host(http://foundationphp.com/tutorials/apache_vhosts.php) with virtual domain: http://dev.sql-nosql-ci.com/

2. Install Git(https://git-scm.com/)

3. Go to /xampp/htdocs directory and git clone project:

4. git clone https://github.com/rinodung/sql-nosql-ci.git

5. Rename application/config/database-sample.php to application/config/database.php

6. Run Xampp and access: http://dev.sql-nosql-ci.com/


# How to Run
1. Set max_execution_time=300000 in php.ini
2. Set memory_limit=-1
3. Install MongoDB https://www.mongodb.org/downloads?_ga=1.64492399.1718628405.1456847965#production
4. Install dll library for MongoDB on Windows https://pecl.php.net/package/mongo
5. Copy version.dll to driver and enable extension=mongo_db.dll
6. Run mongoDB with command line: mongod
7. Start Xampp (copy the libsasl.dll found in my php installation directory to the apache installation directory )
 