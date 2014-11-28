# Cinema Guide App

Cinema Guide App is a simple, Laravel 5 based, RESTful API. Created for mobile applications and web services to access cinema guide listings. Cinema Guide aims to:

   - Respond to the *application/json* media type, and return data in JSON format.
   - Support the ability to get a list of movies playing at a given cinema on a given date.
   - Be fully documented
   

## API Documentation

#### Cinema Info
|Method     |Route                     |Description                |
|:----------|:-------------------------|:--------------------------|
|GET        |/cinemas                  |Cinema Listings            |
|POST       |/cinemas                  |Create New Cinema          |
|GET        |/cinemas/{id}             |Cinema Information         |
|PUT/PATCH  |/cinemas/{id}             |Update Cinema              |
|DELETE     |/cinemas/{id}             |Destroy Cinema             |
|GET        |/cinemas/{id}/sessions    |Sessions at cinema         |

```json
   {
      "id": 1,
      "name": "Ut iusto temporibus.",
      "address": "27607 Brown Skyway Apt. 887",
      "geo": {
         "latitude": -8.713891,
         "longitude": -151.931623
      }
   }
```

#### Movie Info
|Method     |Route                     |Description                |
|:----------|:-------------------------|:--------------------------|
|GET        |/movies                   |Movies Listings            |
|POST       |/movies                   |Create New Movie           |
|GET        |/movies/{id}              |Movie Information          |
|PUT/PATCH  |/movies/{id}              |Update Movie               |
|DELETE     |/movies/{id}              |Destroy Movie              |
|GET        |/movies/{id}/sessions     |Sessions of Movie          |

```json
   {
      "id": 1,
      "title": "Voluptas fugiat reprehenderit."
   }
```

#### Session Info
|Method     |Route                     |Description                |
|:----------|:-------------------------|:--------------------------|
|GET        |/sessions                 |Session Listings           |
|GET        |/sessions/{id}            |Session Information        |

```json
   {
      "id": 1,
      "cinema": "Officia non et.",
      "movie": "Adipisci aut doloremque.",
      "time": "2014-10-28 13:05:51"
   }
```

#### JSON response Structure
```json
   {
      "success (OR) error": {
         "message": "message here",
         "statusCode": 200
      },
      "data": [
         {
            // etc
         }
      ]
   }

```


## Development

##### Todo's
   - Finish MoviesController - update
   - Finish CinemasController - update store destroy
   - Tidy Up Error Responses in ApiController
      - refactor all responses to include success(message & code) OR error(message & code) as well as data
      - Extract status codes to constant. Illuminate\Response has constants??
   - Inject Validation to Update and Delete requests
   - Add Authenication
   - Research: onDelete & onUpdate foreign key paramas
   - Setup error response (no query results)
      - Add global exceptions (error handling) & switch to findOrFail
   - Ensure reponse is to application/json requests ( isJson ??)


##### Known Issues
   - ~~Failed validation redirects to homepage.~~ Validation temporarily removed
   - ~~application/json request failed validation (redirect to homepage)~~ Validation temporarily removed
   - Cant access DELETE routes when trying to inject a request handler eg. DestroyMoviesRequest
   - 

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
   - **cinemas**           - id, name, address, geo_lat, geo_long
   - **movies**            - id, title
   - **session_times**     - id, movie_id, cinema_id, date_time
   - 
   
##### Utilises
   - [Laravel 5](https://github.com/laravel/laravel)
   - [fzaninotto/Faker](https://github.com/fzaninotto/Faker)


## Updates

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
