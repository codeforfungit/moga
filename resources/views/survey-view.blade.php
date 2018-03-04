@extends('survey::template.html')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2>{{$audit->name}}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Checklist items in this Audit
                </div>

                <ul class="list-group">
                    @foreach($audit->checklist as $checklist)
                        <li class="list-group-item">
                            {{$checklist->description}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-4 col-md-push-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add new checklist item
                </div>
                <div class="panel-body">
                    <form action="{{route('checklist-save')}}" method="post">
                        {{csrf_field()}}

                        <input type="hidden" value="{{$audit->id}}" name="audit_id">

                        <div class="form-group">
                            <label for="text">Checklist text</label>
                            <input type="text" name="text" id="text" class="form-control"
                                   placeholder="Enter your Checklist text">
                            <span class="error">{{$errors->first('text')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="correct_answer">Correct answer</label> <br>
                            <input type="radio" value="1" name="correct_answer"> Yes <br>
                            <input type="radio" value="0" name="correct_answer"> No
                        </div>

                        <button class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection