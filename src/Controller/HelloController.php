<?php
namespace App\Controller;

use App\Controller\AppController;

class HelloController extends AppController
{
	public function index($a='', $b='')
	{

		// $this->set('message', 'Hello! this is sample value!');

		// $isPost = $this->request->is('post');
		// $str = $this->request->data('text1');

		// if ($str != null && $isPost)  
		// {
		// 	$this->set('message', 'you typed:' . $str);
		// }
		// else
		// {
		// 	$this->set('message', 'please type..');
		// }

		//上記コメントをヘルパーを利用して取り出す(処理は変わらないか)
		$str = $this->request->data('text1');
		$select1 = $this->request->data('select');
		// $select2 = array('emptyだよ');
		$select2[] = $this->request->data('select2');	//配列

		$msg = 'typed:' .$str;

		if ($str == null)
		{
			$msg = "please type...";
		}

		// if ($select2[0] == null || empty($select2))
		// 	$select2 = array();

		$this->set('message', $msg . ' select:'. $select1 . ' select2:' . $select2[0]);


		$id = $this->request->query('id');
		$name = $this->request->query('name');
		$this->set('message2', 'your id:' . $id . ', name:' . $name);


		// if ($a == '')
		// {
		// 	$this->setAction('err');
		// 	return;
		// }

		// if ($b == '')
		// {
		// 	$this->setAction('err');
		// 	return;
		// }

		// $this->autoRender = false;		//レイアウト用テンプレートを利用するか
		// echo "<html><head></head><body>";
		// echo "<h1>Hello!</h1>";
		// echo "<p>これは、サンプルで作成したページです。</p><p>";

		// if ($a != '')
		// {
		// 	echo " パラメータA:" .$a;
		// }

		// if ($b != '')
		// {
		// 	echo " パラメータB:" .$b;
		// }

		// echo "</body></html>";
	}

	public function err()
	{
		$this->autoRender = false;
		echo "<html><head></head><body>";
		echo "<h1>Hello</h1>";
		echo "<p>パラメータはありませんでした</p>";
		echo "</body></html>";
	}
}

?>