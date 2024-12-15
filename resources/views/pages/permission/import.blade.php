@extends('dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Permissions</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Import Permissions</div>
            </div>
          </div>
          <div class="card">
          <div class="card-body">
        

          <form action="{{route('import.roles')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="">
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <label>File(Xlxs):</label>
                                                    <input class="form-control" type="file" value="" name="import_file"  required>
                                                           
                                                </div>
                                               
                                            </div>
                                           
                                           <div class="text-center">
                                            <div class="form-group">
                                                <button class="btn btn-success" type="submit"> <i class="fas fa-download"></i> Import</button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                        </div>

          
        </section>
      </div>



      
@endsection