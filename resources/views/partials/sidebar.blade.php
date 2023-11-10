<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('user') }}"
                        aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('kategori') }}"
                        aria-expanded="false">
                        <i class="fa fa-font" aria-hidden="true"></i>
                        <span class="hide-menu">Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('produk') }}"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Product</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        href="{{ route('logout') }}" aria-expanded="false">
                        <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                        <span class="hide-menu">Logout</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                </li>



            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
