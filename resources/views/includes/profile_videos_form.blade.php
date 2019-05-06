<div class="" style="background-color: #eee; padding: 15px;">
    <div class="title_yt">
        Playlist de Vídeos
    </div>
    @foreach([] as $key => $video)
        {!! Form::open(['method' => 'post', 'name' => 'remove-agenciado-media-videos', 'id' => 'edit-agenciado-media-videos'])!!}
            <div class="form-group" style="">
                    <div class="row">
                    <div class="col-md-5">
                        {!! Form::text('title_yt[]', '',['class' => 'form-control', 'placeholder' => 'Digiteo título do vídeo', 'style' => 'width: 100%;'])!!}
                    </div>
                    <div class="col-md-5">
                        {!! Form::text('link_yt[]', '',['class' => 'form-control', 'placeholder' => 'Digiteo título do vídeo', 'style' => 'width: 100%;'])!!}
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn" style="float: right;"><i class="fa fa-trash" style=" color: #9f432c"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    @endforeach


    {!! Form::open(['method' => 'post', 'name' => 'add-agenciado-media-videos', 'id' => 'edit-agenciado-media-videos'])!!}
        <div class="form-group" style="">
                <div class="row">
                <div class="col-md-5">
                    {!! Form::text('title_yt[]', '',['class' => 'form-control', 'placeholder' => 'Digiteo título do vídeo', 'style' => 'width: 100%; background-color: #fff !important;'])!!}
                </div>
                <div class="col-md-5">
                    {!! Form::text('link_yt[]', '',['class' => 'form-control', 'placeholder' => 'Digiteo título do vídeo', 'style' => 'width: 100%; background-color: #fff !important;'])!!}
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-access" style="float: right;"><i class="fa fa-check"></i></button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    @if(0)
        <div style=" text-align: right;">
            <button type="button" class="btn btn-access" style=""> <i class="fa fa-plus-circle"></i> Adicionar Vídeo</button>
        </div>
    @endif
</div>
<br>