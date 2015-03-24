<div class="cashflows view">
<h2><?php echo __('Cashflow'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cashflow['Cashflow']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($cashflow['Cashflow']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prio'); ?></dt>
		<dd>
			<?php echo h($cashflow['Cashflow']['prio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($cashflow['Cashflow']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cashflow'); ?></dt>
		<dd>
			<?php echo h($cashflow['Cashflow']['cashflow']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($cashflow['Cashflow']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Identifier'); ?></dt>
		<dd>
			<?php echo h($cashflow['Cashflow']['type_identifier']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($cashflow['Cashflow']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cashflow['Cashflow']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cashflow'), array('action' => 'edit', $cashflow['Cashflow']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cashflow'), array('action' => 'delete', $cashflow['Cashflow']['id']), array(), __('Are you sure you want to delete # %s?', $cashflow['Cashflow']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cashflows'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cashflow'), array('action' => 'add')); ?> </li>
	</ul>
</div>
