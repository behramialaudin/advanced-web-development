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


    <button id="btnSuccess"onclick="window.location='{{ route('index') }}'" type="button" class="btn btn-success">Add Member</button><br><br>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Birthdate</th>
            <th scope="col">Expire Date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Alaudin</td>
            <td>Behrami</td>
            <td>16.02.2001</td>
            <td>08.08.2021</td>
            <td>    <button type="button" class="btn btn-info">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
            </td>

            <td></td>
        </tr>
        </tbody>
    </table>

    </body>


</hmtl>
