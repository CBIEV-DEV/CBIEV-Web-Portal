@component('mail::message')
# Co-Working Space Approval/Recommendation Invitation
Dear, {{ $recipient }}
    You have been invited to Approve/Recommend this Application.
<br>
@component('mail::button', ['url' => $url])
Click Me
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
