@extends('admin.index')

<?php
$home_title    =  trans('admin.main_name' )  . ' | ' .   'Brands'  ;
$first_title   = ["title"=>  'Brands'  , "url"=> '' ];
//$secind_title  = ["title"=>trans('admin.name' ), "url"=> aurl('name/create') ];
?>

@section('page_title')
    {{ $home_title }}
@endsection

@section('page-links')
    @include('admin.inc.__title')
@endsection


@push('css')
    {{-- CSS assets in head section --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <style media="screen">
        .dz-image img
        {
            text-align: center;
            width:100%;
            height:100%
        }

        .dropzone
        {
            border: 1px solid #ccc;
            border-radius: 29px;
            padding: 10px;
            text-align: center;
        }

    </style>


@endpush

@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <script type="text/javascript">
        Dropzone.autoDiscover = false;

        $(document).ready(function(){

            $('#brands_multi_images').dropzone({
                url   : "{{ route('upload_brands_img') }}",
                paramName : 'file',
                uploadMultiple : false,
                maxFiles:20,
                maxFilessize:6,
                acceptedFiles:'image/*',
                dictDefaultMessage : 'Upload Your Brands Images ...',
                dictRemoveFile : '{{ trans('admin.delete') }}',
                params : {
                    _token : '{{ csrf_token() }}',
                    id     : '{{ $brand->id  }}',
                },
                addRemoveLinks:true,
                removedfile:function(file)
                {
                    $.ajax({
                        dataType:'json',
                        type:'post',
                        url: '{{ route('delete_brands_img') }}',
                        data:{_token : '{{ csrf_token() }}', id:file.fid}
                    });

                    var fmock;
                    return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement):void 0;

                },


                init:function(){


                    @foreach ($brand->files('brand')->get() as $file)
                        var mock = {name:'{{ $file->name }}', fid:'{{ $file->id }}', size:'{{ $file->size }}', type:'{{ $file->mime_type }}' };
                        this.emit('addedfile', mock);
                        this.options.thumbnail.call(this, mock, "{{ url('storage/'.$file->full_file) }}");
                    @endforeach



                        this.on('success', function(file,response){
                        file.fid = response.id;
                    });


                }
            });





        });


    </script>

@endpush


@section('content')

    <style>
        .table th, .table td
        {
            vertical-align: middle;
        }
    </style>

    <div class="box">

        <div class="box-header">
            <h3 class="box-title">{{ $home_title }}</h3>
        </div>

        {!! Form::open( ['route' => 'brand_update',  'method' => 'POST','files'=>true] ) !!}


        {!! Form::hidden('id', $brand->id ,['class'=>'form-control']) !!}



{{--        <div class="form-group">--}}
{{--            {!! Form::label('title', 'title' ) !!}--}}
{{--            {!! Form::text('title', $brand->title ,['class'=>'form-control']) !!}--}}
{{--        </div>--}}

        <div class="form-group">
            {!! Form::label('main_image', 'image' ) !!}
            <input data-validation-allowing="jpg, png, gif"  type="file" name="main_image" id="input-file-now-custom-1" class="dropify"
                   data-default-file="{{url('storage/').'/'. $brand->main_image  }}">
        </div>


        <br><br><br>
        <div class="form-group">
            {!! Form::label('main_image', 'Brands Images' ) !!}
            <div class="dropzone" id="brands_multi_images"></div>
        </div>


        <div class="form-group col-md-12">
            {!! Form::label('desc', 'Description' ) !!}
            {!! Form::textarea('desc', $brand->desc ,['class'=>'form-control textarea']) !!}
        </div>






        {!! Form::submit(trans('admin.edit'),['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>



@endsection
