<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Account / Bank</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Users Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" target="_self" name="formku" id="formku" class="eventInsForm">
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <input type="hidden" id="id" name="id" value="">
                                            <label for="account_name" class="col-form-label">Nama Account / bank <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <input type="text" name="account_name" id="account_name" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus>
                                            <input type="hidden" name="user_id" id="user_id">
                                            <div class="invalid-feedback nama-ada inv-username">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="pemilik" class="col-form-label">Pemilik <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-4">
                                            <input type="text" name="pemilik" id="pemilik" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus onkeyup="this.value = this.value.capitalize()">
                                            <div class="invalid-feedback inv-name">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="kode_akun" class="col-form-label">Kode Accoun /Bank <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col md-8 col-xs-8">
                                            <input type="text" name="kode_akun" id="kode_akun" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus onkeyup="this.value = this.value.capitalize()">
                                            <div class="invalid-feedback inv-kode_akun">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="balance" class="col-form-label">Sisa saldo <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-4">
                                            <input type="text" name="balance" id="balance" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus onkeyup="this.value = this.value.capitalize()">
                                            <div class="invalid-feedback inv-balance">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="description" class="col-form-label">Descripsi <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <textarea class="form-control" name="description" id="description" style="margin-bottom: 5px;" maxlength="100" autofocus onkeyup="this.value = this.value.capitalize()"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="status" class="col-form-label">Status <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-4">
                                            <select name="status" id="status" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus onkeyup="this.value = this.value.capitalize()">
                                                <option value="" selected disabled>--- Pilih ---</option>
                                                <option value="aktif">aktif</option>
                                                <option value="tidak-aktif">tidak aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="simpandata()"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="float-sm-right">
                            <a onclick="tambahData()" class="btn btn-success btn-sm" style="color: aliceblue;"><i class="fa fa-plus"> Create</i></a>
                        </div>
                    </div>
                    <div class="flash-data" data-flashdata="#">
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No.</th>
                                    <th>Nama Account</th>
                                    <th>Pemilik</th>
                                    <th>Kode Account</th>
                                    <th>Sisa saldo</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Join Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach ($accounts as $acc): ?>
                                    <tr>
                                        <td><?= $acc->id ?></td>
                                        <td><?= $acc->account_name ?></td>
                                        <td><?= $acc->pemilik ?></td>
                                        <td><?= $acc->kode_akun ?></td>
                                        <td><?= 'Rp ' . number_format($acc->balance, 2, ',', '.') ?></td>
                                        <td><?= $acc->description ?></td>
                                        <td><?= $acc->status ?></td>
                                        <td><?= $acc->join_date ?></td>
                                        <td style="text-align: center;width:200px;">
                                            <a onclick="editData(<?= $acc->id ?>)" style="margin-bottom:4px;color:white;" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                <input type="hidden" name="user_id" value="#">
                                            <a onclick="hapusData(<?= $acc->id ?>)" class="btn btn-danger btn-sm tombol-hapus" style="margin-bottom:4px;"><i class="fa fa-trash"></i></a>

                                                <!-- <button onclick="hapusData(<?= $acc->id ?>)" class="btn btn-danger btn-sm tombol-hapus" style="margin-bottom:4px;" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button> -->
                                        </td>
                                    </tr>
                            
                                <?php endforeach ?>
                                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Swal2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- Swal2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    var dsState;

    String.prototype.capitalize = function() {
        return this.charAt(0).toUpperCase() + this.slice(1);
    }

    $(function() {
        window.setTimeout(function() {
            $('.alert-success').hide(300);
        }, 5000);
    });

    $(function() {
        window.setTimeout(function() {
            $('.invalid-feedback').hide(300);
        }, 3000);
    });

    function tambahData() {
        $('#id').val('');
        $('#account_name').val('');
        $('#name').val('');
        $('#kode-account').val('');
        $('#level').val('');
        $('#password').val('');
        dsState = "Input";

        $("#myModal").find('.modal-title').text('Add User');
        $("#myModal").modal('show', {
            backdrop: 'true'
        });

    }

    function simpandata() {
    let valid = true;

        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').html("");

        if ($.trim($("#account_name").val()) == "") {
            $(".inv-account_name").html("Nama Account tidak boleh kosong!");
            $('#account_name').addClass('is-invalid');
            valid = false;
        }

        if ($.trim($("#pemilik").val()) == "") {
            $(".inv-pemilik").html("Pemilik tidak boleh kosong!");
            $('#pemilik').addClass('is-invalid');
            valid = false;
        }

        if ($.trim($("#kode_akun").val()) == "") {
            $(".inv-kode_akun").html("Kode akun tidak boleh kosong!");
            $('#kode_akun').addClass('is-invalid');
            valid = false;
        }

        if ($.trim($("#balance").val()) == "") {
            $(".inv-balance").html("Saldo tidak boleh kosong!");
            $('#balance').addClass('is-invalid');
            valid = false;
        }

        if ($.trim($("#status").val()) == "") {
            $(".inv-status").html("Status harus dipilih!");
            $('#status').addClass('is-invalid');
            valid = false;
        }

        if (!valid) {
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal',
                text: 'Harap lengkapi semua data yang wajib diisi!'
            });
            return;
        }

        const url = (dsState == "Input")
            ? "<?= site_url('account/save') ?>"
            : "<?= site_url('account/update') ?>";

        $.ajax({
            type: "POST",
            url: url,
            data: $("#formku").serialize(),
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: response.message
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error Server!',
                    text: 'Gagal terhubung ke server.'
                });
            }
        });
    }


    function editData(id) {
        $.ajax({
            url: "<?= site_url('account/get_by_id') ?>",
            type: "POST",
            data: { id: id },
            dataType: "json",
            success: function(data) {
                $("#id").val(data.id);
                $("#account_name").val(data.account_name);
                $("#pemilik").val(data.pemilik);
                $("#kode_akun").val(data.kode_akun);
                $("#balance").val(data.balance);
                $("#description").val(data.description);
                $("#status").val(data.status);

                // dsState = "Edit";
                // $("#myModal").modal("show");

                dsState = "Edit";
                $("#myModal").find('.modal-title').text('Edit Account');
                $("#myModal").modal('show', {
                    backdrop: 'true'
                });
            }
        });
    }


    function hapusData(id) {
    Swal.fire({
        title: 'Yakin hapus data ini?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= site_url('account/delete') ?>",
                type: "POST",
                data: { id: id },
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: response.message
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Tidak dapat terhubung ke server!'
                    });
                }
            });
        }
    });
}

</script>