<div class="cashflows form">
<?php echo $this->Form->create('Cashflow'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cashflow'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date');
		echo $this->Form->input('prio');
		echo $this->Form->input('amount');
		echo $this->Form->input('cashflow');
		echo $this->Form->input('type');
		echo $this->Form->input('type_identifier');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cashflow.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Cashflow.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cashflows'), array('action' => 'index')); ?></li>
	</ul>
</div>
