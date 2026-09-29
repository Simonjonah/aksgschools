@include('dashboard.admin.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subjects for Secondary School</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>School Name</th>
                    <th>Subjects</th>
                    <th>Section</th>
                    <th>Actions</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
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
                
                    @foreach ($view_subjects as $view_subject)
                      @if ($view_subject->section == 'Secondary' || $view_subject->section == 'High School' || $view_subject->section == 'High Schools' || $view_subject->section == 'Secondary Schools' || $view_subject->section == 'Secondary School' )

                      <tr>
                        <td><a href="{{ url('admin/viewsinglesubjectschool/'.$view_subject->user_id) }} ">{{ $view_subject->user['schoolname'] }}</a></td>
                        <td>{{ $view_subject->subjectname }}</td>
                        <td>{{ $view_subject->section }}</td>
                       
                        
                        
                        <td><a href="{{ url('admin/assignsubject/'.$view_subject->id) }}"
                          class='btn btn-primary'>
                           <i class="far fa-user"></i>
                       </a></td> 
                    
                         <td><a href="{{ url('admin/editsubject/'.$view_subject->id) }}"
                          class='btn btn-info'>
                           <i class="far fa-edit"></i>
                       </a></td>  

                     
                     
                       <td><a href="{{ url('admin/deletesubject/'.$view_subject->id) }}"
                        class='btn btn-danger'>
                         <i class="far fa-trash-alt"></i>
                     </a></td>
                    
                     <td>{{ $view_subject->created_at->format('D d, M Y, H:i')}}</td>

                      </tr>
                     @else
                     @endif
                    @endforeach
                 
                 
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Subjects</th>
                      <th>Section</th>
                      <th>Actions</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>Date</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-control">
            
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
     @include('dashboard.admin.footer')
