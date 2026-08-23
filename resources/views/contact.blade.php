@extends('contact::layouts.app')

@section('title')
    Kapcsolat
@endsection

@section('content')
    <x-ui::form.form action="{{ route('contact.submit') }}">
        <x-ui::form.fields.input name="name" label="Név" />
        <x-ui::form.fields.email id="email" label="E-mail" :value="auth()->user()?->email" />
        <x-ui::form.fields.textarea name="message" label="Üzenet" />
        <x-ui::buttons.primary-button type="submit">Küldés</x-ui::buttons.primary-button>
    </x-ui::form.form>
@endsection
