


 @extends ('adminsite.layout')
 

 


  @section('ContenidoSite-01')

   <div class="content-header">
     <ul class="nav-horizontal text-center">
 <li>
       <a href="/gestion/avanza/usuarios"><i class="gi gi-parents"></i> Usuarios</a>
      </li>

      <li>
       <a href="/gestion/avanza/fichasweb"><i class="fa fa-th-list"></i> Fichas</a>
      </li>
     </ul>
    </div>


 <div class="container">
  <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario registrado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario eliminado con éxito</strong>
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Usuario actualizado con éxito</strong>
   </div>
  @endif

 </div>








<div class="container">
  


 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Fichas</strong> Creadas</h2>
                            </div>
                            <p><a href="https://datatables.net/" target="_blank">DataTables</a> is a plug-in for the Jquery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table. It is integrated with template's design and it offers many features such as on-the-fly filtering and variable length pagination.</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Titulo</th>
                                            <th class="text-center">Descripción</th>
                                            <th>Email</th>
                                            <th>Usuario</th>
                                            <th>Creada</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($fichas)
                                           @foreach($fichas as $fichas)

                                        <tr>
                                            <td class="text-center">{{$fichas->title}}</td>
                                            <td class="text-center">{{$fichas->description}}</td>
                                            <td>{{$fichas->email}}</td>
                                            <td>{{$fichas->usuario_id}}</td>
                                            <td>{{$fichas->created_at}}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                 <a href="<?=URL::to('gestion/usuario/editar/');?>/{{ $fichas->usuario_id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Contenido" class="btn btn-primary"><span class="fa fa-user sidebar-nav-icon"></span></span></a>
                                                <a href=""> <span class="btn btn-warning"><span class="fa fa-pencil-square-o sidebar-nav-icon"></span></span></a>
                                                 <a href="<?=URL::to('gestion/usuario/eliminar/');?>/{{$fichas->id}}" onclick="return confirm('¿Está seguro que desea eliminar el registro?')"><button class="btn btn-danger"><span class="hi hi-trash sidebar-nav-icon"></span></button></a>
                                                </div>
                                            </td>
                                        </tr>
                                       
                                        @endforeach
                                         @else
                                          <div class="alert alert-danger fade in">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                          <strong>NO</strong> hay usuarios registrados aun.</div>
                                         @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->




</div>




<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="/adminsite/js/pages/tablesDatatables.js"></script>
        <script>$(function(){ TablesDatatables.init(); });</script>
  

  @stop

  
     
    