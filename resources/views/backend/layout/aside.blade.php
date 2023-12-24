        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Dashboard</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('backend/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Amar khalifa</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Admin</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.users.all_users') }}" class="dropdown-item">All admin</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-keyboard me-2"></i>Category</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.category.all_categoty') }}" class="dropdown-item">All category</a>
                            <a href="{{ route('dashboard.category.create') }}" class="dropdown-item">Add category</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-table me-2"></i>Contact</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.contacts.all_contact') }}" class="dropdown-item">All Contact</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-th me-2"></i>payment</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.payment.all_payment') }}" class="dropdown-item">All payment</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-chart-bar me-2"></i>Service</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.service.all_service') }}" class="dropdown-item">All Service</a>
                            <a href="{{ route('dashboard.service.create') }}" class="dropdown-item">Add Service</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-keyboard me-2"></i>team</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.team.all_team') }}" class="dropdown-item">All person</a>
                            <a href="{{ route('dashboard.team.create') }}" class="dropdown-item">Add person</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-th me-2"></i>testimonials</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.testimonials.all_testimonials') }}" class="dropdown-item">All testimonials</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-chart-bar me-2"></i>orders</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('dashboard.orders.all_orders') }}" class="dropdown-item">All orders</a>
                        </div>
                    </div>

                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>orders items</a>
                        <div class="dropdown-menu bg-transparent border-0"> 
                            <a href="{{ route('dashboard.orders_items.all_orders_items') }}" class="dropdown-item">All orders</a>
                        </div>
                    </div>
                    

                    {{-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a> --}}
                    {{-- <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a> --}}
                    {{-- <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a> --}}
                    {{-- <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a> --}}

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
