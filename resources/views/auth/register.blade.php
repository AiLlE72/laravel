@extends('base')

@section('title', "S'enregistrer")

@section('content')


    <div id="login-row" class="row justify-content-center align-items-center mt-5">
        <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
                <form id="login-form" class="form" action="{{ route('auth.register') }}" method="post">
                    @csrf
                    <h3 class="text-center text-info">S'enregistrer</h3>
                    <div class="form-group">
                        <label for="name" class="text-info">Votre nom</label><br>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <p class="fs-6 text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-info">Votre email</label><br>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="fs-6 text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-info">Mot de passe:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <p class="fs-6 text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confPassword" class="text-info">Confirmer votre mot de passe:</label><br>
                        <input type="password" name="confPassword" id="confPassword" class="form-control">
                        @error('confPassword')
                            <p class="fs-6 text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-info btn-md mt-3" value="S'enregistrer">
                    </div>

                </form>
            </div>
        </div>
    </div>




@endsection
