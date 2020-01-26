
@extends ('LayoutsSD.siteavanzaint')

    @section('cabecera')
    @parent
     {{ Html::style('http://cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}
     {{ Html::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css') }}
    @stop

@section('ContenidoSite-01')


 <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 topper">


  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página registrada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página eliminada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página actualizada con exito</strong> US ...
      </div>
    @endif
   






<div class="container">
 
 @include('avanza::alerts.request')
 {{ Form::open(array('files' => true,'method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/avanza/actualizarfichaimg',$contenido->id))) }}
 
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 hidden-xs hidden-sm hidden-md hidden-lg">
  <div class="form-group">
    {{Form::label('titulo', 'Nombre de la empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('titulo', $contenido->title, array('class' => 'form-control','placeholder'=>'Ingrese nombre de la empresa'))}}<br>
   </div>
  </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 hidden-xs hidden-sm hidden-md hidden-lg">
  <div class="form-group">
    {{Form::label('descripcion', 'Descripción SEO de la empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('descripcion', $contenido->description, array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}<br>
   </div>
  </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 hidden-xs hidden-sm hidden-md hidden-lg">
 <div class="form-group">
    {{Form::label('Descripseo', 'DEscripción SEO de la ficha')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('descripseo', $contenido->position, array('class' => 'form-control','placeholder'=>'Ingrese descripción para el SEO'))}}<br>
   </div>
  </div>
</div>

  <div class="form-group hidden-xs hidden-sm hidden-md hidden-lg">
    {{Form::label('contenido', 'Descripción ampliada de la empresa' )}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::textarea('contenido', $contenido->content, array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Descripción ampliada de la empresa'))}}
   </div>
  </div>

<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
<div class="form-group">
 <label class="control-label">Imagen</label>
  <div class="col-lg-12">
   <input type="file" class="form-control" name="file" />
  </div>
</div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 hidden-xs hidden-sm hidden-md hidden-lg">
  <div class="form-group">
    {{Form::label('enlace', 'Ingrese URL' )}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('enlace', $contenido->website, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}<br>
   </div>
  </div>
</div>


    <div class="col-lg-6 hidden-xs hidden-sm hidden-md hidden-lg">


      <div class="form-group">
          <label for="">Categories</label>
          <select class="form-control input-sm" name="category" id="category">

          @foreach($contenida as $contenida)
            <option value="{{$contenida->id}}">{{$contenida->page}}</option>
          @endforeach 
          @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->page}}</option>
          @endforeach
          </select> 
      </div>
 </div>
   <div class="col-lg-6 hidden-xs hidden-sm hidden-md hidden-lg">
      <div class="form-group">
          <label for="">Subcategory</label>
          @foreach($contenidonu as $contenidonu)
          <select class="form-control input-sm" name="subcategory" id="subcategory">
            <option value="{{$contenidonu->id}}">{{$contenidonu->page}}</option>
          </select> 
          @endforeach
      </div>

  </div>
    
 <div class="form-group hidden-xs hidden-sm hidden-md hidden-lg">
      {{Form::label('nivel', 'Visualización' )}}
       <div class="col-lg-12">
        {{ Form::select('nivel', [$contenido->level => $contenido->level,
        '1' => 'Visible',
        '0' => 'No Visible'], null, array('class' => 'form-control')) }}
       </div>
    </div>



<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 hidden-xs hidden-sm hidden-md hidden-lg">
  <div class="form-group">
    {{Form::label('telefono', 'Telefono de su empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('telefono', $contenido->telefono, array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}<br>
   </div>
  </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 hidden-xs hidden-sm hidden-md hidden-lg">
  <div class="form-group">
    {{Form::label('email', 'E-mail de contacto')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('email', $contenido->email, array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}<br>
   </div>
  </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 hidden-xs hidden-sm hidden-md hidden-lg">
  <div class="form-group">
    {{Form::label('ubicacion', 'Ubicacion geográfica de su empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('ubicacion', $contenido->ubicacion, array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}<br>
   </div>
  </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 hidden-xs hidden-sm hidden-md hidden-lg">
  <div class="form-group">
    {{Form::label('direccion', 'Dirección de su empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('direccion', $contenido->direccion, array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}<br>
   </div>
  </div>
</div>


   {{Form::hidden('imageal', '', array('class' => 'form-control'))}}   
   {{Form::hidden('tipo', 'ficha', array('class' => 'form-control'))}}
   {{Form::hidden('animacion', 'fichan', array('class' => 'form-control'))}}
   {{Form::hidden('usuario', Auth::user()->id, array('class' => 'form-control'))}}

          
   <div class="modal-footer">
    {{ Form::reset('Cancelar', array('class' => 'btn btn-default')) }}
    {{Form::submit('Editar Ficha', array('class' => 'btn btn-primary')  )}}
   </div>
 
 {{ Form::close() }}

</div>


  
  
<footer>


  
     {{ Html::script('EstilosSD/dist/js/jquery-1.10.2.min.js') }}   
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
          <script src="http://cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.1/js/bootstrapValidator.min.js"></script>
 {{ Html::script('siteavanza/validaciones/crearficha.js') }}  

     <script type="text/javascript">
     
      $('#category').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memo/ajax-subcat?cat_id=' + cat_id, function(data){
            $('#subcategory').empty();
            $.each(data, function(index, subcatObj){
              $('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.page+'</option>');
            });
        });
      });
   </script>   

   {{ Html::script('EstilosSD/dist/js/jquery-1.10.2.min.js') }}
   {{ Html::script('ckeditor/ckeditor.js') }}
   {{ Html::script('ckfinder/ckfinder.js') }}   
 <script type="text/javascript">
     
      $('#category').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memo/ajax-subcat?cat_id=' + cat_id, function(data){
            $('#subcategory').empty();
            $.each(data, function(index, subcatObj){
              $('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.page+'</option>');
            });
        });
      });
   </script>   



   <script language="javascript" type="text/javascript">
   CKEDITOR.replace('editor',{
      filebrowserBrowseUrl: '/browser/browse.php',
      filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
      filebrowserUploadUrl: '/uploader/upload.php',
      filebrowserImageUploadUrl: '/uploader/upload.php?type=Images',
      filebrowserWindowWidth: '900',
      filebrowserWindowHeight: '400',
      filebrowserBrowseUrl: '../../../ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '../../../ckfinder/ckfinder.html?Type=Images',
      filebrowserFlashBrowseUrl: '../../../ckfinder/ckfinder.html?Type=Flash',
      filebrowserUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: '../../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    </script>



</footer>

@stop

