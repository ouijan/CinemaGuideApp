# Cinema Guide App

Cinema Guide App is a simple, Laravel 5 based, RESTful API. Created for mobile applications and web services to access cinema guide listings. Cinema Guide aims to:

   - Respond to the *application/json* media type, and return data in JSON format.
   - Support the ability to get a list of movies playing at a given cinema on a given date.
   - Be fully documented
   

## API Documentation

#### Cinema Info
|Method         |Route                  |Description                |
|:--------------|:----------------------|:--------------------------|
|GET            |/cinemas               |Cinema Listings            |
|POST           |/cinemas               |Create New Cinema          |
|GET            |/cinemas/{cinemas}     |Cinema Information         |
|PUT/PATCH      |/cinemas/{cinemas}     |Update Cinema              |
|DELETE         |/cinemas/{cinemas}     |Destroy Cinema             |

#### Movie Info
|Method         |Route                  |Description                |
|:--------------|:----------------------|:--------------------------|
|GET            |/movies                |Movies Listings            |
|POST           |/movies                |Create New Movie           |
|GET            |/movies/{movies}       |Movie Information          |
|PUT/PATCH      |/movies/{movies}       |Update Movie               |
|DELETE         |/movies/{movies}       |Destroy Movie              |



## Development

##### Todo's
   - Finish MoviesController
   - Setup resourceful routes for Cinemas
   - Define Eloquent Model (database table) relationships
   - Setup error response (no query results)
   - Seperate API structure from database structure
   - Remove unused controllers etc.
   - Create Transformers for Cinemas
   - Flesh out Error Responses in ApiController

##### Things to consider
   - Structure of JSON (nested data objects)
   - Consistent URL structure
   - More API URLs to complete cinema data model (eg: location/geo search)
   - Authentication/Authorisation
   - Supporting partial dates
   - Pagination support on cinema listings eg: ?page={number}
   - Input validation
   - Error Handling
   - 

##### Data Model
   - **cinemas**           - id, name, address, geo_lat, geo_long
   - **movies**            - id, title
   - **session_times**     - id, movie_id, cinema_id, date_time
   - 
   
##### Utilises
   - [Laravel 5](https://github.com/laravel/laravel)
   - [fzaninotto/Faker](https://github.com/fzaninotto/Faker)


## Updates

##### Update 1
   - Junk Clear out - php artisan fresh
   - Added Faker package to create test data
   - Setup Seeders 
   - Added Eloquent Models for Movies, Cinemas & SessionTimes
   - Added Movies Controller
   - Created ApiController to handle JSON responses and Errors
   - Added App/Http/Transformers folder to store database to api translations
   - Created base Transformer Class
   - Created MoveTransformer Class
   - Removed default csrf middleware & added it to optional 'csrf'
