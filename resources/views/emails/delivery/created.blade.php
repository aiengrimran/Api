
@php
use App\Models\User;

    $user=User::find($delivery->user_id);

@endphp
@component('mail::message')
# Delivery Shiping 

Hi ! You are going to reciver delivery...From
Email : {{$user->email}}
</br>
Name : {{$user->name}}
</br>
Here is Your Delivery Id # {{$delivery->id}}.
</br>
The Shipping Address is .( {{$delivery->delivery_address}})




Thanks,<br>
{{ config('app.name') }}
@endcomponent
