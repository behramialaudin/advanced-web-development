<html>
<head>

    <link rel="stylesheet" href="/resources/css/index.css">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>

        #memberForm{
            margin: 0 auto;
            width: 50%;
        }

        #btnInfo{
            margin: 30px 0 0 30px;
        }

    </style>

</head>

<body>


<button id="btnInfo"onclick="window.location='{{ route('show.members') }}'" type="button" class="btn btn-info">Show Members</button><br><br>
        <form id="memberForm" method="post" action="{{route('create.gym.member')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name" >
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Birthdate</label>
                <input type="date" class="form-control" name="birthdate" >
            </div>
            <div class="form-group">
                <label>Expire Date</label>
                <input type="date" class="form-control" name="expire_date" >
            </div>
            <div class="form-group">
                <label>Profile Picture</label>
                <input type="file" class="form-control" name="profile_picture" >
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>

</body>


</html>
