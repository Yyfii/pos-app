let map, geocoder, marker;

// Função chamada assim que o Google Maps é carregado
function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -5.0, lng: -42.0 }, // Localização padrão
        zoom: 6, // Nível de zoom inicial
    });

    // Cria o geocodificador para converter o endereço em coordenadas
    geocoder = new google.maps.Geocoder();

    // Adiciona o eventListener para o botão "Find Address"
    document.getElementById("findButton").addEventListener("click", findAddress);
}

// Função para encontrar o endereço e exibir no mapa
function findAddress() {
    const address = document.getElementById("address").value;

    if (address) {
        // Geocodifica o endereço
        geocoder.geocode({ address: address }, (results, status) => {
            if (status === "OK") {
                if (results && results.length > 0) {
                    // Se o endereço for encontrado, move o mapa para o local e coloca o marcador
                    map.setCenter(results[0].geometry.location);
                    if (marker) {
                        marker.setMap(null); // Remove o marcador anterior
                    }
                    marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        title: results[0].formatted_address,
                    });

                    // Exibe o endereço completo no marcador
                    const infowindow = new google.maps.InfoWindow({
                        content: results[0].formatted_address,
                    });
                    infowindow.open(map, marker);
                } else {
                    alert("Nenhum resultado encontrado para o endereço.");
                }
            } else {
                alert("A geocodificação falhou devido ao seguinte motivo: " + status);
            }
        });
    } else {
        alert("Por favor, insira um endereço!");
    }
}