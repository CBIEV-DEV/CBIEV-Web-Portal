@extends('layouts.form_layout')

@section('form_content')
<div class="container">
    <div class="m-3">
        <div>
            <div class="text-center mp-3">
                <h4 class="display-4 form-title">iSpark Mentor Application</h4>
                <h4 class="display-4 form-title">---------------------------------------------</h4>
            </div>
            <div class="mt-5 ">
                <form action="{{route('mentor.registration.submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @component('components.registration.mentor.form.type_category')

                    @endcomponent
                    @component('components.registration.mentor.form.personal_info')

                    @endcomponent
                    @component('components.registration.mentor.form.company_info',['centerFaculty' => $centerFaculty])

                    @endcomponent
                    @component('components.registration.mentor.form.mentor_exp')

                    @endcomponent
                    @component('components.registration.mentor.form.mentor_declaration')

                    @endcomponent

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
