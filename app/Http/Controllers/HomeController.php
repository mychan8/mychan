<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mychan;

class HomeController extends Controller
{
    public function index(){

		$mw = Mychan::select('title', 'content', 'updated_at')->orderBy('id', 'asc')->limit(7)->get();

		return view('index', compact('mw'));
	}
	
	public function showFAQ(){
		return view('faq');
	}

	public function showBlog($box){

		/* POST */
		$mw = Mychan::select('user', 'title', 'content', 'updated_at', 'remarkID')->orderBy('id', 'desc')->where('title', '=', $box)->limit(1)->get();
		
		if(empty($mw[0]->title)){
			return view('faq');
		}

		if(empty($goto = $mw[0]->title)){
			return view('faq');
		}

		/* COMENTARIOS */
		$comment = Mychan::select('user','title', 'content', 'updated_at', 'remarkID', 'email')->where('goto', '=', $goto)->orderBy('id', 'desc')->get();

		if(empty($comment)){
			return view('blog')->with('mw', $mw);
		}else{
			return view('blog')
			->with('mw', $mw)
			->with('comment', $comment);
		}
	}

	/**
	* @return string nombre aleatorio
	*/
	public function randomName()
	{
		$firstname = array( 'Ruby', 'Cuba', 'Remedios', 'Chaka', 'Amaranta', 'NPC', 'Floyd', 'Anon', 'Vampiro' );
		$name = $firstname[rand(0, count($firstname) - 1)];
		return $name;
	}

	public function randomPassword($lenght=8)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;

        for ($i = 0; $i < $lenght; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] .= $alphabet[$n];
        }

        return implode($pass);
    }

	/**
	* @return string direccion IP
	*/
	public function getRealIP() : string {

	    if(isset($_SERVER["HTTP_CLIENT_IP"])) return $_SERVER["HTTP_CLIENT_IP"];
		else if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) return $_SERVER["HTTP_X_FORWARDED_FOR"];
		else if(isset($_SERVER["HTTP_X_FORWARDED"])) return $_SERVER["HTTP_X_FORWARDED"];
		else if(isset($_SERVER["HTTP_FORWARDED_FOR"])) return $_SERVER["HTTP_FORWARDED_FOR"];
		else if(isset($_SERVER["HTTP_FORWARDED"])) return $_SERVER["HTTP_FORWARDED"];
		else return $_SERVER["REMOTE_ADDR"];
	}

	public function location($park){
		header("Location: /b/".$park); exit;
	}

	public function saveRemark(Request $req){

		$mw = new Mychan();

		if(empty($req->content) || count($req->content) <= 5){
			$this->location($req->goto);
		}

		$mw->content = $req->content;
		$mw->email = $req->email;

		$mw->user = empty($req->user) ? $this->randomName() : $req->user;

		$mw->visitor = $this->getRealIP();
		
		$mw->remarkID = $this->randomPassword(4);

		$mw->goto = $req->goto;
		$mw->save();

		$this->location($mw->goto);
	}
}