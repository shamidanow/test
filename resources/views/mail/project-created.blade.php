@component('mail::message')
# Weather for {{ $weather->getCityById($weather->city_id)->name }}

{{ $weather->precipitation }}

@component('mail::button', ['url' => url('/weathers/' . $weather->id)])
View Weather
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
