@extends('layouts.main')

@section('title', 'Ver Pasos')

@section('form')
  <div class="flex flex-col justify-center items-center">
    <div class="mt-32 w-9/12 bg-orange-500 p-9 rounded-xl">
      @foreach($data['instruction'] as $key => $instruction)
        <?php echo $instruction. '<br>' ?>
        <?php echo  "Conduce: ".$data['distance'][$key]. '<br>' ?>
      @endforeach
    </div>
  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeB7DxtVmKQoDc4fHAfZTnjv_bEt1ZeGs&libraries=places"></script>
  
    <div id="map" class="my-32 h-96 w-11/12"></div>

    <button class="mt-9 mb-16 w-4/12 h-8">Bajar Lote</button>

  </div>

<script>
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    });

    // Punto de partida
    var startPoint = new google.maps.LatLng({{$data['start_location'][0]['lat']}}, {{$data['start_location'][0]['lng']}});

    // Punto de llegada
    <?php $ultimoElemento = end($data['start_location'])?>
    <?php $latitud = $ultimoElemento['lat']?>
    <?php $longitud = $ultimoElemento['lng']?>

    var endPoint = new google.maps.LatLng({{ $latitud }}, {{$longitud}});

    // Crea marcadores para el punto de partida y llegada
    var startMarker = new google.maps.Marker({
      position: startPoint,
      map: map,
      title: 'Punto de partida'
    });

    var endMarker = new google.maps.Marker({
      position: endPoint,
      map: map,
      title: 'Punto de llegada'
    });

    // Crea una instancia de DirectionsService para calcular la ruta
    var directionsService = new google.maps.DirectionsService();

    // Crea una instancia de DirectionsRenderer para mostrar la ruta en el mapa
    var directionsDisplay = new google.maps.DirectionsRenderer();
    directionsDisplay.setMap(map);

    // Configura la solicitud de dirección
    var request = {
      origin: startPoint,
      destination: endPoint,
      travelMode: 'DRIVING' 
    };

    // Calcula y muestra la ruta en el mapa
    directionsService.route(request, function(result, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(result);
      }
    });
  }

  initMap()
</script>

@endsection
