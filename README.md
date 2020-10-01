<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Local Development Server
```php
php artisan serve
```

## MySQL Tables
```mysql
CREATE TABLE `Program` (
	`program_id` VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
	`program_title` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
	PRIMARY KEY (`program_id`)
);
```

```mysql
CREATE TABLE `Campus` (
	`campus_id` VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
	`campus_name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
	PRIMARY KEY (`campus_id`)
);
```

```mysql
CREATE TABLE `Client` (
	`cna` VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
	`program_id` VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
	`campus_id` VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
	`password` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    `permission_type` INT NOT NULL DEFAULT '0',
	`first_name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
	`last_name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
	`chinese_name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
	`book_quota` INT NOT NULL,
	PRIMARY KEY (`cna`),
    CONSTRAINT FK_ProgramID FOREIGN KEY (`program_id`) REFERENCES Program(`program_id`), 
    CONSTRAINT FK_CampusID FOREIGN KEY (`campus_id`) REFERENCES Campus(`campus_id`)
);
```
