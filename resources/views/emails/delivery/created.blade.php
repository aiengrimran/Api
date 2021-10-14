
{{-- @php
use App\Models\User;
    $user=User::find($delivery->user_id);
@endphp --}}
@component('mail::message')
# Delivery Shiping 

Hi ! You are going to reciver delivery...From
{{-- Email : {{$user->email}} --}}

{{-- Name : {{$user->name}} --}}

{{-- Here is Your Delivery Id # {{$delivery->id}}. --}}

{{-- The Shipping Address is .( {{$delivery->delivery_address}}) --}}




Thanks,<br>
{{ config('app.name') }}
@endcomponent
