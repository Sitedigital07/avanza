

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
                                <h2><strong>Usuarios</strong> Registrados</h2>
                            </div>
                            <p><a href="https://datatables.net/" target="_blank">DataTables</a> is a plug-in for the Jquery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table. It is integrated with template's design and it offers many features such as on-the-fly filtering and variable length pagination.</p>

                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Apellido</th>
                                            <th>E-mail</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Rol</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($users)
                                         @foreach($users as $user)
                                         @if($user->rol_id == 3)
                                        <tr>
                                            <td class="text-center">{{$user->name}}</td>
                                            <td class="text-center">{{$user->last_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->rol_id}}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                  <a href="<?=URL::to('');?>"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Contenido" class="btn btn-warning"><i class="gi gi-envelope sidebar-nav-icon"></i></span></a>
                                                   <a href="<?=URL::to('gestion/usuario/editar/');?>/{{ $user->id }}"><span  id="tip" data-toggle="tooltip" data-placement="top" title="Editar Contenido" class="btn btn-primary"><i class="fa fa-pencil-square-o sidebar-nav-icon"></i></span></a>
                                                  <a href="<?=URL::to('gestion/usuario/eliminar/');?>/{{$user->id}}" onclick="return confirm('¿Está seguro que desea eliminar el registro?')"><button ="button" class="btn btn-danger"><i class="hi hi-trash sidebar-nav-icon"></i></button></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @else
                                        @endif
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

  
     
    