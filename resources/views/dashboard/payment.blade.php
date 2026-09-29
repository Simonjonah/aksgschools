@include('dashboard.header')
@include('dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header p-2">
                    
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                    
                    <!-- /.tab-pane -->
                    <div class="active tab-pane" id="timeline">
                        
                        
                        {{-- @if ($single_videos) --}}
                        <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"></h3>
                        <div class="col-12">
                        {{-- <img src="{{ asset('assets/dist/img/imfi56.jpg')}}" class="product-image" alt="Product Image"> --}}
                        </div>
                        
                    </div>
                    <div class="col-12 col-sm-6">
                      <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                        <div>
                          Your order is ₦3,400
                        </div>
                        <input type="text" name="public_key" value="FLWPUBK_TEST-1788bf30d741d023b34eae710575f245-X" />
                        <input type="text" name="customer[email]" value="peaceamos58@gmail.com" />
                        <input type="text" name="customer[name]" value="Jesse Pinkman" />
                        <input type="text" name="tx_ref" value="bitethtx-019203" />
                        <input type="text" name="amount" value="200" />
                        <input type="text" name="currency" value="NGN" />
                        <input type="text" name="meta[token]" value="54" />
                        <input type="text" name="redirect_url" value="https://google.com" />
                        <button type="submit" id="start-payment-button">Pay Now</button>
                      </form>
                        
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                            <span class="text-xl">Period</span>
                            <br>
                           
                        </label>
                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                            <span class="text-xl">Course Title</span>
                            <br>
                          
                        </label>

                        <label class="btn btn-default text-center">
                            <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                            <span class="text-xl">Date Registered</span>
                            <br>
                            
                        </label>
                        
    {{--                     
                        </div>
        
                        <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">Amount
                            ₦ {{ $single_videos->course_amount }}
                        </h2>
                        
                        </div>
        
                        <div class="mt-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                View All --}}
                            {{-- </button> --}}
                            {{-- <a href="../payscfees/{{ $single_videos->slug }}" class="btn btn-success">View Course</a> --}}
                           <h3>Buy Movie Tickets N500.00</h3>
                           HTML CSSResult Skip Results Iframe
                           EDIT ON
                           
                            <a href="" class="btn btn-primary">Register Now</a>                
                        </div>
                    </div>
                    </div>
                    <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a> --}}
                        {{-- <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a> --}}
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        {{-- <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {!! $single_videos->course_contents !!}</div> --}}
                        {{-- <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                        <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div> --}}
                    </div>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
        
            </section>

      {{-- <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">₦ {{ $single_videos->course_amount }} {{ $single_videos->course_title }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-text="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <form action="{{ url('student/registeranotherprograme') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                              <p>Course Contents</p>
                              <textarea name="course_contents" class="form-control" id="" cols="20" rows="10">{!! $single_videos->course_contents !!}</textarea>
                          </div>
                          <div class="form-group">
                            <p>Course Program</p>
                            <input type="text" class="form-control" value="{{ $single_videos->course_programs }}" name="course_programs" id="" placeholder="Course Title">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <p>Course Title</p>
                            <input type="text" class="form-control" value="{{ $single_videos->course_title }}" name="course_title" id="" placeholder="Course Title">
                        </div>
                       <div class="form-group">
                          <p>Course period</p>
                          <input type="text" class="form-control" value="{{ $single_videos->course_period }}" name="course_period" id="" placeholder="Course Title">
                      </div>
                      <div class="form-group">
                        <p>Course AMount</p>
                        <input type="text" class="form-control" value="{{ $single_videos->course_amount }}" name="course_amount" id="" placeholder="Course Title">
                    </div>

                        <div class="modal-footer justify-content-between">
                            
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                </div>
              </div> --}}
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
     {{-- @else
                         
    @endif --}}
                      
                                      
                  </div>
               
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
 </div>
    @include('dashboard.footer')