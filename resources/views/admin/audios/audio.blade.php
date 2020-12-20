@extends('admin/layouts/layout')
@section('content')
<div class="page-header mb-2 pb-2 flex-column flex-sm-row align-items-start align-items-sm-center py-25 px-1">
    <h1 class="page-title text-primary-d2 text-140">{{!empty($audioArr['id']) ? 'Edit' : 'Add'}} Audio File</h1>
    <div class="page-tools mt-3 mt-sm-0 mb-sm-n1"></div>
</div>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <?= Form::open(['url' => url('admin/audios/audio'), 'files' => TRUE, 'id' => 'audio_form', 'method' => 'POST', 'autocomplete' => 'off']) ?>
        <div class="form-group">
            <?= Form::label('name', 'Name', ['class' => 'control-label col-sm-12 font-weight-bold']) ?>
            <div class="col-sm-12">
                <?= Form::text('name', '', ['required' => TRUE, 'class' => 'form-control', 'placeholder' => 'Name', 'id' => 'name']) ?>
            </div>
        </div>
        <div class="form-group">
            <?= Form::label('slug', 'Slug', ['class' => 'control-label col-sm-12 font-weight-bold']) ?>
            <div class="col-sm-12">
                <?= Form::text('slug', '', ['required' => TRUE, 'readonly' => TRUE, 'class' => 'form-control', 'placeholder' => 'Slug', 'id' => 'slug']) ?>
            </div>
        </div>
        <div class="form-group">
            <?= Form::label('audio_file', 'Audio File', ['class' => 'control-label col-sm-12 font-weight-bold']) ?>
            <div class="col-sm-12">
                <?= Form::file('audio_file', ['required' => TRUE, 'class' => 'ace-file-input form-control', 'id' => 'audio_file']) ?>
            </div>
        </div>
        <div class="form-group mt-15">
            <div class="col-sm-12">&nbsp;&nbsp;</div>
            <div class="col-sm-12 text-center mt-3">
                <?= Form::submit(!empty($audioArr['id']) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-bold px-4']) ?>
                <a href="<?= url('admin/audios/index') ?>" class="btn btn-outline-lightgrey btn-bgc-white btn-bold ml-2 px-4">Cancel</a>
            </div>
        </div>
        <?= Form::close() ?>
    </div>
    <div class="col-sm-3"></div>
</div>
<script>
    $(document).ready(function () {
        $('#audio_file').aceFileInput({
            btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
            btnChooseText: 'Click Here To Select File',
            placeholderText: 'No File Selected',
            placeholderIcon: '<i class="fa fa-file bgc-primary-m1 text-white w-4 py-2 text-center"></i>'
        });
        generateSlugOnInput('name', 'slug');
    });

    function playAudio(id, file_name) {
        $('#common_modal_header_text').html('');
        $('#common_modal_body').html('');
        $('#common_modal_header_text').html('WOH MASTIYAN');
        $('#common_modal_body').html('<audio id="audio_to_be_played" preload="auto" controls><source src="<?= url('/uploads/audios/1/woh_mastiyan.mp3') ?>"></audio>');
        $('#audio_to_be_played').audioPlayer();
        $('#common_modal').modal('show');
    }

</script>
@endsection