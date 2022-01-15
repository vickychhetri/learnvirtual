<nav id="sidebar">
    <div class="sidebar-header">
        <h1>
            <a href="/">{{env("APPLICATION_NAME")}}</a>
        </h1>
        <span>A</span>
    </div>
    <div class="profile-bg"></div>
    <ul class="list-unstyled components">
        <li>
            <a href="/UDashboard">
                <i class="fas fa-th-large"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="#Tutorials" data-toggle="collapse" aria-expanded="false">
                <i class="far fa-window-restore"></i>
                My Learning
                <i class="fas fa-angle-down fa-pull-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="Tutorials">
                <li>
                    <a href="/User/Start-Course">Cardiovascular Disorders</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#Report" data-toggle="collapse" aria-expanded="false">
                <i class="far fa-window-restore"></i>
                Report
                <i class="fas fa-angle-down fa-pull-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="Report">
                <li>
                    <a href="/Add/Course">Test</a>
                </li>
                <li>
                    <a href="/Add/Subject">Tutorials</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>