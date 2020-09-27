@extends('layouts.admin-app')

@section('content')
<div class="container">
   <div class="header">
       Co-Working Space Application List
       <div class="table-responsive mt-2">
            <table class="table table-hover">
                <thead class="thead-light">
                    <th scope="col">ID</th>
                    <th scope="col">Project Title</th>
                    <th scope="col">Registered At</th>
                </thead>
                <tbody>
                    @foreach ($cwSpace as $cw)
                    <tr>
                        <th scope="col">{{$cw-> id}}</th>
                        <td>
                            <a href="{{route('coworkingspace.registration.detail', [$cw-> id])}}">{{$cw-> project_title}}</a>
                        </td>
                        <td>{{$cw-> created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
       </div>
   </div>
</div>
@endsection
