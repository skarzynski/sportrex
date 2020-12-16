# sportrex
A simple part of the project at university

## How to start

Below, you can find a checklist that will help you to start working on this project.

- Clone the repository
```bash
git clone git@github:username/repository.git folder-name
```
- Change directory to your project
```bash
cd ~/path/to/your/app
```
- Get all vendors / composer dependencies
```bash
composer install
```
- Install your node modules
```bash
npm install
```
- Set your environment configuration
```
cp .env.example .env
```
Now you have to fill .env file with your configuration data, e.g. database type, username.
- Generate your APP_KEY
```bash
php artisan key:generate
```
- Migrate the database (maybe seed some example data)
```bash
php artisan migrate
```
or if any seeders exist and you want to use it
```bash
php artisan migrate --seed
```
