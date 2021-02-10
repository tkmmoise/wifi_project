<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="/admin">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link" href="{{ route('rechargeTickets') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Reload Tickets
                </a>
                <a class="nav-link" href="{{ route('remainingTickets') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Remaining and Sold Tickets
                </a>
                
                
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="{{ route('listTickets') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    List Tickets
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>