<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
  <span class="align-middle">AdminKit</span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Members
            </li>
            <li @class(['active' => request()->routeIs("api.member-details"), 'sidebar-item'])>
                <a class="sidebar-link" href="{{ route("api.member-details") }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Members</span>
                </a>
            </li>
            <li @class(['active' => request()->routeIs("members.index"), 'sidebar-item'])>
                <a class="sidebar-link" href="{{ route("members.index") }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Eligibility Forms</span>
                </a>
            </li>
            <li @class(['active' => request()->routeIs("introletter.index"), 'sidebar-item'])>
                <a class="sidebar-link" href="{{ route("introletter.index") }}">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">Introduction Letter</span>
                </a>
            </li>

            <li @class(['active' => request()->routeIs("member.add.recovery"), 'sidebar-item'])>
                <a class="sidebar-link" href="{{ route('member.add.recovery') }}">
      <i class="align-middle" data-feather="rotate-ccw"></i> <span class="align-middle">Recovery</span>
    </a>
            </li>
            <li @class(['active' => request()->routeIs("membership.index"), 'sidebar-item'])>
                <a class="sidebar-link" href="{{ route('membership.index') }}">
                    <i class="align-middle" data-feather="users"></i>
                    <span class="align-middle">Memberships</span>
                </a>
            </li>            
        </ul>
    </div>
</nav>