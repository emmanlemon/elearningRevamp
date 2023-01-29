<link rel="stylesheet" style="text/css" href="{{ url('css/sideBarNavigation.css') }}">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<div class="sidebar">
    <img src="{{ url("../images/sca_logo.png") }}" 
        alt="" style="width:50px; height:50px;">
    <div class="logo-details">
        <div class="logo_name">Saint Charles Academy E-Learning CMS</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list" style="padding-left:0;">
      {{-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> --}}
      <li>
        <a href="{{ route('faculty.page' , '') }}">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="#" style="background-color:#1d1010;">
          <span class="links_name">Master List</span>
        </a>
        <span class="tooltip">Master List</span>
      </li>
      <li>
       <a href="{{ route('faculty.page' , 'student') }}">
         <i class='bx bx-user' ></i>
         <span class="links_name">Students</span>
       </a>
       <span class="tooltip">Students</span>
     </li>
     <li>
       <a href="{{ route('faculty.page' , 'lecture') }}">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Lecture</span>
       </a>
       <span class="tooltip">Lecture</span>
     </li>
     <li>
       <a href="{{ route('faculty.page' , 'class') }}">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Lesson</span>
       </a>
       <span class="tooltip">Leson</span>
     </li>
     <li>
        <a href="{{ route('logout') }}">
          <i class='bx bx-log-out' ></i>
          <span class="links_name">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
      </li>
     {{-- <li class="profile">
         <div class="profile-details">
           <img src="{{ url('../images/sca_logo.png') }}" alt="profileImg">
           <div class="name_job">
             <div class="name">Copyright © 2023. </div>
             <div class="name">All rights reserved.</div>
           </div>
         </div>
     </li> --}}
    </ul>
  </div>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
@yield('sideBarNavigation')