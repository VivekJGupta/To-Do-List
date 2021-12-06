# ToDoList
It has basic CRUD operation with print functionality. Technologies: HTML, Bootstrap5, PHP and MySQL

MySQL Database
 host: 'localhost',
 user: 'root',
 password: ''
 database: 'vivek',
 table: 'task'
  
  
+------------+--------------+------+-----+-------------------+----------------+
| Field      | Type         | Null | Key | Default           | Extra          |
+------------+--------------+------+-----+-------------------+----------------+
| id         | int(11)      | NO   | PRI | NULL              | auto_increment |
| title      | varchar(100) | YES  |     | NULL              |                |
| created_at | timestamp    | NO   |     | CURRENT_TIMESTAMP |                |
| reminder   | datetime     | YES  |     | NULL              |                |
| note       | varchar(500) | YES  |     | NULL              |                |
+------------+--------------+------+-----+-------------------+----------------+
 
 
