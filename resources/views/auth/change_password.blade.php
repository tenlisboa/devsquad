@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mudar senha') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('change/password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha atual') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('passwordold') ? ' is-invalid' : '' }}" name="passwordold" required>

                                @if ($errors->has('passwordold'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('passwordold') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nova senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirma senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Salvar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('success'))
<script>
    function senhaAlteradaSucesso() {
        swal("Feito!", "{{session('success')}}", "success");
    } 
    senhaAlteradaSucesso();
</script>
@endif

@if (session('error'))
<script>
    function senhaAlteradaError() {
        swal("Error", "{{session('error')}}", "error");
    } 
    senhaAlteradaError();
</script>
@endif

@endsection
