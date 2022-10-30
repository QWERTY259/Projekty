var map = L.map('map').fitWorld();

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


map.locate({setView: true, maxZoom: 16});



var allMarkers = [];
var choicemarker;
var currlat;
var currlng;
var zoomlat;
var zoomlng;


function onLocationFound (e) 
{
    
    choicemarker = L.marker(e.latlng).addTo(map)
                .bindPopup("<center><b>Tu jestes</b></center>kliknij na mape aby zmienic<br><center>pozycje znacznika</center>")
                .openPopup();
    currlat = e.latlng.lat.toFixed(3);
    currlng = e.latlng.lng.toFixed(3);
    document.cookie = "pozycja_x = " + currlat;
    document.cookie = "pozycja_y = " + currlng;

    if (zoomlat != undefined && zoomlng != undefined){
        
        map.setView([zoomlat, zoomlng], 16);
    }
    
}

map.on('locationfound', onLocationFound);

function onLocationError(e) 
{

    
    choicemarker = L.marker([52.233, 21.006]).addTo(map);
    currlat = 52.233;
    currlng = 21.006;
    document.cookie = "pozycja_x = " + currlat;
    document.cookie = "pozycja_y = " + currlng;
    alert(e.message);

    if (zoomlat != undefined && zoomlng != undefined){
        map.setView([zoomlat, zoomlng], 16);
    } else {
        map.setView([52.233, 21.006], 13);
    }
    
}

map.on('locationerror', onLocationError);

function onMapClick(e) 
{
    choicemarker.remove();
    choicemarker = L.marker(e.latlng).addTo(map);
    currlat = e.latlng.lat.toFixed(3);
    currlng = e.latlng.lng.toFixed(3);
    document.cookie = "pozycja_x = " + currlat;
    document.cookie = "pozycja_y = " + currlng;
    
}

map.on('click', onMapClick);



var LeafIcon = L.Icon.extend({
    options: {
        shadowUrl: 'shadow.png',
        iconSize:     [25, 40], 
        shadowSize:   [50, 64], 
        iconAnchor:   [15, 40], 
        shadowAnchor: [27, 64],  
        popupAnchor:  [-9, -43]
        }
});

var greenIndustry = new LeafIcon({iconUrl: 'green-industry.png'}),
    redIndustry = new LeafIcon({iconUrl: 'red-industry.png'}),
    yellowIndustry = new LeafIcon({iconUrl: 'yellow-industry.png'}),
    greenNature = new LeafIcon({iconUrl: 'green-nature.png'}),
    redNature= new LeafIcon({iconUrl: 'red-nature.png'}),
    yellowNature = new LeafIcon({iconUrl: 'yellow-nature.png'}),
    greenPeople = new LeafIcon({iconUrl: 'green-people.png'}),
    redPeople = new LeafIcon({iconUrl: 'red-people.png'}),
    yellowPeople = new LeafIcon({iconUrl: 'yellow-people.png'}),
    greenOther = new LeafIcon({iconUrl: 'green-other.png'}),
    redOther = new LeafIcon({iconUrl: 'red-other.png'}),
    yellowOther = new LeafIcon({iconUrl: 'yellow-other.png'}),
    purpleIcon = new LeafIcon({iconUrl: 'purple-mark.png'}),
    purpleIndustry = new LeafIcon({iconUrl: 'purple-industry.png'}),
    purpleNature = new LeafIcon({iconUrl: 'purple-nature.png'}),
    purpleOther = new LeafIcon({iconUrl: 'purple-other.png'}),
    purplePeople = new LeafIcon({iconUrl: 'purple-people.png'});

var x = 0;
var y = 1;
var tytul = 2;
var status = 3;
var typ = 4;



for (let i = 0; i < markerData.length; i++)
{
    if(markerData[i][status] == "odrzucone"){
        switch (markerData[i][typ]) {
            case "Infrastruktura":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: redIndustry}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Przyroda":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: redNature}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Ludzie":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: redPeople}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Inne":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: redOther}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            default:
                console.log("marker not loaded");
        } 

        
    } else if (markerData[i][status] == "zaczete") {
        switch (markerData[i][typ]) {
            case "Infrastruktura":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: yellowIndustry}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Przyroda":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: yellowNature}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Ludzie":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: yellowPeople}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Inne":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: yellowOther}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            default:
                console.log("marker not loaded");
        }

    } else if (markerData[i][status] == "nierozpatrzone") {
        switch (markerData[i][typ]) {
            case "Infrastruktura":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: purpleIndustry}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Przyroda":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: purpleNature}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Ludzie":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: purplePeople}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Inne":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: purpleOther}).bindPopup(markerData[i][tytul]).addTo(map));     
                break;
            default:
                console.log("marker not loaded");
        }
    } else if (markerData[i][status] == "skonczone") {
        switch (markerData[i][typ]) {
            case "Infrastruktura":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: greenIndustry}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Przyroda":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: greenNature}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Ludzie":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: greenPeople}).bindPopup(markerData[i][tytul]).addTo(map));
                break;
            case "Inne":
                allMarkers.push(L.marker([markerData[i][x], markerData[i][y]], {icon: greenOther}).bindPopup(markerData[i][tytul]).addTo(map));     
                break;
            default:
                console.log("marker not loaded");
        }
    } else {
        console.log("unexpected error")
    }

} 










            