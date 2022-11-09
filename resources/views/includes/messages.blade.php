@if(count($errors)>0)
@foreach ($errors->all() as $error)
    <p style="color: red">{{$error}}</p>
@endforeach
@endif

@if(session('success'))
<p style="color: green">{{session('success')}}</p>
@endif

@if(session('error'))
<p style="color: red">{{session('error')}}</p>
@endif

