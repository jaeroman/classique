@extends('layouts.admin')

@section('title')
Edit Member - Dashboard
@endsection

@section('content')

@include('includes.sidebar')

<div class="column is-main-content">
    <form method="POST" action="/user/{{$user->id}}">
        @csrf
        @method('PATCH')
        <div class="columns is-centered">
            <div class="column is-6">
                <div class="panel">
                    <p class="panel-heading has-text-black-bis">
                        Edit
                    </p>
                    <div class="panel-block">

                        <div class="card">
                            @include('includes.errors')

                            <div class="field">
                                <label class="label">
                                    Classique ID
                                </label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="Classique ID" name="classiqueId"
                                        value="{{ $user->classiqueId }}" required />
                                </p>
                            </div>

                            <!-- Name -->
                            <div class="field">
                                <label class="label">
                                    Name
                                </label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="Name" name="name"
                                        value="{{ $user->name }}" required />
                                </p>
                            </div>

                            <div class="field">
                                <label class="label">
                                    Confirmation No.
                                </label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="Confirmation No."
                                        name="confirmationNo" value="{{ $user->confirmationNo }}" />
                                </p>
                            </div>

                            <div class="field">
                                <label class="label">
                                    Tri No.
                                </label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="Tri No." name="triNo"
                                        value="{{ $user->triNo }}" />
                                </p>
                            </div>

                            <div class="field">
                                <label class="label">
                                    Effectivity Date
                                </label>
                                <p class="control">
                                    From:
                                    <input class="input" type="date" name="effectivityDateFrom" />
                                    To:
                                    <input class="input" type="date" name="effectivityDateTo" />
                                </p>
                            </div>

                            <div class="field">
                                <label class="label">
                                    Email
                                </label>
                                <p class="control">
                                    <input class="input" type="email" placeholder="Email" name="email"
                                        value="{{ $user->email }}" required />
                                </p>
                            </div>


                            <!-- Buttons -->
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="/user" class="button is-info is-outlined">BACK</a>
                                    <button type="submit" class="button is-success is-outlined">SUBMIT</button>
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </form>
</div>
</div>

@endsection
