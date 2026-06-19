@extends('contact::layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Kapcsolat</h1>

    <x-ui::success-message />

    <x-ui::form action="{{ route('contact.submit') }}">
        <x-ui::input-field name="name" label="Név" />
        <x-ui::email-field name="email" label="E-mail" :value="auth()->user()?->email" />
        <x-ui::textarea-field name="message" label="Üzenet" />
        <x-ui::submit-button>Küldés</x-ui::submit-button>
    </x-ui::form>
</div>
@endsection
