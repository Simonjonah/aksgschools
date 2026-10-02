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
@if (Auth::guard('web')->user()->role == 'admin')

      <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/home') }}" class="brand-link">
    
           <img src="{{ asset('assets/dist/img/logo.png') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
           {{-- <img src="{{ asset('assets/dist/img/arise.jpg') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
           <br> --}}
      <span class="brand-text font-weight-light"><br>AKSG SCHOOLS </span>
    </a>
    
      
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
           <img src="{{ asset('assets/dist/img/logo.png') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
           {{-- <img src="{{ asset('assets/dist/img/arise.jpg') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
           <br> --}}
        </div>
        <div class="info">
          <a href="{{ url('admin/profile') }}" class="d-block">Gen. Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Classes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/addclass') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Class</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewclassestables') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Classes</p>
                  </a>
                </li>
              </li>
            </ul>
          </li>


          
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Generate Code
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/addcode') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Codes</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewcode') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Code</p>
                  </a>
                </li>
              </li>
            </ul>
          </li> -->
          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Alm Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                 <li class="nav-item">
                  <a href="{{ url('admin/addalms') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Alms</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewallalms') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Alms</p>
                  </a>
                </li>

                
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Board Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('admin/registerssebandsubeb') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Board</p>
                  </a>
                </li>

                 

                <li class="nav-item">
                  <a href="{{ url('admin/sectionboard') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Board</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewboardmembers') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Board Members</p>
                  </a>
                </li>

                
              </li>
            </ul>
          </li>

          <!--  -->

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Administrations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('admin.addblog') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Press Releasse</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewblog') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Press Releasse</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.addtestimony') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Testimony</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewtestimony') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Testimony</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.addevent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewevents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Event</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.addteam') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Team</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.viewteam') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Team</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Contact Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              

              <li class="nav-item">
                <a href="{{ route('admin.viewcontact') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>
            </li>
            </ul>
          </li>

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Schools Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              
                <li class="nav-item">
                  <a href="{{ url('admin/viewperlgaschools') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Schools in LGA</p>
                  </a>
                </li>

              
              </li>
            </ul>
          </li> 



          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Assets
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/addgallery') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Gallery</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewgallery') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Galleries</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/addfacility') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Facility</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/viewfacility') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Facilities</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/addmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Main Slider</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/viewmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Main Slider</p>
                  </a>
                </li>
              </li>
            </ul>
          </li> --}}



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Principal Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/viewprincipals') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Principals</p>
                  </a>
                </li>

               

                <li class="nav-item">
                  <a href="{{ url('admin/viewheadmaster') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View HM/HS</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewprincipalsbylgadmin') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Principal/HM/HS By LGA</p>
                  </a>
                </li>

              </li>
            </ul>
          </li> 

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                School Info section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/viewschoolinforeview') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Review Sch. info</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/addmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Main Slider</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/viewmainslider') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Main Slider</p>
                  </a>
                </li>
              </li>
            </ul>
          </li>

           <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pins Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/viewpins') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Pins</p>
                  </a>
                </li>
              </li>
            </ul>
          </li> -->

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                L.G.A Schools
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/addlga') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add LGA</p>
                  </a>
                </li>
              </li>

              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/viewlga') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View L.G.A</p>
                  </a>
                </li>
              </li>

              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/viewperlgaschools') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Per School LGA </p>
                  </a>
                </li>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Students
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
             

              <li class="nav-item">
                <a href="{{ url('admin/adminprogress') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Pupils/Students</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/lgastudents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pupils/Students By LGA</p>
                </a>
              </li>
              

             
            </ul>
          </li>


             
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Subjects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addsubject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/nurserysubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Primary Subjects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewsubject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Secondary Subjects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/teachertosubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Technical Subjects</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/allsubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Subject</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Session
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addsession') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Session</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewsession') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Session</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Teachers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/viewlgabyteacher') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View LGA Teachers</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="{{ url('admin/viewteachers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Teachers</p>
                </a>
              </li>
              
              
            </ul>

          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Payments 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ url('admin/viewallpaymentsad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Payments</p>
                </a>
              </li>

             
            </ul>
          </li>

          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Notification 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
             
                <a href="{{ url('admin/addnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add notification</p>
                </a>
              </li>
              


              <li class="nav-item">
                <a href="{{ url('admin/viewnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Notification</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{ url('admin/viewcontact') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>


              
              <li class="nav-item">
                <a href="{{ url('admin/viewvisit') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Visit</p>
                </a>
              </li>
            </ul>
          </li>
         
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Notification 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
             
                <a href="{{ url('admin/addnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add notification</p>
                </a>
              </li>
              


              <li class="nav-item">
                <a href="{{ url('admin/viewnotification') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Notification</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{ url('admin/viewcontact') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>


              
              <li class="nav-item">
                <a href="{{ url('admin/viewvisit') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Visit</p>
                </a>
              </li>
            </ul>
          </li>
          -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Result Management 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
            
              
              <li class="nav-item">
             
                <a href="{{ url('admin/viewresultbylga') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Results</p>
                  {{-- viewresultbyadmins --}}
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/viewapproveresultsbyad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Approved Results</p>
                </a>
              </li>

              {{-- <li class="nav-item">
                <a href="{{ url('admin/viewallresults') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Results</p>
                </a>
              </li> --}}
               
            </ul>
          </li>

          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Result 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              
              @foreach ($view_clesses as $view_clesse)
              <li class="nav-item">
                <a href="{{ url('admin/addresultsad/'.$view_clesse->classname) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_clesse->classname }}</p>
                </a>
              </li>
              @endforeach
               
            </ul>
          </li>
          --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Psycomotor Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/addpsychomotorad') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Psycomotor</p>
                  </a>
                </li>
              </li>
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/viewpsycomotor') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Psycomotor</p>
                  </a>
                </li>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/adminpsycomotor') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Psycomotor</p>
                </a>
              </li>
            </li>

             
            </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Roles
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               
                <li class="nav-item">
                  <a href="{{ url('admin/viewroles') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Role</p>
                  </a>
                </li>
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
                  <a href="{{ url('admin/schooltrash') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>School Trash</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="{{ url('admin/boardmembertrash') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Board Member Trash</p>
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



@elseif (Auth::guard('web')->user()->role == 'Principal' && Auth::guard('web')->user()->status == 'admitted')


  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/home')}}" class="brand-link">
      <img src="{{ asset('assets/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AKSG</span>
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
                Dashboard @if(auth()->user()->section == 'Primary')
                HM/HS
                @else
                Principals
                @endif  
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
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/addsignature/'.Auth::guard('web')->user()->ref_no) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Add Signature 
                <span class="right badge badge-danger"></span>
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
                

                @else
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
                

                @else
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
                

                @else
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
               @if (Auth::guard('web')->user()->schooltype == 'SSEB')
               Students
                 
               @else
               Pupils
               @endif
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addstudent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Your @if (Auth::guard('web')->user()->schooltype == 'SSEB')
                    Students
                      
                    @else
                    Pupils
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
                

                @else
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
                @endif
             
                
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/suspendstudent') }}" class="nav-link">
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
                  <p> View All @if (Auth::guard('web')->user()->schooltype == 'SSEB')
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






  @elseif(Auth::guard('web')->user()->role == 'subadmin')

    <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/home') }}" class="brand-link">
    
           <img src="{{ asset('assets/dist/img/logo.png') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
           {{-- <img src="{{ asset('assets/dist/img/arise.jpg') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
           <br> --}}
      <span class="brand-text font-weight-light"><br>AKSG </span>
    </a>
    
      
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
           <img src="{{ asset('assets/dist/img/logo.png') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
           {{-- <img src="{{ asset('assets/dist/img/arise.jpg') }}" alt="webLTE Logo" class="brand-image "
           style="opacity: .8">
           <br> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->schooltype }} Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
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
            <a href="{{ url('admin/profile/'.Auth::guard('web')->user()->ref_no1) }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>


          

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                @if(auth()->user()->schooltype == 'SSEB')

                SCHOOL PRINCIPALS
                @elseif(auth()->user()->schooltype == 'SUBEB')
                HEAD MASTERS/MISTRESSES
                @elseif(auth()->user()->schooltype == 'TECHNICAL')
                TECHNICAL
                @endif
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
            
              <li class="nav-item">
                <a href="{{ url('/admin/displaymbtlga') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View @if(auth()->user()->schooltype == 'SSEB')
                    PRINCIPALS
                    @elseif(auth()->user()->schooltype == 'SUBEB')
                    HEAD HM/MISTRESSES
                    @endif by LGA</p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="{{ url('/admin/viewallhm') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View HM/HS Sch.</p>
                </a>
              </li> -->
              

            </ul>
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
                <a href="{{ url('/admin/addsubjectsc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subjects</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="{{ url('/admin/viewallsubjects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Subjects</p>
                </a>
              </li>

             
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
              <li class="nav-item">
                <a href="{{ url('/admin/addclassessc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Classes</p>
                </a>
              </li>

              @if (Auth::guard('web')->user()->schooltype == 'SUBEB')
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Primary')
                 <li class="nav-item">
                    <a href="{{ url('/admin/viewclassesbysc/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                 @endif
                @endforeach
                

                @else
                @foreach ($view_classes as $view_classe)
                 @if ($view_classe->section == 'Secondary')
                 <li class="nav-item">
                    <a href="{{ url('/admin/viewclassesbysc/'.$view_classe->classname) }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ $view_classe->classname }}</p>
                    </a>
                  </li>
                 @else
                   
                 @endif
                @endforeach
                @endif
             
              
              
              <li class="nav-item">
                  <a href="{{ url('/admin/viewallclasses/') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View All Classes</p>
                  </a>
                </li>
                
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Alms 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/addalms') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Alms</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ url('/admin/viewallalms/') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              

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
                <a href="{{ url('/admin/allresultsbylga') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Results By LGA</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/admin/allresults') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Results</p>
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
                <a href="{{ url('/admin/addpsychomotors/') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Psychomotors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/viewallpschomotors/') }}" class="nav-link">
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
               Pupils/Students
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              

              <li class="nav-item">
                <a href="{{ url('admin/viewyourlgastudents') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Students in LGA</p>
                </a>
              </li>
              

              <li class="nav-item">
                <a href="{{ url('admin/viewyourstudentsecondary') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View All Students</p>
                </a>
              </li>
              
            </ul>
          </li>



                    
          

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Schools Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="{{ url('admin/addeventsc') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Events</p>
                </a>
              </li> -->

              <li class="nav-item">
                <a href="{{ url('admin/viewyourschoolsbylgas') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Your Schools</p>
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
                @foreach ($view_sections as $view_section)
                <a href="{{ url('/admin/viewyourteachers/'.$view_section->section) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $view_section->section }}</p>
                </a>
                @endforeach
              </li>

              <li class="nav-item">
                <a href="{{ url('/admin/viewteacherbylga') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Teachers</p>
                </a>
              </li>
             
            </ul>
          </li>
          
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Notification
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <li class="nav-item">
                  <a href="{{ url('admin/mynotification') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>My Notification</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('admin/viewallnotifications') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Notifications</p>
                  </a>
                </li>
              </li>
                 

            </ul>
          </li>-->

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
                  <a href="{{ url('admin/schooltrash') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>School Trash</p>
                  </a>
                </li>


                <!-- <li class="nav-item">
                  <a href="{{ url('admin/boardmembertrash') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Board Member Trash</p>
                  </a>
                </li> -->

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
                Dashboard Teacher
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
                <span class="right badge badge-danger"></span>
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





