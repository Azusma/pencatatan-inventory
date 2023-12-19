

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Kategori</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-sm btn-primary">Tambah Kategori Baru</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">Nama</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Total Stok</th>
                                <th scope="col">Stok Rusak</th>
                                <th scope="col">Harga Rata-rata Produk</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($category->name); ?></td>
                                        <td><?php echo e(count($category->products)); ?></td>
                                        <td><?php echo e($category->products->sum('stock')); ?></td>
                                        <td><?php echo e($category->products->sum('stock_defective')); ?></td>
                                        <td><?php echo e(format_money($category->products->avg('price'))); ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?php echo e(route('categories.show', $category)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="<?php echo e(route('categories.edit', $category)); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Category">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('categories.destroy', $category)); ?>" method="post" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Category" onclick="confirm('Are you sure you want to delete this category? All products belonging to it will be deleted and the records that contain it will not be accurate.') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        <?php echo e($categories->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['page' => 'List Kategori', 'pageSlug' => 'kategori', 'section' => 'persediaan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\OneDrive\Dokumen\New folder (3)\laravel-inventory\resources\views/inventory/categories/index.blade.php ENDPATH**/ ?>