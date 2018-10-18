@if(count($errors)>0)
    <div class="alert alert-danger col-md-6 col-md-push-3">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
    </div>
    <div class="clearfix"></div>
@endif
@if(Session::has('errorMessage'))
    <div class="alert alert-danger">
        <div class="col-md-12" style="font-size: 12px; margin-top: 10px;">
            <p>{{Session::get('errorMessage')}}</p>
        </div>
        {{Session::forget('errorMessage')}}
    </div>
@endif
@if(Session::has('info'))
    <div class="alert alert-success">
            <strong>{{Session::get('info')}}</strong>
            <i class="pull-right fa fa-times"></i>
    </div>
    {{Session::forget('info')}}
@endif
@if(Session::has('message'))
    <div class="alert alert-danger">
            <strong>{{Session::get('message')}}</strong>
            <i class="pull-right fa fa-times"></i>
    </div>
    {{Session::forget('message')}}
@endif

<script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).on('click', '.fa-times', function () {
        $(this).parent().remove();
    });
</script>