
    
</body>

<script src="../assets/js/perview-image.js">

</script>
<script>
    $(document).ready(() => {
        const navLink = $('.nav-link');
        const urlSearchParams = new urlSearchParams(window.location.search);
        const params = Object.fromEntries(urlSearchParams.entries());
        for(var i = 1; i < navLink.length; i++){
            if (params.url.includes(navLink[i].getAttribute("name"))) {
                navLink[i].classLiss.add('active');
            }
        }
    })
</script>
</html>