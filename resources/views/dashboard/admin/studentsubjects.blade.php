@include('dashboard.admin.header')
@include('dashboard.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subjects </h1>
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
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              <span class="text-danger">{{ $view_studentsubjects->fname }} {{ $view_studentsubjects->middlename }} {{ $view_studentsubjects->surname }} in {{ $view_studentsubjects->classname }} at {{ $view_studentsubjects->section }} study center {{ $view_studentsubjects->term }}</span>
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <small class="float-right">{{ $view_studentsubjects->created_at->format('D d, M Y, H:i')}}</small>
                    </h2>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-lg-3 col-md-3 col-sm-4 invoice-col">
                    <img style="width: 100px; height: 100px;" src="{{ asset('images/sch14.png') }}" alt=""> <br>
{{-- 
                  <address>
                  
                    <br>
                  </address> --}}
                </div> 
                <!-- /.col -->
               <div class="col-lg-6 col-md-3 col-sm-4 invoice-col">
                <h1> <strong>GOLDERN DAYS SCHOOLS</strong></h1>
              
                <p>Golden Destiny Academy Road.
                  Off Senator Akon Eyakenyi Street,
                  Off General Edet Akpan Ave, 520101, Uyo</p>
                   {{-- To
                   <address>
                    Name: <strong>{{ $view_studentsubjects->surname }}, {{ $view_studentsubjects->fname }} {{ $view_studentsubjects->middlename }}</strong><br>
                    Gender: {{ $view_studentsubjects->gender }}<br>
                    Phone: {{ $view_studentsubjects->phone }}<br>
                    Email: {{ $view_studentsubjects->email }}<br>
                    Admission ID: {{ $view_studentsubjects->regnumber }}<br>
                    Session: {{ $view_studentsubjects->academicsession }}<br>
                    Session: {{ $view_studentsubjects->entrylevel }}<br>

                  </address> --}}
                </div>
                <!-- /.col -->
                <div class="col-lg-3 col-md-3 col-sm-4 invoice-col">
                    <img style="width: 70%; height: 150px;" src="{{ URL::asset("/public/../$view_studentsubjects->images")}}" alt="">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  @if ($view_studentsubjects->section === 'Primary')
                      <form action="" method="post">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                              {{-- <th>S/N</th> --}}
                              <th>Subjects</th>
                              <th>Ca 1</th>
                              <th>Ca 2</th>
                              <th>Ca 3</th>
                              <th>Exams</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($view_subjects as $view_subject)
                                  @if ($view_subject->section == 'Primary')
                                  <tr>
                                    <td>{{ $view_subject->subjectname }}</td>
                                    <td><input type="number" class="form-control" name="test_1" placeholder="Test 1"></td>
                                    <td><input type="number" class="form-control" name="test_2" placeholder="Test 2"></td>
                                    <td><input type="number" class="form-control" name="test_3" placeholder="Test 3"></td>
                                    <td><input type="number" class="form-control" name="exams" placeholder="Exams"></td>
                                  </tr>
                                  @else
                                  @endif
                                @endforeach

                            </tbody>
                          </table>
                      </form>
                  @else
                      
                  @endif


                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                {{-- <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div> --}}
                <!-- /.col -->
                {{-- <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div> --}}
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @include('dashboard.admin.footer')