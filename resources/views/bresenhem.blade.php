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
        <a class="nav-link active" href="{{ url('bresenhem') }}">Bresenhem</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="{{ url('lingkaran') }}">Lingkaran</a>
      </li>      
    </ul>    
  </div>
</nav>
        <div class="container-fluid">
            <center><h1>Lingkaran</h1></center>
            <div class="row flex-xl-nowrap col-12 py-3">
            <form id="target" class="col-4 fixed">
            <div class="row col-12">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Xa</label>
                        <input id="xA" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter number" required>                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ya</label>
                        <input id="yA" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter number" required>
                    </div>                  
                </div>       
                <div class="col-6">
                <div class="form-group">
                        <label for="exampleInputEmail1">Xb</label>
                        <input id="xB" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter number" required>                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Yb</label>
                        <input id="yB" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter number" required>
                    </div>                     
                </div>       
            </div>               
            <div class="row col-12">                     
                <button type="submit" class="col btn btn-primary">Submit</button>
            </div>                
            </form>
            <div class="col-1 offset-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><center>No.</center></li>                                     
                </ul>
                <ul id="noIsi" class="list-group list-group-flush">                                                 
                </ul>
            </div>
            <div class="col-3">
                <ul  class="list-group list-group-flush">
                    <li class="list-group-item"><center>P</center></li>                                     
                </ul>
                <ul id="pIsi" class="list-group list-group-flush">                    
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
            </div>
        </div>        
    </body>
</html>
<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<script>
$( "#target" ).submit(function( event ) {  
  event.preventDefault();

  let xA,yA,xB,yB,dX,adX,dY,adY,steps,x,y,x_inc,y_inc,twody,twodydx,p,x_end;

  xA = $('#xA').val();
  yA = $('#yA').val();  
  xB = $('#xB').val();
  yB = $('#yB').val();

    //mencari dx dy
    dX= xB-xA;
    adX= Math.abs(dX);
    dY= yB-yA;
    adY = Math.abs(dY);

    //mencari twody twodydx
    twody = 2 * parseInt(adY);
    twodydx = 2 * parseInt(adY-adX) ;

    p = 2 * parseInt(adY) - parseInt(adX);

    //mencari x end
    if(xA > xB){
        x = xB;
        y = yB;
        x_end = xA;
    }else{
        x = xA;
        y = yA;
        x_end = xB;
    }

      $('#pIsi').empty();
      $('#yIsi').empty();
      $('#kIsi').empty();
      $('#noIsi').empty();
  var no = 0;
    while (x < x_end){
        
            no++;
			x++;
			if(p < 0){
				p = p + twody;
			}else{
                
                if( parseInt(yA) > parseInt(yB)){                    
                    y--;
                }else{                    
                    y++;
                    p = p + twodydx;
                }
			}

            var isiY = `<li class="list-group-item"><center>${y}</center></li>`;
            var isiX = `<li class="list-group-item"><center>${x}</center></li>`;
            var isiP= `<li class="list-group-item"><center>${p}</center></li>`;
            var noIsi= `<li class="list-group-item"><center>${no}</center></li>`;

            $('#xIsi').append(isiX);
            $('#yIsi').append(isiY);
            $('#pIsi').append(isiP);
            $('#noIsi').append(noIsi);
    }
});
</script>


