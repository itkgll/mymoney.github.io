<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Expense</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Excel</a>
    </div>


    <div class="card p-4">
            

            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Invoice</th>
                        <th>User Id</th>
                        <th>Accounts</th>
                        <th>Jenis</th>
                        <th>Catatn</th>
                        <th>Tipe Transaction</th>
                        <th>SubTotal</th>
                        <th>Tanggal Transaction</th>
                        <th>Create</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($expenses as $e): ?>
                        <tr>
                            <td>1</td>
                            <td><?= $e->invoice_no ?></td>
                            <td><?= $e->user_id ?></td>
                            <td><?= $e->account_id ?></td>
                            <td><?= $e->jenis_transaksi ?></td>
                            <th><?= $e->type_transaksi ?></th>
                            <th><?= $e->note ?></th>
                            <td><?= $e->subtotal ?></td>
                            <td><?= $e->transaction_date ?></td>
                            <td><?= $e->created_at ?></td>
                        </tr>

                        <?php endforeach ?>
                        
                </tbody>
            </table>
            
    </div>



</div>