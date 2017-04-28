# TravelBlog

## Notes about running

1. All the js/css files are included into css/dist/js folders. No other imports are needed. (I use bootstrap, highcharts and d3 for the maps.)
2. I used XAMPP to create this website and the database. I am not sure how exactly database should be transferred with XAMPP, so I am submitting my database file in database folder (db_travel) as well as SQL to create this database manually and populate with data in case it doesn't work through just simple file. Sorry about that inconvenience!

## Notes about implementation

1. The submit form is displayed at each country page (accessed through the map click) and it submits ratings to the MySQL database and updates the average rating on the page
2. To display the map, an svg map is drawn based on GeoJSON data file (see maps folder). I am biding data of those countries to the clickable paths using d3's enter/update pattern. (index.js)
3. There's only only one country page (country.php) now that is dynamically filled based on country selected on the map. (passed through GET)
4. I use a plugin to display star rating (overwritten with my layer to display start according to the style of my website) - http://plugins.krajee.com/star-rating/demo
5. Clicking on each country, sends get request with the info about the page
6. I use highcharts to display the graphs that get their values from the database
