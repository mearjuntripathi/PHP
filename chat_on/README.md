# PHP
PHP project
## Chat Application

#### mysql commands 
<pre>
CREATE TABLE users (userid INT(10) NOT NULL AUTO_INCREMENT , name VARCHAR(50) NOT NULL , username VARCHAR(50) NOT NULL , password VARCHAR(50) NOT NULL , pp VARCHAR(50) NOT NULL DEFAULT 'user.png' , last_seen DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (userid), UNIQUE (username));


CREATE TABLE conversation (conversation_id INT(11) NOT NULL AUTO_INCREMENT , user_1 INT(11) NOT NULL , user_2 INT(11) NOT NULL , PRIMARY KEY (conversation_id));


CREATE TABLE chats (chat_id INT(11) NOT NULL AUTO_INCREMENT , from_id INT(11) NOT NULL , to_id INT(11) NOT NULL , message TEXT NOT NULL  , opened TINYINT NOT NULL DEFAULT 0, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (chat_id)) ;
</pre>
