# Laravel 8 Ecommerce Project

For the design and UI, we will use Bootstrap.
For the authentication, we'll use JetStream and Livewire

To create a new project type: `composer create-project --prefer-dist laravel/laravel laravel8ecommerce`

Get into the project director and install livewire: `composer require livewire/livewire`

Go to phpMyAdmin and create a database for the project

Modify the `.env` file in the project

Next we'll create the layout file in the project-> go to resources/ directory views/ and create a new folder layouts/ -> then create a new file in the layouts/ called `base.blade.php`

Then add the index.html template file into it

Use `@livewireStyles` to activate styles and `@livewireScripts`

-   create a livewire component for the home page: `php artisan make:livewire HomeComponent`
-   open the home component file and edit the `render()` method by adding the name of the layout
-   Next, create a route for the home component: go to `web.php`
    -   add the class name of the file
    -   add the route

## Implement admin settings

## Send order email

-   make component `php artisan make:mail OrderMail`

## Add shopping cart using database

-   create migration for shopping cart `php artisan vendor:publish --provider="Gloudemans\Shoppingcart\ShoppingcartServiceProvider" --tag="migrations"`
-   then migrate

## persist wishlist from database

## Create sub categories

-   create model and migration `php artisan make:model Subcategory`

## show products by subcategory

-   add a migration file `php artisan make:migration add_subcategory_id_to_products_table --table=products`

## add subcategory on product add and edit page

## create user profile

-   create model and migration

## update user profile

-   make component `php artisan make:livewire user/UserEditProfile`
