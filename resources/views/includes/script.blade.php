<!-- Core JS -->
<script src="{{ asset('app/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('app/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{ asset('app/assets/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('app/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/block-ui/block-ui.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/autosize/autosize.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('app/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('app/assets/js/main.js') }}"></script>

<!-- Page JS -->
{{-- <script src="{{ asset('app/assets/js/pages-auth-multisteps.js') }}"></script> --}}
@livewireScripts
@yield('cscript')
