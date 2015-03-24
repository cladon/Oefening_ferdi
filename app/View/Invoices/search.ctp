 <div class="row">
 	<?php echo $this->Form->create('Invoice', array('inputDefaults' => array('label' => false))); ?>
 	<fieldset>
	   <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Search <span class="semi-bold">Invoice</span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                    	
						 <h3>Company</h3>
		                    <?=$this->Form->input('companyid', array(
								    'options' => array($companies),
									'multiple' => true,
									'style' =>'>width:100%'));
								?>
					 </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
						 <h3>Incoming/Outgoing</h3>
		                 
		                  <?=$this->Form->input('invoiceType', array(
								    'options' => array($invoiceTypes),
									'multiple' => true,
									'style' =>'>width:100%'));
								    ?>
                
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
						 <h3>Virtual Invoice</h3>
		                 
		                <?=$this->Form->input('virtual', array(
								    'options' => array('1' => 'Yes', '0' => 'No'),
									'multiple' => true,
									'style' =>'>width:100%'));
								    ?>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
						 <h3>Paid</h3>
		               <?=$this->Form->input('paid', array(
								    'options' => array('1' => 'Yes', '0' => 'No'),
									'multiple' => true,
									'style' =>'>width:100%'));
								    ?>
		                              
                    </div>
               	 </div>
                <div class="row">
                	 <div class="col-md-4 col-sm-4 col-xs-4">
						 <h3>Invoice Dates (incl.)</h3>
		                 
		                 <div class="controls">
                         <div class="input-append success date col-md-10 col-lg-6 no-padding">
                     <?=$this->Form->input('begindateInvoicedate', array('type' => 'text', 'class'=> 'form-control', 'value'=>'2015/01/01'));?>
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>
                       </div>  
                    <div class="clearfix"></div>  
                    
                    <div class="controls">
                         <div class="input-append success date col-md-10 col-lg-6 no-padding">
                     <?=$this->Form->input('enddateInvoicedate', array('type' => 'text', 'class'=> 'form-control', 'value'=>'3999/12/31'));?>
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>
                       </div>  
                    <div class="clearfix"></div>  
                
                    </div>
                    
                     <div class="col-md-4 col-sm-4 col-xs-4">
						 <h3>Invoice Expiration Dates (incl.)</h3>
		                 
		                 <div class="controls">
                         <div class="input-append success date col-md-10 col-lg-6 no-padding">
                     <?=$this->Form->input('begindateInvoicedateexp', array('type' => 'text', 'class'=> 'form-control', 'value'=>'2015/01/01'));?>
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>
                       </div>  
                    <div class="clearfix"></div>  
                    
                    <div class="controls">
                         <div class="input-append success date col-md-10 col-lg-6 no-padding">
                     <?=$this->Form->input('enddateInvoicedateexp', array('type' => 'text', 'class'=> 'form-control', 'value'=>'3999/12/31'));?>
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>
                       </div>  
                    <div class="clearfix"></div>  
                
                    </div>
                    
                    <div class="col-md-4 col-sm-4 col-xs-4">
						 <h3>Paydates (incl.)</h3>
		                 
		                 <div class="controls">
                         <div class="input-append success date col-md-10 col-lg-6 no-padding">
                     <?=$this->Form->input('begindateInvoicepaydate', array('type' => 'text', 'class'=> 'form-control', 'value'=>'2015/01/01'));?>
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>
                       </div>  
                    <div class="clearfix"></div>  
                    
                    <div class="controls">
                         <div class="input-append success date col-md-10 col-lg-6 no-padding">
                     <?=$this->Form->input('enddateInvoicepaydate', array('type' => 'text', 'class'=> 'form-control', 'value'=>'3999/12/31'));?>
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>
                       </div>  
                    <div class="clearfix"></div>  
                
                    </div>

                 </div>
				
                <div class="row">
                	  <div class="col-md-6 col-sm-6 col-xs-6">
                     <h3>Internal Invoice Number</h3>
                        <div class="controls">
                          <?=$this->Form->input('invoice_number_int', array('class'=> 'form-control'));?>
                        </div>
                   	</div>
                   	 <div class="col-md-6 col-sm-6 col-xs-6">
                      <h3>External Invoice Number</h3>
                        <div class="controls">
                          <?=$this->Form->input('invoice_number_ext', array('class'=> 'form-control', 'value' => ''));?>
                        </div>
                   	</div>
                 </div>
                <div class="row">
                	 <div class="col-md-3 col-sm-3 col-xs-3" >
                   <h3>Amount </h3>
                    <?=$this->Form->input('sign_excl', array(
								    'options' => array('>' => '>', '<' => '<', '=' => '=', '<=' => '<=', '>=' => '>='),
									
									'style' =>'>width:100%'));
								    ?>
                	    
                  </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                    <h3>Excl.</h3>
                    
                        <div class="controls">
                        	
                       <?=$this->Form->input('amount_excl_min', array('class'=> 'form-control', 'value'=>'0'));?>
                        <?=$this->Form->input('amount_excl_max', array('class'=> 'form-control', 'value'=>'0'));?>
                      
                        </div>  

                    </div>
                </div>
                <div class="row">
                	 <div class="col-md-3 col-sm-3 col-xs-3" >
                   <h3>Amount </h3>
                    <?=$this->Form->input('sign_incl', array(
								    'options' => array('>' => '>', '<' => '<', '=' => '=', '<=' => '<=', '>=' => '>='),
									
									'style' =>'>width:100%'));
								    ?>
                	    
                  </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                    <h3>Incl.</h3>
                    
                        <div class="controls">
                        	
                       <?=$this->Form->input('amount_incl_min', array('class'=> 'form-control', 'value'=>'0'));?>
                        <?=$this->Form->input('amount_incl_max', array('class'=> 'form-control', 'value'=>'0'));?>
                      
                        </div>  

                    </div>
                </div>
                <div class="row">
           
                 <div class="col-md-12 col-sm-12 col-xs-12">
                     	<div class="form-actions">  
							<div class="pull-right">
                 	   <?php   $options = array('label' => 'Search','div' => array('class' => 'btn btn-success btn-cons', )); echo $this->Form->end($options); ?>           
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
