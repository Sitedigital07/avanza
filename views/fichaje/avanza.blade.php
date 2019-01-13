<!DOCTYPE html>
<html lang="ES">

<!-- Aca se ejecutaran los estilos que contiene el sitio web -->
  <head>
    @foreach($contenida as $contenida)
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$contenida->position}}">
    <meta name="keywords" content="Sistema de Gestión Empresarial">
    <meta name="author" content="Siteavanza">
    <title>{{$contenida->description}}</title>
    @include('Template.estilos')
   @endforeach
  </head>

  <body>
  <style type="text/css">
  .imagen{background:url(/siteavanza/pat/pat.png); width: 100%; height: 300px;}
  .client{margin-top: 130px; margin-left: 220px }
  </style>
  <?php include_once("analyticstracking.php") ?>


  @foreach($plantilla as $plantilla)
   
   @include('Template.logueo')

  
  @include('Template.menu')



  <div class="container">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

       <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Su mensaje ha sido enviado con éxtio</strong> </div>
    @endif

  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descrtipción</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Datos contacto</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Contactar Empresa</a></li>
  </ul>
    </div>
  </div>
<br>
<br>
<div class="container">
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
     <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">    
      @foreach($contenido as $contenido)
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 detalle">
      <div class="thumbnail">
         <img src="/fichaimg/clientes/{{$contenido->usuario_id}}/{{$contenido->image}}" alt="">
       <div class="caption">
         <h2>{{$contenido->title}}</h2>
         <p>
          {!!$contenido->content!!}
         </p>
         <p>
          <a target="_blank" href="{{$contenido->website}}" class="btn btn-primary btn-lg col-xs-12 col-sm-12 col-md-12 col-lg-12">Ir a página web</a>
         </p>
       </div>
      </div>
     </div>
@endforeach
  </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="profile">
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 detalle">
      <div class="thumbnail">
       <iframe src="{{$contenido->ubicacion}}" width="100%" height="430px" frameborder="0" style="border:0" allowfullscreen></iframe>
      <div class="caption">
      <h2>{{$contenido->title}}</h2>
       <ul class="list-group">
        <li class="list-group-item list-group-item-default text-center"><b>Teléfono</b><br> {{$contenido->telefono}}</li>
        <li class="list-group-item list-group-item-default text-center"><b>Dirección</b><br> {{$contenido->direccion}}</li>
        <li class="list-group-item list-group-item-default text-center"><b>E-mail</b><br> {{$contenido->email}}</li>
       </ul>
  
      <a target="_blank" href="{{$contenido->website}}" class="btn btn-primary btn-lg col-xs-12 col-sm-12 col-md-12 col-lg-12">Ir a página web</a>
      </div>
     </div>
    </div>
   </div>


    <div role="tabpanel" class="tab-pane" id="messages">
    
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="top:-25px">

     <h3>Ponte en contacto con nosostros</h3>
     
<br>
<form method="POST" action="/mensajes/mensajeficha">
  <div class="form-group">
    <label for="email">Nombre:</label>
    <input type="text" class="form-control" id="email" name="nombre">
  </div>
  <div class="form-group">
    <label for="pwd">Empresa:</label>
    <input type="text" class="form-control" id="pwd" name="sujeto">
  </div>
   <div class="form-group">
    <label for="pwd">Número contacto:</label>
    <input type="text" class="form-control" id="pwd" name="datos">
  </div>
   <div class="form-group">
    <label for="pwd">Correo electrónico:</label>
    <input type="email" class="form-control" id="pwd" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Mensaje:</label>
    <textarea class="form-control" rows="8" id="comment" name="mensaje"></textarea>
  </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
  <input type="hidden" class="form-control" id="pwd" value="{{Request::segment(2)}}" name="empresa">
   <input type="hidden" class="form-control" id="pwd" value="empresa/{{Request::segment(2)}}" name="redireccion">
  <input type="hidden" class="form-control" id="pwd" value="{{$contenido->usuario_id}}" name="interes">
  <input type="hidden" class="form-control" id="pwd" value="{{$contenido->email}}" name="ema">
  <button type="submit" class="btn btn-primary col-lg-12">Enviar</button>
</form>



      </div>

    </div>

  </div>

</div>

  </div>

</div>

<!-- Modal -->




<footer>
@include('Template.footer')
</footer>

@endforeach


 @include('Template.scripts')

  </body>
</html >