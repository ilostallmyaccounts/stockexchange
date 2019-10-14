
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="files form large-9 medium-8 columns content">
	<?= $this->Flash->render() ?>
	<div class="upload-frm">
		<?php echo $this->Form->create($uploadData, ['type' => 'file']); ?>
			<?php echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control']); ?>
			<?php echo $this->Form->button(__('Upload File'), ['type'=>'submit', 'class' => 'form-controlbtn btn-default']); ?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>