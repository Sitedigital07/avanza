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
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

  <ul class="nav nav-tabs" role="tablist" style="margin-top:40px">
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
     <div class="col-xs-7 col-sm-7 col-md-7 col-lg-8">    
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
       <iframe src="{{$contenido->ubicacion}}" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
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
    
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('mensajes/mensajeficha'))) }}
    <div class="form-group col-md-12">
       {{Form::label('nombre', 'Nombre' )}}
       {{Form::text('nombre', '', array('class' => 'form-control','placeholder'=>'Ingrese su Contraseña'))}}
    </div>

    <div class="form-group col-md-12">
       {{Form::label('sujeto', 'Empresa' )}}
       {{Form::text('sujeto', '', array('class' => 'form-control','placeholder'=>'Ingrese su Contraseña','placeholder'=>'Ingrese el Nombre de su Empresa'))}}<br>
    </div>

    <div class="form-group col-md-12">
       {{Form::label('datos', 'Número de contacto' )}}
       {{Form::text('datos', '', array('class' => 'form-control','placeholder'=>'Ingrese teléfono o celular de contacto'))}}<br>
    </div>

    <div class="form-group col-md-12">
       {{Form::label('email', 'Correo electrónico' )}}
       {{Form::text('email', '', array('class' => 'form-control','placeholder'=>'Ingrese su Contraseña','placeholder'=>'Ingrese su email'))}}<br>
    </div>
      
       {{Form::hidden('empresa', Request::segment(2), array('class' => 'form-control','placeholder'=>'Ingrese su Contraseña','placeholder'=>'Ingrese su email'))}}
       {{Form::hidden('interes', $contenido->usuario_id, array('class' => 'form-control'))}}
     
    <div class="form-group col-md-12">
       {{Form::label('mensaje', 'Mensaje' )}}
       {{Form::textarea('mensaje', '', array('class' => 'form-control','placeholder'=>'Ingrese su Contraseña','placeholder'=>'Ingrese su mensaje'))}}<br>  
   </div>

       {{Form::hidden('redireccion', Request::path(), array('class' => 'form-control'))}}

           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
             <button type="submit" class="btn btn-primary pull-right">Enviar</button>  
         </div>
      {{ Form::close() }}
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