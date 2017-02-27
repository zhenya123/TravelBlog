# TravelBlog

## Notes about running

1. All the js/css files are included into css/dist/js folders. No other imports are needed. (I use bootstrap, highcharts and d3 for the maps.)
2. In order to run the website, the server has to be started in the main folder of the project (to get around the cross-origin request issue with fetching my GeoJSON data)
 * if you have npm installed, just run npm intall -g http-server and then use http-server command to run it. default should be localhost:8080
 * or use python -m SimpleHTTPServer 

## Next phase notes

1. I have functionalities that have the same template but different data. Need to find a way to re-use the templates:
 * Country pages htmls
 * Country pages graphs (js)
2. Need to store the ratings submitted by the user and live update the overall scores/graphs based on submission.
3. Need to figure out how to resize the map on the main page to make it a little bigger and maybe change size depending on the browser
4. Add more graphs if possible.
