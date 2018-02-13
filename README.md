# Colibri admin project template

Basic Skeletton to build a Colibri based application with an [admin interface](https://github.com/ColibriPlatform/admin).

## 1. Install

```bash
composer global require "fxp/composer-asset-plugin:^1.3.1"
composer create-project --stability dev colibri-platform/project-admin
```

## 2. Run

```bash
cd project-admin && ./yii serve
```

## 3. Finish install

This step create configuration file, DB tables and admin user.

Simply go to http://127.0.0.1:8080/ in your browser and follow instructions.