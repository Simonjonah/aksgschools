@include('dashboard.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Subjects</h1>
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
  @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
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
                    <th>Subjects</th>
                    <th>Section</th>
                   

                    <th>Edit</th>
                    <!-- <th>Assigned Subjects</th> -->
                    <th>Delete</th>
                    <th>Date</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_mysubjects as $view_mysubject)
                       @if ($view_mysubject->section == 'Primary')
                        <tr>
                            <td>{{ $view_mysubject->subjectname }}</td>
                            <td>{{ $view_mysubject->section }} </td>
                            
                            <td><a href="{{ url('admin/editsubjectsc/'.$view_mysubject->connect) }}"
                             {{-- url('web/assignedsubjects/'.$view_mysubject->connect) --}}
                              class='btn btn-info'>
                               <i class="far fa-edit"></i></td>

                               <!-- <td><a href="{{ url('admin/assignedsubjects/'.$view_mysubject->connect) }}"
                                class='btn btn-warning'>
                                 <i class="far fa-edit"></i></td> -->
  
                               <td><a href="{{ url('admin/deletesubjectsc/'.$view_mysubject->connect) }}"
                                  class='btn btn-danger'>
                                  <i class="far fa-trash-alt"></i>
                              
                              <td>{{ $view_mysubject->created_at->format('D d, M Y, H:i')}}</td>
  
                        
                          </tr>
  
                        @else
                            
                        @endif
                        
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Subjects</th>
                      <th>Section</th>
                     
  
                      <th>Edit</th>
                      <!-- <th>Assigned Subjects</th> -->
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


  @else
    
 
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
                      <th>Subjects</th>
                      <th>Section</th>
                     
  
                      <th>Edit</th>
                      <th>Assigned Subjects</th>
                      <th>Delete</th>
                      <th>Date</th>
  
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_mysubjects as $view_mysubject)
                        @if ($view_mysubject->subsection == 'Senior Secondary')
                        <tr>
                          <td>{{ $view_mysubject->subjectname }}</td>
                          <td>{{ $view_mysubject->section }}/ {{ $view_mysubject->subsection }}</td>
                          
                          <td><a href="{{ url('admin/editsubjectsc/'.$view_mysubject->connect) }}"
                            class='btn btn-default'>
                             <i class="far fa-edit"></i></td>

                             <td><a href="#"
                             {{-- url('web/assignedsubjects/'.$view_mysubject->connect) --}}
                              class='btn btn-info'>
                               <i class="far fa-edit"></i></td>

                             <td><a href="{{ url('admin/deletesubjectsc/'.$view_mysubject->connect) }}"
                                class='btn btn-danger'>
                                <i class="far fa-trash-alt"></i>
                            
                            <td>{{ $view_mysubject->created_at->format('D d, M Y, H:i')}}</td>

                      
                        </tr>
  
                        @else
                            
                        @endif
                        
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Subjects</th>
                      <th>Section</th>
                     
  
                      <th>Edit</th>
                      <th>Assigned Subjects</th>
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
                      <th>Subjects</th>
                      <th>Section</th>
                     
  
                      <th>Edit</th>
                      <th>Assigned Subjects</th>
                      <th>Delete</th>
                      <th>Date</th>
  
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_mysubjects as $view_mysubject)
                        @if ($view_mysubject->subsection == 'Junior Secondary')
                        <tr>
                          <td>{{ $view_mysubject->subjectname }}</td>
                          <td>{{ $view_mysubject->section }} / {{ $view_mysubject->subsection }}</td>
                          
                          <td><a href="{{ url('admin/editsubjectsc/'.$view_mysubject->connect) }}"
                            class='btn btn-default'>
                             <i class="far fa-edit"></i></td>

                             <td><a href="#"
                             {{-- url('web/assignedsubjects/'.$view_mysubject->connect) --}}
                              class='btn btn-info'>
                               <i class="far fa-edit"></i></td>

                             <td><a href="{{ url('admin/deletesubjectsc/'.$view_mysubject->connect) }}"
                                class='btn btn-danger'>
                                <i class="far fa-trash-alt"></i>
                            
                            <td>{{ $view_mysubject->created_at->format('D d, M Y, H:i')}}</td>

                      
                        </tr>
  
                        @else
                            
                        @endif
                        
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Subjects</th>
                      <th>Section</th>
                     
  
                      <th>Edit</th>
                      <th>Assigned Subjects</th>
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
    @endif
    



    <!-- /.content -->
  </div>
  @include('dashboard.footer')