@extends('layouts.app')

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
@section('content')
    <div class="container">
        <div class="row justify-content-center">

        </div>
    </div>

<form id="memberForm" method="post" action="{{route('edit.member',$member->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" value="{{$member->first_name}}" name="first_name">
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" value="{{$member->last_name}}" name="last_name" >
    </div>
    <div class="form-group">
        <label>Birthdate</label>
        <input type="date" class="form-control" value="{{$member->birthdate}}" name="birthdate" >
    </div>
    <div class="form-group">
        <label>Expire Date</label>
        <input type="date" class="form-control" value="{{$member->expire_date}}"name="expire_date" >
    </div>

    <button type="submit" class="btn btn-success">Edit Member</button>
</form>

@endsection


</html>
