Set Up Procedure
1. Clone repo from github
2. cd into the project folder from the cmd
3. cd into laradock folder
4. run copy .env.example to .env and to .env.testing
5. Config your database credential in the .env
6. run docker-compose up -d nginx mysql phpmyadmin
7. Once step 6 is done, run docker ps to get the url to phpmyadmin
8. Login to phpmyadmin with server: mysql, user: root, password:root
9. Create a database as named in the MYSQL_DATABASE in the .env file
10. cd the container by running docker-compose exec workspace bash
11. then run php artisan migrate
12. run nvm install 14.17.1
13. run nvm use 14.17.1
14. run npm install
15. run npm run watch
16. on the browser navigate to http://localhost
17. To run test case
    a. in the container bash run php artisan migrate --env=testing
    b. run php artisan test

