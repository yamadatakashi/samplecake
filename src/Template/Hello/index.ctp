<div>
	<h3>Index Page by Temp</h3>
	<ul class="side-nav">
		<li>This is Sample!!</li>
	</ul>

	<p><?= $message ?></p>

	<?= $this->Form->create(null, [
		'type'=>'post',
		'url'=>[
			'controller'=>'Hello',
			'action'=> 'index'
		]
	]) ?>
	<?= $this->Form->text('text1', ['placeholder' => 'please input...']) ?>
	<?= $this->Form->password('pass', ['placeholder' => '8文字以上の半角英数字']) ?>
	<?= $this->Form->hidden('secret', ['value'=>'秘密']) ?>
	<?= $this->Form->textarea('textarea') ?>
	<?= $this->Form->checkbox('check1', ['id'=>'checkbox1']) ?><?= $this->Form->label('check1', 'check1!') ?>
	<?= $this->Form->checkbox('check2', ['id'=>'checkbox2']) ?><?= $this->Form->label('check2', 'check2!') ?>
	<?= $this->Form->checkbox('check3', ['id'=>'checkbox3']) ?><?= $this->Form->label('check3', 'check3!') ?>
	<?= $this->Form->radio('radio', [['value'=>'男', 'text'=>'male','checked'=>true], ['value'=>'女', 'text'=>'female']]) ?>
	<?= $this->Form->select('select', [['value'=>'Mac', 'text'=>'Mac'], ['value'=>'Windows', 'text'=>'Windows'], ['value'=>'Linux', 'text'=>'Linux']]) ?>
	<?= $this->Form->select('select2', [['value'=>'Mac', 'text'=>'Mac'], ['value'=>'Windows', 'text'=>'Windows'], ['value'=>'Linux', 'text'=>'Linux']], ['multiple'=>true]) ?>
	<?= $this->Form->date('date', [
		'year'=>['style'=>'width:100px;'],
		'month'=>['style'=>'width:100px;'],
		'day'=>['style'=>'width:100px;']
	]) ?>
	<hr>
	<?= $this->Form->time('time', [
		'interval'=>5,
		'hour'=>['style'=>'width:100px;'],
		'minute'=>['style'=>'width:100px;'],
		'second'=>['style'=>'width:100px;']
	]) ?>
	<hr>
	<?= $this->Form->year('year', ['style'=>'width:100px;', 'minYear'=>1950, 'maxYear'=>2018]) ?>
	<?= $this->Form->month('month', ['style'=>'width:100px;']) ?>
	<?= $this->Form->day('day', ['style'=>'width:100px;']) ?>
	<?= $this->Form->hour('hour', ['style'=>'width:100px;']) ?>
	<?= $this->Form->minute('minute', ['style'=>'width:100px;']) ?>
	<?= $this->Form->submit('OK') ?>
	<?= $this->Form->end() ?>

<!-- 上記、ヘルパーを利用してみる
 	<form method="post" action="/hello/index">
		<input type="text" name="text1">
		<input type="submit">
	</form> -->

	<br /><br />
	⬇︎クエリーでidとnameをいれてね<br />
	<p><?= $message2 ?></p>

</div>