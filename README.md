# Resource Router
Composer Package for Wild Alaskan Company Assessment

# Usage
* Create resource routes by inserting them into 'routes/resources.php'
  * Naming Conventions:
    * Parameters will be separated by the dot '.' delimiter
      * Parameters will be defaulted to the parameter name postfixed with '_pk' (IE. posts => posts_pk)
    * Controller name must match the string entered for the resource route (IE. users.posts => UsersPostsController)

Route Creation Example:
```
Route::resource('posts');
Route::resource('users.posts');
Route::resource('categories.posts');
```

Routes
```
+--------+----------+---------------------------------------------+------+--------------------------------------------------------+------------+
| Domain | Method   | URI                                         | Name | Action                                                 | Middleware |
+--------+----------+---------------------------------------------+------+--------------------------------------------------------+------------+
|        | GET|HEAD | categories/{categories_pk}/posts            |      | App\Http\Controllers\CategoriesPostsController@index   |            |
|        | POST     | categories/{categories_pk}/posts            |      | App\Http\Controllers\CategoriesPostsController@store   |            |
|        | DELETE   | categories/{categories_pk}/posts/{posts_pk} |      | App\Http\Controllers\CategoriesPostsController@destroy |            |
|        | PUT      | categories/{categories_pk}/posts/{posts_pk} |      | App\Http\Controllers\CategoriesPostsController@update  |            |
|        | GET|HEAD | categories/{categories_pk}/posts/{posts_pk} |      | App\Http\Controllers\CategoriesPostsController@show    |            |
|        | GET|HEAD | posts                                       |      | App\Http\Controllers\PostsController@index             |            |
|        | POST     | posts                                       |      | App\Http\Controllers\PostsController@store             |            |
|        | GET|HEAD | posts/{posts_pk}                            |      | App\Http\Controllers\PostsController@show              |            |
|        | DELETE   | posts/{posts_pk}                            |      | App\Http\Controllers\PostsController@destroy           |            |
|        | PUT      | posts/{posts_pk}                            |      | App\Http\Controllers\PostsController@update            |            |
|        | POST     | users/{users_pk}/posts                      |      | App\Http\Controllers\UsersPostsController@store        |            |
|        | GET|HEAD | users/{users_pk}/posts                      |      | App\Http\Controllers\UsersPostsController@index        |            |
|        | DELETE   | users/{users_pk}/posts/{posts_pk}           |      | App\Http\Controllers\UsersPostsController@destroy      |            |
|        | GET|HEAD | users/{users_pk}/posts/{posts_pk}           |      | App\Http\Controllers\UsersPostsController@show         |            |
|        | PUT      | users/{users_pk}/posts/{posts_pk}           |      | App\Http\Controllers\UsersPostsController@update       |            |
+--------+----------+---------------------------------------------+------+--------------------------------------------------------+------------+
```

# Classes
## ResourceRouteProvider
* Responsible for creating the 'routes/routes.php' file if not already created and registering all routes contained within the file.

## Route
* Responsible for creating the resource routes based upon the assessment specifications.
