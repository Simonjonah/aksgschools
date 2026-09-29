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

                    @foreach ($view_domains as $view_domain)
                      @if ($view_domain->psycomoto == 'Cognitive Domain')
                      
                      <tr>
                        <td>{{ $view_domain->cogname }}</td>
                        <td>{{ $view_domain->psycomoto }}</td>
                        
                        <td><a href="{{ url('web/editpsycomotor/'.$view_domain->id) }}"
                          class='btn btn-default'>
                           <i class="far fa-edit"></i>

                           <td><a href="{{ url('web/deletepsycomotor/'.$view_domain->ref_no) }}"
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

                    @foreach ($view_domains as $view_domain)
                      @if ($view_domain->psycomoto == 'Psychomotor Domain')
                      <tr>
                        <td>{{ $view_domain->cogname }}</td>
                        <td>{{ $view_domain->psycomoto }}</td>
                        
                        <td><a href="{{ url('web/editpsycomotor/'.$view_domain->id) }}"
                          class='btn btn-default'>
                           <i class="far fa-edit"></i>

                           <td><a href="{{ url('web/deletepsycomotor/'.$view_domain->ref_no) }}"
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
 @include('dashboard.footer')