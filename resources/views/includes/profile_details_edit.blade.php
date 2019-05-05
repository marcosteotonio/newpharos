<?php ?>
{!! Form::open(['method' => 'post', 'name' => 'edit-agenciado-data', 'id' => 'edit-agenciado-data', 'onSubmit' => 'return false'])!!}
    {!! Form::hidden('user_id', $user->id )!!}
                        
    <div class="form-group">
        {!! Form::label('name',__("Nome"))!!}
        {!! Form::text('name', $user->name,['class' => 'form-control', 'readonly' => 'true', 'style' => 'cursor: not-allowed'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email')!!}
        {!! Form::text('email', $user->email ,['class' => 'form-control', 'readonly' => 'true', 'style' => 'cursor: not-allowed'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('fancy_name',__("profile.fancy_name"))!!}
        {!! Form::text('fancy_name', isset($profile->fancy_name) ? $profile->fancy_name : '',['class' => 'form-control', 'readonly' => 'true', 'style' => 'cursor: not-allowed'])!!}
    </div>

    <div class="row">
        <div class="col-lg-4 col-sm-4">
            <div class="form-group" style="">
                    {!! Form::label('date_birth', __('profile.date_birth') )!!}
                    {!! Form::text('date_birth', isset($profile->date_birth) ? Carbon::parse( $profile->date_birth )->format('d/m/Y'): '',['class' => 'form-control frm_date', 'style' => ''])!!}
                </div>
            </div>
        <div class="col-lg-2 col-sm-4">
            <div class="form-group" style="">
                    {!! Form::label('height',__('profile.height') ) !!}
                    {!! Form::text('height', isset($profile->height) ? $profile->height : '',['class' => 'form-control frm_height', 'style' => ''])!!}
                </div>
            </div>
        <div class="col-lg-3 col-sm-4">
            <div class="form-group" style="">
                {!! Form::label('dummy', __('profile.dummy') )!!}
                {!! Form::text('dummy', isset( $profile->dummy) ? $profile->dummy : '',['class' => 'form-control', 'style' => ''])!!}
            </div>
        </div>
        <div class="col-lg-3 col-sm-4">
            <div class="form-group" style="">
                {!! Form::label('feet',__('profile.feet'))!!}
                {!! Form::text('feet', isset($profile->feet) ? $profile->feet : '',['class' => 'form-control', 'style' => ''])!!}
            </div>
        </div>
    </div>
    <!--  -->

    <div class="form-group" style="">
        <label for="">{{__('profile.gender')}}</label><br>
        <input  name="gender" type="radio" value="masculino" <?php if(isset($profile->gender)){ if($profile->gender == 'masculino'){ echo  'checked="true"'; } }?> > {{__('profile.male')}}
        &nbsp; &nbsp;
        <input  name="gender" type="radio" value="feminino" <?php if(isset($profile->gender)){ if($profile->gender == 'feminino'){ echo  'checked="true"'; } } ?> > {{__('profile.female')}}
    </div>

    <div class="form-group" style="">
        {!! Form::label('resume', __('profile.resume') )!!}
        {!! Form::textarea('resume',isset($profile->resume) ? $profile->resume : '', ['class' => 'form-control', 'style' => 'background-color: #eee;'])!!}
    </div>

    <div class="form-group" style="">
        {!! Form::label('curso',__('profile.courses') )!!}
        {!! Form::textarea('curso', isset($profile->courses) ? $profile->courses : '',['class' => 'form-control', 'style' => 'background-color: #eee;'])!!}
    </div>

    <div class="form-group" style="">
        {!! Form::label('publicidade',__('profile.publicity') )!!}
        {!! Form::textarea('publicidade', isset($profile->publicity) ? $profile->publicity : '',['class' => 'form-control', 'style' => 'background-color: #eee;'])!!}
    </div>
    <button type="submit" class="btn btn-access" id="save_edit_agenciado_data" style="float: right;">{{__('profile.save_profile') }}</button>
{!! Form::close()!!}
<br>
<br>

<script type="text/javascript" async>
    $('Form[name="edit-agenciado-data"]').submit(function(e){
        e.preventDefault()
        console.log('tentativa enviar detalhes')
        var formData = new FormData( document.getElementById('edit-agenciado-data'))
        $.ajax({
            method: "POST",
            url: "{!! url('/api/site/edit-agenciado-data') !!}",
            data: formData,
            processData: false,
            contentType: false,
            // enctype: 'multipart/form-data'
        })
        .done( function( result ) {
            console.log(result)
            $('.btn-primary').removeAttr('disabled');
            if(result.error){
                showMessagesError(result)
            } else {
                $.notify({
                    message: result.success 
                },{type: 'success' });
                // $('#form_register_agenciado').unbind('submit').submit()
            }
        })
        .fail( function( msg ) {
            $('.btn-primary').removeAttr('disabled');
            $.notify({
                message: msg 
            },{type: 'danger' });
        });
    })

</script>