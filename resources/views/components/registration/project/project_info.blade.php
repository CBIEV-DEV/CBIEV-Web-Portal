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
                    <div class="col col-sm-3">Project Category</div>
                    <div class="col col-sm-6">
                        {{$cwspce-> category-> name()}}
                    </div>
                </div>
                <div class="p-2 row">
                    <div class="col col-sm-3">Problem Statement</div>
                    <div class="col col-sm-9">
                        {{ $cwspce -> problem_statement }}
                    </div>
                </div>
                <div class="p-2 row">
                    <div class="col col-sm-3">Proposed Solution/Product</div>
                    <div class="col col-sm-6">
                        {{ $cwspce -> product_solution }}
                    </div>
                </div>
                <div class="p-2 row">
                    <div class="col col-sm-3">Target Market</div>
                    <div class="col col-sm-6">
                        {{ $cwspce -> target_market }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    