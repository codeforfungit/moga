@extends('survey::template.html')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2>Add a new Survey</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <form action="{{route('save-survey')}}" method="post">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                    @if($errors->has('name'))
                        <span class="error">{{$errors->first('name')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="published"> Publish the Survey
                    </label>
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Save</button>
                </div>

            </form>
        </div>
    </div>


@endsection