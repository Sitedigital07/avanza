<?php


Route::group(['middleware' => ['auths','administrador']], function (){

	Route::resource('/gestion/avanza/fichasweb', 'Digitalsite\Avanza\Http\AvanzaController@fichas');
	Route::resource('/gestion/avanza/usuarios', 'Digitalsite\Avanza\Http\AvanzaController@usuarios');

}); 

Route::group(['middleware' => ['auths','fichador']], function (){


Route::resource('gestion/avanza/mensaje', 'Digitalsite\Avanza\Http\AvanzaController@mensaje');
Route::resource('gestion/avanza/fichas', 'Digitalsite\Avanza\Http\AvanzaController@avanzaficha');

Route::resource('gestion/avanza/mensaje-ficha', 'Digitalsite\Avanza\Http\AvanzaController@mensajeficha');
Route::resource('gestion/avanza/crear', 'Digitalsite\Avanza\Http\AvanzaController@avanzacrear');
Route::resource('gestion/avanza/crearficha', 'Digitalsite\Avanza\Http\AvanzaController@crearficha');

Route::resource('gestion/avanza', 'Digitalsite\Avanza\Http\AvanzaController@avanza');


Route::resource('gestion/avanza/editar-ficha', 'Digitalsite\Avanza\Http\AvanzaController@editarficha');
Route::resource('gestion/avanza/editar-ficha-img', 'Digitalsite\Avanza\Http\AvanzaController@editarfichaimg');
Route::resource('gestion/avanza/actualizarficha', 'Digitalsite\Avanza\Http\AvanzaController@actualizarficha');
Route::resource('gestion/avanza/actualizarfichaimg', 'Digitalsite\Avanza\Http\AvanzaController@actualizarfichaimg');
Route::resource('gestion/avanza/eliminar-ficha', 'Digitalsite\Avanza\Http\AvanzaController@eliminarficha');
Route::resource('gestion/avanza/leer', 'Digitalsite\Avanza\Http\AvanzaController@leer');
Route::get('memo/ajax-subcat',function(){

		$cat_id = Input::get('cat_id');
		$subcategories = Digitalsite\Pagina\Page::where('page_id', '=', $cat_id)->get();
		return Response::json($subcategories);
});

});





Route::group(['middleware' => ['web']], function (){

Route::resource('gestion/avanza/usuario', 'Digitalsite\Pagina\Http\WebController@crearusuario');


Route::get('banner-clic/{id}', function($id){

$url = DB::table('banners')->where('id',$id)->pluck('destino');
DB::table('banners')->where('id',$id)->limit(1)->update(['clics'=> DB::raw('clics + 1')]);
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