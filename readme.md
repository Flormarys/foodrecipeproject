# FoodRecipes Project

If you are someone who every day wonders about what to cook, or do not know what to do with some items that you have available in your cupboard, this web app is the right one for you!

**'FoodRecipes'** allows users to upload the ingredients they have available at home or that they just brought from the store, with their quantities and what they paid for each item, through an API, the app will make suggestions of recipes according to the user's available ingredients , with their respective cost per recipe according to the quantities and price of the ingredients used.


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
