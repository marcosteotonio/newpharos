{!! Form::open(['method' => 'post', 'name' => 'edit-agenciado-media-main', 'id' => 'edit-agenciado-media-profile'])!!}
    <div class="form-group" style="">
        {!! Form::label('file','Foto de Apresentação')!!}
        {!! Form::file('media[]')!!}
    </div>
{!! Form::close()!!}