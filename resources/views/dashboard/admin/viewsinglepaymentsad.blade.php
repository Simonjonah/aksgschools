@include('dashboard.admin.header')

  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
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
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to print.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                  <td>{{ $view_single_payment->ref_no }}</td>
                    <small class="float-right">Date: {{ Auth::guard('guardian')->user()->created_at->format('D d, M Y, H:i') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-2 invoice-col">
               
                    <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="guardianLTE Logo">
                </div>
                <!-- /.col -->
                <div class="col-sm-8 invoice-col">
                <h1>GOLDEN DESTINY ACADEMY</h1>
                  <address>
                    Golden Destiny Academy Road.
                    Off Senator Akon Eyakenyi Street,
                    Off General Edet Akpan Ave, 520101, Uyo
                    <br>
                    (+234) 0916 684 3045, (+234) 07026191619
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-2 invoice-col">
                  {{-- <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 --}}
                </div>
                <!-- /.col -->
              </div>
           
              <div class="row" style="padding-top: 60px">
              
                <!-- /.col -->
                <div class="col-6">
                  {{-- <p class="lead">Amount Due 2/22/2014</p> --}}
          
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">First Name:</th>
                        <td>	{{ $view_single_payment->fname}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Middle Name:</th>
                        <td>	{{ $view_single_payment->middlename}}</td>
                      </tr>

                      <tr>
                        <th style="width:50%">SurName:</th>
                        <td>	{{ $view_single_payment->surname}}</td>
                      </tr>
                      <tr>

                        <tr>
                          <th style="width:50%">Classname:</th>
                          <td>	{{ $view_single_payment->classname}}</td>
                        </tr>
                        <tr>

                          <tr>
                            <th style="width:50%">Term:</th>
                            <td>	{{ $view_single_payment->term}}</td>
                          </tr>
                          <tr>
                        <th style="width:50%">Form Amount:</th>
                        <td>	₦{{ $view_single_payment->form_amount}}</td>
                      </tr>
                      <tr>
                        <th>Tuition</th>
                        <td>	₦{{ $view_single_payment->tuition}}</td>
                      </tr>

                      <tr>
                        <th>Address </th>
                        <td>	{{ $view_single_payment->address}}</td>
                      </tr>

                      </table>
                  </div>
                </div>

                <div class="col-6">
                  {{-- <p class="lead">Amount Due 2/22/2014</p> --}}
          
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Book Amount</th>
                        <td>₦{{ $view_single_payment->bookamount }}</td>
                      </tr>
                      <tr>
                        <th>Form Amount</th>
                        <td>₦{{ $view_single_payment->form_amount }}</td>
                      </tr>


                      <tr>
                        <th>Uniform Amount</th>
                        <td>₦{{ $view_single_payment->uniforms_amount }}</td>
                      </tr>
                      <tr>
                        <th>Extra Curriculum Activities</th>
                        <td>₦{{ $view_single_payment->extracuri_fee }}</td>
                      </tr>

                      <tr>
                        <th>Medicals</th>
                        <td>₦{{ $view_single_payment->medicals }}</td>
                      </tr>
                      <tr>
                        <th>Development Amount</th>
                        <td>	₦{{ $view_single_payment->dev_amount}}</td>
                      </tr>
                      <tr>
                        <th>PTA</th>
                        <td>₦{{ $view_single_payment->pta_amount }}</td>
                      </tr>
              
                      <tr>
                        <th>Amount </th>
                        <td>	₦{{ $view_single_payment->amount}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{ url('admin/printsinglepaymentspdf/'.$view_single_payment->ref_no) }}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  
                 
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
  @include('dashboard.admin.footer')
