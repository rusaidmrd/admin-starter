<x-index>
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="/login" method="POST" class="admin-user-form">
                    @csrf
                    <div class="login-form-head">
                        <h4>Login</h4>
                        <p>Hello there, Login with your credentials</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" autofocus>
                            <i class="ti-email"></i>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                            <i class="ti-lock"></i>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Login <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="">Contact Administration</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-index>


