 <div class="row">
 	<?php echo $this->Form->create('Invoice', array('inputDefaults' => array('label' => false))); ?>
 	<fieldset>
	   <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Add <span class="semi-bold">Invoice</span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <div class="form-group">
                        <label class="form-label">Virtual Invoice</label>
                        <span class="help">Click for 'Yes'"</span>
                        <div class="controls">
                          <?=$this->Form->input('virtual', array('label' => 'Yes'));?>
                         </div>
                      </div>
                   	</div>
                   	<div class="col-md-3 col-sm-3 col-xs-3">
                      <div class="form-group">
                        <label class="form-label">Paid</label>
                        <span class="help">Click for 'Yes'"</span>
                        <div class="controls">
                          <?=$this->Form->input('paid', array('label' => 'Yes'));?>
                        </div>
                      </div>
                   	</div>
                   	<div class="col-md-3 col-sm-3 col-xs-3">
                      <div class="form-group">
                        <label class="form-label">Incoming/Outgoing</label>
                         <div class="controls">
                          <?=$this->Form->input('invoice_type_id');?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                      <div class="form-group">
                        <label class="form-label">Company</label>
                         <div class="controls">
                          <?=$this->Form->input('company_id');?>
                        </div>
                      </div>
                    </div>
               	 </div>
                <div class="row">
				   <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <label class="form-label">Date Invoice</label>
                        <div class="controls">
                         <div class="input-append success date col-md-10 col-lg-6 no-padding">
                     <?=$this->Form->input('date', array('type' => 'text', 'class'=> 'form-control', 'value'=>'2014/11/14'));?>
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>
                       </div>  
                    <div class="clearfix"></div>   
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <label class="form-label">Exp.Date</label>
                        <div class="controls">
                         <div class="input-append success date col-md-10 col-lg-6 no-padding">
                     <?=$this->Form->input('date_exp', array('type' => 'text', 'class'=> 'form-control', 'value'=>'2014/11/14'));?>
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>
                       </div>  
                      <div class="clearfix"></div> 
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <label class="form-label">Paydate</label>
                        <div class="controls">
                         <div class="input-append success date col-md-10 col-lg-6 no-padding">
                     <?=$this->Form->input('paydate', array('type' => 'text', 'class'=> 'form-control', 'value'=>'2014/11/14'));?>
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>
                       </div>  
                       <div class="clearfix"></div>
                      </div>
                    </div>
                </div>
                <div class="row">
                	  <div class="col-md-6 col-sm-6 col-xs-6">
                      <div class="form-group">
                        <label class="form-label">Internal Invoice Number</label>
                        <div class="controls">
                          <?=$this->Form->input('invoice_number_int', array('class'=> 'form-control'));?>
                        </div>
                      </div>
                   	</div>
                   	 <div class="col-md-6 col-sm-6 col-xs-6">
                      <div class="form-group">
                        <label class="form-label">External Invoice Number</label>
                        <div class="controls">
                          <?=$this->Form->input('invoice_number_ext', array('class'=> 'form-control'));?>
                        </div>
                      </div>
                   	</div>
                 </div>
                <div class="row">
                	 <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <label class="form-label">Amount Excl. VAT</label>
                        <div class="controls">
                       
                     <?=$this->Form->input('amount_excl', array('class'=> 'form-control', 'value'=>'204'));?>
                        </div>  
                       
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <label class="form-label">VAT</label>
                        <div class="controls">
                      <?=$this->Form->input('VAT', array('class'=> 'form-control', 'value'=>'21'));?>
                        </div>  
                       
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <label class="form-label">Amount Incl.</label>
                        <div class="controls">
                       <?=$this->Form->input('amount_incl', array('class'=> 'form-control', 'value'=>'2000'));?>
                        </div>  
                       
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="form-group">
                        <label class="form-label">Work Month</label>
                        <div class="controls">
                      <?=$this->Form->input('workmonth', array('class'=> 'form-control'));?>
                        </div>  
                       
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="form-group">
                        <label class="form-label">Hour rate</label>
                        <div class="controls">
                       <?=$this->Form->input('hourrate', array('class'=> 'form-control'));?>
                        </div>  
                       
                      </div>
                    </div>
                	<div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="form-group">
                        <label class="form-label">Number of Hours</label>
                        <div class="controls">
                       <?=$this->Form->input('hours', array('class'=> 'form-control'));?>
                        </div>  
                       
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="form-group">
                        <label class="form-label">Number of Days</label>
                        <div class="controls">
                       
                     <?=$this->Form->input('days', array('class'=> 'form-control'));?>
                        </div>  
                       
                      </div>
                    </div>
                    
                </div>
                <div class="row">
                	  <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="form-group">
                        <label class="form-label">Remarks</label>
                        <div class="controls">
                      <?=$this->Form->input('descr', array('class'=> 'form-control'));?>
                        </div>  
                       
                      </div>
                    </div>
                       <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="form-group">
                        <label class="form-label">Repeat for X months</label>
                        <div class="controls">
                      <?=$this->Form->input('repeat', array('class'=> 'form-control', 'value' => 0));?>
                        </div>  
                       
                      </div>
                    </div>
                  
                 <div class="col-md-12 col-sm-12 col-xs-12">
                     	<div class="form-actions">  
							<div class="pull-right">
                 	   <?php   $options = array('label' => 'Add Invoice','div' => array('class' => 'btn btn-success btn-cons', )); echo $this->Form->end($options); ?>           
 							</div>
                 
                     </div>
                    </div>
    			</div>
    			
                  </div>
                 </div>
              </div>
            </div>
          </div>
	



<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Invoices'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Invoice Types'), array('controller' => 'invoice_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice Type'), array('controller' => 'invoice_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
