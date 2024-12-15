@extends('dashboard')
@section('admin')

        <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Fees Reports</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Fees Report View</div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="section-body">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{route('fees.by.student')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="card-header">
                          <h4>Student Fee</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Student Name:<label style="color: red">*</label></label>
                                    <select name="student_id" id="student_id" class="form-control select2"  required="">
                                    <option disabled selected value="">--- Select Student ---</option>
                                        @foreach($students as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                </select>
                                <div class="invalid-feedback">
                                Please select student.
                                </div>
                              </div>

                              <div class="form-group col-md-3 col-12">
                                <label>From:<label style="color: red">*</label></label>
                                    <input type="month" name="start_month" class="form-control" required>
                                <div class="invalid-feedback">
                                Please select start month.
                                </div>
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>To:<label style="color: red">*</label></label>
                                    <input type="month" name="end_month" class="form-control" required>
                                <div class="invalid-feedback">
                                Please select end month.
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> Search  </button>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="section-body">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{route('fees.by.class')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="card-header">
                          <h4>Class Fee</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Class:<label style="color: red">*</label></label>
                                    <select name="class_id" id="class_id" class="form-control select2"  required="">
                                    <option disabled selected value="">--- Select class ---</option>
                                        @foreach($classes as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                </select>
                                <div class="invalid-feedback">
                                Please select class.
                                </div>
                              </div>

                              <div class="form-group col-md-5 col-12">
                                <label>Month:<label style="color: red">*</label></label>
                                    <input type="month" name="month" class="form-control" required>
                                <div class="invalid-feedback">
                                Please select month.
                                </div>
                              </div>
                             
                            </div>
                        </div>
                        <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> Search  </button>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
     </div>

    

@endsection