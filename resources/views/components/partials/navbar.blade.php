<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
  <span class="align-middle">AdminKit</span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Members
            </li>
            <li @class(['active' => request()->routeIs("members.index"), 'sidebar-item'])>
                <a class="sidebar-link" href="{{ route("members.index") }}">
      <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Eligibility Forms</span>
    </a>
            </li>
            <li @class(['active' => request()->routeIs("members.index"), 'sidebar-item'])>
                <a class="sidebar-link" href="index.html">
      <i class="align-middle" data-feather="file"></i> <span class="align-middle">Introduction Letter</span>
    </a>
            </li>

            <li @class(['active' => request()->routeIs("members.add.recovery"), 'sidebar-item'])>
                <a class="sidebar-link" href="index.html">
      <i class="align-middle" data-feather="rotate-ccw"></i> <span class="align-middle">Recovery</span>
    </a>
            </li>
        </ul>
    </div>
</nav>