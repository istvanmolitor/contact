@extends('contact::layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Kapcsolat</h1>

    <x-ui::success-message />

    <x-ui::form action="{{ route('contact.submit') }}">

        <div class="mb-4">
            <x-ui::label for="name" value="Név" />
            <x-ui::input type="text" name="name" id="name" :value="old('name')" required
                :class="$errors->has('name') ? 'border-red-500' : ''" />
        </div>

        <x-ui::email-field id="email" label="E-mail" :value="old('email')" required />

        <div class="mb-6">
            <x-ui::label for="message" value="Üzenet" />
            <x-ui::textarea name="message" id="message" required
                :class="$errors->has('message') ? 'border-red-500' : ''">{{ old('message') }}</x-ui::textarea>
        </div>

        <x-ui::submit-button>Küldés</x-ui::submit-button>
    </x-ui::form>
</div>
@endsection
