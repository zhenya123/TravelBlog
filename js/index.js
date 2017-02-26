var width = 1248,
  height = 650;

var myCountries = {
  'US': true,
  'BY': true,
  'RU': true,
  'CA': true,
};

var visitiedDefColor = '#4E8098'
var visitedHovColor = '#75485E'//'#F2E94E'
var notVisitiedDefColor = '#CED3DC'
var notVisitedHovColor = '#8EAEBD'

// creates projection
var projection = d3.geoCylindricalStereographic().translate([width/2, height/2]);

var path = d3.geo.path().projection(projection);

var svg = d3.select('.container')
  .append('svg')
  .attr('width', width)
  .attr('height', height);


d3.json('../maps/world.json', function(json) {
  for (var j = 0; j < json.features.length; j++)  {
    var countryCode = json.features[j].properties.ISO2;
    if (myCountries[countryCode]) {
      json.features[j].properties.visited = true;
    }
  }

  svg.selectAll('path')
    .data(json.features)
    .enter()
    .append('path')
    .attr('d', path)
    .style('stroke', '#000')
    .style('stroke-width', '0.2')
    .style('fill', function(d) {
      var visited = d.properties.visited;
      if (visited) {
        return visitiedDefColor;
      } else {
        return notVisitiedDefColor;
      }
    })
    .on('mouseover', function(d) {
      if (d.properties.visited) {
        d3.select(this).style('fill',  visitedHovColor);
      }
      else {
        d3.select(this).style('fill', notVisitedHovColor)
      }
    })
    .on('mouseleave', function(d) {
      if (d.properties.visited) {
        d3.select(this).style('fill', visitiedDefColor);
      }
      else {
        d3.select(this).style('fill', notVisitiedDefColor)
      }
    })
    .on('click', function(d) {
      if (d.properties.visited) {
        if (d.properties.ISO2 == 'US'){
          window.location.replace('country-us.html')
        }
        else if (d.properties.ISO2 == 'BY'){
          window.location.replace('country-by.html')
        }
        else if (d.properties.ISO2 == 'RU'){
          window.location.replace('country-ru.html')
        }
        else if (d.properties.ISO2 == 'CA'){
          window.location.replace('country-ca.html')
        }
        else {
          window.location.replace('contact.html')

        }
      }
      else {
        $('#name-box').text(d.properties.NAME + ' was not visited yet :(');
      }
    });
});
