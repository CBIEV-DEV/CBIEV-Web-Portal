<div class="card">
    <div class="card-header">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#projectInfo" aria-expanded="false"
            aria-controls="projectInfo">
            Project Information
        </button>
    </div>
    <div class="collapse" id="projectInfo">
        <div class="card-body">
            <div class="p-2 row">
                <div class="col col-sm-3">Project Titles</div>
                <div class="col col-sm-6">{{ $cwspce -> project_title }}</div>
                <span class="border-bottom "></span>
            </div>
            <div class="p-2 row">
                <div class="col col-sm-3">Project Description</div>
                <div class="col col-sm-6">
                    {{$cwspce-> project_description}}
                </div>
            </div>
            <div class="p-2 row">
                <div class="col col-sm-3">Project Category</div>
                <div class="col col-sm-6">
                    @if ($cwspce-> project_type == 1)
                    R&D outcomes, Final Year Projects(FYPs), Capstone Projects (Undergraduate/Postgraduate), Industrial Research Collaborations, Developmental types of work
                    @endif
                    @if ($cwspce-> project_type == 2)
                    Project outcomes of iSpark, Extra-Curriculum Projects, Non-Academic One-Off Projects
                    @endif
                </div>
            </div>
            <div class="p-2 row">
                <div class="col col-sm-3">Start Date</div>
                <div class="col col-sm-9">
                    {{ $cwspce -> start_duration }}
                </div>
            </div>
            <div class="p-2 row">
                <div class="col col-sm-3">End Date</div>
                <div class="col col-sm-6">
                    {{ $cwspce -> end_duration }}
                </div>
            </div>
        </div>
    </div>
</div>
