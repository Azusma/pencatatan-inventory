

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Beban</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('transactions.create', ['type' => 'expense'])); ?>" class="btn btn-sm btn-primary">Tambah Beban Baru</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">Tanggal</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Metode</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Reference</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e(date('d-m-y', strtotime($transaction->created_at))); ?></td>
                                        <td> <?php echo e($transaction->title); ?></td>
                                        <td><a href="<?php echo e(route('methods.show', $transaction->method)); ?>"><?php echo e($transaction->method->name); ?></a></td>
                                        <td><?php echo e(format_money($transaction->amount)); ?></td>
                                        <td><?php echo e($transaction->reference); ?></td>
                                        <td class="td-actions text-right">
                                            <?php if($transaction->sale_id): ?>
                                                <a href="<?php echo e(route('sales.show', $transaction->sale_id)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                    <i class="tim-icons icon-zoom-split"></i>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('transactions.edit', $transaction)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Transaction">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </a>
                                                <form action="<?php echo e(route('transactions.destroy', $transaction)); ?>" method="post" class="d-inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Transaction" onclick="confirm('Are you sure you want to delete this transaction? There will be no record left.') ? this.parentElement.submit() : ''">
                                                        <i class="tim-icons icon-simple-remove"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        <?php echo e($transactions->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => 'Beban', 'pageSlug' => 'Beban', 'section' => 'Transaksi'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\New folder (3)\laravel-inventory\resources\views/transactions/expense/index.blade.php ENDPATH**/ ?>