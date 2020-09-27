@extends('layouts.admin-app')

@section('content')
<div class="container-fluid" >
    @component('components.registration.cw_space.info', ['cws_app' => $cws_app])
        
    @endcomponent
    @component('components.registration.cw_space.member', ['cws_app' => $cws_app])
 
    @endcomponent
    @component('components.registration.cw_space.status_tracking', ['cws_app' => $cws_app])
        
    @endcomponent
</div>

@endsection

