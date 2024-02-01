<x-mail::message>
# New User Registration

Someone has signed up with the following details:


**Name**: {{ $user->name }}

**Email**: {{ $user->email }}

<x-mail::button :url="$url">
Review Account
</x-mail::button>

**IP Address**: {{ $ipAddress }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
