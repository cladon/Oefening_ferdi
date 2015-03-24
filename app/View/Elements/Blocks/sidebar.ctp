<!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
      <div class="user-info-wrapper">
        <div class="profile-wrapper"> </div>
        <div class="user-info">
          <div class="greeting">Welcome</div>
          <div class="username">Test <span class="semi-bold">Persoon</span></div>
          <div class="status">Status<a href="#">
            <div class="status-icon green"></div>
            Online</a></div>
        </div>
      </div>
      <!-- END MINI-PROFILE -->
      <!-- BEGIN SIDEBAR MENU -->
    <p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
      <ul>
        <li class="start "> <a href="index.html" > <i class="icon-custom-home"></i> <span class="title">Dashboard</span> <span class="selected"></span></span> </a> 
		  
	    </li>
	      <li class=""> <a href="javascript:;"> <i class="fa fa fa-eur"></i> <span class="title">Invoices</span> <span class="arrow "></span> </a>
            <ul class="sub-menu">
            	<li> <a href="<?php echo Router::url(array('controller' => 'invoices','action' => 'search'));?>">Search Invoices </a> </li>
              <li> <a href="<?php echo Router::url(array('controller' => 'invoices','action' => 'index'));?>">View Invoices </a> </li>
              <li> <a href="<?php echo Router::url(array('controller' => 'invoices','action' => 'add'));?>">Add Invoices </a> </li>

            </ul>
        </li>  
        <li class=""> <a href="javascript:;"> <i class="fa fa fa-windows"></i> <span class="title">Companies</span> <span class="arrow "></span> </a>
            <ul class="sub-menu">
              <li> <a href="<?php echo Router::url(array('controller' => 'companies','action' => 'index'));?>">Overview Companies </a> </li>
              <li> <a href="<?php echo Router::url(array('controller' => 'companies','action' => 'add'));?>">Add Companies </a> </li>

            </ul>
        </li>  

      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>

  <!-- END SIDEBAR -->