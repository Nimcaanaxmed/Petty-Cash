@extends('dashboard')
@section('admin')

@php 
 
 $setting = App\Models\Setting::find(1);

 $lastStatement = App\Models\Statement::orderBy('id', 'desc')->first();
$lastBalance = $lastStatement ? $lastStatement->balance : 0;


 @endphp 
<style>
  td{
    font-weight:bold;
  }
</style>
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Credit</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Credit Entry</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                <div class="card-header">
                <h4> <b>Balance: SL {{number_format($lastBalance,2)}}</b></h4>
                    <div class="card-header-action">
                    @if(Auth::user()->can('income.add'))
                    <button type="button" style="text-align: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                         <i class="fa fa-plus-circle"></i> Add New
                        </button>
                        @endif
                    </div>
                  </div>
                  <div class="card-body">
                 
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th style="text-align: right;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($income as $key=> $item)
                          <tr>
                            <td>{{ $key+1 }}</td> 
                            <td>{{$item->date}}</td>
                            <td>{{$setting->currency}} {{number_format($item->amount)}} </td>
                            <td>{{$item->description}}</td>
                            <td style="text-align: right;">
                            @if(Auth::user()->can('income.detail'))
                                <a href="{{ route('income.detail',$item->uuid) }}" class="btn btn-success"><i class="fa fa-eye"></i> DETAILS</a>
                            @endif
                              </td>
                          </tr>
                          @endforeach 
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>





<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Credit Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('income.store')}}" method="POST">
                    @csrf
                <div class=" form-group">
                    <label>Amount:</label>
                    <input class="form-control" type="number" step="any" name="amount" placeholder="Enter..." required>
                </div>
                <div class=" form-group">
                    <label>Description:</label>
                    <textarea class="form-control" name="description" id="" rows="3" placeholder="Enter..." required></textarea>
                </div>
               
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
              

@endsection