@extends('contact::layouts.app')

@section('title')
    Kapcsolat
@endsection

@section('content')
    <x-ui::success-message />

    <x-ui::form action="{{ route('contact.submit') }}">
        <x-ui::input-field name="name" label="Név" />
        <x-ui::email-field name="email" label="E-mail" :value="auth()->user()?->email" />
        <x-ui::textarea-field name="message" label="Üzenet" />
        <x-ui::submit-button>Küldés</x-ui::submit-button>
    </x-ui::form>
@endsection
