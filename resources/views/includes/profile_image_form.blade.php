<div class="" style="background-color: #eee; padding: 15px;">

    <div class="title_yt">
        {!! Form::label('file', __('profile.photo_galery') )!!}
    </div>

    @if(sizeof($media) > 0)
        <?php unset($media[0]); ?>
        
        <div class="row">
            <div class="col md-12">
                <div class="owl-carousel owl-theme owl-loaded owl-drag media_carousel">
                        @forelse($media as $key => $val )
                        <div class="media_list">
                            <div class="media_list__delete" media_id="{{ base64_encode( $user->id.'|'.$val->id ) }}">
                                <i class="fa fa-trash" style=" color: #9f432c"></i>
                            </div>
                            <div class="media_list__background" style="background-image: url( '<?php echo url( '/uploads/profiles/' .$profile->user_id.'/'. $val['path'] ); ?>' );">
                            </div>
                        </div>
                        @empty
                        <div class="media_list">
                            <div class="media_list__background">
                                {{ __('profile.no_media') }}
                            </div>
                        </div>
                        @endforelse 
                </div>
            </div>
        </div>

        <hr>
        
        {!! Form::open(['method' => 'post', 'name' => 'add-agenciado-media-images', 'id' => 'add-agenciado-media-images'])!!}
            {!! Form::hidden('user_id', $user->id )!!}
            <div class="form-group" style="">
                {!! Form::label('file', 'Adicionar Foto')!!}
                {!! Form::file('file')!!}
                <button type="submit" class="btn btn-access save_edit_agenciado_media" style="float: right;">{{ __('profile.enviar')}}</button>
            </div>
        {!! Form::close()!!}
    

    <script>
        $('Form[name="add-agenciado-media-images"]').trigger("reset")
        $('Form[name="add-agenciado-media-images"]').submit(function(e){
            e.preventDefault()
            $('.save_edit_agenciado_media').attr('disabled', 'disabled')
            var formData = new FormData( document.getElementById('add-agenciado-media-images'))
            $.ajax({
                method: "POST",
                url: "{!! url('/api/site/add-agenciado-media-images') !!}",
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
                    $('Form[name="add-agenciado-media-images"]').trigger("reset")
                    $.notify({
                        message: 'Foto do Perfil Adicionada!'
                    },{type: 'success' });
                }
                $('.save_edit_agenciado_media').removeAttr('disabled')
                location.reload()
            })
            .fail( function( msg ) {
                console.log(msg)
                $('.save_edit_agenciado_media').removeAttr('disabled')
                $.notify({
                    message: msg 
                },{type: 'danger' });
                $('.save_edit_agenciado_media').removeAttr('disabled')
            });
        })

       
        

    </script>
    @else
        {{ __('profile.insert_main_first') }}
    @endif
</div>