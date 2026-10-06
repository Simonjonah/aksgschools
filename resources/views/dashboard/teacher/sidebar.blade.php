            <?php
              use Illuminate\Support\Facades\Auth;

              use App\Models\Term;
              use App\Models\Classname;
              use App\Models\Alm;
              use App\Models\Section;

              $view_terms = Alm::orderBy('created_at', 'ASC')->get();

              $view_classes = Classname::orderBy('created_at', 'ASC')->get();

              $view_classsectionds = Classname::where('section', 'Secondary')->orderBy('created_at', 'ASC')->get();

              $view_alms = Alm::where('user_id', auth::guard('web')->id()
              )->orderBy('created_at', 'ASC')->get();

              $view_sections = Alm::where('user_id', auth::guard('web')->id()
              )->orderBy('created_at', 'ASC')->get();

          ?>

@if (Auth::guard('web')->user()->role == 'Principal' && Auth::guard('web')->user()->status == 'admitted')


  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/home')}}" class="brand-link">
      <img src="{{ asset('assets/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AKS ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="width: 50px; height: 50px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->fname }}</a>
        </div>
      </div>

      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
           
         
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard Schools  
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/profile1/'.Auth::guard('web')->user()->ref_no) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/addsignature/'.Auth::guard('web')->user()->ref_no) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Add Signature 
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

         

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Subjects
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
             
              <li class="nav-item">
                <a href="{{ url('/admin/viewallsubjectsbyhead') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Subjects</p>
                </a>
              </li>
              @if (Auth::guard('web')->user()->schooltype == 'SSEB')
              


              <li class="nav-item">
                <a href="{{ url('/admin/viewallsubjectsteacher') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Subjects</p>
                </a>
              </li>
             @else
             
             @endif
              
              

            </ul>
          </li>


         
          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Classes 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            

              @if (Auth::guard('web')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/admin/viewclassesbyprinc/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @elseif (Auth::guard('web')->user()->section == 'Secondary')
                @foreach ($view_classes as $view_classe)
                @if ($view_classe->section == 'Junior Secondary' || $view_classe->section == 'Secondary' || $view_classe->section == 'Senior Secondary')

                 <li class="nav-item">
                    <a href="{{ url('/admin/viewclassesbyprinc/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                   
                 @endif
                @endforeach

                @elseif (Auth::guard('web')->user()->section == 'Technical')
                @foreach ($view_classes as $view_classe)
                @if ($view_classe->section == 'Technical')

                 <li class="nav-item">
                    <a href="{{ url('/admin/viewclassesbyprinc/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                   
                 @endif
                @endforeach
                @endif
             
              
            </ul>
          </li>

         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Results Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              @if (Auth::guard('web')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/admin/firstermresultsbyprinc/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unapproved {{ $view_classe->classname }} Results</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @elseif (Auth::guard('web')->user()->section == 'Secondary')
                @foreach ($view_classes as $view_classe)
                @if ($view_classe->section == 'Junior Secondary' || $view_classe->section == 'Secondary' || $view_classe->section == 'Senior Secondary')

                 <li class="nav-item">
                    <a href="{{ url('/admin/firstermresultsbyprinc/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unapproved {{ $view_classe->classname }} Results</p>
                    </a>
                  </li>
                 @else
                   
                 @endif
                @endforeach

                @elseif (Auth::guard('web')->user()->section == 'Technical')
                @foreach ($view_classes as $view_classe)
                @if ($view_classe->section == 'Technical')

                 <li class="nav-item">
                    <a href="{{ url('/admin/firstermresultsbyprinc/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unapproved {{ $view_classe->classname }} Results</p>
                    </a>
                  </li>
                 @else
                   
                 @endif
                @endforeach
                @else 
                @endif
              </li>

              <li class="nav-item">
                <a href="{{ url('/admin/allresultsprinci') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Unapproved Results</p>
                </a>
              </li>
            </ul>


            <ul class="nav nav-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Approved Results
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
              <li class="nav-item">
              @if (Auth::guard('web')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/admin/firstermresultsbyprincapproved/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Approved {{ $view_classe->classname }} Results</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @elseif (Auth::guard('web')->user()->section == 'Secondary')
                  @foreach ($view_classes as $view_classe)
                  @if ($view_classe->section == 'Junior Secondary' || $view_classe->section == 'Secondary' || $view_classe->section == 'Senior Secondary')

                  <li class="nav-item">
                      <a href="{{ url('/admin/firstermresultsbyprincapproved/'.$view_classe->classname) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Approved {{ $view_classe->classname }} Results</p>
                      </a>
                    </li>
                  @else
                    
                  @endif
                  @endforeach

                @elseif (Auth::guard('web')->user()->section == 'Technical')
                  @foreach ($view_classes as $view_classe)
                  @if ($view_classe->section == 'Technical')

                  <li class="nav-item">
                      <a href="{{ url('/admin/firstermresultsbyprincapproved/'.$view_classe->classname) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Approved {{ $view_classe->classname }} Results</p>
                      </a>
                    </li>
                  @else
                    
                  @endif
                  @endforeach

                @endif
              </li>

              <li class="nav-item">
                <a href="{{ url('/admin/allresultsprinciapproved') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Approved Results</p>
                </a>
              </li>
            </ul>


          </li>
          

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                 Psychomotors 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('admin/tecacherdomainadd/'.Auth::guard('web')->user()->ref_no1) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Psychomotors</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                School Info
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addaverts') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Info</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/viewyouradverts') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Your Info</p>
                </a>
              </li>
              
            </ul>
          </li>


            
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                 Pupils
               @else
               Students
               @endif
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addstudent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Your @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                    Pupils
                      
                    @else
                    Students
                    @endif </p>
                </a>
              </li>
              <li class="nav-item">
              @if (Auth::guard('web')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/admin/viewyourstudentsprimary/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @elseif (Auth::guard('web')->user()->section == 'Secondary')
                  @foreach ($view_classes as $view_classe)
                  @if ($view_classe->section == 'Junior Secondary' || $view_classe->section == 'Secondary' || $view_classe->section == 'Senior Secondary')
                  <li class="nav-item">
                      <a href="{{ url('/admin/viewyourstudentsprimary/'.$view_classe->classname) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $view_classe->classname }}</p>
                      </a>
                    </li>
                  @else
                    
                  @endif
                  @endforeach

                @elseif (Auth::guard('web')->user()->section == 'Technical')
                  @foreach ($view_classes as $view_classe)
                  @if ($view_classe->section == 'Technical')
                  <li class="nav-item">
                      <a href="{{ url('/admin/viewyourstudentsprimary/'.$view_classe->classname) }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $view_classe->classname }}</p>
                      </a>
                    </li>
                  @else
                    
                  @endif
                  @endforeach
                @endif
             
                
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/suspendstudentone') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Suspended @if (Auth::guard('web')->user()->schooltype == 'SSEB')
                    Students
                      
                    @else
                    Pupils
                    @endif</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/restatedstudent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Restated @if (Auth::guard('web')->user()->schooltype == 'SSEB')
                    Students
                      
                    @else
                    Pupils
                    @endif</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/viewallstudentsbyprinc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View All   @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                 Pupils
               @else
               Students
               @endif</p>
                </a>
              </li>
              
            </ul>
          </li>



                    
          

          

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Teachers Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

           
              
              <li class="nav-item">
                <a href="{{ url('/admin/addteacher') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Teacher</p>
                </a>
              </li>
                
              <li class="nav-item">
              @if (Auth::guard('web')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/admin/viewyourteachersby/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @else
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Senior Secondary' || $view_classe->section == 'Secondary' || $view_classe->section == 'Junior Secondary')
                 <li class="nav-item">
                    <a href="{{ url('/admin/viewyourteachersby/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                   
                 @endif
                @endforeach
                @endif
             

              </li>

             @if (Auth::guard('web')->user()->schooltype == 'SSEB')
             <li class="nav-item">
                <a href="{{ url('/admin/viewallsubjectsteacher') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Subjects</p>
                </a>
              </li>
             @else
             
             @endif

              <li class="nav-item">
                <a href="{{ url('/admin/myteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Teachers</p>
                </a>
              </li>

            
            </ul>
          </li>
          
       <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Trash Bin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/studenttrash') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Students Trash</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/teachertrash') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Teachers Trash</p>
                  </a>
                </li>

                

                <li class="nav-item">
                  <a href="{{ url('admin/resultstrash') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Results Trash</p>
                  </a>
                </li>

               
              </li>
            </ul>
          </li>
          
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav> 
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @elseif (Auth::guard('web')->user()->role == 'teacher' && Auth::guard('web')->user()->status == 'admitted')

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/home')}}" class="brand-link">
      <img src="{{ asset('assets/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AKSG SCHOOLS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="width: 50px; height: 50px;" src="{{ asset('/public/../'.Auth::guard('web')->user()->images)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->fname }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('/admin/profile1/'.Auth::guard('web')->user()->ref_no) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                 Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Your Class {{ Auth::guard('web')->user()->classname }}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/yourclassbyteacher/'.Auth::guard('web')->user()->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Children</p>
                </a>
              </li>

              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                View Your Results 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/tecacherviewresultbysub') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Unapproved Result</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/tecacherviewresultbysubapproved') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Approved Results</p>
                </a>
              </li>
             
            </ul>
          </li>          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Domains 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
           
              <li class="nav-item">
                <a href="{{ url('admin/teacherviewdomaiin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Domain</p>
                </a>
              </li>
             
            </ul>
          </li>          


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                My Subjects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/myteachersubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Subjects</p>
                </a>
              </li>
            
            </ul>
          </li>
          
         
          
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>


      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>    





  


  @endif





