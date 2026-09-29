@include('dashboard.header')
@include('dashboard.sidebar')

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

  
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Domains</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="#" class="dropdown-item">Action</a>
                  <a href="#" class="dropdown-item">Another action</a>
                  <a href="#" class="dropdown-item">Something else here</a>
                  <a class="dropdown-divider"></a>
                  <a href="#" class="dropdown-item">Separated link</a>
                </div>
              </div>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                {{-- <p class="text-center">
                  <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p> --}}

                <div class="table-responsive">
                  {{-- <p class="lead">Behaviour</p> --}}
    
                  <form action="{{ url('web/createpsychomotoro/'.$add_psychomotor->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                    <table class="table table-bordered">
                      <tr>
                        {{-- <td><input type="text" name="" value="{{ $add_psychomotor->images }}" id=""></td> --}}
                        <th style="width:50%">COGNITIVE DOMAIN:</th>
                        <th style="width:50%">4</th>
                        <th style="width:50%">3</th>
                        <th style="width:50%">2</th>
                        <th style="width:50%">1</th>
                      </tr>
                   
                      <tr>
                        <th>Punctuality</th>
                        <td><input type="checkbox" name="punt1" value="Yes" id=""></td>
                        <td><input type="checkbox" name="punt2" value="Yes" id=""></td>
                        <td><input type="checkbox" name="punt3" value="Yes" id=""></td>
                        <td><input type="checkbox" name="punt4" value="Yes" id=""></td>
                        
                      </tr>
                      
                      <tr>
                        <th>Politeness</th>
                
                        <td><input type="checkbox" value="Yes" name="polite1" id=""></td>
                        <td><input type="checkbox" value="Yes" name="polite2" id=""></td>
                        <td><input type="checkbox" value="Yes" name="polite3" id=""></td>
                        <td><input type="checkbox" value="Yes" name="polite4" id=""></td>
                        
                      </tr>

                      <tr>
                        <th>Responsibility</th>
                      
                        <td><input type="checkbox" value="Yes" name="respond1" id=""></td>
                        <td><input type="checkbox" value="Yes" name="respond2" id=""></td>
                        <td><input type="checkbox" value="Yes" name="respond3" id=""></td>
                        <td><input type="checkbox" value="Yes" name="respond4" id=""></td>
                        
                      </tr>
                      <tr>
                        <th>Corporation</th>
                      
                        <td><input type="checkbox" value="Yes" name="corporate1" id=""></td>
                        <td><input type="checkbox" value="Yes" name="corporate2" id=""></td>
                        <td><input type="checkbox" value="Yes" name="corporate3" id=""></td>
                        <td><input type="checkbox" value="Yes" name="corporate4" id=""></td>
                        
                      </tr>
                      <tr>
                        <th>Neatness</th>
                        <td><input type="checkbox" value="Yes" name="neat1" id=""></td>
                        <td><input type="checkbox" value="Yes" name="neat2" id=""></td>
                        <td><input type="checkbox" value="Yes" name="neat3" id=""></td>
                        <td><input type="checkbox" value="Yes" name="neat4" id=""></td>
                      </tr>
                      
  
                      <tr>
                        <th>Attentiveness</th>
                        <td><input type="checkbox" value="Yes" name="attentive1" id=""></td>
                        <td><input type="checkbox" value="Yes" name="attentive2" id=""></td>
                        <td><input type="checkbox" value="Yes" name="attentive3" id=""></td>
                        <td><input type="checkbox" value="Yes" name="attentive4" id=""></td>
                        
                      </tr>
                      <tr>
                        <th>Initiative</th>
                
                        <td><input type="checkbox" value="Yes" name="init1" id=""></td>
                        <td><input type="checkbox" value="Yes" name="init2" id=""></td>
                        <td><input type="checkbox" value="Yes" name="init3" id=""></td>
                        <td><input type="checkbox" value="Yes" name="init4" id=""></td>
                        
                      </tr>
                      <tr>
                        <th>Organisation</th>
                    
                        <td><input type="checkbox" value="Yes" name="organ1" id=""></td>
                        <td><input type="checkbox" value="Yes" name="organ2" id=""></td>
                        <td><input type="checkbox" value="Yes" name="organ3" id=""></td>
                        <td><input type="checkbox" value="Yes" name="organ4" id=""></td>
                        
                      </tr>
                      <tr>
                        <th>Perseverance</th>
                        <td><input type="checkbox" value="Yes" name="pers1" id=""></td>
                        <td><input type="checkbox" value="Yes" name="pers2" id=""></td>
                        <td><input type="checkbox" value="Yes" name="pers3" id=""></td>
                        <td><input type="checkbox" value="Yes" name="pers4" id=""></td>
                      </tr>

                      <tr>
                        <th>Attitude to Work</th>
                        <td><input type="checkbox" value="Yes" name="atti1" id=""></td>
                        <td><input type="checkbox" value="Yes" name="atti2" id=""></td>
                        <td><input type="checkbox" value="Yes" name="atti3" id=""></td>
                        <td><input type="checkbox" value="Yes" name="atti4" id=""></td>
                      </tr>
                    </table>
                      <div class="form-group">
                          <textarea class="form-control" name="teacher_comment" id="" cols="20" rows="5" placeholder="Teacher's Comment"></textarea>
                      </div>
                </div>
               
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <p class="text-center">
                  <strong>Goal Completion</strong>
                </p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">PSYCHOMOTOR DOMAIN:</th>
                      <th style="width:50%">4</th>
                      <th style="width:50%">3</th>
                      <th style="width:50%">2</th>
                      <th style="width:50%">1</th>
                    </tr>
                    <tr>
                      <th>Club & Society</th>
                      <td><input type="checkbox" value="Yes" name="club1" id=""></td>
                      <td><input type="checkbox" value="Yes" name="club2" id=""></td>
                      <td><input type="checkbox" value="Yes" name="club3" id=""></td>
                      <td><input type="checkbox" value="Yes" name="club4" id=""></td>
                    </tr>
                    <tr>
                      <th>Handwriting</th>
                      <td><input type="checkbox" value="Yes" name="hand1" id=""></td>
                      <td><input type="checkbox" value="Yes" name="hand2" id=""></td>
                      <td><input type="checkbox" value="Yes" name="hand3" id=""></td>
                      <td><input type="checkbox" value="Yes" name="hand4" id=""></td>
                    </tr>
    
                    <tr>
                      <th>Technical Work</th>
                      <td><input type="checkbox" value="Yes" name="tech1" id=""></td>
                      <td><input type="checkbox" value="Yes" name="tech2" id=""></td>
                      <td><input type="checkbox" value="Yes" name="tech3" id=""></td>
                      <td><input type="checkbox" value="Yes" name="tech4" id=""></td>
                    </tr>
                    <tr>
                      <th>Handling Tools</th>
                      <td><input type="checkbox" value="Yes" name="tool1" id=""></td>
                      <td><input type="checkbox" value="Yes" name="tool2" id=""></td>
                      <td><input type="checkbox" value="Yes" name="tool3" id=""></td>
                      <td><input type="checkbox" value="Yes" name="tool4" id=""></td>
                    </tr>
    
                    <tr>
                      <th>Practical Works</th>
                      <td><input type="checkbox" value="Yes" name="pract1" id=""></td>
                      <td><input type="checkbox" value="Yes" name="pract2" id=""></td>
                      <td><input type="checkbox" value="Yes" name="pract3" id=""></td>
                      <td><input type="checkbox" value="Yes" name="pract4" id=""></td>
                    </tr>
    
                    <tr>
                      <th>Craftmanship</th>
                      <td><input type="checkbox" value="Yes" name="craft1" id=""></td>
                      <td><input type="checkbox" value="Yes" name="craft2" id=""></td>
                      <td><input type="checkbox" value="Yes" name="craft3" id=""></td>
                      <td><input type="checkbox" value="Yes" name="craft4" id=""></td>
                    </tr>

                    <tr>
                      <th>Music Skills</th>
                      <td><input type="checkbox" value="Yes" name="music1" id=""></td>
                      <td><input type="checkbox" value="Yes" name="music2" id=""></td>
                      <td><input type="checkbox" value="Yes" name="music3" id=""></td>
                      <td><input type="checkbox" value="Yes" name="music4" id=""></td>
                    </tr>

                    <tr>
                      <th>Computer Skills</th>
                      <td><input type="checkbox" value="Yes" name="comp1" id=""></td>
                      <td><input type="checkbox" value="Yes" name="comp2" id=""></td>
                      <td><input type="checkbox" value="Yes" name="comp3" id=""></td>
                      <td><input type="checkbox" value="Yes" name="comp4" id=""></td>
                    </tr>

                    <tr>
                      <th>Sports</th>
                      <td><input type="checkbox" value="Yes" name="sport1" id=""></td>
                      <td><input type="checkbox" value="Yes" name="sport2" id=""></td>
                      <td><input type="checkbox" value="Yes" name="sport3" id=""></td>
                      <td><input type="checkbox" value="Yes" name="sport4" id=""></td>
                    </tr>

                    <tr>
                      <th>Drawing/Painting</th>
                      <td><input type="checkbox" value="Yes" name="paint1" id=""></td>
                      <td><input type="checkbox" value="Yes" name="paint2" id=""></td>
                      <td><input type="checkbox" value="Yes" name="paint3" id=""></td>
                      <td><input type="checkbox" value="Yes" name="paint4" id=""></td>
                    </tr>
                  
                  </table>
    
                </div>
                <table class="table table-bordered">
                  <tr>
                    <th style="width:50%" colspan="5" style="text-align: center">GRADING AND KEY</th>
                    
                  </tr>
                  <tr>
                    <th>0</th>
                    <td>-</td>
                    <td>39</td>
                    <td>F</td>
                    <td>FAIL</td>
                  </tr>
                  <tr>
                    <th>40</th>
                    <td>-</td>
                    <td>49</td>
                    <td>E</td>
                    <td>FAIR</td>
                  </tr>
  
                  <tr>
                    <th>50</th>
                    <td>-</td>
                    <td>59</td>
                    <td>D</td>
                    <td>PASS</td>
                  </tr>
                  <tr>
                    <th>60</th>
                    <td>-</td>
                    <td>69</td>
                    <td>C</td>
                    <td>GOOD</td>
                  </tr>
  
                  <tr>
                    <th>70</th>
                    <td>-</td>
                    <td>79</td>
                    <td>B</td>
                    <td>VERY GOOD</td>
                  </tr>
                  <tr>
                    <th>80</th>
                    <td>-</td>
                    <td>100</td>
                    <td>A</td>
                    <td>EXCELLENCE</td>
                  </tr>
                  
                </table>
              </div>
              <button type="submit" class="btn btn-success"><i class="far fa-bell"></i> Submit
                 
              </button>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
















    

  </div>
  <!-- /.content-wrapper -->

  
 @include('dashboard.footer')