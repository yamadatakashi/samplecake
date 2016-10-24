<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\DataSource\ConnectionManager;
use Cake\Validation\Validator;

class PersonsController extends AppController
{
	public $paginate = [
		'limit' => 5,
		'order' => [
			'Persons.id' => 'asc'
		],
		'fields' => ['id', 'name', 'age', 'mail']
	];

	public $helpers = [

		'Paginator' => [
			'templates' => 'paginator-templates'
		]
	];

	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Paginator');
	}

	public function index()
	{
		//ページネイター
		$this->set('persons', $this->paginate());	//DB検索まで処理してくれるのか
		//通常の場合
		// $this->set('persons', $this->Persons->find('all'));
	}

	public function add()
	{
		$person = $this->Persons->newEntity();		//バリデーション対応
		$this->set('person', $person);

		if ($this->request->is('post'))
		{
			//バリデート追加
			$validator = new Validator();
			$validator->add('age', 'comparison', ['rule' => ['comparison', '>', '20']]);
			$validator->add('age', 'alphaNumeric', ['rule' => 'alphaNumeric']);
			$validator->add('mail', 'validFormat', ['rule' => 'email']);
			// $validator->add('mail', 'inList', ['rule' => ['taro', 'hanako']]);
			$validator->add('name', 'length', ['rule' => ['minLength', 5]]);
			$validator->add('name', 'length', ['rule' => ['maxLength', 20]]);

			$errors = $validator->errors($this->request->data);

			if(!empty($errors))
			{
				// $this->Flash->error($errors(0));	//errrosの出力方法を調べる
				$this->Flash->error('Please check entered value...');
			}
			else
			{
				$person = $this->Persons->patchEntity($person, $this->request->data);

				if($this->Persons->save($person))
				{
					return $this->redirect(['action'=>'index']);
				}

				// if($person->errors())
				// {
				// 	$this->Flash->error('Please check entered value...');
				// }
			}
		}
	}

	public function edit($id = null)
	{
		$person = $this->Persons->get($id);

		if($this->request->is(['post', 'put']))
		{
			$person = $this->Persons->patchEntity($person, $this->request->data);

			if($this->Persons->save($person))
			{
				return $this->redirect(['action' => 'index']);
			}
		}
		else
		{
			$this->set('person', $person);
		}
	}

	public function delete($id = null)
	{
		$person = $this->Persons->get($id);

		if($this->request->is(['post', 'put']))
		{
			if ($this->Persons->delete($person))
			{
				return $this->redirect(['action'=>'index']);
			}
		}
		else
		{
			$this->set('person', $person);
		}
	}


	public function find()
	{
		$persons = [];

		if ($this->request->is('post')) 
		{
			$find = $this->request->data['find'];
			
			//通常検索
			// $persons = $this->Persons->find()->select(['id', 'name', 'mail', 'age'])->where(["name like " => '%' .$find. '%'])->order(["id" => 'ASC']);

			//ダイナミックファインダー
			// $persons = $this->Persons->findByName($find);


			$query = $this->Persons->find();

			//QueryExpression
			// $exp = $query->newExpr();
			// $fnc = function($exp, $f) {
			// 	return $exp
			// 			->gte('age', 1)
			// 			->isNotNull('name')
			// 			->isNotNull('mail')
			// 			->in('name', explode(',', $f));
			// };
			// $persons = $query->where($fnc($exp, $find));


			//クエリを使う場合
			$connection = ConnectionManager::get('default');
			$query = 'Select * from persons where ' . $find;
			$persons = $connection->query($query);

			$count = $persons->count();
			$this->set('msg', $count. "件見つかりました");

			$persons->fetchAll();
		}
		else
		{
			$this->set('msg', "検索してください");
		}

		$this->set('persons', $persons);
	}




	
}
