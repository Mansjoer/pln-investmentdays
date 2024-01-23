<div>
    <form id="formAuthentication" wire:submit.prevent="submit" class="mb-3">
        <div class="form-floating form-floating-outline mb-3">
            <input type="text" class="form-control" id="username" placeholder="Enter your username" autofocus />
            <label for="username">Username</label>
        </div>
        <div class="mb-3">
            <div class="form-password-toggle">
                <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                        <label for="password">Password</label>
                    </div>
                    <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                </div>
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
            <a href="auth-forgot-password-basic.html" class="float-end mb-1">
                <span>Forgot Password?</span>
            </a>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit" wire:loading.attr="disabled">
                <span wire:loading.class="d-none">Login</span>
                <span wire:loading>Loading..</span>
            </button>
        </div>
    </form>
</div>
