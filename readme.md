# Cinema Guide App

Cinema Guide App is a simple, Laravel 5 based, RESTful API. Created for mobile applications and web services to access cinema guide listings. Cinema Guide aims to:

   - Respond to the *application/json* media type, and return data in JSON format.
   - Support the ability to get a list of movies playing at a given cinema on a given date.
   - Be fully documented

## JSON Response Structure
The Api responds with JSON. The response will be either a "success" message, an "error" message or a "data" response.
##### Success
```json
   {
      "success": {
         "message": "message here",
         "statusCode": 200
      }
   }
```
##### Error
```json
   {
      "error": {
         "message": "message here",
         "statusCode": 400
      }
   }
```
##### Successful Data Retrieval
This may include a paginator for collections
```json
   {
      "paginator": {
         "total": 20,
         "limit": 5,
         "pagesTotal": 4,
         "pagesCurrent": 1,
         "nextUrl": "http://localhost/CinemaGuideApp/public/api/v1/sessions/?page=2",
         "prevUrl": null
      },
      "data": [
         {
            "id": 1,
            "title": "Hello World!"
         }
      ]
   }
```

## Cinema Resource
Cinema data will be returned in this format:
```json
    {
        "id": 6,
        "name": "Debitis id dolores.",
        "address": "4536 Walton Falls",
        "geo": {
            "latitude": 40.994731,
            "longitude": 143.170495
        }
    }
```
#### Cinema Listings
   - **URL:** "/api/v1/cinemas"
   - **Method:** GET
   - **URL Parameters:** none
      - **Required:** none
      - **Optional:** none
   - **Data Parameters** 
      - **Required:** none
      - **Optional** none
   - **Success Response:** Paginated data response
    
#### Cinema Information
   - **URL:** "/api/v1/cinemas/:id"
   - **Method:** GET
   - **URL Parameters:**
      - **Required:** id=[integer]
      - **Optional:** none
   - **Data Parameters** 
      - **Required:**
      - **Optional**
   - **Success Response:** Single data response

#### Create New Cinema
   - **URL:** "/api/v1/cinemas"
   - **Method:** POST
   - **URL Parameters:**
      - **Required:** none
      - **Optional:** none
   - **Data Parameters** 
      - **Required:** 
         - name=[string]
         - address=[string]
      - **Optional** 
         - geo_lat=[float]
         - geo_long=[float]
   - **Success Response:** Success Message
    
#### Delete Cinema
   - **URL:** "/api/v1/cinemas/:id"
   - **Method:** DELETE
   - **URL Parameters:**
      - **Required:** id=[integer]
      - **Optional:** none
   - **Data Parameters** 
      - **Required:** none
      - **Optional** none
   - **Success Response:** Success Message
    
#### Get Cinema's Sessions
   - **URL:** "/api/v1/cinemas/:id/sessions?:date&:page&:limit"
   - **Method:** GET
   - **URL Parameters:**
      - **Required:** id=[integer]
      - **Optional:** 
         - date=[string] Accepts partial Dates eg. 2014-11
         - page=[integer] pagination offset
         - limit=[integer] pagination limit
   - **Data Parameters** 
      - **Required:** none
      - **Optional** none
   - **Success Response:** Paginated data response

## Movie Resource
Movie data will be returned in this format:
```json
   {
        "id": 6,
        "title": "Doloribus doloribus officia similique."
    }
```
#### Movie Listings
   - **URL:** "/api/v1/movies"
   - **Method:** GET
   - **URL Parameters:** none
      - **Required:** none
      - **Optional:** none
   - **Data Parameters** 
      - **Required:** none
      - **Optional** none
   - **Success Response:** Paginated data response
    
#### Movie Information
   - **URL:** "/api/v1/movies/:id"
   - **Method:** GET
   - **URL Parameters:**
      - **Required:** id=[integer]
      - **Optional:** none
   - **Data Parameters** 
      - **Required:**
      - **Optional**
   - **Success Response:** Single data response

#### Create New Movie
   - **URL:** "/api/v1/movies"
   - **Method:** POST
   - **URL Parameters:**
      - **Required:** none
      - **Optional:** none
   - **Data Parameters** 
      - **Required:** title=[string]
      - **Optional** none
   - **Success Response:** Success Message
    
#### Delete Movie
   - **URL:** "/api/v1/movies/:id"
   - **Method:** DELETE
   - **URL Parameters:**
      - **Required:** id=[integer]
      - **Optional:** none
   - **Data Parameters** 
      - **Required:** none
      - **Optional** none
   - **Success Response:** Success Message
    
#### Get Movie's Sessions
   - **URL:** "/api/v1/movies/:id/sessions?:date&:page&:limit"
   - **Method:** GET
   - **URL Parameters:**
      - **Required:** id=[integer]
      - **Optional:** 
         - date=[timestamp](YYY-MM-DD hh-mm-ss) Accepts partial Dates eg. 2014-11,
         - page=[integer] pagination offset
         - limit=[integer] pagination limit
   - **Data Parameters** 
      - **Required:** none
      - **Optional** none
   - **Success Response:** Paginated data response

## Sessions Resource
Session data will be returned in this format:
```json
   {
      "id": 1,
      "cinema": 3,
      "movie": 2,
      "time": "2014-11-03 16:39:37"
   }
```
#### Sessions Listings
   - **URL:** "/api/v1/sessions"
   - **Method:** GET
   - **URL Parameters:** none
      - **Required:** none
      - **Optional:** none
   - **Data Parameters** 
      - **Required:** none
      - **Optional** none
   - **Success Response:** Paginated data response
    


# Development

##### To do's
   - Add MovieController's Update Method
   - Add CinemasController's Update Method
   - Add SessionTimesController's Store Update Store Delete Methods
      - Make accessible from Movies & Cinemas session routes
   - **Revert:** Switch back to findOrFail (figure out how to handle the global exception)
   - Tidy Up Error Responses in ApiController
      - Add respondData to ApiController, accept transformer and data (cleanup)
      - Extract status codes to constant. Illuminate\Response has constants??
   - Add Authenication to Store Update and Delete requests (create the requests where neccessary)
   - Refactor @sessions. where ??
   - Create a SessionsRequest to handle input validation. (date currently not validated)
   - sessions return movie/cinema query link ??
   - Finish tests classes and testing
      - Needs testing database
      - Need Json evaluation
      - Clean Up
      - assertResponseOk was returning error (eg Undefined Property: MoviesTest::$client ) ???
   - Add Geo-location search to Cinemas
   - Add custom handling for failed requests. Currently redirects to homepage.
   - Return link to new item on Create requests
   - Filtering sessions response can happen anyway (No need for if statement) 

##### Known Issues
   - Failed requests redirect to homepage.
   - Currently testing against production database, produces false errors when testing records etc.
   - findOrFail in the @sessions handlers throws 500 Error.

##### Things to consider
   - Structure of JSON (nested data objects)
   - Consistent URL structure
   - More API URLs to complete cinema data model (eg: location/geo search)
   - Authentication/Authorisation
   - Supporting partial dates
   - Pagination support on cinema listings eg: ?page={number}
   - Input validation
   - Error Handling

##### Data Model
   - **cinemas**           
      - id 
      - name 
      - address
      - geo_lat
      - geo_long
   - **movies**            
      - id
      - title
   - **session_times**     
      - id
      - movie_id
      - cinema_id
      - date_time
   
##### Utilises
   - [Laravel 5](https://github.com/laravel/laravel)
   - [fzaninotto/Faker](https://github.com/fzaninotto/Faker)


## Updates

##### Update 3
   - Refined SessionTimesTransformer (includes cinema and movie data)
   - Added date query to CinemasController@sessions = YYYY-MM-DD hh:mm:ss (eg ?date=2014-11-06 02:51:35)
      -Supports partial dates (eg ?date=11-06)
   - Changed SessionTimesransformer to return cinema_id and movie_id (simpler data)
   - Updated seeds to seed more data all around
   - Added partial date search using mysql 'like' and adding '%' wildcard to input
   - Added respondPaginate to ApiController
   - Changed sessions resource - now only responding to index (Can expand later if needed)
   - Added pagination to movies, cinemas and sessions (eg ?page=2&limit=10)
   - Added basic PhpUnit tests. just tests status codes
   - Added simple versioning - api/v1/etc...
   - **Temporary:** Switched back to in-controller 404 NotFound handling (Cant find where to globally catch findOrFail)
   - Added MoviesController's store and destroy methods
   - Added CinemasController's store and destroy methods

##### Update 2
   - Added resourceful route for cinemas
   - Added resourceful route for sessions (sessionTimes)
   - Added nested sessions routes for cinemas and movies
   - Added CreateMoviesRequest to handle validation & authorisation
   - Added respondValidaionError to ApiController (422 response)
   - Added respondNotFound to ApiController (404 response)
   - Added respondInternalError to ApiController 500 response)
   - Added respondCreated to ApiController (201 response)
   - Added respondDeleted to ApiController (200 response)
   - Refactered Seeds to utilised faker's random
   - Remigrated database with foreign keys
   - Refactor validation into response (out of controller)
   - Remove unused controllers etc.
   - Added simple delete functionality (No Validation)
   - switched to findOrFail 
      - Couldnt figure out laravel 5 global exception handling. (taylor has changed it recently)
   - Defined Eloquent Model (database table) relationships
   - Added some incomplete requests to handle destroy, create etc...
   - Created SessionTimesTransformer Class
   - Created CinemasTransformer Class
   - Changed MovieTransformer to MoviesTransformer Class


##### Update 1
   - Junk Clear out - php artisan fresh
   - Added Faker package to create test data
   - Setup Seeders 
   - Added Eloquent Models for Movies, Cinemas & SessionTimes
   - Added Movies Controller
   - Created ApiController to handle JSON responses and Errors
   - Added App/Http/Transformers folder to store database to api translations
   - Created base Transformer Class
   - Created MovieTransformer Class
   - Removed default csrf middleware & added it to optional 'csrf'
