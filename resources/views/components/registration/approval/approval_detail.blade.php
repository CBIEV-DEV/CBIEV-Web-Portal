<div class="card-header">  
        Director Approval - Director Approval Started at {{$status-> created_at}}
        <div class="card-header">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#director" aria-expanded="true"
                aria-controls="director">
                Director Approval
            </button>
        </div>
        <div class="collapse show" id="director">
            @php
                $directorApp = $status-> directorApproval-> first()
            @endphp
            <table class="table table-striped table-hover">
                <thead>
                    <th>Approved By</th>
                    <th>Approval</th>
                    <th>Comment</th>
                    <th>Recommended At</th>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>{{$directorApp-> director-> name}}</td>
                        <td>
                            @switch($directorApp-> is_recommended)
                                @case(0)
                                    Pending
                                    @break
                                @case(1)
                                @case(2)
                                        @if ($directorApp-> is_recommended == 1)
                                            Approved
                                        @elseif($directorApp-> is_recommended == 2)
                                            Rejected
                                        @endif
                                    @break
                                @case(5)
                                    Auto Approved on {{$directorApp-> completed_at}}
                                @break
                            @endswitch
                        </td>
                        <td>{{$directorApp-> comment}}</td>
                        <td>{{$directorApp-> completed_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>