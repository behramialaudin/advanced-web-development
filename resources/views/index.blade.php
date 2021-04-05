<html>
<head>
    <title>Index</title>

</head>

<body>
<form enctype="multipart/form-data">
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
