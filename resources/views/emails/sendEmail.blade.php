<x-mail::message>
# welcome  Mr. {{  $user->name }}to {{ config('app.name') }}

Registered succussfuly

<x-mail::button :url="'http://127.0.0.1:8000'">
Show more about our products
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
