@extends('layouts.admin-app')

@section('content')
<div class="container">
   <div class="header">
       Project Registration List
       <div class="table-responsive mt-2">
            <table class="table table-hover">
                <thead class="thead-light">
                    <th scope="col">ID</th>
                    <th scope="col">Registrant Name</th>
                    {{-- <th scope="col">Aproval Status</th> --}}
                    <th scope="col">Registered At</th>
                </thead>
                <tbody>
                    @foreach ($mentorRegistrations as $mr)
                    <tr>
                        <th scope="col">{{$mr-> id}}</th>
                        <td>
                            <a href="{{route('mentor.registration.detail', [$mr-> id])}}">{{$mr-> name}}</a>
                        </td>
                        {{-- <td>
                            @switch($mr-> statusTracking()-> orderBy('created_at')-> first()-> mentor_registration_status)
                                @case(0)
                                Submited
                                    @break
                                @case(1)
                                Dean/Head Recommendation
                                    @break
                                @case(2)
                                Manager Recommendation
                                    @break
                                @case(3)
                                Director Approval
                                    @break
                                @case(4)
                                Registration Approved
                                    @break
                                @case(5)
                                Registration Rejected
                                @break                                                
                        @endswitch --}}
                        </td>
                        <td>{{$mr-> created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
       </div>
   </div>
</div>
@endsection
