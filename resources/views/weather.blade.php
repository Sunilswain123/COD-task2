<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        margin-bottom: 60px;
        /* Height of the footer */
    }

    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 60px;
        /* Height of the footer */
        background-color: #f5f5f5;
    }

    p.card-text {
        margin-top: -10px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Weather App</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5 mb-4 mx-auto">Weather Application</h1>
        <div class="input-group mb-3">
            <form action="{{route('weather.form')}}" method="post" class="form-inline">
                @csrf
                <div class="d-flex">
                    <div class="form-group">
                        <select class="form-select" name="city" id="city">
                            <option value="-1">--- Select City ---</option>
                            @foreach($cities as $city)
                                <option value="{{$city}}">{{$city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button style="margin-left: 20px;" class="btn btn-primary">Search</button>
                </div>
            </form>

        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Looks Like</h5>
                        <br>
                        @if(isset($data['weather'][0]['main']))
                            @php
                                $weather = $data['weather'][0]['main'];
                            @endphp

                            @if($weather == "Clear")
                                <img src="./images/clear.png" alt="Clear" style="height:100px">
                            @elseif($weather == "Clouds")
                                <img src="./images/cloud.png" alt="Clouds" style="height:100px">
                            @elseif($weather == "Rain")
                                <img src="./images/rain.png" alt="Rain" style="height:100px">
                            @else
                                <p>No image available for this weather</p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Location Details</h5>
                        <br>
                        <p class="card-text">Country: {{ $data["sys"]["country"] ?? "--" }}</p>
                        <p class="card-text">Name: <b>
                            @if(isset($data["name"]))
                                {{$data["name"]}}
                            @else
                            --
                            @endif
                        </b>
                    </p>
                        <p class="card-text">Latitude: {{ $data["coord"]["lat"] ?? "--" }}</p>
                        <p class="card-text">Longitude: {{ $data["coord"]["lon"] ?? "--" }}</p>
                        <p class="card-text">Sunset: {{ $data["sys"]["sunrise"] ?? "--" }}</p>
                        <p class="card-text">Sunset: {{ $data["sys"]["sunset"] ?? "--" }}</p>
                     </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Temperature  &deg; F</h5>
                        <br>
                    <p class="card-text">Temp: {{ $data["main"]["temp"] ?? "--" }}</p>
                    <p class="card-text">Min Temp: {{ $data["main"]["temp_min"] ?? "--" }}</p>
                    <p class="card-text">Max Temp: {{ $data["main"]["temp_max"] ?? "--" }}</p>
                   <p class="card-text">Feels Like: {{ $data["main"]["feels_like"] ?? "--" }}</p>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Precipitation &percnt;</h5>
                        <br>
                        <p class="card-text">Humidity: {{ $data["main"]["humidity"] ?? "--" }}</p>
                        <p class="card-text">Pressure: {{ $data["main"]["pressure"] ?? "--" }}</p>
                        <p class="card-text">Visibility: {{ $data["visibility"] ?? "--" }}</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Wind m/h</h5>
                        <br>
                        <p class="card-text">Speed: {{ $data["wind"]["speed"] ?? "--" }}</p>
                        <p class="card-text">Degree: {{ $data["wind"]["deg"] ?? "--" }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br><br>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2024 Weather App. All rights reserved.</span>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>