<div class="" style="background-color: #eee; padding: 15px;">
    <div class="title_yt">
        Galeria de Fotos
    </div>
    <div class="row">
        <div class="col md-12">
            <style>
                
            </style>
            <div class="owl-carousel owl-theme owl-loaded owl-drag">
                @if($profile)
                    @foreach($profile->toArray()['medias'] as $key => $val )
                    <div class="media_list">
                        <div class="media_list__delete">
                            <i class="fa fa-trash" style=" color: #9f432c"></i>
                        </div>
                        <div class="media_list__background" style="background-image: url( '<?php echo url( '/uploads/profiles/' .$profile->user_id.'/'. $val['path'] ); ?>' );">
                        </div>
                    </div>
                    @endforeach 
                @else
                    <div class="media_list">
                        <div class="media_list__background">
                            NO MEDIA
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {!! Form::open(['method' => 'post', 'name' => 'add-agenciado-media-images', 'id' => 'edit-agenciado-media-images'])!!}
        <div class="form-group" style="">
            {!! Form::label('file', 'Adicionar Foto')!!}
            {!! Form::file('media[]')!!}
        </div>
    {!! Form::close()!!}
</div>