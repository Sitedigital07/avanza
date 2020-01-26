<?php


Route::group(['middleware' => ['auths','administrador']], function (){

	Route::resource('/gestion/avanza/fichasweb', 'Digitalsite\Avanza\Http\AvanzaController@fichas');
	Route::resource('/gestion/avanza/usuarios', 'Digitalsite\Avanza\Http\AvanzaController@usuarios');

}); 

Route::group(['middleware' => ['auths','fichador']], function (){


Route::get('gestion/avanza/mensaje', 'Digitalsite\Avanza\Http\AvanzaController@mensaje');
Route::get('gestion/avanza/fichas', 'Digitalsite\Avanza\Http\AvanzaController@avanzaficha');

Route::resource('gestion/avanza/mensaje-ficha', 'Digitalsite\Avanza\Http\AvanzaController@mensajeficha');
Route::get('gestion/avanza/crear', 'Digitalsite\Avanza\Http\AvanzaController@avanzacrear');
Route::post('gestion/avanza/crearficha', 'Digitalsite\Avanza\Http\AvanzaController@crearficha');

Route::get('gestion/avanza', 'Digitalsite\Avanza\Http\AvanzaController@avanza');


Route::get('gestion/avanza/editar-ficha/{id}', 'Digitalsite\Avanza\Http\AvanzaController@editarficha');
Route::get('gestion/avanza/editar-ficha-img/{id}', 'Digitalsite\Avanza\Http\AvanzaController@editarfichaimg');
Route::post('gestion/avanza/actualizarficha/{id}', 'Digitalsite\Avanza\Http\AvanzaController@actualizarficha');
Route::post('gestion/avanza/actualizarfichaimg/{id}', 'Digitalsite\Avanza\Http\AvanzaController@actualizarfichaimg');
Route::get('gestion/avanza/eliminar-ficha/{id}', 'Digitalsite\Avanza\Http\AvanzaController@eliminarficha');
Route::resource('gestion/avanza/leer', 'Digitalsite\Avanza\Http\AvanzaController@leer');
Route::get('memo/ajax-subcat',function(){

		$cat_id = Input::get('cat_id');
		$subcategories = Digitalsite\Pagina\Page::where('page_id', '=', $cat_id)->get();
		return Response::json($subcategories);
});

});





Route::group(['middleware' => ['web']], function (){

Route::post('gestion/avanza/usuario', 'Digitalsite\Pagina\Http\WebController@crearusuario');


Route::get('banner-clic/{id}', function($id){

$url = DB::table('contents')->where('id',$id)->pluck('url');
DB::table('contents')->where('id',$id)->limit(1)->update(['content'=> DB::raw('content + 1')]);
 foreach ($url as $url){

return redirect($url);
}
	});

Route::get('empresa/{id}', function($page){
$plantilla = Digitalsite\Pagina\Template::all();
$plantillaes = Digitalsite\Pagina\Template::find(1);
$contenido = Digitalsite\Pagina\Fichaje::where('slug','=',$page)->get();
$contenida = Digitalsite\Pagina\Fichaje::where('slug','=',$page)->get();
$menu = Digitalsite\Pagina\Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
return View::make('avanza::fichaje/avanza')->with('contenido', $contenido)->with('plantilla', $plantilla)->with('menu', $menu)->with('contenida', $contenida)->with('plantillaes', $plantillaes);
});
  
Route::get('empresa/{id}/datos', function($page){
$plantilla = Digitalsite\Pagina\Template::all();
$plantillaes = Digitalsite\Pagina\Template::find(1);
$contenido = Digitalsite\Pagina\Fichaje::where('slug','=',$page)->get();
$contenida = Digitalsite\Pagina\Fichaje::where('slug','=',$page)->get();
$menu = Digitalsite\Pagina\Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
return View::make('avanza::fichaje/avanza')->with('contenido', $contenido)->with('plantilla', $plantilla)->with('menu', $menu)->with('contenida', $contenida)->with('plantillaes', $plantillaes);
});
 
});