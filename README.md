# Symfony 5 REST API

### Prerequisites

What things you need to install the software and how to install them.
- PHP 8.0
- [composer](https://getcomposer.org/download/)
- [symfony](https://symfony.com/doc/current/setup.html)
- docker

### Step 1: Create project already existed
```bash
git clone git@github.com:tinhthanhvo/ecommerce-website-api.git
cd ecommerce-website-api
```
### Step 2: Start docker + use container docker environment
```bash
docker-compose up -d
docker exec -it application bash
```
### Step 3: Install require
```bash
composer install
```

### EXAMPLE - CALL API