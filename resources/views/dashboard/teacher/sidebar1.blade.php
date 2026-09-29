<?php
              use Illuminate\Support\Facades\Auth;

              use App\Models\Term;
              use App\Models\Classname;
              use App\Models\Alm;
              use App\Models\Section;

              $view_terms = Term::orderBy('created_at', 'ASC')->get();

              $view_classes = Classname::orderBy('created_at', 'ASC')->get();


              $view_alms = Alm::orderBy('created_at', 'ASC')->get();

             

          ?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('teacher/home') }}" class="brand-link">
      <img src="{{ asset('/public/../'.Auth::guard('teacher')->user()->logo)}}" alt="logo" class="brand-image "
           style="opacity: .8">
           <img src="{{ asset('assets/dist/img/logo.jpg') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
           <img src="{{ asset('assets/dist/img/logo.jpg') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
           <br>
      <span class="brand-text font-weight-light">{{ Auth::guard('teacher')->user()->schoolname }}</span>
    </a>

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('/public/../'.Auth::guard('teacher')->user()->logo)}}" class="img-circle elevation-2" alt="User Image"> <br>
        @if (Auth::guard('teacher')->user()->logo == 'noimage.jpg') 
          <a class="btn btn-primary" href="{{ url('teacher/addlogotr/'.Auth::guard('teacher')->user()->ref_no) }}">Add Logo of Your School</a>
        @else
          
        @endif
        </div>
        <div class="info">
          <a href="{{ url('teacher/profile1/'.Auth::guard('teacher')->user()->ref_no) }}" class="d-block">{{ Auth::guard('teacher')->user()->fname }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
     

      @if (Auth::guard('teacher')->user()->status == 'admitted' && Auth::guard('teacher')->user()->assign1 == 'teacher')
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
                <a href="{{ url('teacher/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('/teacher/profile1/'.Auth::guard('teacher')->user()->ref_no) }}" class="nav-link">
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
                Your Class {{ Auth::guard('teacher')->user()->classname }}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('teacher/yourclassbyteacher/'.Auth::guard('teacher')->user()->classname) }}" class="nav-link">
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
                <a href="{{ url('teacher/tecacherviewresultbysub') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Unapproved Result</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('teacher/tecacherviewresultbysubapproved') }}" class="nav-link">
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
                <a href="{{ url('teacher/teacherviewdomaiin') }}" class="nav-link">
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
                <a href="{{ url('teacher/myteachersubjects') }}" class="nav-link">
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
                <a href="{{ url('teacher/logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>




      @elseif (Auth::guard('teacher')->user()->status == 'reject')
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
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
                <a href="{{ url('teacher/logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>

      @elseif (Auth::guard('teacher')->user()->status == 'suspend')
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
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
                <a href="{{ url('teacher/logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>

      @elseif (Auth::guard('teacher')->user()->status == 'retired')
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
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
                <a href="{{ url('teacher/logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav>

     @elseif (Auth::guard('teacher')->user()->status == 'admitted')
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
                <a href="{{ url('/teacher/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('teacher/profile1/'.Auth::guard('teacher')->user()->ref_no) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('teacher/addsignature/'.Auth::guard('teacher')->user()->ref_no) }}" class="nav-link">
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
                <a href="{{ url('/teacher/viewallsubjectsbyhead') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Subjects</p>
                </a>
              </li>
              @if (Auth::guard('teacher')->user()->schooltype == 'SSEB')
              


              <li class="nav-item">
                <a href="{{ url('/teacher/viewallsubjectsteacher') }}" class="nav-link">
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
            

              @if (Auth::guard('teacher')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/teacher/viewclassesbyprinc/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @else
                @foreach ($view_classes as $view_classe)
                @if ($view_classe->section == 'Junior Secondary' || $view_classe->section == 'Secondary' || $view_classe->section == 'Senior Secondary')

                 <li class="nav-item">
                    <a href="{{ url('/teacher/viewclassesbyprinc/'.$view_classe->classname) }}" class="nav-link">
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
              @if (Auth::guard('teacher')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/teacher/firstermresultsbyprinc/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unapproved {{ $view_classe->classname }} Results</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @else
                @foreach ($view_classes as $view_classe)
                @if ($view_classe->section == 'Junior Secondary' || $view_classe->section == 'Secondary' || $view_classe->section == 'Senior Secondary')

                 <li class="nav-item">
                    <a href="{{ url('/teacher/firstermresultsbyprinc/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Unapproved {{ $view_classe->classname }} Results</p>
                    </a>
                  </li>
                 @else
                   
                 @endif
                @endforeach
                @endif
              </li>

              <li class="nav-item">
                <a href="{{ url('/teacher/allresultsprinci') }}" class="nav-link">
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
              @if (Auth::guard('teacher')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/teacher/firstermresultsbyprincapproved/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Approved {{ $view_classe->classname }} Results</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @else
                @foreach ($view_classes as $view_classe)
                @if ($view_classe->section == 'Junior Secondary' || $view_classe->section == 'Secondary' || $view_classe->section == 'Senior Secondary')

                 <li class="nav-item">
                    <a href="{{ url('/teacher/firstermresultsbyprincapproved/'.$view_classe->classname) }}" class="nav-link">
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
                <a href="{{ url('/teacher/allresultsprinciapproved') }}" class="nav-link">
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
                <a href="{{ url('teacher/tecacherdomainadd/'.Auth::guard('teacher')->user()->ref_no1) }}" class="nav-link">
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
                <a href="{{ url('teacher/addaverts') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Info</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('teacher/viewyouradverts') }}" class="nav-link">
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
               @if (Auth::guard('teacher')->user()->schooltype == 'SSEB')
               Students
                 
               @else
               Pupils
               @endif
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('teacher/addstudent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Your @if (Auth::guard('teacher')->user()->schooltype == 'SSEB')
                    Students
                      
                    @else
                    Pupils
                    @endif </p>
                </a>
              </li>
              <li class="nav-item">
              @if (Auth::guard('teacher')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/teacher/viewyourstudentsprimary/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @else
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Junior Secondary' || $view_classe->section == 'Secondary' || $view_classe->section == 'Senior Secondary')
                 <li class="nav-item">
                    <a href="{{ url('/teacher/viewyourstudentsprimary/'.$view_classe->classname) }}" class="nav-link">
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
                <a href="{{ url('teacher/suspendstudent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Suspended @if (Auth::guard('teacher')->user()->schooltype == 'SSEB')
                    Students
                      
                    @else
                    Pupils
                    @endif</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('teacher/restatedstudent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Restated @if (Auth::guard('teacher')->user()->schooltype == 'SSEB')
                    Students
                      
                    @else
                    Pupils
                    @endif</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('teacher/viewallstudentsbyprinc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View All @if (Auth::guard('teacher')->user()->schooltype == 'SSEB')
                    Students
                      
                    @else
                    Pupils
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
              @if (Auth::guard('teacher')->user()->section == 'Primary')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/teacher/viewyourteachersby/'.$view_classe->classname) }}" class="nav-link">
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
                    <a href="{{ url('/teacher/viewyourteachersby/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                   
                 @endif
                @endforeach
                @endif
             

              </li>

             @if (Auth::guard('teacher')->user()->schooltype == 'SSEB')
             <li class="nav-item">
                <a href="{{ url('/teacher/viewallsubjectsteacher') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Subjects</p>
                </a>
              </li>
             @else
             
             @endif

              <li class="nav-item">
                <a href="{{ url('/teacher/myteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Teachers</p>
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
                <a href="{{ url('teacher/logout') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
           
            </ul>
          </li>
         
        </ul>
      </nav> 
      
      @else

            <h1>no</h1>
      @endif
    </div>
    
    <!-- /.sidebar -->
  </aside>
