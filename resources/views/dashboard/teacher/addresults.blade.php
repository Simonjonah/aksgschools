@include('dashboard.teacher.header')
@include('dashboard.teacher.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if ($view_student->regnumber == null)
              <h1>Contact Admin to add Admission no to this child</h1>
            @else
            <h1>Result of {{ $view_student->fname }} {{ $view_student->middlename }} {{ $view_student->lname }} in {{ $view_student->classname }} {{ $view_student->entrylevel }} {{ $view_student->section }}  {{ $view_student->regnumber }} Section</h1>
              
            @endif
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subjects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <small class="float-right">{{ $view_student->created_at->format('D d, M Y, H:i')}}</small>
                    </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-lg-2 col-md-6 col-sm-4 invoice-col">
                    <img style="width: 100px; height: 100px;" src="{{ URL::asset("/public/../$view_student->logo")}}" alt="">
                </div> 
                <!-- /.col -->
               <div class="col-lg-8 col-md-6 col-sm-4 invoice-col">
                  <address style="color: red; text-align: center">
                  <h1><strong style="color: blue; text-align: center; text-transform: uppercase;">{{ $view_student->school['schoolname'] }}</strong></h1>

                    {{ $view_student->school['address'] }} <br>
                    {{ $view_student->school['motor'] }} <br>
                    <!-- Website: brixtonnschools.com.ng -->
                    <br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-lg-2 col-md-6 col-sm-4 invoice-col">
                  
                    <img style="width: 100px; height: 100px;" src="{{ URL::asset("/public/../$view_student->images")}}" alt="">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                    <div class="col-12 table-responsive">
                      @if ($view_student->section === 'Primary')
                      <form action="{{ url('admin/createresults') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif
                </div>

                  <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Subjects Name</th>
                        <th>Assesssment Test 1 20%</th>
                        <th>Assesssment Test 2 20%</th>
                        <th>Exams 60%</th>
                        
                      </tr>
                      </thead>
                      <tbody>

                          @foreach ($view_subjects as $index => $view_subject)
                            @if ($view_subject->section == 'Primary')
                            <tr>
                                <td>{{ $view_subject->subjectname }}<input type="hidden" value="{{ $view_subject->subjectname }}" name="results[{{ $index }}][subjectname]" id=""></td>
                             
                                <td>
                                  <input 
                                      type="text" 
                                      class="form-control score-input" 
                                      data-max="20"
                                      name="results[{{ $index }}][test_1]" 
                                      placeholder="Assessment Test 1"
                                  >
                              </td>

                              <td>
                                  <input 
                                      type="text" 
                                      class="form-control score-input" 
                                      data-max="20"
                                      name="results[{{ $index }}][test_2]" 
                                      placeholder="Assessment Test 2"
                                  >
                              </td>

                              <td>
                                  <input 
                                      type="text" 
                                      class="form-control score-input" 
                                      data-max="60"
                                      name="results[{{ $index }}][exams]" 
                                      placeholder="Exams Score"
                                  >
                              </td>

                                <input type="hidden" name="results[{{ $index }}][classname]" value="{{ $view_student->classname }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][slug]" value="{{ $view_student->slug }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][section]" value="{{ $view_student->section }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][subsection]" value="{{ $view_student->subsection }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][dob]" value="{{ $view_student->dob }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][ref_no]" value="{{ $view_student->ref_no }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][lga]" value="{{ $view_student->lga }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][schooltype]" value="{{ $view_student->schooltype }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][alms]" value="{{ $view_student->alms }}" placeholder="academic_session">

                                <input type="hidden" name="results[{{ $index }}][dob]" value="{{ $view_student->dob }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][fname]" value="{{ $view_student->fname }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][surname]" value="{{ $view_student->surname }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][middlename]" value="{{ $view_student->middlename }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][user_id]" value="{{ $view_student->user_id }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][teacher_id]" value="{{ auth()->user()->id }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][student_id]" value="{{ $view_student->id }}" placeholder="Teacher ID">

                                <input type="hidden" name="results[{{ $index }}][term]" value="{{ $view_student->term }}" placeholder="term">
                                <input type="hidden" name="results[{{ $index }}][academic_session]" value="{{ $view_student->academic_session }}" placeholder="academic_session">
                                <input type="hidden" name="results[{{ $index }}][section]" value="{{ $view_student->section }}" placeholder="academic_session">
                               
                                <input required type="hidden" name="results[{{ $index }}][regnumber]" value="{{ $view_student->regnumber }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][classname]" value="{{ $view_student->classname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][fname]" value="{{ $view_student->fname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][middlename]" value="{{ $view_student->middlename }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][surname]" value="{{ $view_student->surname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][logo]" value="{{ $view_student->logo }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][signature]" value="{{ auth()->user()->signature }}" placeholder="signature">
                                
                                <input  type="hidden" name="results[{{ $index }}][gender]" value="{{ $view_student->gender }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][images]" value="{{ $view_student->images }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][tfname]" value="{{ auth()->user()->fname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][tlname]" value="{{ auth()->user()->surname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][teacher_id]" value="{{ auth()->user()->id }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][school_id]" value="{{ $view_student->school_id }}" placeholder="regnumber">

                              </tr>
                            @else
                            
                                    
                            @endif

                          @endforeach
                      

                      </tbody>
                    </table>
                
                  {{-- @else
                      
                @endif --}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
          <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                    Submit 
                  </button>
                </form>
                  
                  
                  
                      
                  @elseif($view_student->section === 'Secondary' && $view_student->subsection === 'Senior Secondary')

                <form action="{{ url('admin/createresults') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif
                </div>

                  <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Subjects Name</th>
                        <th>Assesssment Test 1 20%</th>
                        <th>Assesssment Test 2 20%</th>
                        <th>Exams 60%</th>
                        
                      </tr>
                      </thead>
                      <tbody>

                          @foreach ($view_subjects as $index => $view_subject)
                            @if ($view_subject->section == 'Secondary' && $view_subject->subsection == 'Senior Secondary')
                            <tr>
                                <td>{{ $view_subject->subjectname }}<input type="hidden" value="{{ $view_subject->subjectname }}" name="results[{{ $index }}][subjectname]" id=""></td>
                             
                                <td>
                                  <input 
                                      type="text" 
                                      class="form-control score-input" 
                                      data-max="20"
                                      name="results[{{ $index }}][test_1]" 
                                      placeholder="Assessment Test 1"
                                  >
                              </td>

                              <td>
                                  <input 
                                      type="text" 
                                      class="form-control score-input" 
                                      data-max="20"
                                      name="results[{{ $index }}][test_2]" 
                                      placeholder="Assessment Test 2"
                                  >
                              </td>

                              <td>
                                  <input 
                                      type="text" 
                                      class="form-control score-input" 
                                      data-max="60"
                                      name="results[{{ $index }}][exams]" 
                                      placeholder="Exams Score"
                                  >
                              </td>

                                <input type="hidden" name="results[{{ $index }}][classname]" value="{{ $view_student->classname }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][slug]" value="{{ $view_student->slug }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][section]" value="{{ $view_student->section }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][subsection]" value="{{ $view_student->subsection }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][dob]" value="{{ $view_student->dob }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][ref_no]" value="{{ $view_student->ref_no }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][lga]" value="{{ $view_student->lga }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][schooltype]" value="{{ $view_student->schooltype }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][alms]" value="{{ $view_student->alms }}" placeholder="academic_session">

                                <input type="hidden" name="results[{{ $index }}][dob]" value="{{ $view_student->dob }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][fname]" value="{{ $view_student->fname }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][surname]" value="{{ $view_student->surname }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][middlename]" value="{{ $view_student->middlename }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][user_id]" value="{{ $view_student->user_id }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][teacher_id]" value="{{ auth()->user()->id }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][student_id]" value="{{ $view_student->id }}" placeholder="Teacher ID">

                                <input type="hidden" name="results[{{ $index }}][term]" value="{{ $view_student->term }}" placeholder="term">
                                <input type="hidden" name="results[{{ $index }}][academic_session]" value="{{ $view_student->academic_session }}" placeholder="academic_session">
                                <input type="hidden" name="results[{{ $index }}][section]" value="{{ $view_student->section }}" placeholder="academic_session">
                               
                                <input required type="hidden" name="results[{{ $index }}][regnumber]" value="{{ $view_student->regnumber }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][classname]" value="{{ $view_student->classname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][fname]" value="{{ $view_student->fname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][middlename]" value="{{ $view_student->middlename }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][surname]" value="{{ $view_student->surname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][logo]" value="{{ $view_student->logo }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][signature]" value="{{ auth()->user()->signature }}" placeholder="signature">
                                
                                <input  type="hidden" name="results[{{ $index }}][gender]" value="{{ $view_student->gender }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][images]" value="{{ $view_student->images }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][tfname]" value="{{ auth()->user()->fname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][tlname]" value="{{ auth()->user()->surname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][teacher_id]" value="{{ auth()->user()->id }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][school_id]" value="{{ $view_student->school_id }}" placeholder="regnumber">

                              </tr>
                            @else
                            @endif

                          @endforeach
                      

                      </tbody>
                    </table>
                
                  {{-- @else
                      
                @endif --}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
          <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                    Submit 
                  </button>
                </form>


                @elseif($view_student->section === 'Secondary' && $view_student->subsection === 'Junior Secondary')

                <form action="{{ url('admin/createresults') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif

                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                  @endif
                </div>

                  <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Subjects Name</th>
                        <th>Assesssment Test 1 20%</th>
                        <th>Assesssment Test 2 20%</th>
                        <th>Exams 60%</th>
                      </tr>
                      </thead>
                      <tbody>

                          @foreach ($view_subjects as $index => $view_subject)
                            @if ($view_subject->section == 'Secondary' && $view_subject->subsection == 'Junior Secondary')
                            <tr>
                                <td>{{ $view_subject->subjectname }}<input type="hidden" value="{{ $view_subject->subjectname }}" name="results[{{ $index }}][subjectname]" id=""></td>
                             
                                <td>
                                  <input 
                                      type="text" 
                                      class="form-control score-input" 
                                      data-max="20"
                                      name="results[{{ $index }}][test_1]" 
                                      placeholder="Assessment Test 1"
                                  >
                              </td>

                              <td>
                                  <input 
                                      type="text" 
                                      class="form-control score-input" 
                                      data-max="20"
                                      name="results[{{ $index }}][test_2]" 
                                      placeholder="Assessment Test 2"
                                  >
                              </td>

                              <td>
                                  <input 
                                      type="text" 
                                      class="form-control score-input" 
                                      data-max="60"
                                      name="results[{{ $index }}][exams]" 
                                      placeholder="Exams Score"
                                  >
                              </td>

                                <input type="hidden" name="results[{{ $index }}][classname]" value="{{ $view_student->classname }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][slug]" value="{{ $view_student->slug }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][section]" value="{{ $view_student->section }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][subsection]" value="{{ $view_student->subsection }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][dob]" value="{{ $view_student->dob }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][ref_no]" value="{{ $view_student->ref_no }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][lga]" value="{{ $view_student->lga }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][schooltype]" value="{{ $view_student->schooltype }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][alms]" value="{{ $view_student->alms }}" placeholder="academic_session">

                                <input type="hidden" name="results[{{ $index }}][dob]" value="{{ $view_student->dob }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][fname]" value="{{ $view_student->fname }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][surname]" value="{{ $view_student->surname }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][middlename]" value="{{ $view_student->middlename }}" placeholder="Teacher ID">
                                <input type="hidden" name="results[{{ $index }}][user_id]" value="{{ $view_student->user_id }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][teacher_id]" value="{{ auth()->user()->id }}" placeholder="ID">
                                <input type="hidden" name="results[{{ $index }}][student_id]" value="{{ $view_student->id }}" placeholder="Teacher ID">

                                <input type="hidden" name="results[{{ $index }}][term]" value="{{ $view_student->term }}" placeholder="term">
                                <input type="hidden" name="results[{{ $index }}][academic_session]" value="{{ $view_student->academic_session }}" placeholder="academic_session">
                                <input type="hidden" name="results[{{ $index }}][section]" value="{{ $view_student->section }}" placeholder="academic_session">
                               
                                <input required type="hidden" name="results[{{ $index }}][regnumber]" value="{{ $view_student->regnumber }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][classname]" value="{{ $view_student->classname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][fname]" value="{{ $view_student->fname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][middlename]" value="{{ $view_student->middlename }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][surname]" value="{{ $view_student->surname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][logo]" value="{{ $view_student->logo }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][signature]" value="{{ auth()->user()->signature }}" placeholder="signature">
                                
                                <input  type="hidden" name="results[{{ $index }}][gender]" value="{{ $view_student->gender }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][images]" value="{{ $view_student->images }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][tfname]" value="{{ auth()->user()->fname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][tlname]" value="{{ auth()->user()->surname }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][teacher_id]" value="{{ auth()->user()->id }}" placeholder="regnumber">
                                <input  type="hidden" name="results[{{ $index }}][school_id]" value="{{ $view_student->school_id }}" placeholder="regnumber">

                              </tr>
                            @else
                            @endif

                          @endforeach
                      

                      </tbody>
                    </table>
                
                  {{-- @else
                      
                @endif --}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
          <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> 
                    Submit 
                  </button>
                </form>

        <div class="row">
          
        
                      @endif
                          </div>
                      
                       
                
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>





  
    </div>
    <!-- /.row -->



  </div>
  <!-- /.content-wrapper -->

  
<script>
document.addEventListener('input', function (e) {

    if (e.target.classList.contains('score-input')) {

        let input = e.target;
        let max = parseFloat(input.dataset.max);
        let value = input.value;

        // Allow only numbers and decimal point
        value = value.replace(/[^0-9.]/g, '');

        // Prevent more than one decimal point
        let parts = value.split('.');
        if (parts.length > 2) {
            value = parts[0] + '.' + parts.slice(1).join('');
        }

        // Convert to number
        let number = parseFloat(value);

        // If value is greater than maximum
        if (!isNaN(number) && number > max) {
            input.value = max;
        } else {
            input.value = value;
        }
    }

});
</script>
@include('dashboard.teacher.footer')