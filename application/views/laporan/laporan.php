<div class="container-fluid">
     <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; border: 1px solid #ccc; border-radius: 6px; margin-bottom: 15px; background-color: #f0f0f0;">
        <h5 class="style="margin: 0; font-size: 14px;">Laporan / Report</h5>
        <a class="btn btn-success ml-2" href="<?= site_url('laporan/export_excel?' . http_build_query($_GET)) ?>">
            <i class="fa fa-arrow-up"></i> Export ke Excel
        </a>
    </div>

    <div class="card p-4">
        
        <form method="GET" action="<?= site_url('laporan') ?>" class="form-inline mb-4">

            <!-- Akun -->
            <div class="form-group mr-3">
                <label>Akun:&nbsp;</label>
                <select name="account_id" class="form-control">
                    <option value="">-- Semua --</option>
                    <?php foreach ($accounts as $acc): ?>
                        <option value="<?= $acc->id ?>" <?= ($this->input->get('account_id') == $acc->id) ? 'selected' : '' ?>>
                            <?= $acc->account_name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Jenis Transaksi -->
            <div class="form-group mr-3">
                <label>Jenis:&nbsp;</label>
                <select name="jenis_transaksi" class="form-control">
                    <option value="">-- Semua --</option>
                    <option value="Pemasukan" <?= ($this->input->get('jenis_transaksi') == 'Pemasukan') ? 'selected' : '' ?>>Pemasukan</option>
                    <option value="pengeluaran" <?= ($this->input->get('jenis_transaksi') == 'pengeluaran') ? 'selected' : '' ?>>Pengeluaran</option>
                </select>
            </div>

            <!-- Dari Tanggal -->
            <div class="form-group mr-3">
                <label>Dari:&nbsp;</label>
                <input type="date" name="start_date" value="<?= $this->input->get('start_date') ?>" class="form-control">
            </div>

            <!-- Sampai Tanggal -->
            <div class="form-group mr-3">
                <label>Sampai:&nbsp;</label>
                <input type="date" name="end_date" value="<?= $this->input->get('end_date') ?>" class="form-control">
            </div>

            <button class="btn btn-primary">Tampilkan</button>
        </form>


        <?php if (!empty($report)) : ?>
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Invoice</th>
                        <th>Akun</th>
                        <th>Jenis</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($report as $r): ?>
                        <tr>
                            <td><?= $r->transaction_date ?></td>
                            <td><?= $r->invoice_no ?></td>
                            <td><?= $r->account_name ?></td>
                            <td><?= $r->jenis_transaksi ?></td>
                            <td><?= $r->item_name ?></td>
                            <td><?= $r->quantity ?></td>
                            <td><?= number_format($r->price, 0, ',', '.') ?></td>
                            <td><?= number_format($r->total, 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
        <?php endif; ?>
    </div>
</div>
