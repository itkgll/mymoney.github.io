<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Expense Item</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Excel</a>
    </div>


    <div class="card p-4">
            

            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Expense</th>
                        <th>Nama Item</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($expense_items as $list): ?>
                        <tr>
                            <td>1</td>
                            <td><?= $list->expense_id ?></td>
                            <td><?= $list->item_name ?></td>
                            <td><?= $list->price ?></td>
                            <td><?= $list->quantity ?></td>
                            <td><?= $list->total ?></td>
                        </tr>

                        <?php endforeach ?>
                        
                </tbody>
            </table>
            
    </div>



</div>