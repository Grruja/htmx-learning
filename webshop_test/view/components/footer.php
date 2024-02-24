<footer class="bg-success text-white py-5 mt-5">
    <div class="container">
        <small>&copy <?= date('Y') ?> Edenize. All rights reserved</small>
    </div>
</footer>

<script>
    window.history.replaceState({}, document.title, window.location.href);

    const alert = document.getElementById('alert');
    if (alert) {
        displayAlert();
    }

    function displayAlert() {
        setTimeout(() => {
            alert.remove();
        }, 5000);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>