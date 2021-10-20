Set Up Procedure
1. Clone repo from github
2. cd into the project folder from the cmd
3. cd into laradock folder
4. run copy .env.example to .env and to .env.testing
5. run docker-compose up -d nginx mysql phpmyadmin
6. cd the container by running docker-compose exec workspace bash
7. then run php artisan migrate
8. run nvm install 14.17.1
9. run nvm use 14.17.1
8. run npm install
9. run npm run watch
10. on the browser navigate to http://localhost
11. To run test case
    a. in the container bash run php artisan migrate --env=testing
    b. run php artisan test

