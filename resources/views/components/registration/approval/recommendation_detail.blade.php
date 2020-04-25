<div class="card-header">  
    @switch($recommendedBy)
        @case(1)
        Supervisor Recommendation - Supervisor Recommendation Started at {{$status-> created_at}}
        <div class="card-header">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#supervisor{{$status->id}}" aria-expanded="true"
                aria-controls="supervisor">
                Supervisor Recommendation
            </button>
        </div>
        <div class="collapse show" id="supervisor{{$status->id}}">
            @break
        @case(2)
        Dean/Head Recommendation - Dean/Head Recommendation Started at {{$status-> created_at}}
        <div class="card-header">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#deanHead{{$status->id}}" aria-expanded="true"
                aria-controls="deanHead">
                Dean/Head Recommendation
            </button>
        </div>
        <div class="collapse show" id="deanHead{{$status->id}}">
            @break
        @case(3)
        Manager Recommendation - Manager Recommendation Started at {{$status-> created_at}}
        <div class="card-header">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#manager{{$status->id}}" aria-expanded="true"
                aria-controls="manager">
                Manager Recommendation
            </button>
        </div>
        <div class="collapse show" id="manager{{$status->id}}">
        @break
        @case(7)
        Rerun : Supervisor Recommendation - Supervisor Recommendation Started at {{$status-> created_at}}
        <div class="card-header">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#supervisor{{$status->id}}" aria-expanded="true"
                aria-controls="supervisor">
                Supervisor Recommendation
            </button>
        </div>
        <div class="collapse show" id="supervisor{{$status->id}}">
        @break
        @case(8)
        Dean/Head Recommendation - Dean/Head Recommendation Started at {{$status-> created_at}}
        <div class="card-header">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#deanHead{{$status->id}}" aria-expanded="true"
                aria-controls="deanHead">
                Dean/Head Recommendation
            </button>
        </div>
        <div class="collapse show" id="deanHead{{$status->id}}">
        @break
        @case(9)
        Manager Recommendation - Manager Recommendation Started at {{$status-> created_at}}
        <div class="card-header">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#manager{{$status->id}}" aria-expanded="true"
                aria-controls="manager">
                Manager Recommendation
            </button>
        </div>
        <div class="collapse show" id="manager{{$status->id}}">
        @break
    @endswitch
        <table class="table table-striped table-hover">
            <thead>
                <th>Recommended By</th>
                <th>Recommendation</th>
                <th>Comment</th>
                <th>Recommended At</th>
            </thead>
            <tbody>
                @switch($recommendedBy)
                    @case(1)
                    @case(7)
                        @foreach ($status-> supervisorRecommendation as $supRec)
                            <tr>
                                <td>{{$supRec-> prSupervisor-> name}}</td>
                                <td>
                                    @switch($supRec-> is_recommended)
                                        @case(0)
                                            Not Recommended
                                            @break
                                        @case(1)
                                            Recommended
                                            @break
                                        @case(2)
                                            Pending
                                            @break
                                        @case(3)
                                            Auto Approved
                                        @break
                                    @endswitch
                                    
                                </td>
                                <td>{{$supRec-> comment}}</td>
                                <td>{{$supRec-> completed_at}}</td>
                            </tr>
                        @endforeach
                        @break
                    @case(2)
                    @case(8)
                        @foreach ($status-> deanHeadRecommendation as $deanHeadRec)
                            <tr>
                                <td>{{$deanHeadRec-> deanHead-> name}}</td>
                                <td>
                                    @switch($deanHeadRec-> is_recommended)
                                    @case(0)
                                        Not Recommended
                                        @break
                                    @case(1)
                                        Recommended
                                        @break
                                    @case(2)
                                        Pending
                                        @break
                                    @case(3)
                                        Auto Approved
                                    @break
                                    @endswitch
                                </td>
                                <td>{{$deanHeadRec-> comment}}</td>
                                <td>{{$deanHeadRec-> completed_at}}</td>
                            </tr>
                        @endforeach
                        @break
                    @case(3)
                    @case(9)
                        @foreach ($status-> managerRecommendation as $managerRec)
                            <tr>
                                <td>{{$managerRec-> manager-> name}}</td>
                                <td>
                                    @switch($managerRec-> is_recommended)
                                    @case(0)
                                    Not Recommended
                                        @break
                                    @case(1)
                                        Recommended
                                        @break
                                    @case(2)
                                        Pending
                                        @break
                                    @case(3)
                                        Auto Approved
                                    @break
                                    @endswitch
                                </td>
                                <td>{{$managerRec-> comment}}</td>
                                <td>{{$managerRec-> completed_at}}</td>
                            </tr>
                        @endforeach
                        @break
                @endswitch
            </tbody>
        </table>
    </div>
</div>