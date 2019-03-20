<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ url('bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .fixed {
                position:fixed;
            }
            .active {
                color: rgba(255, 255, 255, 1.5);
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="{{ url('/') }}">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">    
    <li class="nav-item">
        <a class="nav-link" href="{{ url('dda') }}">DDA</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link " href="{{ url('bresenhem') }}">Bresenhem</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link active" href="{{ url('lingkaran') }}">Lingkaran</a>
      </li>            
    </ul>    
  </div>
</nav>
        <div class="container-fluid">
            <center><h1>Lingkaran</h1></center>
            <div class="row flex-xl-nowrap col-12 py-3">
            <form id="target" class="col-4 fixed">
                <div class="form-group">
                    <label for="exampleInputEmail1">X Center</label>
                    <input id="xCenter" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter number" required>                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Y Center</label>
                    <input id="yCenter" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter number" required>
                </div>   
                <div class="form-group">
                    <label for="exampleInputPassword1">Radius</label>
                    <input id="radius" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter number" required>
                </div>                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div class="col-1 offset-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><center>No.</center></li>                                     
                </ul>
                <ul id="noIsi" class="list-group list-group-flush">                                                 
                </ul>
            </div>
            <div class="col-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><center>X</center></li>                                     
                </ul>
                <ul id="xIsi" class="list-group list-group-flush">                    
                </ul>
            </div>
            <div class="col-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><center>Y</center></li>                                     
                </ul>
                <ul id="yIsi" class="list-group list-group-flush">                    
                </ul>
            </div>
            <div class="col-3">
                <ul  class="list-group list-group-flush">
                    <li class="list-group-item"><center>P</center></li>                                     
                </ul>
                <ul id="pIsi" class="list-group list-group-flush">                    
                </ul>
            </div>
            </div>
        </div>        
    </body>
</html>
<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<script>
$( "#target" ).submit(function( event ) {  
  event.preventDefault();

  let x,y,p,radius,xCenter,yCenter;

  xCenter = $('#xCenter').val();
  yCenter = $('#yCenter').val();
  radius = $('#radius').val();

  x = 0;
  y = radius;
  p = 1 - radius;
  
  $('#xIsi').empty();
      $('#yIsi').empty();
      $('#pIsi').empty();
      $('#noIsi').empty();

  var no = 0;  
  while ( x < y) {
      x++;
      no++;
      if(p < 0){
        p = p + 2 * x + 1;                
      }else{
        p = p + 2 * (x-y) + 1;
      }

      var isiY = `<li class="list-group-item"><center>${y}</center></li>`;
      var isiX = `<li class="list-group-item"><center>${x}</center></li>`;
      var isip= `<li class="list-group-item"><center>${p}</center></li>`;
      var noIsi= `<li class="list-group-item"><center>${no}</center></li>`;

      $('#xIsi').append(isiX);
      $('#yIsi').append(isiY);
      $('#pIsi').append(isip);
      $('#noIsi').append(noIsi);
  } 
});
</script>


