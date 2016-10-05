@if(Session::has('message') && count($errors) > 0)
    <div class="row errorow">
        <div class="col-md-12">
            <div class='row alert alert-danger'>
                <ul>
                    <li>{{Session::get('message')}}</li>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@elseif(count($errors) > 0)
    <div class="row errorow">
        <div class="col-md-12">
            <div class='row alert alert-danger'>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@elseif(Session::has('message'))
    <div class="row errorow">
        <div class="col-md-12">
            <div class="row alert {{Session::get('class')}}">
                <ul>
                    <li>{{Session::get('message')}}</li>
                </ul>
            </div>
        </div>
    </div>
@endif