<!DOCTYPE html>
<html lang="en" style="font-size: 0.800rem;">
    <head>
        @include('admin/layouts/templates/header_includes')
        @yield('css')
    </head>
    <body>
        <div class="body-container">
            @include('admin/layouts/templates/header')
            <div class="main-container bgc-white">
                @include('admin/layouts/templates/sidebar')
                <div role="main" class="main-content">
                    <div class="page-content container container-plus">
                        @yield('content')
                    </div>
                    <footer class="footer d-none d-sm-block">
                        <div class="modal fade" id="common_modal" data-backdrop="static" data-keyboard="false" data-backdrop-bg="bgc-grey-tp4" data-blur="true" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content shadow radius-1 brc-primary-m2">
                                    <div class="modal-header py-2 bgc-primary-tp1 border-0  radius-t-1">
                                        <h5 id="common_modal_header_text" class="modal-title text-white-tp1 text-110 pl-2 font-bolder"></h5>
                                        <button onclick="closeAudio()" type="button" class="close" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="common_modal_body" class="modal-body modal-scroll"></div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-inner bgc-white-tp1">
                            <div class="pt-3 border-none border-t-3 brc-grey-l2 border-double">
                                <span class="text-primary-m1 font-bolder text-120">Ace</span>
                                <span class="text-grey">Application &copy; 2020</span>
                            </div>
                        </div>
                        <div class="footer-tools">
                            <a href="#" class="btn-scroll-up btn btn-dark mb-2 mr-2">
                                <i class="fa fa-angle-double-up mx-2px text-95"></i>
                            </a>
                        </div>
                    </footer>
                </div>
            </div>
            @include('admin/layouts/templates/footer_includes')
            @yield('js')
    </body>
</html>