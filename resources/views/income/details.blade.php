@extends('dashboard')
@section('admin')

@php
$setting = App\Models\Setting::find(1);
@endphp


     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Credit </h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Credit</div>
              <div class="breadcrumb-item">Credit Details</div>
            </div>
          </div>
          

          <div class="section-body">
          <div class="card">
          <div class="card-header">
          <h4>Credit Details</h4>
                    <div class="card-header-action">
                    <div class="btn-group">
                    @if(Auth::user()->can('income.edit'))
                        <a href="" class="btn btn-success" data-toggle="modal" id="{{ $details->id }}" data-target="#exampleModal{{$details->id}}" ><i class="fas fa-edit"></i> EDIT </a>
                        @endif
                        @if(Auth::user()->can('income.delete'))
                        <a href="{{ route('income.delete',$details->id) }}" id="delete" class="btn btn-danger"><i class="fas fa-trash"></i> DELETE</a>
                    @endif
                    </div>
                   
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body">
                                <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Cash Amount:
                                    <span class="badge badge-primary badge-pill">{{$setting->currency}} {{ number_format($details->amount) }}</span>
                                </li>
                               
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Date:
                                    <span class="badge badge-primary badge-pill">{{$details->date}}</span>
                                </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Description:
                                    <span class="badge badge-primary badge-pill">{{$details->description}}</span>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                
          </div>
        </section>
     </div>


          
<!-- Add Modal -->
<div class="modal fade" id="exampleModal{{$details->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Cash.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('income.update',$details->id) }}" method="POST">
                    @csrf
                    <div class=" form-group">
                    <label>Description:</label>
                    <textarea class="form-control" name="description" id="" rows="3" placeholder="Enter..." required>{{$details->description}}</textarea>
                </div>
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection


