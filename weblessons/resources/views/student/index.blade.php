@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br>
            <h3 align="center">Student Data</h3>
            <br>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
            @endif
            <div align="right">
            <a href="{{route('student.create')}}" class="btn btn-primary">Add</a>
            <br>
            <br>
        </div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $row)
                        <tr>
                        <td>{{$row['first_name']}}</td>
                        <td>{{$row['last_name']}}</td>
                        <td><a class="btn btn-warning" href="{{action('StudentController@edit', $row['id'])}}">Edit</a></td>
                        <td>
                          <form class="delete_form" action="{{action('StudentController@destroy', $row['id'])}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" name="button">DELETE</button>
                          </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
      $(document).ready(function(){
        $('.delete_form').on('submit', function(){
          if (confirm("Are you sure you want to delete it?")) {
              return true;
          }else {
            return false;
          }
        })
      });
    </script>
@endsection
