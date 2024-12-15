@extends('dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Email</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=""><i class="la la-home font-20"></i></a>
                    </li>
                   
                </ol>
            </div>
            <div class="page-content fade-in-up">
            <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Send Email</div>

                       
                    </div>
                  
                    <div class="ibox-body">
                <form action="{{route('send.email.submit')}}" method="POST" >
                            @csrf
                    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label for="">Subject: <label style="color: red">*</label></label>
                                    <input type="text"  name="subject" class="form-control" placeholder="Enter.." required>
                                </div>
                                <div class="form-group ">
                                    <label for="">Message: <label style="color: red">*</label></label>
                                    <textarea name="comment" class="form-control h_150" placeholder="Enter.." required rows="10"></textarea>
                                </div>
                                <!-- <div id="summernote" name="comment" data-plugin="summernote" data-air-mode="true">
                                 </div> -->
                            </div>
                            
                          
                               
                            
                    </div>
                   
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-check-circle"></i> Send Email  </button>
                        </div>
                </form>
                    </div>

                    
                </div>

                
            </div>
            <!-- END PAGE CONTENT-->
           
        </div>
        
     
@endsection