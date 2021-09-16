<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mychan;
use App\Http\Controllers\Aux;
use App\Http\Requests\RemarkPostForm;
use App\Http\Requests\SignPostForm;
use App\Http\Requests\Post;

class HomeController extends Controller
{
	/* Página principal */
    public function index()
    {
		$mw = Mychan::select('id', 'title', 'content', 'updated_at')->orderBy('id', 'desc')->where('user', '!=', 'null')->limit(7)->get();

		$mw[0]->id = Mychan::select('title')->count();

		return view('index', compact('mw'));
	}

	/**
	* Mostrar publicacion de un usuario con comentarios o no 
	*
	* @param string $post url
	* @return view
	*	-> FAQ
	*	-> BLOG
	*/
	public function showBlog(Request $req, $post)
	{
		/* Publicacion */
		$mw = Mychan::select('by', 'title', 'content', 'updated_at', 'remarkID')->orderBy('id', 'desc')->where('title', '=', str_replace("-", " ", $post))->limit(1)->get();	

		/* Si no existe retorna a faq */
		if(empty( $goto = $mw[0]->title)){
			return view('index');
		}
		/* Comentarios */
		$comment = Mychan::select('nick','title', 'content', 'updated_at', 'remarkID', 'email')->where('goto', '=', $goto)->orderBy('id', 'desc')->get();

		/* Sesión puesta como alternativa a HTTP_REFERRER*/
		$req->session()->put('referrer', $mw[0]->title);
		
		/* Si no hay comentarios, solo muestra la publicacion */
		if(empty( $comment ))
		{
			return view('blog')->with('mw', $mw);
		}
		else
		{
			return view('blog')
			->with('mw', $mw)
			->with('comment', $comment);
		}
	}
	/* Guardar comentario */
	public function saveRemark(RemarkPostForm $req)
	{
		if(session('referrer') != $req->goto)
		{
			return redirect('faq');
		}

		$user = empty($req->user) ? Aux::randomName() : $req->user;

		$mw = Mychan::create([
			'content' => $req->content,
			'email' => $req->email,
			'nick' => $user,
			'visitor' => $req->ip(),
			'password' => Aux::randomPassword(8),
			'remarkID' => Aux::randomPassword(4),
			'goto' => $req->goto
		]);

		return redirect("/p/".$mw->goto);
	}

	/* Iniciar sesion */
	public function signIn(SignPostForm $req)
	{

		$auth = Mychan::select('id')->where('user', '=', $req->user)->count();
        
		if( empty( $auth ) )
		{
			return view('login');
		}
		else
		{
			$auth = Mychan::select('password')->where('user', '=', $req->user)->limit(1)->get();

			if(password_verify($req->password, $auth[0]->password))
			{
				/* Crear sesion con el nombre del usuario que inició sesión */
				$req->session()->put('user', $req->user);
			}
			else
			{
				return redirect('sign-in');
			}

			return redirect('/');
		}
	}
	
	/* Registrarse */
	public function signUp(SignPostForm $req){
		
		$auth = Mychan::where('user', '=', $req->user)->count();
		
		if( $auth >= 1 )
		{
			return view('register');
		}
		else
		{
			$password = password_hash($req->password, PASSWORD_DEFAULT);
			Mychan::create([
			'user' => $req->user,
			'content' => '¡Bienvenido!',
			'password' => $password,
			'remarkID' => Aux::randomPassword(4),
			'visitor' => $req->ip()
			]);
		}
		/* Crear sesion con el nombre del usuario que se registró */
		$req->session()->put('user', $req->user);

		return redirect('/');
	}
	/* Eliminar todas las sesiones */
	public function logout(Request $req)
	{
		$req->session()->invalidate();

		return redirect('/');
	}

	/* Perfil */
	public function board(Request $req, $board)
	{
		$mw = Mychan::select('subtitle', 'user', 'description', 'remarkID')->orderBy('id', 'desc')->where('user', '=', str_replace("-", " ", $board))->limit(1)->get();	

		/* Si no existe retorna a faq */
		if(empty($mw[0]->user)){
			return redirect('/');
		}

		/* Comentarios */
		$thread = Mychan::select('title', 'content', 'remarkID')->where('by', '=', $mw[0]->user)->orderBy('id', 'desc')->get();
		
		/* Sesión puesta como alternativa a HTTP_REFERRER*/
		$req->session()->put('referrer', $mw[0]->subtitle);

		/* Si no hay comentarios, solo muestra la publicacion */
		if(empty( $thread ))
		{
			return view('board')->with('mw', $mw);
		}
		else
		{
			return view('board')
			->with('mw', $mw)
			->with('thread', $thread);
		}
	}
	/* Usuario crea publicación */
	public function createPost(Post $req)
	{
		/* Comprobar input 'by' por la sesion del usuario para eliminar posible publicacion en nombre de otro usuario */
		if(session('user') != $req->by)
		{
			return redirect('faq');
		}

		$user = empty($req->user) ? Aux::randomName() : $req->user;

		$mw = Mychan::create([
			'title' => $req->title,
			'content' => $req->content,
			'email' => $req->email,
			'nick' => $user,
			'visitor' => $req->ip(),
			'password' => Aux::randomPassword(8),
			'remarkID' => Aux::randomPassword(4),
			'by' => $req->by,
		]);

		return redirect("/p/".$req->title);
	}


}