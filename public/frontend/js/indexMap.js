function leafeMap (){
    var map = L.map("map").setView([51.505, -0.09], 8);
  
  
  
    
    const maps = [
      ["LOCATION_1", 11.8166, 122.0942], 
      ["LOCATION_2", 11.9804, 121.9189],
      ["LOCATION_3", 10.7202, 122.5621],
      ["LOCATION_4", 11.3889, 122.6277],
      ["LOCATION_5", 10.5929, 122.6325]
    ];
    
    maps.map((item)=>L.marker([item[1], item[2]]).addTo(map)
        .bindPopup('California')
        .openPopup())
    
    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(map);
    
      
    L.Control.geocoder().addTo(map);
    
  
  }
  
  
  leafeMap()