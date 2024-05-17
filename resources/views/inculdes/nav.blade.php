<header class="header" id="header">
   <nav class="navbar container">
      <section class="navbar-left">
         <a href="/" class="brand">TicketBox</a>
         <div class="burger" id="burger">
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
         </div>
      </section>
      <section class="navbar-center">
         <span class="overlay"></span>
         <div class="menu" id="menu">
            <div class="menu-header">
               <span class="menu-arrow"><i class="bx bx-chevron-left"></i></span>
               <span class="menu-title"></span>
            </div>
            <ul class="menu-inner">
               <li class="menu-item"><a href="/" class="menu-link">Home</a></li>
               
             <li class="menu-item"><a href="/currently-running-movies" class="menu-link">Running Movies</a></li>

             <li class="menu-item"><a href="#" class="menu-link">About</a></li>
            
             <li class="menu-item"><a href="#" class="menu-link">Contact</a></li>

               <li class="menu-item menu-dropdown">
                  <span class="menu-link">Account<i class="bx bx-chevron-right"></i></span>
                  <div class="submenu megamenu megamenu-column-1">
                     <ul class="submenu-list">
                        <li class="submenu-item"><a href="#" class="submenu-link">Help</a></li>
                         @if($user)         
<li class="submenu-item"><a href="/dashboard" class="submenu-link">Dashboard</a></li>
   <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
    @else
        <li class="submenu-item"><a href="/login" class="submenu-link">Login</a></li>
                        <li class="submenu-item"><a href="/register" class="submenu-link">Register</a></li>
    </button>   
@endif
                     
                    
                    
                     </ul>
                  </div>
               </li>
            </ul>
         </div>
      </section>
      <section class="navbar-right">
         <button class="switch" id="switch">
            <span class="switch-light"><i class="bx bx-sun"></i></span>
            <span class="switch-dark"><i class="bx bx-moon"></i></span>
         </button>
      </section>
   </nav>
</header>