import leaflet, {
    icon
} from 'leaflet'

const binche = {
    lat:"50.412824846085",
    lon:"4.1701677159951"
}

const Icon = L.icon({
    iconUrl: '/pin.svg',
    iconSize: [40, 47],
    popupAnchor: [20, -47],
    iconAnchor: [0, 47],
});




document.addEventListener("turbolinks:load", function() {
    const map = document.querySelector('#map')
    if(map){
        const map = L.map('map', {
            zoomControl: true,
        scrollWheelZoom:false,
        }).setView([binche.lat, binche.lon], 10);
        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png').addTo(map);
        map.attributionControl.setPrefix('')

        const shops = document.querySelectorAll('[data-name]')
        shops.forEach(shop=>{
            const name = shop.dataset.name
            const street = shop.dataset.street
            const city = shop.dataset.city
            const latitude = shop.dataset.latitude
            const longitude = shop.dataset.longitude
            let m = L.marker([latitude,longitude], {icon:Icon}).addTo(map)
            m.bindPopup(`
            <p>${name}</p>
            <p>${street}, ${city}</p>
            <a target="_blank" href="${'https://www.google.be/maps?hl=fr&q=' + street +" " + city}">
            Itinéraire
            </a>
            
            `);

        })
    }
  })