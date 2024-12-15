@extends('dashboard')
@section('admin')

        <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Exam Reports</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Exam Report View</div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="section-body">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{route('class.exam.report')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="card-header">
                          <h4>Class Exam By Subject</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Class:<label style="color: red">*</label></label>
                               <select name="class_id" id="class_id" class="form-control"  required="">
                                <option disabled selected value="">--- Select Class ---</option>
                                    @foreach($classes as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                               </select>
                                <div class="invalid-feedback">
                                Please select class.
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Subject:<label style="color: red">*</label></label>
                               <select name="subject_id" id="subject_id" class="form-control"  required="">
                                <option disabled selected value="">--- Select Subject ---</option>
                                    <!-- @foreach($subjects as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach -->
                               </select>
                                <div class="invalid-feedback">
                                Please select subject.
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
            <div class="col-lg-8">
              <div class="section-body">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{route('student.exam.report')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="card-header">
                          <h4>Student Exam By Subject</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Student:<label style="color: red">*</label></label>
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
                              <div class="form-group col-md-6 col-12">
                                <label>Subject:<label style="color: red">*</label></label>
                               <select name="subject_id"  class="form-control "  required="">
                                <option disabled selected value="">--- Select Subject ---</option>
                                    @foreach($subjects as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                               </select>
                                <div class="invalid-feedback">
                                Please select subject.
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
            <div class="col-lg-4">
              <div class="section-body">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{route('student.all.exam.report')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="card-header">
                          <h4>All Exams by Student</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Student:<label style="color: red">*</label></label>
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
            <div class="col-lg-8">
              <div class="section-body">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="{{route('student.by.exam.type.report')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="card-header">
                          <h4>Student Exam By Exam Type</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Student:<label style="color: red">*</label></label>
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
                              <div class="form-group col-md-6 col-12">
                                <label>Exam Type:<label style="color: red">*</label></label>
                               <select name="exam_type_id"  class="form-control "  required="">
                                <option disabled selected value="">--- Select Exam Type ---</option>
                                    @foreach($examType as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                               </select>
                                <div class="invalid-feedback">
                                Please select exam type.
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

     <script>
    document.getElementById('class_id').addEventListener('change', function() {
        var classID = this.value;
        var subjectSelction = document.getElementById('subject_id');
        
        // Clear previous options
        subjectSelction.innerHTML = '<option selected disabled value="">Loading...</option>';
        
        // Fetch subjects for the selected class
        fetch('/get-subjects/' + classID)
            .then(response => response.json())
            .then(data => {
                // Populate subjects select with fetched data
                subjectSelction.innerHTML = '<option selected disabled value="">Select Subject</option>';
                data.forEach(subject => {
                    var option = document.createElement('option');
                    option.value = subject.id;
                    option.textContent = subject.name;
                    subjectSelction.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching subjects:', error);
                subjectSelction.innerHTML = '<option selected disabled value="">Error loading subjects</option>';
            });
    });
</script>

@endsection