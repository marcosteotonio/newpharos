<div style="background-color: #eee; padding: 15px;">
    <div class="row">
        <div class="col-md-12">
        {!! Form::label('file','Foto de Apresentação')!!}<br>
            <img id="avatar" src="<?php
            if(sizeof($media) > 0 ){
                echo asset('/uploads/profiles/'.$user->id.'/'.$media[0]->path);
            }  else {
                echo asset('/media/avatars/avatar0.jpg');
            }
            ?>" alt="" style="height:320px; witdh: 280px">
        </div>
        <div class="col-md-12">
        <hr>
            {!! Form::open(['method' => 'post', 'name' => 'edit-agenciado-media-main', 'id' => 'edit-agenciado-media-main'])!!}
                {!! Form::hidden('user_id', $user->id )!!}
                <div class="form-group" style="">
                    
                    {!! Form::file('file')!!}
                    <button type="submit" class="btn btn-access save_edit_agenciado_main" style="float: right;">{{ __('profile.enviar')}}</i></button>
                </div>
            {!! Form::close()!!}
        </div>
    </div>
</div>
<script>
    $('Form[name="edit-agenciado-media-main"]').trigger("reset")
    $('Form[name="edit-agenciado-media-main"]').submit(function(e){
        e.preventDefault()
        console.log('tentativa enviar detalhes')
        $('.save_edit_agenciado_main').attr('disabled', 'disabled')
        var formData = new FormData( document.getElementById('edit-agenciado-media-main'))
        $.ajax({
            method: "POST",
            url: "{!! url('/api/site/edit-agenciado-media-main') !!}",
            data: formData,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data'
        })
        .done( function( result ) {
            console.log(result)
            if(result.error){
                console.log(result)
                showMessagesError(result)
            } else {
                console.log(result)
                $('#avatar')[0].src = "{{ url('/uploads/profiles/'.$user->id).'/'  }}" + result.success.path
                $('Form[name="edit-agenciado-media-main"]').trigger("reset")
                $.notify({
                    message: 'Foto do Perfil Atualizada'
                },{type: 'success' });
                // $('#form_register_agenciado').unbind('submit').submit()
            }
            $('.save_edit_agenciado_main').removeAttr('disabled')
        })
        .fail( function( msg ) {
            console.log(msg)
            $('.btn-primary').removeAttr('disabled');
            $.notify({
                message: msg 
            },{type: 'danger' });
            $('.save_edit_agenciado_main').removeAttr('disabled')
        });
    })

    
</script>
