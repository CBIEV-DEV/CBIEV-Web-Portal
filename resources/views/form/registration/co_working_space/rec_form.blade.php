@extends('layouts.admin-app')

@section('content')
<div class="container-fluid" >
    @component('components.registration.cw_space.info', ['cwspce' => $cwspce])
        
    @endcomponent
    @component('components.registration.cw_space.member', ['cwspce' => $cwspce])
 
    @endcomponent
    @component('components.registration.cw_space.rec_form', ['type' => $type, 'recID' => $recID, 'cwsID' => $cwspce-> id])
        
    @endcomponent
</div>

@endsection

