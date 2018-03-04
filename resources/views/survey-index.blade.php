@extends('survey::template.html')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h2>My list of Survey</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Published</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($audits as $audit)
                    <tr>
                        <td>{{$audit->id}}</td>
                        <td>{{$audit->name}}</td>
                        <td>{{($audit->is_published == true) ? 'Published' : 'Unpublished'}}</td>
                        <td>
                            <a href="{{route('survey-view', $audit->id)}}">View</a>
                            /
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{$audits->render()}}
        </div>
    </div>


@endsection