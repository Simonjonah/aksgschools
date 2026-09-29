@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Payment </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Payment  </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
       
          <!-- right column -->
          <div class="col-md-12">
            
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Add Payments</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('admin/createpaymentsads') }}" method="post" enctype="multipart/form-data">
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
                  <div class="row">
                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label> Form</label>
                       <input type="number" class="form-control" name="form_amount" placeholder="Form Amount">
                      </div>
                    </div>

                   <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label> Total Amount for the Term </label>
                       <input type="number" class="form-control" name="amount" placeholder="Total Amount">
                      </div>
                    </div>

                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label> PTA </label>
                       <input type="number" class="form-control" name="pta_amount" placeholder="PTA Amount">
                      </div>
                    </div>

                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label> Uniforms </label>
                       <input type="number" class="form-control" name="uniforms_amount" placeholder="Uniforms Amount">
                      </div>
                    </div>

                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label> Books & Worksheet </label>
                       <input type="number" class="form-control" name="bookamount" placeholder="Books And Worksheet Amount">
                      </div>
                    </div>

                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label> Development Fee </label>
                       <input type="number" class="form-control" name="dev_amount" placeholder="Development Amount">
                      </div>
                    </div>

                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label> Medicals </label>
                       <input type="number" class="form-control" name="medicals" placeholder="Medicals Amount">
                      </div>
                    </div>

                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label> Tuition </label>
                       <input type="number" class="form-control" name="tuition" placeholder="Tuition Amount">
                      </div>
                    </div>

                  

                    
                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label> Extra curricular Activities </label>
                       <input type="number" class="form-control" name="extracuri_fee" placeholder="Extra Curricular Amount">
                      </div>
                    </div>

                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label> Term</label>
                       
                        <select name="term" class="form-control" id="">
                          <option value="First Term">First Term</option>
                          <option value="Second Term">Second Term</option>
                          <option value="Third Term">Third Term</option>
                        </select>
                      </div>
                    </div> 


                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label> Class</label>
                       
                        <select name="classname" class="form-control" id="">
                          @foreach ($view_classes as $view_classe)
                          <option value="{{ $view_classe->classname }}">{{ $view_classe->classname }}</option>
                            
                          @endforeach
                        </select>
                      </div>
                    </div>

                  


                 
                   
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
    @include('dashboard.admin.footer')