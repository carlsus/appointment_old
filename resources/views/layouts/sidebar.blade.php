<aside class="main-sidebar sidebar-light-primary elevation-4 text-sm">
    <!-- Brand Logo -->
    <a href="{{ url('./home') }}" class="brand-link">
      <img src="{{ url('./img/logo.png')}}" alt="NEPTUNE Logo" class="brand-image "
           style="opacity: .8">
      <span class="brand-text font-weight-bold">NEPTUNE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard -->

            <li class="nav-item">
                <a href="{{ url('./home') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

             <!-- Manning -->
            @can('manning-menu')
            <li class="nav-item has-treeview" id="manning">
            <a href="#" class="nav-link menu-item" >
                <i class="nav-icon fa fa-users"></i>
                <p>
                Manning
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('post-job-opening-menu')
                <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far  fa-angle-right nav-icon"></i>
                    <p>Post Job Openings</p>
                </a>
                </li>
                @endcan
                @can('applicant-menu')
                <li class="nav-item">
                <a href="{{ route('applicants.index') }}"  class="nav-link">
                    <i class="far  fa-angle-right nav-icon"></i>
                    <p>Applicants</p>
                    </a>
                </li>
                @endcan


            </ul>
            </li>
            @endcan

 <!-- Crew Management -->
 @can('crew-management-menu', Model::class)
   <li class="nav-item">
       <a href="{{ route('crews.index') }}" class="nav-link">
           <i class="nav-icon fas fa-anchor"></i>
           <p>
               Crew Management
           </p>
       </a>
   </li>
 @endcan

 <!-- OnBoard Management -->
 @can('on-board-management-menu')
 <li class="nav-item has-treeview">
   <a href="#" class="nav-link">
     <i class="nav-icon fa fa-clipboard"></i>
     <p>
       On-Board Management
       <i class="fas fa-angle-left right"></i>
     </p>
   </a>
   <ul class="nav nav-treeview">
     @can('embarkation-menu')
     <li class="nav-item">
       <a href="{{ route('embarkations.index') }}" class="nav-link">
         <i class="far  fa-angle-right nav-icon"></i>
         <p>Embarkation</p>
       </a>
     </li>
     @endcan
     @can('disembarkation-menu')
     <li class="nav-item">
       <a href="{{ route('disembarkations') }}" class="nav-link">
         <i class="far  fa-angle-right nav-icon"></i>
         <p>Disembarkation</p>
       </a>
     </li>
     @endcan

   </ul>
 </li>
 @endcan

 <!-- Vessel and Principal Management -->
 @can('vessel-principal-menu')
 <li class="nav-item has-treeview">
   <a href="#" class="nav-link">
     <i class="nav-icon fa fa-ship"></i>
     <p>
       Principal and Vessel
       <i class="fas fa-angle-left right"></i>
     </p>
   </a>
   <ul class="nav nav-treeview">
     @can('embarkation-menu')
     <li class="nav-item">
       <a href="{{ route('principals.index') }}" class="nav-link">
         <i class="far  fa-angle-right nav-icon"></i>
         <p>Principal</p>
       </a>
     </li>
     @endcan
     @can('vessel-menu')
     <li class="nav-item">
       <a href="{{ route('vessels.index') }}" class="nav-link">
         <i class="far  fa-angle-right nav-icon"></i>
         <p>Vessel</p>
       </a>
     </li>
     @endcan

   </ul>
 </li>
 @endcan


@can('reports-menu')
<li class="nav-item has-treeview">
   <a href="#" class="nav-link">
       <i class="nav-icon fas fa-print"></i>
       <p>
           Reports<i class="fas fa-angle-left right"></i>
       </p>
   </a>
   <ul class="nav nav-treeview">
       <li class="nav-item">
           <a href="{{ route('users.index') }}" class="nav-link">
               <i class="far fa-angle-right nav-icon"></i>
               <p>Crew Incident</p>
           </a>
       </li>

       <li class="nav-item">
           <a href="{{ route('roles.index') }}" class="nav-link">
               <i class="far  fa-angle-right nav-icon"></i>
               <p>Crew List by Vessel</p>
           </a>
       </li>

       <li class="nav-item">
           <a href="" class="nav-link">
               <i class="far  fa-angle-right nav-icon"></i>
               <p>Embarkation List - Admin</p>
           </a>
       </li>

       <li class="nav-item">
           <a href="" class="nav-link">
               <i class="far  fa-angle-right nav-icon"></i>
               <p>Embarkation List - POEA</p>
           </a>
       </li>

       <li class="nav-item">
           <a href="" class="nav-link">
               <i class="far  fa-angle-right nav-icon"></i>
               <p>Disembarkation List - Admin</p>
           </a>
       </li>

       <li class="nav-item">
           <a href="" class="nav-link">
               <i class="far  fa-angle-right nav-icon"></i>
               <p>Disembarkation List - POEA</p>
           </a>
       </li>

       <li class="nav-item">
           <a href="" class="nav-link">
               <i class="far  fa-angle-right nav-icon"></i>
               <p>PDOS</p>
           </a>
       </li>

       <li class="nav-item">
           <a href="" class="nav-link">
               <i class="far  fa-angle-right nav-icon"></i>
               <p>RPS</p>
           </a>
       </li>

       <li class="nav-item">
           <a href="" class="nav-link">
               <i class="far  fa-angle-right nav-icon"></i>
               <p>RPS - Ammendment Form</p>
           </a>
       </li>


   </ul>
</li>
@endcan
<!--  Reports-->
<!-- Maintenance -->
@can('maintenance-menu', Model::class)
<li class="nav-item has-treeview" id="maintenance">
   <a href="#" class="nav-link">
       <i class="nav-icon fas fa-tasks"></i>
       <p>
       Maintenance
       <i class="fas fa-angle-left right"></i>
       </p>
   </a>
   <ul class="nav nav-treeview">
       @can('agents-menu')
           <li class="nav-item">
               <a href="{{ route('agents.index') }}" class="nav-link ">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Agents</p>
               </a>
           </li>
       @endcan
       @can('airlines-menu')
           <li class="nav-item">
               <a href="{{ route('airlines.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Airlines</p>
               </a>
           </li>
       @endcan
       @can('airports-menu')
           <li class="nav-item">
               <a href="{{ route('airports.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Airports</p>
               </a>
           </li>
       @endcan
       @can('announcement-menu')
           <li class="nav-item">
               <a href="{{ route('announcements.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Announcement</p>
               </a>
           </li>
       @endcan
       @can('banks-menu')
           <li class="nav-item">
               <a href="{{ route('banks.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Banks</p>
               </a>
           </li>
       @endcan
       @can('branches-menu')
           <li class="nav-item">
               <a href="{{ route('branches.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Branches</p>
               </a>
           </li>
       @endcan
       @can('medical-clinics-menu')
           <li class="nav-item">
               <a href="{{ route('clinics.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Clinics</p>
               </a>
           </li>
       @endcan
       @can('departments-menu')
           <li class="nav-item">
               <a href="{{ route('departments.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Departments</p>
               </a>
           </li>
       @endcan
       @can('documents-menu')
           <li class="nav-item">
               <a href="{{ route('documents.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Documents</p>
               </a>
           </li>
       @endcan
       @can('flag-state-documents-menu')
           <li class="nav-item">
               <a href="{{ route('flags.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Flag Sate Documents</p>
               </a>
           </li>
       @endcan
       @can('licenses-menu')
           <li class="nav-item">
               <a href="{{ route('licenses.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Licenses</p>
               </a>
           </li>
       @endcan
       @can('manning-agency-menu')
           <li class="nav-item">
               <a href="{{ route('manningagencies.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Manning Agency</p>
               </a>
           </li>
       @endcan
       @can('medical-certificates-menu')
           <li class="nav-item">
               <a href="{{ route('medicalcertificates.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Medical Certificates</p>
               </a>
           </li>
       @endcan
       @can('ranks-menu')
           <li class="nav-item">
               <a href="{{ route('ranks.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Ranks</p>
               </a>
           </li>
       @endcan
       {{-- @can('seaport-menu') --}}
           <li class="nav-item">
               <a href="{{ route('signatories.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Signatory</p>
               </a>
           </li>
       {{-- @endcan --}}
       @can('seaport-menu')
           <li class="nav-item">
               <a href="{{ route('seaports.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Seaport</p>
               </a>
           </li>
       @endcan
       @can('trading-route-menu')
           <li class="nav-item">
               <a href="{{ route('traderoutes.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Trading Route</p>
               </a>
           </li>
       @endcan
       @can('training-course-menu')
           <li class="nav-item">
               <a href="{{ route('courses.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Training Course</p>
               </a>
           </li>
       @endcan
       @can('training-center-menu')
           <li class="nav-item">
               <a href="{{ route('training_centers.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Training Center</p>
               </a>
           </li>
       @endcan
       @can('vaccines-menu')
           <li class="nav-item">
               <a href="{{ route('vaccines.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Vaccines</p>
               </a>
           </li>
       @endcan
       @can('vessel-type-menu')
           <li class="nav-item">
               <a href="{{ route('vesseltypes.index') }}" class="nav-link">
                   <i class="far  fa-angle-right nav-icon"></i>
                   <p>Vessel Type</p>
               </a>
           </li>
       @endcan
   </ul>
</li>
@endcan


<!-- Security -->
@can('security-menu')
<li class="nav-item has-treeview">
   <a href="#" class="nav-link">
       <i class="nav-icon fa fa-lock"></i>
       <p>
       Security
       <i class="fas fa-angle-left right"></i>

       </p>
   </a>
   <ul class="nav nav-treeview">
       @can('user-accounts-menu')
       <li class="nav-item">
       <a href="{{ route('users.index') }}" class="nav-link">
           <i class="far  fa-angle-right nav-icon"></i>
           <p>User Accounts</p>
       </a>
       </li>
       @endcan
       @can('roles-menu')
       <li class="nav-item">
       <a href="{{ route('roles.index') }}" class="nav-link">
           <i class="far  fa-angle-right nav-icon"></i>
           <p>Roles</p>
       </a>
       </li>
       @endcan
       @can('activity-logs-menu')
       <li class="nav-item">
       <a href="" class="nav-link">
           <i class="far  fa-angle-right nav-icon"></i>
           <p>Activity Logs</p>
       </a>
       </li>
       @endcan

   </ul>
</li>
@endcan
<!-- setup -->
@can('setup-menu')
<li class="nav-item">
   <a href="{{ url('./home') }}" class="nav-link">
       <i class="nav-icon fas fa-cogs"></i>
       <p>
           Setup
       </p>
   </a>
</li>
@endcan





        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
