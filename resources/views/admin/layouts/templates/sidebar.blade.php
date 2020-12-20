<div id="sidebar" class="sidebar sidebar-fixed expandable sidebar-light">
    <div class="sidebar-inner">
        <div class="ace-scroll flex-grow-1" data-ace-scroll="{}">
            <div class="sidebar-section my-2">
                <div class="sidebar-section-item fadeable-left">
                    <div class="fadeinable sidebar-shortcuts-mini">
                        <span class="btn btn-success p-0 opacity-1"></span>
                        <span class="btn btn-info p-0 opacity-1"></span>
                        <span class="btn btn-orange p-0 opacity-1"></span>
                        <span class="btn btn-danger p-0 opacity-1"></span>
                    </div>
                    <div class="fadeable">
                        <div class="sub-arrow"></div>
                        <div>
                            <button class="btn px-25 py-2 text-95 btn-success opacity-1">
                                <i class="fa fa-signal f-n-hover"></i>
                            </button>
                            <button class="btn px-25 py-2 text-95 btn-info opacity-1">
                                <i class="fa fa-edit f-n-hover"></i>
                            </button>
                            <button class="btn px-25 py-2 text-95 btn-orange opacity-1">
                                <i class="fa fa-users f-n-hover"></i>
                            </button>
                            <button class="btn px-25 py-2 text-95 btn-danger opacity-1">
                                <i class="fa fa-cogs f-n-hover"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav has-active-border active-on-right">
                <li class="nav-item {{ Request::segment(2) === 'dashboard' ? 'active' : NULL }}">
                    <a href="{{url('admin/dashboard')}}" class="nav-link">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <span class="nav-text fadeable">
                            <span>Dashboard</span>
                        </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>
                <li class="nav-item {{ Request::segment(2) === 'audios' ? 'active' : NULL }}">
                    <a href="{{url('admin/audios/index')}}" class="nav-link">
                        <i class="nav-icon fa fa-music"></i>
                        <span class="nav-text fadeable">
                            <span>Manage Audio Files</span>
                        </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>
                <li class="nav-item">
                    <a href="html/dashboard.html" class="nav-link">
                        <i class="nav-icon fa fa-camera-retro"></i>
                        <span class="nav-text fadeable">
                            <span>Manage Video Files</span>
                        </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>
            </ul>
        </div>
    </div>
</div>