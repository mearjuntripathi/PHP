# PHP
PHP project
## Chat Application

### mysql commands (for creating a database related topic)

        CREATE TABLE users (userid INT(10) NOT NULL AUTO_INCREMENT , name VARCHAR(50) NOT NULL , username VARCHAR(50) NOT NULL , password VARCHAR(50) NOT NULL , pp VARCHAR(50) NOT NULL DEFAULT 'user.png' , last_seen DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (userid), UNIQUE (username));


        CREATE TABLE conversation (conversation_id INT(11) NOT NULL AUTO_INCREMENT , user_1 INT(11) NOT NULL , user_2 INT(11) NOT NULL , PRIMARY KEY (conversation_id));


        CREATE TABLE chats (chat_id INT(11) NOT NULL AUTO_INCREMENT , from_id INT(11) NOT NULL , to_id INT(11) NOT NULL , message TEXT NOT NULL  , opened TINYINT NOT NULL DEFAULT 0, created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (chat_id)) ;



![Chat On Banner](https://example.com/path/to/banner.png)

Welcome to Chat On, a simple PHP-based chat application that allows users to communicate in real-time. This repository contains the source code for the application.

## Table of Contents

- [Introduction](#introduction)
- [Documentation](#documentation)
- [Demo](#demo)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Introduction

Chat On is a PHP chat application designed to facilitate real-time communication between users. It provides a basic yet functional chat interface where users can send and receive messages instantly.

## Documentation

For detailed information about how to set up and use the Chat On application, please refer to the [Documentation](https://drive.google.com/file/d/1yZ89-FOlpTBnWFvUOLTc_KjDv_wkU4yR/view?usp=share_link).

## Demo

Check out the live demo of the Chat On application: [Live Demo](https://greatchatson.000webhostapp.com/)

## Installation

To set up the Chat On application locally, follow these steps:

1. Clone this repository:
   ```sh
   git clone https://github.com/mearjuntripathi/PHP.git

