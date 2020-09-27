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
                        <th>Personal Email</th>
                        <th>Contact No</th>
                        <th>UC ID</th>
                        <th>Center/Faculty</th>
                        <th>Programme Study</th>
                    </thead>
                    <tbody>
                    @foreach ($cwspce-> projectMember as $member)
                        <tr>                           
                            <td>
                                @switch($member-> type)
                                    @case(1)
                                        Leader
                                        @break
                                    @case(2)
                                        Supervisor
                                        @break
                                    @case(3)
                                        Member
                                        @break          
                                @endswitch
                            </td>
                            <td>{{$member-> name}}</td>
                            <td>{{$member-> ic}}</td>
                            <td>{{$member-> email}}</td>
                            <td>{{$member-> contact}}</td>
                            <td>{{$member-> uc_id}}</td>
                            <td>{{$member-> faculty}}</td>
                            <td>{{$member-> programme_study}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
