<div class="" style="background-color: #eee; padding: 15px;">
    <div class="title_yt">
        {!! Form::label('file', __('profile.video_gallery') )!!}
    </div>
    @foreach($video as $key => $v)
        {!! Form::open(['method' => 'post', 'name' => 'remove-agenciado-media-videos', 'id' => 'edit-agenciado-media-videos'])!!}
            <div class="form-group" style="">
                <div class="row">
                    <div class="col-md-12">
                        <table style="width: 100%">
                            <tr style="border: 1px solid white;">
                                <td style='width: auto; padding-left: 5px;'>
                                    {{$v->description}}<br>
                                    <small>{{$v->link}}</small>
                                </td>
                                <td style='width: 90px;'>
                                    <div class="btn video_list__delete" media_id="{{ base64_encode( $user->id.'|'.$v->id ) }}">
                                        <i class="fa fa-trash" style=" color: #9f432c"></i>
                                    </div>
                                    <a href="{{$v->link}}" target="_video_pharos_profile" class="btn" style="display: inline-block;"><i class="fa fa-play" style=" color: red"></i></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    @endforeach


    {!! Form::open(['method' => 'post', 'name' => 'add-agenciado-media-videos', 'id' => 'add-agenciado-media-videos'])!!}
        {!! Form::hidden('user_id', $user->id )!!}
        <div class="form-group" style="">
                <div class="row">
                <div class="col-md-5">
                    {!! Form::text('description', '',['class' => 'form-control', 'placeholder' => __('profile.video_description'), 'style' => 'width: 100%; background-color: #fff !important;'])!!}
                </div>
                <div class="col-md-5">
                    {!! Form::text('link', '',['class' => 'form-control', 'placeholder' => __('profile.video_address'), 'style' => 'width: 100%; background-color: #fff !important;'])!!}
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-access save_edit_agenciado_main" style="float: right;"><i class="fa fa-check"></i></button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
<br>

<script>

    $('Form[name="add-agenciado-media-videos"]').trigger("reset")
    $('Form[name="add-agenciado-media-videos"]').submit(function(e){
        e.preventDefault()
        console.log('tentativa enviar detalhes')
        $('.save_edit_agenciado_main').attr('disabled', 'disabled')
        var formData = new FormData( document.getElementById('add-agenciado-media-videos'))
        $.ajax({
            method: "POST",
            url: "{!! url('/api/site/add-agenciado-media-videos') !!}",
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
                $.notify({
                    message: 'Video adicionado com sucesso!'
                },{type: 'success' });
                location.reload()
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

    $('.video_list__delete').on('click', function(e){
        var ConfirmDeletion= confirm("{{ __('profile.confirmremove') }}");
        if (ConfirmDeletion == true) {
            $.ajax({
            method: "POST",
            url: "{!! url('/api/site/remove-agenciado-media-videos') !!}/" + this.attributes.media_id.value,
            })
            .done( function( result ) {
                if(result.error){
                    $.notify({
                        message: result.error
                    },{type: 'error' });
                } else {
                    $.notify({
                        message: 'Video do Perfil Removido!'
                    },{type: 'danger' });
                }
                location.reload();
            })
            .fail( function( msg ) {
                console.log(msg)
            });
        }        
        
    })

</script>