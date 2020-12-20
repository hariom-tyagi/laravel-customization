@extends('admin/layouts/layout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/datatables/css/datatables.bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/datatables/css/datatables.buttons.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('assets/plugins/audio_player/css/audioplayer.css')}}">
@endsection
@section('content')
<div class="page-header mb-2 pb-2 flex-column flex-sm-row align-items-start align-items-sm-center py-25 px-1">
    <h1 class="page-title text-primary-d2 text-140">Manage Audio Files</h1>
    <div class="page-tools mt-3 mt-sm-0 mb-sm-n1"></div>
</div>
<div class="card bcard h-auto">
    <div class="border-t-3 brc-blue-m2">
        <table id="datatable" class="table-bordered table-striped d-style w-100 table text-dark-m1 text-95 border-y-1 brc-black-tp11 collapsed">
            <thead class="sticky-nav text-secondary-m1 text-uppercase text-85">
                <tr>
                    <th class="text-center border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Name</th>
                    <th class="text-center border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Duration</th>
                    <th class="text-center border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Size</th>
                    <th class="text-center border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Created</th>
                    <th class="text-center border-0 bgc-white bgc-h-yellow-l3 shadow-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="pos-rel"></tbody>
        </table>
    </div>
</div>
<script>

    $(document).ready(function () {
        getAudiosDatatable();
    });

    function playAudio(id, file_name) {
        $('#common_modal_header_text').html('');
        $('#common_modal_body').html('');
        $('#common_modal_header_text').html('WOH MASTIYAN');
        $('#common_modal_body').html('<audio id="audio_to_be_played" preload="auto" controls><source src="<?= url('/uploads/audios/1/woh_mastiyan.mp3') ?>"></audio>');
        $('#audio_to_be_played').audioPlayer();
        $('#common_modal').modal('show');
    }

    function getAudiosDatatable() {
        var tableId = '#datatable';
        var tableHead = document.querySelector('.sticky-nav');
        tableHead.addEventListener('sticky-change', function (e) {
            this.classList.toggle('is-stuck', e.detail.isSticky);
        });
        var $_table = $(tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= url('admin/audios/getAudiosDatatable') ?>",
                method: 'POST',
                data: {'_token': '<?= csrf_token() ?>'}
            },
            dom: "<'row'<'col-12 col-sm-6'l><'col-12 col-sm-6 text-right table-tools-col'f>>" +
                    "<'row'<'col-12'tr>>" +
                    "<'row'<'col-12 col-md-5'i><'col-12 col-md-7'p>>",
            renderer: 'bootstrap',
            classes: {
                sLength: "dataTables_length text-left w-auto"
            },
            buttons: {
                dom: {
                    button: {
                        className: 'btn'
                    },
                    container: {
                        className: 'dt-buttons btn-group bgc-white-tp2 text-right w-auto'
                    }
                },
                buttons: []
            },
            columnDefs: [
                {
                    orderable: true,
                    className: 'text-center',
                    targets: 0,
                    data: 'name'
                },
                {
                    orderable: true,
                    className: 'text-center',
                    targets: 1,
                    data: 'duration'
                },
                {
                    orderable: true,
                    className: 'text-center',
                    targets: 2,
                    data: 'size'
                },
                {
                    orderable: true,
                    className: 'text-center',
                    targets: 3,
                    data: 'created_at'
                },
                {
                    orderable: true,
                    className: 'text-center',
                    targets: 4,
                    data: 'action'
                }
            ],
            order: [],
            language: {
                search: '<i class="fa fa-search pos-abs mt-2 pt-3px ml-25 text-blue-m2"></i>',
                searchPlaceholder: "Search Audio Files"
            }
        });
        $('.table-tools-col').append($_table.buttons().container()).find('.dataTables_filter').appendTo('.page-tools').find('input').addClass('pl-45').removeClass('form-control-sm').end().append('<a href="<?= url('/admin/audios/audio') ?>" class="btn radius-round btn-outline-primary border-2 btn-sm ml-2"><i class="fa fa-plus"></i></a>');
        $('.dataTables_wrapper').addClass('border-b-1 border-x-1 brc-default-l2');
        $('.dataTables_wrapper').find('.row:last-of-type').addClass('border-t-1 brc-default-l3 mt-n1px bgc-default-l4');
    }
</script>
@endsection
@section('js')
<script src="{{url('assets/plugins/datatables/js/datatables.jquery.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables/js/datatables.bootstrap.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables/js/datatables.colreorder.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables/js/datatables.select.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables/js/datatables.buttons.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables/js/datatables.buttons.bootstrap.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables/js/datatables.buttons.html5.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables/js/datatables.buttons.print.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables/js/datatables.buttons.colvis.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables/js/datatables.responsive.min.js')}}"></script>
<script src="{{url('assets/plugins/audio_player/js/audioplayer.js')}}"></script>
@endsection
