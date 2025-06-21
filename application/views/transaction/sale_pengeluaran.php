<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Container untuk Sale dan btn pemasukan -->
     
    <!-- <div style="display: flex; justify-content: space-between; align-items: center; padding: 15px; border: 1px solid #ddd; border-radius: 8px; margin-bottom: 20px; background-color: #f9f9f9;">
        <h3 style="margin: 0;">Sale - > Pengeluaran</h3>
            <a class="btn btn-primary" href="<?=site_url('transaksi/pengeluaran')?>"><i class="fa fa-arrow-up"></i></i> Pemasukan</a>
    </div> -->

    <!-- Tampilan small Container untuk Sale dan btn pemasukan -->

    <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; border: 1px solid #ccc; border-radius: 6px; margin-bottom: 15px; background-color: #f0f0f0;">
        <h5 style="margin: 0; font-size: 14px;">Sale - &gt; Pengeluaran</h5>
        <a class="btn btn-sm btn-primary" href="<?=site_url('laporan')?>">
            <i class="fa fa-arrow-up"></i> Laporan
        </a>
    </div>


    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body" style="height: 200px;">
                    <table>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="tanggal">Date</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control">
                                </div>
                            </td>
                        </tr>

                        <!-- Kasir type akun yang login -->

                        <tr>
                            <td style="vertical-align: top; width:30%;">
                                <label for="user_id">Pengguna</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user_id" name="user_id" value="<?php echo $username; ?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top;">
                                <label for="akun_sumber">Sumber </label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="akun_sumber" id="akun_id" class="form-control" onchange="tampilkanStockSaldo()">
                                        <option value="" selected disabled>Pilih Akun</option>
                                        <?php foreach ($account as $a) : ?>
                                            <option value="<?= $a->id ?>" data-saldo="<?= $a->balance ?>">
                                                <?= $a->account_name ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body" style="height: 200px;">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%;">
                                <label for="namaItem">Nama Item</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="text" id="namaItem" class="form-control" placeholder="Nama Item">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width:30%;">
                                <label for="qty">Qty</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <!-- <input type="number" id="qty" value="1" min="1" class="form-control"> -->
                                    <input type="number" id="qty" class="form-control" value="1" min="1">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <button id="addItem" class="btn btn-primary" onclick="addItem()">
                                        <i class="fa fa-cart-plus"> Add</i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body" style="height: 200px;">
                    <div align="right">
                        <h2>Invoice <b><span id="invoice" name="invoice"><?= $invoice; ?></span></b></h2>
                        <h3><b><span id="change-display" style="font-size:40pt;">0</span></b></h3>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="itemsTable" border="1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <!-- <th>Barcode</th> -->
                                    <th>Product Item</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <!-- <th width="10%">Discount Item</th> -->
                                    <th width="15%">Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                                
                            <tbody></tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top;">
                                <label for="stokSaldo">Stok Saldo</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="stokSaldo" id="stokSaldo" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;width:30%;">
                                <label for="subTotal">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="subTotal" value="" class="form-control" readonly>
                                    <!-- <span id="subTotalDisplay"></span> -->
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body" style="height: 145px;">
                    <table width="100%">
                        <!-- <tr>
                            <td style="vertical-align:top;width:30%;">
                                <label for="cash">Cash</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="tex" id="cash" value="Belum di set" class="form-control">
                                </div>
                            </td>
                        </tr> -->
                        <!-- Sisa saldo hasil dari saldo - subtotal (sementara sebelum submit) -->
                        <tr>
                            <td style="vertical-align:top;">
                                <label for="sisaSaldo">Sisa Salo</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="sisaSaldo" name="sisaSaldo" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="">Tipe </label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="tipe_transaksi" id="tipe_transaksi" class="form-control">
                                        <option value="" selected disabled>Pilih Tipe untuk transaksi</option>
                                        <option value="umum">Umum</option>
                                        <option value="Bulanan">Bulanan</option>
                                        <option value="Harian">Harian</option>
                                        <option value="Event">Event</option>
                                        <option value="Turing">Turing</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top;">
                                <label for="note">Note</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea id="note" rows="3" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <button id="cancel_payment" class="btn btn-flat btn-info" style="color: white;">
                    <i class="fa fa-recycle"></i> Cancel Transaksi
                </button><br><br>
                <button id="save_payment" name="save_payment" class="btn btn-flat btn-lg btn-success">
                    <i class="fa fa-paper-plane"></i> Save Transaksi
                </button>
            </div>
        </div>
    </div>

    
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Website &copy; Beta - Beti</span>
            </div>
        </div>
    </footer>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Swal2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- Swal2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>    
let itemIndex = 0;
function playSound(url) {
        const audio = new Audio(url);
        audio.play();
    }

function addItem() {
    const namaItem = document.getElementById("namaItem").value;
    const qty = parseInt(document.getElementById("qty").value);
    const table = document.getElementById("itemsTable").getElementsByTagName("tbody")[0];

    // if (namaItem === "" || qty <= 0) return alert("Nama item dan qty harus diisi dengan benar.");
    if (namaItem === "" || qty <= 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Data Tidak Lengkap',
            text: 'Nama item dan qty harus diisi dengan benar.',
        });
        playSound('<?=base_url("assets/sound/MemeSound.mp3")?>');
            return;
        }


    const row = table.insertRow();
    row.setAttribute("data-index", itemIndex);

    row.innerHTML = `
        <td>${itemIndex + 1}</td>
        <td>${namaItem}</td>
        <td><input type="number" value="0" min="0" onchange="updateTotal(${itemIndex})"></td>
        <td><input type="number" value="${qty}" min="1" onchange="updateTotal(${itemIndex})"></td>
        <td class="totalCell">0</td>
        <td><button onclick="removeItem(this)" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i> Hapus</button></td>`;

    itemIndex++;
    updateSubTotal();
}

function updateTotal(index) {
    const table = document.getElementById("itemsTable").getElementsByTagName("tbody")[0];
    const row = [...table.rows].find(r => r.getAttribute("data-index") == index);
    const priceInput = row.cells[2].querySelector("input");
    const qtyInput = row.cells[3].querySelector("input");
    const totalCell = row.cells[4];

    const price = parseFloat(priceInput.value);
    const qty = parseInt(qtyInput.value);
    const total = price * qty;

    totalCell.innerText = total.toFixed(2);
    updateSubTotal();
}

    function updateSubTotal() {
        const rows = document.querySelectorAll("#itemsTable tbody tr");
        let subtotal = 0;

        rows.forEach(row => {
            const totalCell = row.cells[4];
            subtotal += parseFloat(totalCell.innerText) || 0;
        });

        document.getElementById("subTotal").value = subtotal.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });

        const sisaSaldo = stokSaldoAsli - subtotal;
        document.getElementById("sisaSaldo").value = sisaSaldo.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
        
        document.getElementById("change-display").textContent = sisaSaldo.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
    }


    // function removeItem(button) {
    //     const row = button.closest("tr");
    //     row.remove();
    //     updateSubTotal();
    // }

    function removeItem(button) {
        Swal.fire({
            title: 'Hapus Item?',
            text: 'Item ini akan dihapus dari daftar transaksi.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                playSound('<?= base_url("assets/sound/MemeSound.mp3") ?>'); // Suara konfirmasi hapus

                const row = button.closest("tr");
                row.remove();
                updateSubTotal();

                Swal.fire({
                    icon: 'success',
                    title: 'Dihapus!',
                    text: 'Item berhasil dihapus.',
                    timer: 1500,
                    showConfirmButton: false
                });
            } else {
                playSound('<?= base_url("assets/sound/MemeSound.mp3") ?>'); // Suara jika batal hapus
            }
        });
    }



    let stokSaldoAsli = 0; // Simpan angka asli di sini

    function tampilkanStockSaldo() { 
        const selected = document.getElementById("akun_id");
        const saldo = selected.options[selected.selectedIndex].getAttribute("data-saldo");

        if (saldo !== null) {
            stokSaldoAsli = parseFloat(saldo); // Simpan angka asli

            const formatted = stokSaldoAsli.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });

            document.getElementById("stokSaldo").value = formatted;
            updateSubTotal(); // update sisa saldo ketika stok berubah
        } else {
            document.getElementById("stokSaldo").value = "";
            stokSaldoAsli = 0;
            updateSubTotal();
        }
    }

    document.getElementById("cancel_payment").addEventListener("click", function () {
    const soundUrl = "<?= base_url('assets/sound/MemeSound.mp3') ?>";

    Swal.fire({
        title: 'Yakin Cancel Transaksi?',
        text: 'Semua data yang sudah diinput akan dihapus.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            playSound(soundUrl);

            document.getElementById("namaItem").value = "";
            document.getElementById("qty").value = "";

            const tableBody = document.getElementById("itemsTable").getElementsByTagName("tbody")[0];
            tableBody.innerHTML = "";

            document.getElementById("subTotal").value = "Rp0";
            document.getElementById("sisaSaldo").value = "Rp0";
            document.getElementById("change-display").textContent = "Rp0";

            document.getElementById("stokSaldo").value = "Rp0";
            stokSaldoAsli = 0;

            itemIndex = 0;
        } else {
            playSound(soundUrl);
        }
    });
});

document.getElementById("save_payment").addEventListener("click", function () {
    const tanggal = document.getElementById("tanggal").value;
    const user = document.getElementById("user_id").value;
    const akun = document.getElementById("akun_id").value;
    const tipeTransaksi = document.getElementById("tipe_transaksi").value;
    const note = document.getElementById("note").value;
    const subTotal = document.getElementById("subTotal").value.replace(/[^0-9,-]+/g, "");
    // Ambil sisaSaldo dari input yang sudah diformat ke IDR
    const sisaSaldo = parseFloat(
        document.getElementById("sisaSaldo").value
            .replace(/[Rp\s.]/g, '')  // hapus Rp, spasi, dan titik
            .replace(',', '.')        // ganti koma ke titik desimal
    );

    const items = [];
    const rows = document.querySelectorAll("#itemsTable tbody tr");

    rows.forEach(row => {
        const namaItem = row.cells[1].innerText;
        const price = row.cells[2].querySelector("input").value;
        const qty = row.cells[3].querySelector("input").value;
        const total = row.cells[4].innerText;

        items.push({
            item_name: namaItem,
            price: price,
            quantity: qty,
            total: total
        });
    });

    if (items.length === 0) {
    Swal.fire({
            icon: 'error',
            title: 'Gagal Menyimpan',
            text: 'Item masih kosong.',
        });
        playSound('<?=base_url("assets/sound/MemeSound.mp3")?>');
            return;
        }

    const data = {
        tanggal: tanggal,
        user_id: user,
        account_id: akun,
        type_transaksi: tipeTransaksi,
        note: note,
        subtotal: subTotal,
        sisa_saldo: sisaSaldo,
        items: items
    };

    const soundSuccess = "<?= base_url('assets/sound/MemeSound.mp3') ?>";
    const soundError = "<?= base_url('assets/sound/MemeSound.mp3') ?>";

    fetch("<?= base_url('transaksi/simpan') ?>", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "success") {
            playSound(soundSuccess);
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Transaksi berhasil disimpan.',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                location.reload();
            });
        } else {
            playSound(soundError);
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal menyimpan transaksi: ' + res.message,
            });
        }
    })
    .catch(err => {
        playSound(soundError);
        console.error("Error:", err);
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: 'Terjadi masalah saat menyimpan transaksi.',
        });
    });

});

</script>