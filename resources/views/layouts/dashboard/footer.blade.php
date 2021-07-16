<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
    <p class="text-muted text-center text-md-left">
        Copyright © <?php echo date('Y'); ?>
        <a href="#" target="_blank">{{ App\Models\System::first()->c_name }}</a>. All rights reserved | Powered by <b
            style="color:#183947;">Xwift Limited</b>
    </p>
    {{-- <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">{{Auth::user()->fname}}</p> --}}
</footer>