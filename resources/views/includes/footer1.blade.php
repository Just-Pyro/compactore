<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="/bootstrap-5.3.1-dist/js/bootstrap.bundle.min.js"></script>
{{-- vue 3 cdn --}}
<script src="/js/vue.3.js"></script>
{{-- axios --}}
<script src="/js/axios.min.js"></script>
<script src="/js/city.js"></script>
<script src="/js/phil.min.js"></script>
<script type="text/javascript">
    Philippines.getProvincesByRegion('01');
    console.log(Philippines.barangays);
</script>
{{-- <script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script> --}}

