@extends('dashboard')
@section('admin')

        <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Registration Reports</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Registration Report View</div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="section-body">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{route('admission.report.pdf')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="card-header">
                          <h4>Admission Reports</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                           

                              <div class="form-group col-md-6 col-12">
                                <label>From:<label style="color: red">*</label></label>
                                    <input type="date" name="start_date" class="form-control" required>
                                <div class="invalid-feedback">
                                Please select start date.
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>To:<label style="color: red">*</label></label>
                                    <input type="date" name="end_date" class="form-control" required>
                                <div class="invalid-feedback">
                                Please select end date.
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
                    <form method="post" action="{{route('left.report.pdf')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="card-header">
                          <h4>Left Student Reports</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>From:<label style="color: red">*</label></label>
                                    <input type="date" name="start_date" class="form-control" required>
                                <div class="invalid-feedback">
                                Please select start date.
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>To:<label style="color: red">*</label></label>
                                    <input type="date" name="end_date" class="form-control" required>
                                <div class="invalid-feedback">
                                Please select end date.
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
                    <form method="post" action="{{route('graduated.report.pdf')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="card-header">
                          <h4>Graduated Student Reports</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>From:<label style="color: red">*</label></label>
                                    <input type="date" name="start_date" class="form-control" required>
                                <div class="invalid-feedback">
                                Please select start date.
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>To:<label style="color: red">*</label></label>
                                    <input type="date" name="end_date" class="form-control" required>
                                <div class="invalid-feedback">
                                Please select end date.
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