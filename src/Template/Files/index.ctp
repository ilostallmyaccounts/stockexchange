<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\File[]|\Cake\Collection\CollectionInterface $files
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New File'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="files index large-9 medium-8 columns content">
    <h3><?= __('Files') ?></h3>
	<div class="content">
		<!-- Table -->
		<table class="table">
			<tr>
				<th width="5%">#</th>
				<th width="20%">File</th>
				<th width="12%">Upload Date</th>
			</tr>
			<?php if($filesRowNum > 0):$count = 0; foreach($files as $file): $count++;?>
			<tr>
				<td><?php echo $count; ?></td>
				<td><embed src="<?= $file->path.$file->name ?>" width="220px" height="150px"></td>
				<td><?php echo $file->created; ?></td>
			</tr>
			<?php endforeach; else:?>
			<tr><td colspan="3">No file(s) found......</td>
			<?php endif; ?>
		</table>
	</div>
</div>
