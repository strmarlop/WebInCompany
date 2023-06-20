# Interview management - Symfony Project
## Description
This project evaluates technical competencies in web development using the Symfony framework.
The idea of the project is to manage the different interviews of a user.

## Requirements
Before you start, make sure you have the following items installed:
  - PHP (version 7.2 ou supérieure)
  - Composer (https://getcomposer.org/)
  - Symfony CLI (https://symfony.com/download)
  - Node.js et NPM (https://nodejs.org/)

## Functionalities to implement:
  - Create a login system that allows a registered user to log in to their account.
  - Create a registration system that allows a new user to create a new account.
  - Implement the functionalities for a CRUD on a specific entity of your choice.
  - Allow the creation, update, show and delete of elements of that entity.

## Installation
  1. Clone the current repository
  2. Move into the directory and create an `.env.local` file from your `.env` file. Add your database parameters and the name of the database
  3. Run `composer install` to install dependencies and run `yarn install` to install assets dependencies
  4. Run `symfony console doctrine:database:create` to create the database
  5. Run `symfony console doctrine:migrations:migrate` to execute migrations and create tables
  6. Run `symfony console doctrine:fixtures:load` to import the fixtures into the database
  7. Run `yarn build` and `yarn dev-server` to launch Webpack
  8. Run the Symfony webserver with `symfony server:start`
  9. Open your browser and go to `localhost:8000`

## Missing point
### Register
When registering a user, I have not been able to get the user to be automatically logged in once registered.
The application forces the user to log in again.
