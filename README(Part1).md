# TravelBlog

## Notes about running

1. All the js/css files are included into css/dist/js folders. No other imports are needed. (I use bootstrap, highcharts and d3 for the maps.)
2. In order to run the website, the server has to be started in the main folder of the project (to get around the cross-origin request issue with fetching my GeoJSON data)
 * if you have npm installed, just run _npm intall -g http-server_ and then use _http-server_ command to run it. default should be *localhost:8080*
 * or use python -m SimpleHTTPServer

## Notes about implementation

1. The submit form is displayed at each country page (accessed through the map click) and it submits ratings that user selects and sends an email to my pitt address (yvl2@pitt.edu). I use google script to do it - https://github.com/dwyl/html-form-send-email-via-google-script-without-server
2. Map implementation: I draw an svg map based on GeoJSON data file (see maps folder). I am biding data of those countries to the clickable paths using d3's enter/update pattern. (index.js)
3. As of now, each country has its own page and its own js for a graph.
4. I use a plugin to display star rating (overwritten with my layer to display start according to the style of my website) - http://plugins.krajee.com/star-rating/demo

## Next phase notes

1. I have functionalities that have the same template but different data. Need to find a way to re-use the templates:
 * Country pages htmls
 * Country pages graphs (js)
2. Need to store the ratings submitted by the user and live update the overall scores/graphs based on submission.
3. Need to figure out how to resize the map on the main page to make it a little bigger and maybe change size depending on the browser
4. Add more graphs if possible.
