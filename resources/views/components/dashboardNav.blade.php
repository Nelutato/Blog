<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item mx-1" role="presentation">
        <a href="{{ route('admin.dashboardUser') }}" class="nav-link active
            @if(!Request::is('*/dashboard'))
                border
            @endif
        ">
            Users
        </a>
    </li>
    <li class="nav-item mx-1" role="presentation">
        <a href="{{ route('admin.dashboardRecepies') }}" class="nav-link active
            @if(!Request::is('*/dashboard'))
                border
            @endif
        ">
            Recepies
        </a>
    </li>
    <li class="nav-item mx-1" role="presentation">
        <a href="{{ route('admin.dashboardUser') }}" class="nav-link active
            @if(!Request::is('*/dashboard'))
                border
            @endif
        ">
            somthing
        </a>
    </li>
</ul>
  