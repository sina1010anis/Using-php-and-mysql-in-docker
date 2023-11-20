# User manual

```bash
# install and run php:apache
docker run -d -p 80:80 -p 443:443 -v /:/var/www/html php:apache

docker cp project_1 <mycontainer:php>:/var/www/html/project_1

docker exec -it <mycontainer:php> bash

docker restart <mycontainer:php>
```

```bash
# install and run Mysql 
docker run -d -p 3306:3306 -e MYSQL_PASSWORD=password -e MYSQL_DATABASE=php_docker -e MYSQL_ALLOW_EMPTY_PASSEORD=1 -e MYSQL_ROOT_PASSWORD=password mysql:latest

docker inspect <mycontainer:mysql>
```

```bash
# install and run Phpmyadmin
docker run -d -p 8001:80 -e PMA_HOST=<IPAddress Mysql> -e PMA_PORT=3306 phpmyadmin/phpmyadmin
```

# Docker Compose:
```bash 
# Docker Compose
version: '3.7'
services: 
  wwww:
    image: php:apache
    volumes: 
      - "./:/var/www/html"
    ports:
      - 8080:80
      - 443:443
  db:
    image: mysql:latest
    environment:
      - MYSQL_DATABASE=php_docker
      - MYSQL_PASSWORD=password
      - MYSQL_ALLOW_EMPTY_PASSWORD=1
      - MYSQL_ROOT_PASSWORD=password
    ports:
      - 3306:3306      
  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    ports:
      - 8081:80
    environment:
      - PMA_PORT=3306
      - PMA_HOST=db
```

# For Use:
Open the browser and go to the address (localhost).
