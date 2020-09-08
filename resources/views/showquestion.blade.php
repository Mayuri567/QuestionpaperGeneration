<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->

<!-- Specific Page Data -->
<!-- End of Data -->


<!-- Mirrored from www.venmond.com/demo/vendroid/pages-user-profile-form.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Apr 2020 05:27:57 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Questions</title>
    <meta name="keywords" content="HTML5 Template, CSS3, All Purpose Admin Template, Vendroid" />
    <meta name="description" content="User Profile Form - Responsive Admin HTML Template">
    <meta name="author" content="Venmond">
    
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href=/img/ico/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href=/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href=/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href=/img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href=/img/ico/favicon.png">
    
    
    <!-- CSS -->
       
    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
    <link href="/css/font-entypo.css" rel="stylesheet" type="text/css">    

    <!-- Fonts CSS -->
    <link href="/css/fonts.css"  rel="stylesheet" type="text/css">
               
    <!-- Plugin CSS -->
    <link href="/plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
    <link href="/plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="/plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="/plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
	<link href="/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 
   
         
    <link href="/plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="/plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
    <link href="/plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
    <link href="/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">    
    <link href="/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="/plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">            

	<!-- Specific CSS -->
	    
     
    <!-- Theme CSS -->
    <link href="/css/theme.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="/css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->    


        
    <!-- Responsive CSS -->
        	<link href="/css/theme-responsive.min.css" rel="stylesheet" type="text/css"> 

	  
 
 
    <!-- for specific page in style css -->
        
    <!-- for specific page responsive in style css -->
        
    
    <!-- Custom CSS -->
    <link href="/custom/custom.css" rel="stylesheet" type="text/css">



    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="/js/modernizr.js"></script> 
    <script type="text/javascript" src="/js/mobile-detect.min.js"></script> 
    <script type="text/javascript" src="/js/mobile-detect-modernizr.js"></script> 
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="js/html5shiv.js"></script>
      <script type="text/javascript" src="js/respond.min.js"></script>     
    <![endif]-->
    
</head>    

<body id="pages" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="pages "  data-smooth-scrolling="1">     

<!-- edit modal -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <center><h5 class="modal-title " id="exampleModalLongTitle">EDIT QUESTION</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="editdepart">
      @csrf
  <div class="form-group">
    <label for="exampleInputID">Question ID</label>
    <input type="text" class="form-control" id="questionid" name="questionid" aria-describedby="emailHelp" disabled>
  </div>
  <div class="form-group">
    <label for="exampleInputName">Question</label>
    <input type="text" class="form-control" id="question" name="question" placeholder="Question">
  </div>
  <div class="form-group">
    <label for="exampleInputText">Chapter</label>
    <select name="chapter">
                            <option value="">Select Chapter</option>
                            @foreach($chap as $st)
                            <option value="{{$st->chapter_id}}">{{$st->chapter_name}}</option>
                            @endforeach
                          </select>
  </div>
  <div class="form-group">
    <label for="exampleInputName">Difficulty Level</label>
    <select name="level" id="">
    <option value="">Select Level</option>
    <option value="easy">Easy</option>
    <option value="medium">Medium</option>
    <option value="hard">Hard</option>
    </select>
    <!-- <input type="text" class="form-control" id="credit" name="credit" placeholder="Credit"> -->
  </div>
</form>
      </div>
      <div class="modal-footer bg-success">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submitdepart" class="btn btn-primary">Save Data</button>
      </div>
    </div>
  </div>
</div>






<!-- edit endmodal -->



<!-- model delete -->

<div class="modal fade" id="condelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="deletedepart">
    @csrf
      <input type="hidden" name="id" id="delete_id">
      <p><h4>Are You Sure You Want To Delete This Data?</h4></p>
      </div>
      <div class="modal-footer bg-danger">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Delete Data</button>
      </form>  
      </div>
    </div>
  </div>
</div>


<!-- end model delete/ -->





<div class="vd_body">
<!-- Header Start -->
  <header class="header-1" id="header">
      <div class="vd_top-menu-wrapper">
        <div class="container ">
          <div class="vd_top-nav vd_nav-width  ">
          <div class="vd_panel-header">
          	<div class="logo">
            	<!-- <a href="index.html"><img alt="logo" src="img/logo.png"></a> -->
            </div>
            <!-- logo -->
            <div class="vd_panel-menu  hidden-sm hidden-xs" data-intro="<strong>Minimize Left Navigation</strong><br/>Toggle navigation size to medium or small size. You can set both button or one button only. See full option at documentation." data-step=1>
            		                	<span class="nav-medium-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Medium Nav Toggle" data-action="nav-left-medium">
	                    <i class="fa fa-bars"></i>
                    </span>
<!--                                 		                    
                	<span class="nav-small-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Small Nav Toggle" data-action="nav-left-small">
	                    <i class="fa fa-ellipsis-v"></i>
                    </span>  -->
                                       
            </div>
            <div class="vd_panel-menu left-pos visible-sm visible-xs">
                                 
                        <span class="menu" data-action="toggle-navbar-left">
                            <i class="fa fa-ellipsis-v"></i>
                        </span>  
                            
                              
            </div>
            <div class="vd_panel-menu visible-sm visible-xs">
                	<span class="menu visible-xs" data-action="submenu">
	                    <i class="fa fa-bars"></i>
                    </span>        
                          
                        <span class="menu visible-sm visible-xs" data-action="toggle-navbar-right">
                            <i class="fa fa-comments"></i>
                        </span>                   
                   	 
            </div>                                     
            <!-- vd_panel-menu -->
          </div>
          <!-- vd_panel-header -->
            
          </div>    
          <div class="vd_container">
          	<div class="row">
            	<div class="col-sm-5 col-xs-12">
                </div>
                <div class="col-sm-7 col-xs-12">
              		<div class="vd_mega-menu-wrapper">
                    	<div class="vd_mega-menu pull-right">
            				<ul class="mega-ul">
    <li id="top-menu-1" class="one-icon mega-li"> 
      <div class="vd_mega-menu-content width-xs-3 width-sm-4 width-md-5 right-xs left-sm" data-action="click-target">
    <li id="top-menu-profile" class="profile mega-li"> 
        <a href="#" class="mega-link"  data-action="click-trigger"> 
            <span  class="mega-image">
            <img src="facultyphoto/{{session('photo')}}" alt="example image" />&nbsp               
            </span>
            <span class="mega-name">
                {{Session::get('fname')}} <i class="fa fa-caret-down fa-fw"></i> 
            </span>
        </a> 

      <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
        <div class="child-menu"> 
        	<div class="content-list content-menu">
                <ul class="list-wrapper pd-lr-10">
                <li> <a href="editfaculty/{{session('fid')}}"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Edit Profile</div> </a> </li>
                    
                    <li> <a href="logoutfaculty"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Sign Out</div> </a> </li>
                    
                </ul>
            </div> 
        </div> 
      </div>     
    </li>               
	</ul>
<!-- Head menu search form ends -->                         
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </div>
        <!-- container --> 
      </div>
      <!-- vd_primary-menu-wrapper --> 

  </header>
  <!-- Header Ends --> 
  <div class="content">
  <div class="container">
    <div class="vd_navbar vd_nav-width vd_navbar-tabs-menu vd_navbar-left  ">
	<div class="navbar-menu clearfix">
        <div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu" data-intro="<strong>Expand Button</strong><br/>To expand all menu on left navigation menu." data-step=4 >
                <i class="fa fa-sort-amount-asc"></i>
            </span>                   
        </div>
    	<h3 class="menu-title hide-nav-medium hide-nav-small"> Features</h3>
        <div class="vd_menu">
        	 <ul>
    <li>
    	<a href="faculty">
        	<span class="menu-icon"><i class="fa fa-dashboard"></i></span> 
            <span class="menu-text">{{Session::get('fname')}}'S DASHBOARD</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"></span></span>
       	</a>
    </li>  



    <li>
    	<a href="subject" data-action="click-trigger">
        	<span class="menu-icon entypo-icon"><i class="fa fa-book"> </i></span> 
            <span class="menu-text">Subject</span>  
       	</a>
    </li>
    <li>
    <a href="chapter">
        	<span class="menu-icon entypo-icon"><i class="glyphicon glyphicon-book"> </i></span> 
            <span class="menu-text">Chapter</span>  
       	</a>
    </li>
    <li>
    	<a href="javascript:void(0);" data-action="click-trigger">
        	<span class="menu-icon entypo-icon"><i class="fa fa-pencil"> </i></span> 
            <span class="menu-text">Question</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
       	</a>
     	<div class="child-menu"  data-action="click-target">
            <ul>  
                <li>
                    <a href="addquestion">
                        <span class="menu-text">ADD QUESTION</span>  
                    </a>
                </li> 
                <li>
                    <a href="showquestion">
                        <span class="menu-text">VIEW QUESTIONS</span>                                      
                    </a>
                </li>                                                                                                                                                                                                                                               
            </ul>   
      	</div>
    </li>   
    <li>
    	<a href="javascript:void(0);" data-action="click-trigger">
        	<span class="menu-icon entypo-icon"><i class="fa fa-file-pdf-o"> </i></span> 
            <span class="menu-text">Question Paper</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
       	</a>
     	<div class="child-menu"  data-action="click-target">
            <ul>  
                <li>
                    <a href="generatequedtionpaper">
                        <span class="menu-text">Generate Qusetion Paper</span>  
                    </a>
                </li> 
                <li>
                    <a href="showquestionpaper">
                        <span class="menu-text">View Question Paper</span>                                      
                    </a>
                </li>                                                                                                                                                                                                                                               
            </ul>   
      	</div>
    </li>                
</ul>
<!-- Head menu search form ends -->         </div>             
    </div>
    <div class="navbar-spacing clearfix">
    </div>
    <div class="vd_menu vd_navbar-bottom-widget">
        <ul>
            <li>
                <a href="logoutfculty">
                    <span class="menu-icon"><i class="fa fa-sign-out"></i></span>          
                    <span class="menu-text">Logout</span>             
                </a>
                
            </li>
        </ul>
    </div>     
</div>    <div class="vd_navbar vd_nav-width vd_navbar-chat vd_bg-black-80 vd_navbar-right   ">
	<div class="navbar-tabs-menu clearfix">                                                 
    </div>
    <div class="navbar-spacing clearfix">
    </div>
</div>    
    <!-- Middle Content Start -->
    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <!-- <ul class="breadcrumb">
                <li><a href="index.html">Home</a> </li>
                <li><a href="listtables-tables-variation.html">List &amp; Tables</a> </li>
                <li class="active">Data Tables</li>
              </ul> -->
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      
</div>
 
            </div>
          </div>


          <div class="vd_register-page">

<div class="heading clearfix">
  <!-- <div class="logo">
    <h2 class="mgbt-xs-5"><img src="img/logo.png" alt="logo"></h2>
  </div> -->
  <!-- <h4 class="text-center font-semibold vd_grey">ADD COURSE HERE</h4> -->
</div>


</div>


          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <!-- <h1>Admins Details</h1> -->
              <!-- <small class="subtitle">Look <a href="http://www.datatables.net/">datatables.net</a> for more information</small> </div> -->
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Questions </h3>
                  </div>

                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>Chapter Name</th>
                          <th>Difficulty Level</th>
                          <th>Action</th>                          
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($ques as $q)
                      <tr>
                        <td>{{$q->question_id}} </td>
                        <td> {{$q->question}} </td>
                        <td> {{$q->chapter_name}} </td>
                        @if($q->difficulty_level=='easy')
                        <td><span class="label label-success">{{$q->difficulty_level}}</span></td>
                        
                        @elseif($q->difficulty_level=='medium')
                        <td><span class="label label-warning">{{$q->difficulty_level}}</span></td>
                        
                        @elseif($q->difficulty_level=='hard')
                        <td><span class="label label-danger">{{$q->difficulty_level}}</span></td>
                        @endif
                        <td>
                        <button data-id="editcourse" data-original-title="Edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow editcourse"><i class="fa fa-pencil"></i></button>
                        <button data-id="deletedata" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red deletebtn"> <i class="fa fa-times"></i></button>
                        </td>
                      </tr>
            @endforeach
            </tbody>
            </table>
            </div>

                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 
    </div>
    <!-- .vd_content-wrapper --> 
    
    <!-- Middle Content End --> 
    


<!-- Footer Start -->
  <!-- <footer class="footer-1"  id="footer">      
    <div class="vd_bottom ">
        <div class="container">
            <div class="row">
              <div class=" col-xs-12">
                <div class="copyright">
                  	Copyright &copy;2014 Venmond Inc. All Rights Reserved 
                </div>
              </div>
            </div>row
        </div>container
    </div>
  </footer> -->
<!-- Footer END -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== --> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


<script type="text/javascript">

$(document).ready(function(){

    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('.editcourse').on('click',function(){
        $('#editmodal').modal('show');

    $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#questionid').val(data[0]);
        $('#question').val(data[1]);
        $('#chapter').val(data[2]);
        $('#level').val(data[3]);
        $('#action').val(data[4]);

});

$('#submitdepart').on('click',function(e){
    e.preventDefault();
    
    var edit_id=$('#questionid').val();

    $.ajax({
      type: "PUT",
      url: "/editquestion/"+edit_id,
      data: $('#editdepart').serialize(),
      success: function (response) {
        $('#editmodal').modal('hide')
        swal("Good job!", "Data Edited Successfully!", "success");
        document.getElementById("editdepart").reset();
        setTimeout(function()
        {
            location.reload(true); 
        }, 3000);
       },
        error: function(error){
          console.log(error)
          alert("Data Not Saved Perfactly");
        }
    });
  });

    $('.deletebtn').on('click',function(){

        $('#condelete').modal('show');
        
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);
       
        $('#delete_id').val(data[0]);
});

$('#condelete').on('submit',function(e){
    e.preventDefault();
     
     var course_id=$('#delete_id').val();

     $.ajax({
        type: "GET",
        url: "/deletequestion/"+course_id,
        data: $('#deletedepart').serialize(),
        success:function(response){
            console.log(response);
            $('#condelete').modal('hide');
            // alert("data Delete");
            swal({
         title: "Good job!",
         text: "Data Deleted Sucessfully!!",
         icon: "success",
        });  
        setTimeout(function()
        {
            location.reload(true); 
        }, 3000);
        },
        error: function(error)
        {
            console.log(error);
        }
     });
});
});

    $('#submitchap').on('click',function(e){
    
    e.preventDefault();
    
    $.ajax({
      type: "POST",
      url: "/savechapter",
    //   enctype: "multipart/form-data",
      data: $('#addcourse').serialize(),
      success: function (response) {
        // console.log(response)
        $('#coursemodel').modal('hide')
        // alert("Data Saved");
        swal("Good job!", "Data Saved Successfully!", "success");
        document.getElementById("addcourse").reset();
        // $('#data').DataTables().ajax.reload();
        setTimeout(function(){
      window.location.reload(1);
        }, 2500);
       },
        error: function(error){
          console.log(error)
          alert("Data Not Saved");
        }
    });
  });

</script>

<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> -->

<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="js/jquery.js"></script> 
<!--[if lt IE 9]>
  <script type="text/javascript" src="js/excanvas.js"></script>      
<![endif]-->
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src='plugins/jquery-ui/jquery-ui.custom.min.js'></script>
<script type="text/javascript" src="plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript" src="js/caroufredsel.js"></script> 
<script type="text/javascript" src="js/plugins.js"></script>

<script type="text/javascript" src="plugins/breakpoints/breakpoints.js"></script>
<script type="text/javascript" src="plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

<script type="text/javascript" src="plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="plugins/tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="plugins/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="plugins/pnotify/js/jquery.pnotify.min.js"></script>

<script type="text/javascript" src="js/theme.js"></script>
<script type="text/javascript" src="custom/custom.js"></script>
 
<!-- Specific Page Scripts Put Here -->

<script type="text/javascript" src="plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/dataTables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
				"use strict";
				
				$('#data-tables').dataTable();
		} );
</script>

<!-- Specific Page Scripts END -->




<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->

<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script> 
@include('sweetalert::alert')
</body>

<!-- Mirrored from www.venmond.com/demo/vendroid/listtables-data-tables.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Apr 2020 15:02:37 GMT -->
</html>