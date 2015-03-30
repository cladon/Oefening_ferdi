<div class="cashflows index">
	<h2><?php echo __('Cashflows'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('prio'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('cashflow'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('type_identifier'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>

	<?php foreach ($cashflows as $cashflow):
                if ($cashflow['Cashflow']['cashflow'] < 50000)
                   {
                   if ($cashflow['Cashflow']['cashflow'] < 0)
                      {
                      ?>
                      <tr BGCOLOR="#FF4500">
                      <?php
                      }
                   else
                      {
                      ?>
                      <tr BGCOLOR="#FFA500">
                      <?php
                      }
                   }?>
                <td><?php echo h($cashflow['Cashflow']['id']); ?>&nbsp;</td>
                <td><?php echo h($cashflow['Cashflow']['date']); ?>&nbsp;</td>
                <td><?php echo h($cashflow['Cashflow']['prio']); ?>&nbsp;</td>
                <td><?php echo h($cashflow['Cashflow']['amount']); ?>&nbsp;</td>
                <td><?php echo h($cashflow['Cashflow']['cashflow']); ?>&nbsp;</td>
                <td><?php echo h($cashflow['Cashflow']['type']); ?>&nbsp;</td>
                <td><?php echo h($cashflow['Cashflow']['type_identifier']); ?>&nbsp;</td>
                <td><?php echo h($cashflow['Cashflow']['created']); ?>&nbsp;</td>
                <td><?php echo h($cashflow['Cashflow']['modified']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $cashflow['Cashflow']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cashflow['Cashflow']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cashflow['Cashflow']['id']), array(), __('Are you sure you want to delete # %s?', $cashflow['Cashflow']['id'])); ?>
                </td>
            </tr>
     <?php endforeach; ?>

	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cashflow'), array('action' => 'add')); ?></li>
	</ul>
</div>
