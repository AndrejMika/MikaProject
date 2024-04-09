
let map;

async function initMap() {
  const position = { lat: 48.30606012593535, lng: 18.08719486723106 };

  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
  // mapa centrovana na SPU
  map = new Map(document.getElementById("map"), {zoom: 16,center: position,mapId: "DEMO_MAP_ID",});

  //  guglovsky marker na SPU
  const marker = new AdvancedMarkerElement({
    map: map,
    position: position,
    title: "Športová hala",
  });
}

initMap();