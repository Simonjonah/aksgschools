@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Event</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Event</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">View Event </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.createteevent') }}" method="post" enctype="multipart/form-data">
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
                        <label> Title</label>
                        <input type="text" class="form-control" @error('title')
                        @enderror value="{{$view_events->title }}" name="title" placeholder="Title">
                      </div>
                    </div>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 

                    
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label> Email</label>
                          <input type="email" class="form-control" @error('email')
                          @enderror value="{{$view_events->email }}" name="email" placeholder="email">
                        </div>
                      </div>
                      @error('email')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror 


                    
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label> Phone</label>
                            <input type="text" class="form-control" @error('phone')
                            @enderror value="{{$view_events->phone }}" name="phone" placeholder="Phone">
                          </div>
                        </div>
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror 

                        
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label> Address</label>
                              <input type="text" class="form-control" @error('address')
                              @enderror value="{{$view_events->address }}" name="address" placeholder="address">
                            </div>
                          </div>
                          @error('address')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror 

                   
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label> facebook</label>
                              <input type="text" class="form-control" @error('facebook')
                              @enderror value="{{$view_events->facebook }}" name="facebook" placeholder="facebook">
                            </div>
                          </div>
                          @error('facebook')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror 
                        
                          
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label> whatsapp</label>
                                <input type="text" class="form-control" @error('whatsapp')
                                @enderror value="{{$view_events->whatsapp }}" name="whatsapp" placeholder="whatsapp">
                              </div>
                            </div>
                            @error('whatsapp')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                          
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label> instagram</label>
                                <input type="text" class="form-control" @error('instagram')
                                @enderror value="{{$view_events->instagram }}" name="instagram" placeholder="instagram">
                              </div>
                            </div>
                            @error('instagram')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
     
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label> twitter</label>
                                <input type="text" class="form-control" @error('twitter')
                                @enderror value="{{$view_events->twitter }}" name="twitter" placeholder="twitter">
                              </div>
                            </div>
                            @error('twitter')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 

                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label> linkin</label>
                                  <input type="text" class="form-control" @error('linkin')
                                  @enderror value="{{$view_events->linkin }}" name="linkin" placeholder="linkin">
                                </div>
                              </div>
                              @error('linkin')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror 
                   
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label> Logo</label>
                         <img style="width: 10%; height: 10%;" class="profile-user-img img-fluid"
                            src="{{ URL::asset("/public/../$view_events->logo")}}"
                            alt="User profile picture">
                        <input type="file" @error('logo')
                        @enderror value="{{ old('logo') }}" class="form-control" name="logo">
                      </div>
                  
                    </div>
                    @error('logo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                     
                    <div class="col-sm-6">
                        <div class="form-group">
                            <textarea value="{{ $view_events->message }}" id="compose-textarea" name="message" placeholder="Message ....." class="form-control" style="height: 300px">
                              {{$view_events->message }}
                            </textarea>
                        </div>
                      </div>

                  </div>
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
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