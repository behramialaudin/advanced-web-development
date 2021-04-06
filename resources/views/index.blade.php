<html>
<head>

    <link rel="stylesheet" href="/resources/css/index.css">
    <title>Index</title>

</head>

<body>
<button type="button" onclick="window.location='{{ route('show.members') }}'">Show Members</button><br><br>
        <form method="post" action="{{route('create.gym.member')}}" enctype="multipart/form-data">
            @csrf
            <label>First Name:</label>
            <input name="first_name" type="text"><br>
            <label>Last Name:</label>
            <input name="last_name" type="text"><br>
            <label>Birthdate:</label>
            <input name="birthdate" type="date"><br>
            <label>Expire Date:</label>
            <input name="expire_date" type="date"><br>
            <label>Profile Picture:</label>
            <input type="file" name="profile_picture" /><br><br>
            <input type="submit"/>
        </form>

</body>


</html>
