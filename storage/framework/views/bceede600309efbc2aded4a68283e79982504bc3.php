

<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Tambah Pembayaran Baru</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?php echo e(route('transactions.type', ['type' => 'payment'])); ?>" class="btn btn-sm btn-primary">Kembali ke Daftar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e(route('transactions.store')); ?>" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="type" value="payment">
                            <input type="hidden" name="user_id" value="<?php echo e(Auth::id()); ?>">
                            <h6 class="heading-small text-muted mb-4">Informasi Pembayaran</h6>
                            <div class="pl-lg-4">
                                <div class="form-group<?php echo e($errors->has('title') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-title">Judul</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" placeholder="Title" value="<?php echo e(old('title')); ?>" required autofocus>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'title'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>


                                <div class="form-group<?php echo e($errors->has('provider_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-provider">Sumber Pembayaran</label>
                                    <select name="provider_id" id="input-provider" class="form-select form-control-alternative<?php echo e($errors->has('provider_id') ? ' is-invalid' : ''); ?>" required>
                                        <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($provider['id'] == old('provider')): ?>
                                                <option value="<?php echo e($provider['id']); ?>" selected><?php echo e($provider['name']); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($provider['id']); ?>"><?php echo e($provider['name']); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'provider_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('payment_method_id') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-method">Metode Pembayaran</label>
                                    <select name="payment_method_id" id="input-method" class="form-select2 form-control-alternative<?php echo e($errors->has('payment_method_id') ? ' is-invalid' : ''); ?>" required>
                                        <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($payment_method['id'] == old('payment_method_id')): ?>
                                                <option value="<?php echo e($payment_method['id']); ?>" selected><?php echo e($payment_method['name']); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($payment_method['id']); ?>"><?php echo e($payment_method['name']); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'payment_method_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="form-group<?php echo e($errors->has('amount') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-amount">Total</label>
                                    <input type="number" step=".01" name="amount" id="input-amount" class="form-control form-control-alternative" placeholder="Total Amount" value="<?php echo e(old('amount')); ?>" min="0" required>
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'amount'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                </div>

                                <div class="form-group<?php echo e($errors->has('reference') ? ' has-danger' : ''); ?>">
                                    <label class="form-control-label" for="input-reference">Reference</label>
                                    <input type="text" name="reference" id="input-reference" class="form-control form-control-alternative<?php echo e($errors->has('reference') ? ' is-invalid' : ''); ?>" placeholder="Reference" value="<?php echo e(old('reference')); ?>">
                                    <?php echo $__env->make('alerts.feedback', ['field' => 'reference'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        new SlimSelect({
            select: '.form-select'
        })
        new SlimSelect({
            select: '.form-select2'
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', ['page' => 'Tambah Pembayaran Baru', 'pageSlug' => 'Pembayaran', 'section' => 'transaksi'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\New folder (3)\laravel-inventory\resources\views/transactions/payment/create.blade.php ENDPATH**/ ?>