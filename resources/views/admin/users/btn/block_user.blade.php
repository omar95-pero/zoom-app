
{{--{{ $block }}--}}


{!! Form::open( ['route' =>'user_block' , 'method' => 'post', 'files'=>true]  ) !!}

<input type="hidden" name="id" value="{{ $id }}">

@if($is_blocked == 'blocked')
    <input type="hidden" name="is_blocked" value="not_blocked">
    <button type="submit" class="btn btn-success"> <i class="fa fa-bell-slash" aria-hidden="true"></i> </button>
@endif

@if($is_blocked == 'not_blocked')
    <input type="hidden" name="is_blocked" value="blocked">
    <button type="submit" class="btn btn-success"> <i class="fa fa-bell" aria-hidden="true"></i> </button>
@endif

{!! Form::close() !!}


