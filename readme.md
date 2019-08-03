# FoodRecipes Project

This project allows to users insert different ingredients and the system will suggest recipes with available ingredients and will calculate costs for each recipes.  
Additionally allows check recipes history.  

This system was created using PHP 7.2, Laravel 5.8 and MySQL v 5.x


## Setup Environment

### Requirements
* PHP v7.1 or better
* MySQL
* Composer

### Steps
1. Clone this repository using GIT:
`$ git clone git@github.com:eletita/foodrecipeproject.git`
2. Install dependencies: `composer install`
3. Create empty database
4. Create .env file using .env.example file Complete DATABASE information:   
 DB_DATABASE=    
 DB_USERNAME=    
 DB_PASSWORD=   
 with your MySQL settings.
5. Run migrations `php artisan migrate`
6. Run seeds `php artisan db:seed`
