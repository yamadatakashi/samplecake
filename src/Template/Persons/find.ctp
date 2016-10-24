<div>
	<h3>Find Person</h3>
	<?= $msg ?>
	<?= $this->Form->create() ?>
	<fieldset>
		<?= $this->Form->input('find') ?>
		<?= $this->Form->button('Submit') ?>
		<?= $this->Form->end() ?>
	</fieldset>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<tr>NAME</tr>
				<tr>AGE</tr>
				<tr>MAIL</tr>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($persons as $person): ?>
				<tr>
					<!-- モデルを使う場合 -->
					<!-- <td><?= h($person->id) ?></td>
					<td><?= h($person->name) ?></td>
					<td><?= h($person->age) ?></td>
					<td><?= h($person->mail) ?></td> -->

					<!--クエリを使う場合 連想配列になる-->				
					<td><?= h($person['id']) ?></td>
					<td><?= h($person['name']) ?></td>
					<td><?= h($person['age']) ?></td>
					<td><?= h($person['mail']) ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>