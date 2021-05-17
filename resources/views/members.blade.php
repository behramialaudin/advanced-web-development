<hmtl>
    <head>
        <title>Members</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            #btnSuccess{
            margin: 25px;
            }
        </style>
    </head>
    <body>

    <button id="btnSuccess" onclick="window.location='{{ route('index') }}'" type="button" class="btn btn-success">Add Member</button><br><br>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Birthdate</th>
            <th scope="col">Expire Date</th>
            <th scope="col">Profile Picture</th>
            <th scope="col">Action</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($members as $member)
            <tr>
                <th scope="row">{{$member->id}}</th>
                <td>{{$member->first_name}}</td>
                <td>{{$member->last_name}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->birthdate}}</td>
                <td>{{$member->expire_date}}</td>
                <td>  @if($member->profile_picture != null)
                        <img width=100 height="100"
                             src="{{url(str_replace("public/", 'storage/', $member->profile_picture))}}">
                @endif
                </td>
                <td>
                    <form method="post" action="{{route('editing.member',$member->id)}}">
                        @csrf
                        @method('PUT')
                        <button  type="submit" class="btn btn-info">Edit</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="{{route('delete.member',$member->id)}}">
                        @csrf
                        @method('DELETE')
                        <button  type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </body>


</hmtl>
