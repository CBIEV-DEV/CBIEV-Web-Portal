<div class="card">
    <div class="card-header">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#projectStatus" aria-expanded="true"
            aria-controls="projectStatus">
            Co-Working Space Approval Status Tracking
        </button>
    </div>
    <div class="collapse show" id="projectStatus">
        <div class="container mt-2 mb-2">
            @foreach ($cwspce-> recommendation()->get() as $rec)
                @if ($rec-> type == 0)
                <div class="card-header">
                    <p>
                        Application submited at <b>{{$cwspce-> created_at}}</b>.
                    </p>
                    <p>
                    {{-- @if (count($cwspce-> recommendation()->get()->toArray() == 1)) --}}
                        <form action="{{route('coworkingspace.rec',[$cwspce-> id, 0])}}" method="post">
                            @csrf
                            <button type="submit">Start Approval Process</button>
                        </form>
                    {{-- @endif --}}
                    </p>
                </div>
                @elseif($rec-> type == 1)
                <p>
                    @if ($rec-> recommendation == null)
                        Pending Recommendation from Supervisor<br>
                    @elseif($rec-> recommendation == 1)
                        Recommended by Supervisor<br>
                    @elseif($rec-> recommendation == 2)
                        Not Recommended by Supervisor<br>
                    @endif
                </p>
                @elseif($rec-> type == 2)
                @if ($rec-> recommendation == null)
                    Pending Recommendation from Dean Head<br>
                @elseif($rec-> recommendation == 1)
                    Recommended by Dean Head<br>
                @elseif($rec-> recommendation == 2)
                    Not Recommended by Dean Head<br>
                @endif
                @elseif($rec-> type == 3)
                @if ($rec-> recommendation == null)
                    Pending Recommendation from Manager<br>
                @elseif($rec-> recommendation == 1)
                    Recommended by Manager<br>
                @elseif($rec-> recommendation == 2)
                    Not Recommended by Manager<br>
                @endif
                @elseif($rec-> type == 4)
                @if ($rec-> recommendation == null)
                    Pending Approval from Director<br>
                @elseif($rec-> recommendation == 1)
                    Approved  by Director <br>
                @elseif($rec-> recommendation == 2)
                    Rejected by Director<br>
                @endif 
                @endif
            @endforeach
        </div>
    </div>
</div>
