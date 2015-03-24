
 <div class="row">
                    <div class="col-md-18">
                        <div class="grid simple ">
                            <div class="grid-title no-border">
                                <h4>Invoices</span></h4>
                                <div class="tools">	<a href="javascript:;" class="collapse"></a>
									<a href="#grid-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                                <!--  <h3>Basic  <span class="semi-bold">Table</span></h3>-->
                                    <table class="table no-more-tables">
                                        <thead>
                                            <tr>
                                                <th style="width:1%" >
                                                    <div class="checkbox check-default">
														<input id="checkbox10" type="checkbox" value="1" class="checkall">
														<label for="checkbox10"></label>
													</div>
                                                </th>
                                                <th style="width:4%"><?php echo 'id'; ?></th>
                                                <th style="width:4%"><?php echo 'company'; ?></th>
												<th style="width:4%"><?php echo 'Type'; ?></th>
												<th style="width:4%"><?php echo 'inv.nbr.int'; ?></th>
												<th style="width:4%"><?php echo 'inv.nbr.ext'; ?></th>
												<!--<th style="width:4%"><?php echo $this->Paginator->sort('amount_excl'); ?></th>
												<th style="width:4%"><?php echo 'VAT'; ?></th>-->
												<th style="width:4%"><?php echo 'Amount'; ?></th>
												<th style="width:10%"><?php echo 'date'; ?></th>
												<th style="width:10%"><?php echo 'date_exp'; ?></th>
												<th style="width:10%"><?php echo 'paydate'; ?></th>
												<th style="width:4%"><?php echo 'virtual'; ?></th>
												<th style="width:4%"><?php echo 'paid'; ?></th>
												<!--<th style="width:4%"><?php echo $this->Paginator->sort('workmonth'); ?></th>
												<th style="width:4%"><?php echo $this->Paginator->sort('hourrate'); ?></th>
												<th style="width:4%"><?php echo $this->Paginator->sort('hours'); ?></th>
												<th style="width:4%"><?php echo $this->Paginator->sort('days'); ?></th>
												<th style="width:4%"><?php echo $this->Paginator->sort('descr'); ?></th>
												<th style="width:4%"><?php echo $this->Paginator->sort('created'); ?></th>
												<th style="width:4%"><?php echo $this->Paginator->sort('modified'); ?></th>-->
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($invoices as $invoice): ?>
                                            <tr>
                                                <td class="v-align-middle">
                                                     <div class="checkbox check-default">
														<input id="checkbox11" type="checkbox" value="1">
														<label for="checkbox11"></label>
													</div>
                                                </td>
                                                <td class="v-align-middle"><?php echo h($invoice['Invoice']['id']); ?></td>
                                                <td class="v-align-middle"><span class="muted">
                                                	<?php echo $this->Html->link($invoice['Company']['name'], array('controller' => 'companies', 'action' => 'view', $invoice['Company']['id'])); ?>
                                                </span>
                                            	</td>
                                            	<td class="v-align-middle"><span class="muted">
                                                	<?php echo $this->Html->link($invoice['InvoiceType']['name'], array('controller' => 'invoice_types', 'action' => 'view', $invoice['InvoiceType']['id'])); ?>
											     </span>
                                            	</td>
                                            	<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['invoice_number_int']); ?></span></td>
                                                <td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['invoice_number_ext']); ?></span></td>
                                               <!-- <td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['amount_excl']); ?></span></td>
                                                <td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['VAT']); ?></td>-->
												<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['amount_incl']); ?></td>
												<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['date']); ?></td>
												<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['date_exp']); ?></td>
												<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['paydate']); ?></td>
												<td class="v-align-middle"><span class="muted">
													
													<?php if($invoice['Invoice']['virtual'] == 1){
															echo '<span class="label label-important">Yes</span>';
														}else{
															echo '<span class="label label-success">No</span>';
														};
													 ?>
													</td>
												<td class="v-align-middle"><span class="muted">
													
													<?php if($invoice['Invoice']['paid'] == 1){
															echo '<span class="label label-success">Yes</span>';
														}else{
															echo '<span class="label label-important">No</span>';
														};
													 ?>
													</td>
												<!--<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['workmonth']); ?></td>
												<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['hourrate']); ?></td>
												<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['hours']); ?></td>
												<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['days']); ?></td>
												<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['descr']); ?></td>
												<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['created']); ?></td>
												<td class="v-align-middle"><span class="muted"><?php echo h($invoice['Invoice']['modified']); ?></td>-->
                                                <td class="actions">
													<?php echo $this->Html->link(__('View'), array('action' => 'view', $invoice['Invoice']['id'])); ?>
													<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $invoice['Invoice']['id'])); ?>
													<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $invoice['Invoice']['id']), array(), __('Are you sure you want to delete # %s?', $invoice['Invoice']['id'])); ?>
												</td>
                                            </tr>
                                          <?php endforeach; ?>  
                                        </tbody>
                                    </table>
                                    
                              <p>
								
                            </div>
                    </div>
                    </div>
                </div>
              

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Invoice'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Invoice Types'), array('controller' => 'invoice_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice Type'), array('controller' => 'invoice_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
