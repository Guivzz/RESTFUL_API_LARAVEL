
<x-mail::message>
# Hello {{$user->name}},

You changed your email. Please verify this new address using the button below:

<x-mail::button :url="url('api/users/verify/' . $user->verification_token)">
Verify Account
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
