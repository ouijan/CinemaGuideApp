# Cinema Guide App

Cinema Guide App is a simple, Laravel 5 based, RESTful API for mobile applications and web services to access cinema guide listings. Cinema Guide aims to:

   - Respond to the *application/json* media type, and return data in JSON format.
   - Support the ability to get a list of movies plaing at a given cinema on a given date.
   - Be fully documented
   


## Development

##### Todo's
   - Migrate database
   - Setup routes


##### Data Model
   - **cinemas**           - id, name, address, geo_lat, geo_long
   - **movies**            - id, title
   - **session_times**     - id, movie_id, cinema_id, date_time
   - 
   
##### API Specifications
   - Cinemas Listing = /cinemas
   - Cinema Information = /cinemas/{name}
   - Movie Information = /movies/{name}
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
   - 