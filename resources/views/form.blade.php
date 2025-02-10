@extends('app')

@section('content')
<div class="container">
    <!-- Contact Form -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contact Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contact.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" required autocomplete="message" rows="4">{{ old('message') }}</textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>  
.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    background: linear-gradient(135deg, #6b8cff, #ff6b6b); 
    color: #333;
}
.navbar {
    display: flex;
    justify-content: center;
    background: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    margin-bottom: 20px;
}

.navbar-nav {
    display: flex;
}
.nav-item {
    margin: 0 15px;
}

.nav-link {
    color: #333;
    font-weight: bold;
    transition: color 0.3s;
}

.nav-link:hover {
    color: #ff6b6b;
}
.card {
    background-color: #ffffff;
    border: none;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    margin-top: 20px;
    animation: fadeInUp 0.5s ease-in-out;
}

.card-header {
    background: linear-gradient(135deg, #6b8cff, #ff6b6b);
    color: #ffffff;
    padding: 20px;
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    border-bottom: 5px solid #ffba00;
}

.card-body {
    padding: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    color: #333; 
}

.form-control {
    border: 2px solid #6b8cff; 
    border-radius: 5px;
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #ff6b6b; 
    outline: none;
}

.invalid-feedback {
    color: #ff6b6b;
}

.btn {
    background-color: #6b8cff;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #506eff;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>