@extends('dashboard')
@section('admin')




<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Reports</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=""><i class="la la-home font-20"></i></a>
                    </li>
                   
                </ol>
            </div>
            
            <div class="page-content fade-in-up">
            <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Orders Report View</div>
                        <div class="text-pull-right">
                       
                        </div>
                    </div>
                    <div class="ibox-body">
                   


                    
                     <div class="row">

                        <div class="col-md-12">
                                <div class="ibox">
                                    <div class="ibox-head">
                                        <div class="ibox-title">All Orders By Date to Date</div>
                                    </div>
                                    <div class="ibox-body">
                                    <form method="post" action="{{ route('all-orders-report-pdf') }}" >
                                         @csrf
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label for="">Start Date: <label style="color: red">*</label></label>
                                                <input type="date"  name="start_date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label for="">End Date: <label style="color: red">*</label></label>
                                                <input type="date"  name="end_date" class="form-control" required>
                                                </div>
                                            </div>
                                                
                                        </div>
                                   
                                        <div class="text-center">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search Order</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                        </div>     
                             
                     </div>
                     <div class="row">

                        
                        <div class="col-md-12">
                                <div class="ibox">
                                    <div class="ibox-head">
                                        <div class="ibox-title"> Orders By Product</div>
                                    </div>
                                    <div class="ibox-body">
                                    <form method="post" action="{{ route('orders-by-product-pdf') }}" >
                                         @csrf
                                        <div class="row">

                                        <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="">Product: <label style="color: red">*</label></label>
                                                        <select class="form-control select2_demo_1" name="product_id" required>
                                                                    <option selected disabled value="">Select Product</option>
                                                                    @foreach($products as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                                                                    @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="">Start Date: <label style="color: red">*</label></label>
                                                <input type="date"  name="start_date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="">End Date: <label style="color: red">*</label></label>
                                                <input type="date"  name="end_date" class="form-control" required>
                                                </div>
                                            </div>
                                                
                                        </div>
                                   
                                        <div class="text-center">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search Order</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                        </div>     
                     </div>

                     <div class="row">
     
                        <div class="col-md-12">
                                <div class="ibox">
                                    <div class="ibox-head">
                                        <div class="ibox-title"> Orders By Customer</div>
                                    </div>
                                    <div class="ibox-body">
                                    <form method="post" action="{{ route('orders-by-customer-pdf') }}" >
                                         @csrf
                                        <div class="row">

                                        <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="">Customer Name: <label style="color: red">*</label></label>
                                                        <select class="form-control select2_demo_1" name="customer_id" required>
                                                                    <option selected disabled value="">Select Customer</option>
                                                                    @foreach($customers as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->customer_name }} {{ $item->customer_phone }}</option>
                                                                    @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="">Start Date: <label style="color: red">*</label></label>
                                                <input type="date"  name="start_date" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <label for="">End Date: <label style="color: red">*</label></label>
                                                <input type="date"  name="end_date" class="form-control" required>
                                                </div>
                                            </div>
                                                
                                        </div>
                                   
                                        <div class="text-center">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search Order</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                        </div>     
                     </div>
                    
                  
                      
                    </div>
                </div>

                                       
                                        
            </div>
            <!-- END PAGE CONTENT-->
           
        </div>

      
</script>

@endsection