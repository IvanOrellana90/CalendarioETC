@if(count($errors) > 0)
    <div class="row jumbotron">
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
@endif