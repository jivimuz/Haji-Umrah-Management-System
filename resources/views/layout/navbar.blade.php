<?php
use App\Models\Module;
use App\Models\Setting;
use Illuminate\Support\Facades\Request;

$AccessList = explode(',', auth()->user()->access);

$logo = Setting::where('parameter', 'company_logo')->first()->value ?: 'Logo';
$app_name = Setting::where('parameter', 'app_name')->first()->value ?: 'AppName';
$menu = [];
$menuList = Module::where('isheader', 1)->where('isactive', true)->orderBy('list_no', 'asc')->get();
foreach ($menuList as $i) {
    $submenu = Module::where('isheader', 0)
        ->where('group_id', $i->group_id)
        ->whereIn('id', $AccessList)
        ->whereNot('id', $i->id)
        ->where('isactive', true)
        ->orderBy('list_no', 'asc')
        ->get();

    if (count($submenu) > 0 || in_array($i->id, $AccessList)) {
        $menu[] = [
            'group_id' => $i->group_id,
            'name' => $i->name,
            'icon' => $i->icon,
            'route' => $i->route,
            'child' => $submenu,
        ];
    }
}
$currentRouteName = Request::getPathInfo();
?>

<aside class="sidebar sidebar-default sidebar-hover sidebar-mini navs-pill-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="/" class="navbar-brand">
            <!--Logo start-->
            <div class="logo">
                <img src="{{ url($logo) }}" style="width: 50px;max-height: 50px" alt="">
            </div>
            <div class="logo-hover">
                <img src="{{ url($logo) }}" style="width: 100px;max-height: 50px" alt="">
            </div>

            <!--logo End-->

        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="navbar-collapse" id="sidebar" style="overflow-x: hidden">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu">

                @foreach ($menu as $b)
                    <?php if(count($b['child']) >= 1){?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#group-{{ $b['group_id'] }}" role="button"
                            aria-expanded="false" aria-controls="group-{{ $b['group_id'] }}">
                            <i class="{{ $b['icon'] }}" style="font-size: 23px">
                            </i>
                            {{-- <i class="sidenav-mini-icon">{{ substr($c['name'], 0,1)}}</i> --}}
                            <span class="item-name">{{ $b['name'] }}</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="group-{{ $b['group_id'] }}" data-bs-parent="#sidebar">
                            @foreach ($b['child'] as $c)
                                <li class="nav-item">
                                    <a class="nav-link {{ $c['route'] == $currentRouteName ? 'active' : '' }}"
                                        href="{{ $c['route'] }}">
                                        <i class="sidenav-mini-icon">{{ substr($c['name'], 0, 1) }}</i>
                                        <span class="item-name">{{ $c['name'] }}</span>
                                    </a>
                                </li>
                            @endForeach
                        </ul>
                    </li>
                    <?php }else{?>
                    <li class="nav-item">
                        <a class="nav-link {{ $b['route'] == $currentRouteName ? 'active' : '' }}"
                            href="{{ $b['route'] }}">
                            <i class="{{ $b['icon'] }}" style="font-size: 23px">
                            </i>
                            <span class="item-name">{{ $b['name'] }}</span>
                        </a>
                    </li>
                    <?php }?>
                @endForeach
            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>
