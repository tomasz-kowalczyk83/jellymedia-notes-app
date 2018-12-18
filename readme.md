# Getting started

## Installation

Install all the dependencies using composer

    composer install

Start the local development server

    vagrant up

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

You can now access the server at http://jellymedia-notes-app   

### TODO:
- [x] add Note resource
- [x] Note CRUD
- [x] notes db table
-----------------------------------------
- [ ] Note sorting
- [ ] Note tagging/categorising
- [x] Note archiving (soft-deleting)
- [ ] Export note/s to a file
-----------------------------------------
- [x] basic front-end (bootstrap 4)
- [ ] vueJS notes module and axios for ajax calls
