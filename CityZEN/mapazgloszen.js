var map = L.map('map').fitWorld();

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

map.locate({setView: true, maxZoom: 16});


var choicemarker;
var currlat;
var currlng;


var purpleIcon = L.icon({
    iconUrl: 'purple-mark.png',
    shadowUrl: 'shadow.png',
    iconSize:     [25, 40], 
    shadowSize:   [50, 64], 
    iconAnchor:   [15, 40], 
    shadowAnchor: [27, 64],  
    popupAnchor:  [-9, -43]
})

function onMapClick(e) 
{
    choicemarker.remove();
    choicemarker = L.marker(e.latlng, {icon: purpleIcon}).addTo(map);
    currlat = e.latlng.lat.toFixed(3);
    currlng = e.latlng.lng.toFixed(3);
    alert(currlat + " " + currlng);
    
}


function onLocationFound (e) 
{
    choicemarker = L.marker(e.latlng, {icon: purpleIcon}).addTo(map);
    currlat = e.latlng.lat
    currlng = e.latlng.lng
    
}

map.on('locationfound', onLocationFound);

function onLocationError(e) 
{
    choicemarker = L.marker([52.15, 21], {icon: purpleIcon}).addTo(map);
    alert(e.message);
}

map.on('locationerror', onLocationError);

map.on('click', onMapClick);









            