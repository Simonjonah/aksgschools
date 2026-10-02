@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('admin/updatesubject/'.$edit_subject->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif

                        @if (Session::get('fail'))
                        <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                        </div>
                    @endif
                @method('PUT')

                
           
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-23">
                        <div class="form-group">
                            <label>Subjects</label>
                            <input type="text" class="form-control" @error('subjectname')
                            @enderror value="{{ $edit_subject->subjectname }}" name="subjectname" placeholder="Subject name">
                          </div>
                        </div>
                        @error('subjectname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror 
                    </div>

              <div class="col-lg-6 col-md-6 col-sm-23">
                           <!--  <div class="form-group">
                        <h5>Section </h5>
                        <select required class="form-control" type="text" name="section">
                          
                          <option value="Primary">Primary</option>
                          <option value="Junior Secondary">Junior Secondary</option>
                          <option value="Secondary">Secondary</option>
                        </select>
                      </div> 
                    </div> -->
                
                  <div class="form-group">
                  <label>Select Section</label>
                  <select required name="section" id="section" class="form-control">
                      <option value="{{ $edit_subject->section }}">{{ $edit_subject->section }}</option>
                      <option value="Primary">Primary</option>
                      <option value="Secondary">Secondary</option>
                      <option value="Technical">Technical</option>
                  </select>
              </div>

              @error('section')
                  <span class="text-danger">{{ $message }}</span>
              @enderror

              <div class="form-group" id="subsectionDiv" style="display: none;">
                  <label>Select Sub Section</label>
                  <select name="subsection" id="subsection" class="form-control">
                      <option value="">Select Sub Section</option>
                      <option value="Junior Secondary">Junior Secondary</option>
                      <option value="Senior Secondary">Senior Secondary</option>

                       <option value="Junior Technical">Junior Technical</option>
                      <option value="Senior Technical">Senior Technical</option>
                  </select>
              </div>

              @error('subsection')
                  <span class="text-danger">{{ $message }}</span>
              @enderror


              <script>
                  document.addEventListener('DOMContentLoaded', function () {

                      const section = document.getElementById('section');
                      const subsectionDiv = document.getElementById('subsectionDiv');
                      const subsection = document.getElementById('subsection');

                      function toggleSubsection() {

                          if (section.value === 'Secondary' || section.value === 'Technical') {

                              // Show subsection
                              subsectionDiv.style.display = 'block';

                              // Make it required
                              subsection.required = true;

                          } else {

                              // Hide subsection
                              subsectionDiv.style.display = 'none';

                              // Remove required
                              subsection.required = false;

                              // Clear selected value
                              subsection.value = '';
                          }
                      }

                      // Run when page loads
                      toggleSubsection();
                      section.addEventListener('change', toggleSubsection);
                  });
              </script>               
              

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Subject</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  </div>
    
   @include('dashboard.admin.footer')