@extends ('LayoutsSD.siteavanzaint')


 @section('ContenidoSite-01') 




   <div class="container">
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top">

 <a href="/gestion/avanza/crear"><button type="button" class="btn btn-primary pull-right">
   <span class="fa fa-sticky-note"></span> Crear Ficha</button></a>
</div>
   </div>

   <div class="col-xs-10 col-sm-10 col-md-10 col-lg-8 col-lg-offset-2 crea">
         <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Ficha actualziada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Ficha eliminada con exito</strong> US ...
      </div>
    @endif
</div>


     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-8 col-lg-offset-2">
  <table id="example3" class="table table-striped table-bordered toptable top" cellspacing="0" width="100%">
    <thead>
     <tr>
      <th>Empresa</th>
      <th>Descripción</th>
      <th>Website</th>
      <th>Tareas</th>
     </tr>
    </thead>

    <tbody>
 @foreach($contenido as $contenido)
 
     <tr>
      <td>{{ $contenido->title }}</td>
      <td>{{ $contenido->description }}</td>
      <td>{{ $contenido->website }}</td>
      
      <td>

        <a href="<?=URL::to('gestion/avanza/editar-ficha');?>/{{ $contenido->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Contenido" class="btn btn-primary"><span class="fa fa-edit"></span></span></a>
     
  
      <script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );}
</script>
  
   <a href="<?=URL::to('gestion/avanza/editar-ficha-img');?>/{{ $contenido->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Contenido" class="btn btn-info"><span class="fa fa-image"></span></span></a>
    <a href="<?=URL::to('gestion/avanza/eliminar-ficha/');?>/{{$contenido->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tup" data-toggle="tooltip" data-placement="bottom" title="Editar Página" class="btn btn-danger"><span class="fa fa-trash"></span></span></a>
     </tr>
  @endforeach
    </tbody>
   </table>

</div>


   
    @stop