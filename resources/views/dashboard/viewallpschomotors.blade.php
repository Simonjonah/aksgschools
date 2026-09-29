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
            <h1>Domain</h1>
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
                    <th>Title</th>
                    <th>Pscomotives</th>
                    <th>Section</th>
                   

                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_domains as $view_domain)
                      @if ($view_domain->psycomoto == 'Cognitive Domain' && $view_domain->section == 'Primary')
                      
                      <tr>
                        <td>{{ $view_domain->cogname }}</td>
                        <td>{{ $view_domain->psycomoto }} </td>
                        <td>{{ $view_domain->section }}</td>
                        
                        <td><a href="{{ url('admin/editpsycomotor/'.$view_domain->ref_no) }}"
                          class='btn btn-default'>
                           <i class="far fa-edit"></i>

                           <td><a href="{{ url('admin/deletepsycomotor/'.$view_domain->ref_no) }}"
                              class='btn btn-danger'>
                              <i class="far fa-trash-alt"></i>
                          
                          <td>{{ $view_domain->created_at->format('D d, M Y, H:i')}}</td>
                    
                      </tr>
                      @else
                        
                      @endif
                       
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Pscomotives</th>
                     <th>Section</th>
  
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
                    <th>Title</th>
                    <th>Pscomotives</th>
                    <th>Section</th>
                   

                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_domains as $view_domain)
                      @if ($view_domain->psycomoto == 'Psychomotor Domain' && $view_domain->section == 'Primary')
                      <tr>
                        <td>{{ $view_domain->cogname }}</td>
                        <td>{{ $view_domain->psycomoto }}</td>
                        <td>{{ $view_domain->section }}</td>
                        
                        <td><a href="{{ url('admin/editpsycomotor/'.$view_domain->ref_no) }}"
                          class='btn btn-default'>
                           <i class="far fa-edit"></i>

                           <td><a href="{{ url('admin/deletepsycomotor/'.$view_domain->ref_no) }}"
                              class='btn btn-danger'>
                              <i class="far fa-trash-alt"></i>
                          
                          <td>{{ $view_domain->created_at->format('D d, M Y, H:i')}}</td>
                    
                      </tr>
                      @else
                        
                      @endif
                       
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Pscomotives</th>
                    <th>Section</th>
                     
  
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
    
  @else
    
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
                    <th>Title</th>
                    <th>Pscomotives</th>
                   

                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($forcognitives as $forcognitive)
                      @if ($forcognitive->psycomoto == 'Cognitive Domain' && $forcognitive->section == 'Secondary')
                      
                      <tr>
                        <td>{{ $forcognitive->cogname }}</td>
                        <td>{{ $forcognitive->psycomoto }} {{ $forcognitive->section }}</td>
                        
                        <td><a href="{{ url('admin/editpsycomotor/'.$forcognitive->id) }}"
                          class='btn btn-default'>
                           <i class="far fa-edit"></i>

                           <td><a href="{{ url('admin/deletepsycomotor/'.$forcognitive->ref_no) }}"
                              class='btn btn-danger'>
                              <i class="far fa-trash-alt"></i>
                          
                          <td>{{ $forcognitive->created_at->format('D d, M Y, H:i')}}</td>
                    
                      </tr>
                      @else
                        
                      @endif
                       
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Pscomotives</th>
                     
  
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
                    <th>Title</th>
                    <th>Pscomotives</th>
                   

                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($forpschos as $forpscho)
                      @if ($forpscho->section == 'Secondary' && $forpscho->psycomoto == 'Psychomotor Domain')
                      <tr>
                        <td>{{ $forpscho->cogname }}</td>
                        <td>{{ $forpscho->psycomoto }} {{ $forpscho->section }}</td>
                        
                        <td><a href="{{ url('admin/editpsycomotor/'.$forpscho->id) }}"
                          class='btn btn-default'>
                           <i class="far fa-edit"></i>

                           <td><a href="{{ url('admin/deletepsycomotor/'.$forpscho->ref_no) }}"
                              class='btn btn-danger'>
                              <i class="far fa-trash-alt"></i>
                          
                          <td>{{ $forpscho->created_at->format('D d, M Y, H:i')}}</td>
                    
                      </tr>
                      @else
                        
                      @endif
                       
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Pscomotives</th>
                     
  
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



     <!-- Main content -->
    {{-- <section class="content">
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
                    <th>Title</th>
                    <th>Pscomotives</th>
                   

                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($forcognitives as $forcognitive)
                      @if ($forcognitive->psycomoto == 'Cognitive Domain' && $forcognitive->section == 'Junior Secondary')
                      
                      <tr>
                        <td>{{ $forcognitive->cogname }}</td>
                        <td>{{ $forcognitive->psycomoto }} {{ $forcognitive->section }}</td>
                        
                        <td><a href="{{ url('admin/editpsycomotor/'.$forcognitive->id) }}"
                          class='btn btn-default'>
                           <i class="far fa-edit"></i>

                           <td><a href="{{ url('admin/deletepsycomotor/'.$forcognitive->ref_no) }}"
                              class='btn btn-danger'>
                              <i class="far fa-trash-alt"></i>
                          
                          <td>{{ $forcognitive->created_at->format('D d, M Y, H:i')}}</td>
                    
                      </tr>
                      @else
                        
                      @endif
                       
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Pscomotives</th>
                     
  
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
                    <th>Title</th>
                    <th>Pscomotives</th>
                   

                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($forpschos as $forpscho)
                      @if ($forpscho->psycomoto == 'Psychomotor Domain' && $forpscho->section == 'Junior Secondary')
                      <tr>
                        <td>{{ $forpscho->cogname }}</td>
                        <td>{{ $forpscho->psycomoto }} {{ $forpscho->section }}</td>
                        
                        <td><a href="{{ url('admin/editpsycomotor/'.$forpscho->id) }}"
                          class='btn btn-default'>
                           <i class="far fa-edit"></i>

                           <td><a href="{{ url('admin/deletepsycomotor/'.$forpscho->ref_no) }}"
                              class='btn btn-danger'>
                              <i class="far fa-trash-alt"></i>
                          
                          <td>{{ $forpscho->created_at->format('D d, M Y, H:i')}}</td>
                    
                      </tr>
                      @else
                        
                      @endif
                       
                       
                   
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Pscomotives</th>
                     
  
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
    </section> --}}
    
  @endif
    
    <!-- /.content -->
  </div>
 @include('dashboard.footer')