<div class="row g-4">
    <div class="col-xl-3">
        <div class="input-group">
            <form action="<?php echo e(url('hasil-pencarian')); ?>" method="GET" class="w-100">
                <input type="search" class="form-control p-3" placeholder="Search keywords" aria-label="Search keywords"
                    aria-describedby="search-icon-1" name="keyword">
                <button type="submit" class="btn btn-primary">Cari <i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <div class="col-6"></div>
    <div class="col-xl-3">
        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
            <label for="fruits">Default Sorting:</label>
            <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                onchange="handleChange(this.value)">
                <option value="newest">Newest</option>
                <option value="oldest">Oldest</option>
            </select>
        </div>
    </div>

</div>
<script>
    function handleChange(value) {
        // Jika Anda ingin mengirimkan form saat dropdown diubah, aktifkan baris berikut
        // document.getElementById('fruitform').submit();

        // Di sini Anda dapat menambahkan logika untuk mengirimkan request AJAX atau mengubah tampilan sesuai dengan pilihan pengguna
        if (value === 'newest') {
            // Logic untuk mengurutkan data dari terbaru ke terlama
            console.log('Sorting from newest to oldest');
        } else if (value === 'oldest') {
            // Logic untuk mengurutkan data dari terlama ke terbaru
            console.log('Sorting from oldest to newest');
        }
    }
</script>
<?php /**PATH C:\xampp\htdocs\rumah-unggas-kita\resources\views/Layout/kategoriSearch.blade.php ENDPATH**/ ?>