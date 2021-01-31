<!DOCTYPE html>
<html lang="en">

<body>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <a href="<?= base_url(); ?>news">
                                <button class="btn btn-blue btn-icon mr-2 my-1" type="button"><i class="fas fa-arrow-left"></i></button>
                            </a>
                            News
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
                        <div class="card-header">Form Edit News</div>
                        <div class="card-body">
                            <!-- Component Preview-->
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form>
                                        <div class="form-group">
                                            <label for="JudulNews">Judul News</label>
                                            <input class="form-control" id="JudulNews" type="text" />
                                        </div>
                                        <div class="form-group">
                                            <label for="DeskripsiNews">Deskripsi News</label>
                                            <textarea class="form-control" id="DeskripsiNews" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="IsiNews">Isi News</label>
                                            <textarea class="form-control" id="IsiNews" rows="15"></textarea>
                                        </div>
                                    </form>
                                    <div class="text-md-right">
                                        <button type="submit" class="btn btn-primary "> Submit </button>
                                    </div>
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