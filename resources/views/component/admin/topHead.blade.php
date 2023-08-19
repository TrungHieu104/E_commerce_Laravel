 <!-- NAVBAR -->
 <nav>
     <i class='bx bx-menu'></i>
     {{-- <a href="#" class="nav-link">{{ $title }}</a> --}}
     <form action="#">
         <div class="form-input">
             <input type="search" placeholder="Search...">
             <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
         </div>
     </form>
     
     <input type="checkbox" id="switch-mode" hidden>
     <label for="switch-mode" class="switch-mode"></label>
     <a href="#" class="notification">
         <i class='bx bxs-bell'></i>
         <span class="num">8</span>
     </a>
     {{-- <a href="#" class="profile">
        <img src="img/people.png">
    </a> --}}
    <a>{{ Auth::user()->ho }} {{ Auth::user()->ten }}</a>
    <div class="profile">
        <img src="{{ Auth::user()->hinh }}" alt="">
         {{-- <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
             alt=""> --}}
         <ul class="profile-link">
             <li><a href="#"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
             <li><a href="#"><i class='bx bxs-cog'></i> Settings</a></li>
             <li><a href="{{ url('/logout') }}"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
         </ul>
     </div>
 </nav>
 <!-- NAVBAR -->

 <main>
     <div class="head-title">
         <div class="left">
             <h1>Dashboard</h1>
             <ul class="breadcrumb">

                 @if ($title == '')
                 @else
                     <li>
                         <a href="#">Dashboard</a>
                     </li>
                     <li><i class='bx bx-chevron-right'></i></li>
                     <li>
                         <a class="active" href="#">{{ $title }}</a>
                     </li>
                 @endif
             </ul>
         </div>
         <a href="#" class="btn-download">
             <i class='bx bxs-cloud-download'></i>
             <span class="text">Download PDF</span>
         </a>
     </div>
