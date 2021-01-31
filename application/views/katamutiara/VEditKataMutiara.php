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
                            Kata-Kata Mutiara
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div id="solid">
            <div class="card mb-4">
                <div class="card-header">Form Edit Kata-Kata Mutiara</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="KataMutiara">Kata Mutiara</label>
                            <textarea class="form-control" id="KataMutiara" name="katamutiara" type="text" rows="5"></textarea>
                        </div>
                        <div class="text-md-right">
                            <button type="submit" class="btn btn-primary "> Submit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>