<div id="menu" class="side-nav gx-sidebar">
       <div class="navbar-expand-lg">
           <!-- Sidebar header  -->
           <div class="sidebar-header">
               <div class="user-profile">
                   <img class="user-avatar" alt="Cryex" src="images/userAvatar/domnic-harris.jpg">

                   <div class="user-detail">
                       <h4 class="user-name">
                           <span class="dropdown">
                               <a class="dropdown-toggle" href="#" role="button" id="userAccount"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   {{Auth::user()->name}}
                               </a>

                               <span class="dropdown-menu dropdown-menu-right" aria-labelledby="userAccount">
                                   <a class="dropdown-item" href="javascript:void(0)">
                                       <i class="zmdi zmdi-account zmdi-hc-fw mr-2"></i>
                                       Profile
                                   </a>
                                   <a class="dropdown-item" href="javascript:void(0)">
                                       <i class="zmdi zmdi-settings zmdi-hc-fw mr-2"></i>
                                       Setting
                                   </a>
                                   <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="zmdi zmdi-sign-in zmdi-hc-fw mr-2"></i>
                                       Logout
                                   </a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                               </span>
                           </span>
                       </h4>
                   </div>
               </div>
           </div>
           <!-- /sidebar header -->

           <!-- Main navigation -->
           <div id="main-menu" class="main-menu navbar-collapse collapse">
               <ul class="nav-menu">
                   <li class="nav-header"><span class="nav-text">Main</span></li>
                   <li class="menu no-arrow">
                       <a href="javascript:void(0)">
                           <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i>
                           <span class="nav-text">Dashboard</span>
                       </a>
                   </li>
                   <li class="menu no-arrow">
                       <a href="{{route('account')}}">
                           <i class="zmdi zmdi-folder zmdi-hc-fw"></i>
                           <span class="nav-text">Accounts</span>
                       </a>
                   </li>
                   <li class="menu no-arrow">
                       <a href="{{route('market/1')}}">
                           <i class="zmdi zmdi-widgets zmdi-hc-fw"></i>
                           <span class="nav-text">Market</span>
                       </a>
                   </li>                   
               </ul>
           </div>
           <!-- /main navigation -->
       </div>
   </div>
