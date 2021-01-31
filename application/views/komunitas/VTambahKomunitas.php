<!DOCTYPE html>
<html lang="en">

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <a href="<?= base_url(); ?>KataMutiara">
                                <button class="btn btn-blue btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
                            </a>
                            Komunitas
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-9">
                <!-- Default Bootstrap Form Controls-->
                <div id="default">
                    <div class="card mb-4">
                        <div class="card-header">Form Tambah Komunitas</div>
                        <div class="card-body">
                            <!-- Component Preview-->
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form>
                                        <div class="form-group">
                                            <label for="judulnews">Judul News</label>
                                            <input class="form-control" id="judulnews" name="judulnews" type="text"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsinews">Deskripsi News</label>
                                            <input class="form-control" id="deskripsinews" name="deskripsinews" type="text"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="contentnews">Content News</label>
                                            <input class="form-control" id="contentnews" name="contentnews" type="text"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input class="form-control" id="foto" name="foto" type="file"></input>
                                        </div>
                                        <div class="text-md-right">
                                            <button type="submit" class="btn btn-primary "> Submit </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>