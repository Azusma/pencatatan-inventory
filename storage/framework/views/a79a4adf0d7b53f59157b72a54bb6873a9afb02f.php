

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Total Penjualan</h5>
                            <h2 class="card-title">Laporan Tahunan</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-*-info btn-simple active" id="0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Produk</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-*-info btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Pembelian</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-*-info btn-simple" id="2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Pelanggan</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Pendapatan Bulan Terakhir</h5>
                    <h3 class="card-title"><i class="tim-icons icon-money-coins text-*-dark"></i><?php echo e(format_money($semesterincomes)); ?></h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Saldo Bulanan</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bank text-info"></i> <?php echo e(format_money($monthlybalance)); ?></h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="CountryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Pengeluaran Bulan Lalu</h5>
                    <h3 class="card-title"><i class="tim-icons icon-paper text-success"></i> <?php echo e(format_money($semesterexpenses)); ?></h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card card-tasks">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Penjualan Tertunda</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('sales.create')); ?>" class="btn btn-sm btn-*-info">Penjualan Baru</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Tanggal
                                    </th>
                                    <th>
                                        Pelanggan
                                    </th>
                                    <th>
                                        Produk
                                    </th>
                                    <th>
                                        Terbayar
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $unfinishedsales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(date('d-m-y', strtotime($sale->created_at))); ?></td>
                                        <td><a href=""><?php echo e($sale->client->name); ?><br><?php echo e($sale->client->document_type); ?>-<?php echo e($sale->client->document_id); ?></a></td>
                                        <td><?php echo e($sale->products->count()); ?></td>
                                        <td><?php echo e(format_money($sale->transactions->sum('amount'))); ?></td>
                                        <td><?php echo e(format_money($sale->products->sum('total_amount'))); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(route('sales.show', ['sale' => $sale])); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="View Sale">
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
        <div class="col-lg-6 col-md-12">
            <div class="card card-tasks">
                <div class="card-header">
                <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Transaksi Terakhir</h4>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-sm btn-*-info" data-toggle="modal" data-target="#transactionModal">
                                Transaksi Baru
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Kategori
                                    </th>
                                    <th>
                                        Judul
                                    </th>
                                    <th>
                                        Medium
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $lasttransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr> 
                                        <td>
                                            <?php if($transaction->type == 'expense'): ?>
                                                Expense
                                            <?php elseif($transaction->type == 'sale'): ?>
                                                Sale
                                            <?php elseif($transaction->type == 'payment'): ?>
                                                Payment
                                            <?php elseif($transaction->type == 'income'): ?>
                                                Income
                                            <?php else: ?>
                                                <?php echo e($transaction->type); ?>

                                            <?php endif; ?>
                                            
                                        </td>
                                        <td><?php echo e($transaction->title); ?></td>
                                        <td><?php echo e($transaction->method->name); ?></td>
                                        <td><?php echo e(format_money($transaction->amount)); ?></td>
                                        <td class="td-actions text-right">
                                            <?php if($transaction->sale_id): ?>
                                                <a href="<?php echo e(route('sales.show', $transaction->sale_id)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More details">
                                                    <i class="tim-icons icon-zoom-split"></i>
                                                </a>
                                            <?php endif; ?>
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

    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transaksi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(route('transactions.create', ['type' => 'payment'])); ?>" class="btn btn-sm btn-*-info">Pembayaran</a>
                        <a href="<?php echo e(route('transactions.create', ['type' => 'income'])); ?>" class="btn btn-sm btn-*-info">Pendapatan</a>
                        <a href="<?php echo e(route('transactions.create', ['type' => 'expense'])); ?>" class="btn btn-sm btn-*-info">Beban</a>
                        <a href="<?php echo e(route('sales.create')); ?>" class="btn btn-sm btn-*-dark">Penjualan</a>
                        <a href="<?php echo e(route('transfer.create')); ?>" class="btn btn-sm btn-*-dark">Transfer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/chartjs.min.js')); ?>"></script>
    
    <script>
        var lastmonths = [];

        <?php $__currentLoopData = $lastmonths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            lastmonths.push('<?php echo e(strtoupper($month)); ?>')
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        var lastincomes = <?php echo e($lastincomes); ?>;
        var lastexpenses = <?php echo e($lastexpenses); ?>;
        var anualsales = <?php echo e($anualsales); ?>;
        var anualclients = <?php echo e($anualclients); ?>;
        var anualproducts = <?php echo e($anualproducts); ?>;
        var methods = [];
        var methods_stats = [];

        <?php $__currentLoopData = $monthlybalancebymethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method => $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            methods.push('<?php echo e($method); ?>');
            methods_stats.push('<?php echo e($balance); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        $(document).ready(function() {
            demo.initDashboardPageCharts();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\New folder (3)\laravel-inventory\resources\views/dashboard.blade.php ENDPATH**/ ?>