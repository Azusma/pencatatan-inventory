

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Statistik Transaksi</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('transactions.index')); ?>" class="btn btn-sm btn-primary">
                                Lihat Transaksi
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Periode</th>
                                <th>Transaksi</th>
                                <th>Pendapatan</th>
                                <th>Beban</th>
                                <th>Pembayaran</th>
                                <th>Saldo</th>
                                <th>Total Saldo</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $transactionsperiods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $period => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($period); ?></td>
                                        <td><?php echo e($data->count()); ?></td>
                                        <td><?php echo e(format_money($data->where('type', 'income')->sum('amount'))); ?></td>
                                        <td><?php echo e(format_money($data->where('type', 'expense')->sum('amount'))); ?></td>
                                        <td><?php echo e(format_money($data->where('type', 'payment')->sum('amount'))); ?></td>
                                        <td><?php echo e(format_money($data->where('payment_method_id', optional($methods->where('name', 'Cash')->first())->id)->sum('amount'))); ?></td>
                                        <td><?php echo e(format_money($data->sum('amount'))); ?></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Saldo Tertunda</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('clients.index')); ?>" class="btn btn-sm btn-primary">Lihat Pelanggan</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <th>Pelanggan</th>
                                <th>Pembelian</th>
                                <th>Transaksi</th>
                                <th>Saldo</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><a href="<?php echo e(route('clients.show', $client)); ?>"><?php echo e($client->name); ?><br><?php echo e($client->document_type); ?>-<?php echo e($client->document_id); ?></a></td>
                                        <td><?php echo e($client->sales->count()); ?></td>
                                        <td><?php echo e(format_money($client->transactions->sum('amount'))); ?></td>
                                        <td>
                                            <?php if($client->balance > 0): ?>
                                                <span class="text-success"><?php echo e(format_money($client->balance)); ?></span>
                                            <?php elseif($client->balance < 0.00): ?>
                                                <span class="text-danger"><?php echo e(format_money($client->balance)); ?></span>
                                            <?php else: ?>
                                                <?php echo e(format_money($client->balance)); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('clients.transactions.add', $client)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Register Transation">
                                                <i class="tim-icons icon-simple-add"></i>
                                            </a>
                                            <a href="<?php echo e(route('clients.show', $client)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="See Client">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Statistik Berdasarkan Metode</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('methods.index')); ?>" class="btn btn-sm btn-primary">Lihat Metode</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <th>Metode</th>
                                <th>Transaksi <?php echo e($date->year); ?></th>
                                <th>Saldo <?php echo e($date->year); ?></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><a href="<?php echo e(route('methods.show', $method)); ?>"><?php echo e($method->name); ?></a></td>
                                        <td><?php echo e(format_money($transactionsperiods['Year']->where('payment_method_id', $method->id)->count())); ?></td>
                                        <td><?php echo e(format_money($transactionsperiods['Year']->where('payment_method_id', $method->id)->sum('amount'))); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('methods.show', $method)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="See Method">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Statistik Penjualan</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="<?php echo e(route('sales.index')); ?>" class="btn btn-sm btn-primary">Lihat Penjualan</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Periode</th>
                        <th>Penjualan</th>
                        <th>Pelanggan</th>
                        <th>Total Stok</th>
                        <th data-toggle="tooltip" data-placement="bottom" title="Promedio de ingresos por cada venta">Average C / V</th>
                        <th>Jumlah Tagihan</th>
                        <th>Penyelesaian</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $salesperiods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $period => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($period); ?></td>
                                <td><?php echo e($data->count()); ?></td>
                                <td><?php echo e($data->groupBy('client_id')->count()); ?></td>
                                <td><?php echo e($data->where('finalized_at', '!=', null)->map(function ($sale) {return $sale->products->sum('qty');})->sum()); ?></td>
                                <td><?php echo e(format_money($data->avg('total_amount'))); ?></td>
                                <td><?php echo e(format_money($data->where('finalized_at', '!=', null)->map(function ($sale) {return $sale->products->sum('total_amount');})->sum())); ?></td>
                                <td><?php echo e($data->where('finalized_at', null)->count()); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['pageSlug' => 'tstats', 'page' => 'Statistik', 'section' => 'Transaksi'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\New folder (3)\laravel-inventory\resources\views/transactions/stats.blade.php ENDPATH**/ ?>