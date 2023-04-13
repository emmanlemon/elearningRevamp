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
      <li>
        <a href="{{ url('/admin') }}">
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
       <a href="{{ route('admin.page' , 'student') }}">
        <i class='bx bxs-user' ></i>
         <span class="links_name">Pupils</span>
       </a>
       <span class="tooltip">Pupils</span>
     </li>
     <li>
       <a href="{{ route('admin.page' , 'faculty') }}">
        <i class='bx bx-user' ></i>
         <span class="links_name">Teacher</span>
       </a>
       <span class="tooltip">Teacher</span>
     </li>
     <li>
       <a href="{{ route('admin.page' , 'class') }}">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Class</span>
       </a>
       <span class="tooltip">Class</span>
     </li>
     <li>
       <a href="{{ route('admin.page' , 'announcement') }}">
        <i class='bx bx-folder' ></i>
        <span class="links_name">Announcements</span>
       </a>
       <span class="tooltip">Announcements</span>
     </li>
     <li>
        <a href="{{ route('logout') }}">
          <i class='bx bx-log-out' ></i>
          <span class="links_name">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
      </li>
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