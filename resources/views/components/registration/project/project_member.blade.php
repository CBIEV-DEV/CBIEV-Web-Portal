<div class="card">
    <div class="card-header">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#projectMember" aria-expanded="false"
            aria-controls="projectMember">
            Project Member
        </button>
    </div>
    <div class="collapse" id="projectMember">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Type</th>
                        <th>Name</th>
                        <th>IC No</th>
                        <th>Contact No</th>
                        <th>Personal Email</th>
                        <th>Company Name</th>
                        <th>Position</th>
                        <th>UC ID</th>
                        <th>Center/Faculty</th>
                        <th>Programme Study</th>
                    </thead>
                    <tbody>
                    @foreach ($projectRegis-> projectMember as $member)
                        @if ($member-> id == $leaderID)
                        <tr style="color:red">                     
                        @else
                        <tr>                           
                        @endif
                            <td>
                                @switch($member-> member_type)
                                    @case(1)
                                        Student
                                        @break
                                    @case(2)
                                        UC Staff
                                        @break
                                    @case(3)
                                        Alumni
                                        @break
                                    @case(4)
                                        Public 
                                        @break          
                                @endswitch
                            </td>
                            <td>{{$member-> name}}</td>
                            <td>{{$member-> ic}}</td>
                            <td>{{$member-> email}}</td>
                            <td>{{$member-> contact}}</td>
                            @if ($member-> company != null) 
                            <td>{{$member-> company-> company_name}}</td>
                            @else
                            <td>N/A</td>
                            @endif
                            <td>{{$member-> position}}</td>
                            <td>{{$member-> uc_id}}</td>
                            <td>{{$member-> centerFaculty-> code}}</td>
                            <td>{{$member-> programme-> programme_name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
