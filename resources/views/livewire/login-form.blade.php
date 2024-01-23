<div>
    <form id="formAuthentication" wire:submit.prevent="submit" class="mb-3" wire:ignore.self spellcheck="false" autocomplete="off">
        <div class="form-floating form-floating-outline mb-3">
            <input type="text" class="form-control @error('username') is-invalid @enderror @if (session()->has('invalidCredentials')) is-invalid @endif" id="username" wire:model="username" placeholder="Enter your username" autofocus />
            <label for="username">Username</label>
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            @if (session()->has('invalidCredentials'))
                <div style="margin-top: 0.1rem;">
                    <small class="text-danger">
                        {{ session('invalidCredentials') }}
                    </small>
                </div>
            @endif
        </div>
        <div class="mb-3">
            <div class="form-password-toggle">
                <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" wire:model="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                        <label for="password">Password</label>
                    </div>
                    <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" wire:model="remember" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
            <a href="auth-forgot-password-basic.html" class="float-end mb-1">
                <span>Forgot Password?</span>
            </a>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit" wire:loading.attr="disabled">
                <span wire:loading.class="d-none">Login</span>
                <span wire:loading>Logging in..</span>
            </button>
        </div>
    </form>
</div>
