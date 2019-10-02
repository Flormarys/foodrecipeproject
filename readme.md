# FoodRecipes Project

If you are one of the people who every day wonders what to cook, or do not know what to do with some items that you have available in your cupboard, this system is designed especially for you!

**'FoodRecipes'** allows users to enter the ingredients that they have within their reach or that they brought from the warehouse with their respective quantities and what they pay for each one, through an API they will make the suggestion of recipes according to the user's available ingredients , with their respective cost per recipe according to the quantities and price of the ingredients used


## Setup Environment

### Requirements
* PHP v7.1 or better
* MySQL
* Composer

### Steps  
1. Clone this repository using GIT:
    `$ git clone git@github.com:eletita/foodrecipeproject.git`

2. Change to the new folder `foodrecipeproject`

2. Install dependencies:
    `composer install`

3. Create in the same path `.env` file using `.env.example`, and complete DATABASE information:   
```
    DB_DATABASE=    
    DB_USERNAME=    
    DB_PASSWORD=  
```
   with your MySQL settings.

4. Run `php artisan db:create`, this will create a empty Database with the same name that you setted in the step 3.

5. Run migrations `php artisan migrate` to create all tables needed.

6. Run `php artisan db:seed` to seed the Database, and create a user:
```
User: test@user.com
Password: user1234
```

7. Use `php artisan key:generate` to set your application key to a random string.

8. Run `php artisan serve` this command will start a development server at http://localhost:8000:
