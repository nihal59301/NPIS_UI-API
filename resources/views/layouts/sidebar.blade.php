<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

                <!-- Logo Light -->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('images/logo.png') }}" alt="logo" height="22">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo-sm.png') }}" alt="small logo" height="22">
                    </span>
                </a>

                <!-- Logo Dark -->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('images/logo-dark.png') }}" alt="dark logo" height="22">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo-dark-sm.png') }}" alt="small logo" height="22">
                    </span>
                </a>

                <!-- Sidebar Hover Menu Toggle Button -->
                <button type="button" class="btn button-sm-hover p-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                    <i class="ri-checkbox-blank-circle-line align-middle"></i>
                </button>

                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!-- Leftbar User -->
                    <div class="leftbar-user">
                        <a href="pages-profile.html">
                            <img src="{{ asset('images/avatar-1.jpg') }}" alt="user-image" height="42"
                                class="rounded-circle shadow-sm">
                            <span class="leftbar-user-name">Dominic Keller</span>
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">MODUL</li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> GEO-BOARD </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                               aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>

                                <span> PENTADBIR </span>
                            </a>
                            <div class="collapse" id="sidebarDashboards">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">Profil Pengguna</a>
                                    </li>
                                    <li>
                                        <a href="{{route('users.temp.index')}}">Pengesahan Pengguna Baharu</a>
                                    </li>
                                    <li>
                                        <a href="{{route('users.index')}}">Pengguna Applikasi</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('users.create') }}">Daftar Pengguna Baru</a>
                                    </li>
                                    <li>
                                        <a href="#">Selenggara Portal</a>
                                    </li>
                                    <li>
                                        <a href="#">Selenggara Data</a>
                                    </li>
                                    <li>
                                        <a href="#">Selenggara Kod Projek</a>
                                    </li>
                                    <li>
                                        <a href="#">Selenggara Projek</a>
                                    </li>
                                    <li>
                                        <a href="#">Selenggara Dashboard Analisis</a>
                                    </li>
                                    <li>
                                        <a href="#">Semakan Map Services dan Integrasi</a>
                                    </li>
                                    <li>
                                        <a href="#">Audit Trail</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-title side-nav-item"></li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> PERMOHONAN PROJEK </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span> PEMANTAUAN DAN PENILAIAN PROJEK </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="sidebarCrm"
                               class="side-nav-link">
                                <i class="uil uil-tachometer-fast"></i>
                                <span> KONTRAK </span>
                            </a>
                            <div class="collapse" id="sidebarCrm">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">PERUNDING</a>
                                    </li>
                                    <li>
                                        <a href="#">VALUE MANAGEMENT</a>
                                    </li>
                                    <li>
                                        <a href="#">NOTICE OF CHANGE</a>
                                    </li>
                                    <li>
                                        <a href="#">PERMOHONAN PERUNTUKAN DI LUAR ROLLING PLAN (RP)</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#" aria-expanded="false"
                               aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> PERUNDING </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">Products</a>
                                    </li>
                                    <li>
                                        <a href="#">Products Details</a>
                                    </li>
                                    <li>
                                        <a href="#">Orders</a>
                                    </li>
                                    <li>
                                        <a href="#">Order Details</a>
                                    </li>
                                    <li>
                                        <a href="#">Customers</a>
                                    </li>
                                    <li>
                                        <a href="#">Shopping Cart</a>
                                    </li>
                                    <li>
                                        <a href="#">Checkout</a>
                                    </li>
                                    <li>
                                        <a href="#">Sellers</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="sidebarEmail"
                               class="side-nav-link">
                                <i class="uil-envelope"></i>
                                <span> VALUE MANAGEMENT </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEmail">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">Inbox</a>
                                    </li>
                                    <li>
                                        <a href="#">Read Email</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#" aria-expanded="false"
                               aria-controls="sidebarProjects" class="side-nav-link">
                                <i class="uil-briefcase"></i>
                                <span> NOTICE OF CHANGE </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarProjects">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">List</a>
                                    </li>
                                    <li>
                                        <a href="#">Details</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Gantt <span class="badge rounded-pill bg-light text-dark font-10 float-end">New</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Create Project</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <i class="uil-rss"></i>
                                <span> PERMOHONAN PERUNTUKAN DI LUAR ROLLING PLAN (RP) </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="sidebarTasks"
                               class="side-nav-link">
                                <i class="uil-clipboard-alt"></i>
                                <span> PENJANAAN LAPORAN </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="#">List</a>
                                    </li>
                                    <li>
                                        <a href="#">Details</a>
                                    </li>
                                    <li>
                                        <a href="#">Kanban Board</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <!--- End Sidemenu -->
                </div>
</div>
<!-- ========== Left Sidebar End ========== -->