@include('dashboard.teacher.header')

  <!-- Main Sidebar Container -->
  @include('dashboard.teacher.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
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
                    <th>First name</th>
                    <th>Middlename</th>
                    <th>Surname</th>
                    <th>section</th>
                    <th>Classname</th>
                    <th>Term</th>
                    <th>Gender</th>

                    <th>Images</th>
                    {{-- <th>Status</th> --}}
                    <th>Change Term</th>
                    <th>Add Results</th>
                    <th>Date</th>

                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($view_yourstudents as $view_yourstudent)
                        <tr>
                          <td>{{ $view_yourstudent->fname }}</td>
                          <td>{{ $view_yourstudent->middlename }}
                          </td>
                          <td>{{ $view_yourstudent->surname }}</td>
                          <td> {{ $view_yourstudent->section }}</td>
                          <td> {{ $view_yourstudent->classname }}
                          @if ($view_yourstudent->regnumber == null)
                            <h2>Please Add Reg number</h2>
                            <a href="{{ url('admin/addrenumbyteacher/'.$view_yourstudent->ref_no) }}"
                            class='btn btn-default'>Add Reg. Number
                            <i class="far fa-eye"></i>
                            @else
                            <b style="color: red">{{ $view_yourstudent->regnumber }}</b>
                            @endif
                          </td>
                          <td> {{ $view_yourstudent->term }}</td>
                          <td> {{ $view_yourstudent->gender }}</td>
                          <td><img style="width: 100%; height: 60px;" src="{{ URL::asset("/public/../$view_yourstudent->images")}}" alt=""></td>
                          {{-- <td> <span class="badge badge-success">{{ $view_yourstudent->status }}</span></td> --}}
                          
                          <td><a href="{{ url('admin/changeterm/'.$view_yourstudent->ref_no) }}"
                            class='btn btn-default'>
                             <i class="far fa-edit"></i>
                      
                        

                        <td><a href="{{ url('admin/addresults/'.$view_yourstudent->ref_no) }}"
                          class='btn btn-info'>
                           Add Results
                       </a></td>

                       <td>{{ $view_yourstudent->created_at->format('D d, M Y, H:i')}}</td>
                    </tr>
                    
                  @endforeach
                      
                
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>First name</th>
                      <th>Middlename</th>
                      <th>Surname</th>
                      <th>section</th>
                      <th>Classname</th>
                      <th>Term</th>
                      <th>Gender</th>
  
                      <th>Images</th>
                      {{-- <th>Status</th> --}}
                      <th>Change Term</th>
                      <th>Add Results</th>
                    <th>Delete</th>
                      
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
      @include('dashboard.teacher.footer')
