<?php

namespace Digitalsite\Avanza\Http;

use Digitalsite\Avanza\Fichaje;
use Digitalsite\Avanza\Empresa;
use Digitalsite\Pagina\Message;
use Digitalsite\Pagina\Page;
use Digitalsite\Pagina\Muxu;
use Digitalsite\Usuario\Usuario;

use App\Http\Requests\FichaCreateRequest;
use App\Http\Requests\FichaUpdateRequest;
use App\Http\Requests\FichaUpdateimgRequest;
use DB;
use Auth;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class AvanzaController extends Controller{


 public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

	$contenido = Content::all();
	return View('avanza::contenidos')->with('contenido', $contenido);
	}

    public function avanzacrear(){
    	$usuario = Auth::user()->id;
   		$conteo = DB::table('ficha')->where('usuario_id', '=', $usuario)->count();
    	$categories = Page::where('categoria', '=', 1)->get();
    	$paginas = Page::all();
		return view('avanza::fichaje/crear-ficha')->with('paginas', $paginas)->with('categories', $categories)->with('conteo', $conteo);
}


public function avanzaficha(){

	$number = Auth::user()->rol_id;
	
 	  if($number ==1) 
    {	
    	$numbersa = Auth::user()->id;
        $contenido = Fichaje::all();
         $contenida = Fichaje::all();
        $mensaje = DB::table('mesage')->where('interes','=',$numbersa)->get();
        return view('avanza::fichaje/ficha')->with('contenido', $contenido);
    }
    elseif($number ==3)
    {
    	$numbersa = Auth::user()->id;
    	$contenido = \Digitalsite\Usuario\Usuario::find($numbersa)->Fichas;
    	$contenida = \Digitalsite\Usuario\Usuario::find($numbersa)->Fichas;
       return view('avanza::fichaje/mis-fichas')->with('contenido', $contenido);
    }			
    }

public function avanza(){
	$number = Auth::user()->id;
		$mensajema = DB::table('mesage')->where('interes', '=', $number)->where('cargo', '=', NULL)->count();
	
	return view('avanza::fichaje/ficha')->with('mensajema', $mensajema);
}



	public function crearficha(FichaCreateRequest $request){
		$number = Auth::user()->id;
		$file = Input::file('file');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen = $file->getClientOriginalName();
		$subir=$file->move($destinoPath,$file->getClientOriginalName());
	
		$contenido = new Fichaje;
		$contenido->title = Input::get('titulo');
		$contenido->slug = Str::slug($contenido->title);
		$contenido->description = Input::get('descripcion');
		$contenido->direccion = Input::get('direccion');
		$contenido->telefono = Input::get('telefono');
		$contenido->email = Input::get('email');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->content = Input::get('contenido');
		$contenido->position = Input::get('descripseo');
		$contenido->level = Input::get('nivel');
		$contenido->image = $url_imagen;
		$contenido->imageal = Input::get('imageal');
		$contenido->website = Input::get('enlace');
		$contenido->type = Input::get('tipo');
		$contenido->num = Input::get('num');
		$contenido->page_id = Input::get('subcategory');
		$contenido->responsive = Input::get('category');
		$contenido->usuario_id = Input::get('usuario');
		$contenido->save();

		return Redirect('gestion/avanza/fichas')->with('status', 'ok_create');
     	}

     	public function mensaje(){
	
	$number = Auth::user()->rol_id;
	
 	  if($number ==1) 
    {	
    
        $mensaje = Message::all();
        return view('avanza::fichaje/mensaje')->with('mensaje', $mensaje);
    }
    elseif($number ==3)
    {
    	
    	$numbersa = Auth::user()->id;
        $mensaje = DB::table('mesage')->where('interes','=',$numbersa)->get();
       return view('avanza::fichaje/mensaje')->with('mensaje', $mensaje);
    }
     	}
			
		
		public function editarficha($id){

		$contenidonu = Muxu::join('pages','pages.id','=','ficha.page_id')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();
	    $contenida = Muxu::join('pages','pages.id','=','ficha.responsive')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();

		$categories = Page::where('categoria', '=', 1)->get();
		$paginas = Page::all();		
		$contenido = Fichaje::find($id);
	    return view('avanza::fichaje/editar')->with('contenido', $contenido)->with('paginas', $paginas)->with('categories', $categories)->with('contenidonu', $contenidonu)->with('contenida', $contenida);
	    }
	
		public function editarfichaimg($id){

		$contenidonu = Muxu::join('pages','pages.id','=','ficha.page_id')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();
	    $contenida = Muxu::join('pages','pages.id','=','ficha.responsive')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();

		$categories = Page::where('categoria', '=', 1)->get();
		$paginas = Page::all();		
		$contenido = Fichaje::find($id);
	    return view('avanza::fichaje/editar-img')->with('contenido', $contenido)->with('paginas', $paginas)->with('categories', $categories)->with('contenidonu', $contenidonu)->with('contenida', $contenida);
	    }
	
public function actualizarficha($id, FichaUpdateRequest $request){
			
		$input = Input::all();
		$contenido = Fichaje::find($id);
		$contenido->title = Input::get('titulo');
		$contenido->slug = Str::slug($contenido->title);
		$contenido->description = Input::get('descripcion');
		$contenido->direccion = Input::get('direccion');
		$contenido->telefono = Input::get('telefono');
		$contenido->email = Input::get('email');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->content = Input::get('contenido');
		$contenido->position = Input::get('descripseo');
		$contenido->level = Input::get('nivel');
		$contenido->image = Input::get('file');
		$contenido->imageal = Input::get('animacion');
		$contenido->website = Input::get('enlace');
		$contenido->type = Input::get('tipo');
		$contenido->page_id = Input::get('subcategory');
		$contenido->responsive = Input::get('category');
		$contenido->usuario_id = Input::get('usuario');
		$contenido->save();
	
		return Redirect('gestion/avanza/fichas')->with('status', 'ok_create');
	    }

public function empresa(){
			
	return view('avanza::fichaje/empresa');
	    }

public function empresacrear(){
			
		$contenido = new Empresa;
		$contenido->empresa = Input::get('empresa');
		$contenido->slug = Str::slug($contenido->empresa);
		$contenido->description = Input::get('descripcion');
		$contenido->nit = Input::get('nit');
		$contenido->website = Input::get('website');
		$contenido->telefono = Input::get('telefono');
		$contenido->direccion = Input::get('direccion');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->usuario_id = Input::get('usuario');
		$contenido->save();

	
		return Redirect('gestion/avanza/empresa')->with('status', 'ok_create');
	    }





public function actualizarfichaimg($id, FichaUpdateimgRequest $request){
			
		$number = Auth::user()->id;
		$file = Input::file('file');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen = $file->getClientOriginalName();
		$subir=$file->move($destinoPath,$file->getClientOriginalName());

		$input = Input::all();
		$contenido = Fichaje::find($id);
		$contenido->title = Input::get('titulo');
		$contenido->slug = Str::slug($contenido->title);
		$contenido->description = Input::get('descripcion');
		$contenido->direccion = Input::get('direccion');
		$contenido->telefono = Input::get('telefono');
		$contenido->email = Input::get('email');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->content = Input::get('contenido');
		$contenido->position = Input::get('descripseo');
		$contenido->level = Input::get('nivel');
		$contenido->image = $url_imagen;
		$contenido->imageal = Input::get('animacion');
		$contenido->website = Input::get('enlace');
		$contenido->type = Input::get('tipo');
		$contenido->page_id = Input::get('subcategory');
		$contenido->responsive = Input::get('category');
		$contenido->usuario_id = Input::get('usuario');
		$contenido->save();
	
		return Redirect('gestion/avanza/fichas')->with('status', 'ok_create');
	    }


	        public function leer($id){
			
		$input = Input::all();
		$contenido = Message::find($id);
		$contenido->cargo = '1';
		$contenido->save();
	
		return Redirect('gestion/avanza/mensaje-ficha/'.$contenido->id)->with('status', 'ok_create');
	    }


	     public function eliminarficha($id){

		$contenido = Fichaje::find($id);
		$contenido->delete();
		return Redirect('gestion/avanza/fichas')->with('status', 'ok_delete');
	    }

	    public function mensajeficha($id){
				
		$mensaje = Message::find($id);
		$number = Auth::user()->id;
		$mensajema = DB::table('mesage')->where('interes', '=', $number)->where('cargo', '=', NULL)->count();
	    return view('avanza::fichaje/vermensaje')->with('mensaje', $mensaje)->with('mensajema', $mensajema);
	    }

	    public function usuarios() {

    $users = Usuario::all();
	return view('avanza::usuarios')->with('users',$users);}

	    public function fichas() {

    $fichas = Fichaje::all();
	return view('avanza::fichas')->with('fichas',$fichas);}

	 public function misfichas() {

    $fichas = Fichaje::all();
	return view('avanza::fichaje/mis-fichas')->with('fichas',$fichas);}
	

}