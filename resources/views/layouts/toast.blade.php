<script>
    /**
     * GLOBAL TOAST CONFIG
     */
    toastr.options = {
        closeButton: true,
        progressBar: true,
        timeOut: 4000,
        positionClass: "toast-top-right"
    };

    /**
     * FLASH MESSAGE (DARI CONTROLLER)
     */
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if (session('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

    @if (session('info'))
        toastr.info("{{ session('info') }}");
    @endif
</script>
