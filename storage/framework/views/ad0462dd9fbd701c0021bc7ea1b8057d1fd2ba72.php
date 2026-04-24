

<?php $__env->startSection('content'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo e(asset('assetst/js/jquery.min.js')); ?>"></script>

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">User Management</h1>
        <div>
            <ol class="breadcrumb">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-sm btn-primary my-1">Add User</a>
                <?php endif; ?>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="card-body">
            <?php if($message = Session::get('success')): ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: "<?php echo e($message); ?>",
                            timer: 3000,
                            showConfirmButton: false,
                        });
                    });
                </script>
            <?php endif; ?>

            <table class="table table-bordered">
                <tr style="background-color: #E4A11B;">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="280px">Action</th>
                </tr>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="tdClass"><?php echo e($key + 1); ?></td>
                        <td class="tdClass"><?php echo e($user->name); ?></td>
                        <td class="tdClass"><?php echo e($user->email); ?></td>
                        <td class="tdClass">
                            <?php if(!empty($user->getRoleNames())): ?>
                                <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span style="font-weight: 700;"><?php echo e($v); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </td>
                        <td class="tdClass">
                            <a class="btn btn-warning btn-sm" href="<?php echo e(route('users.show', $user->id)); ?>"><i
                                    class="fa fa-eye"></i></a>
                            <form action="<?php echo e(route('users.toggleStatus', $user->id)); ?>" method="POST"
                                style="display:inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <?php if($user->is_active): ?>
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fa fa-check"></i> Active
                                    </button>
                                <?php else: ?>
                                    <button type="submit" class="btn btn-sm btn-secondary">
                                        <i class="fa fa-ban"></i> Inactive
                                    </button>
                                <?php endif; ?>
                            </form>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-edit')): ?>
                                <a class="btn btn-info btn-sm" href="<?php echo e(route('users.edit', $user->id)); ?>"><i
                                        class="fa fa-edit"></i></a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-delete')): ?>
                                <?php echo Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['users.destroy', $user->id],
                                    'id' => 'delete-form-' . $user->id,
                                    'style' => 'display:inline',
                                ]); ?>

                                <?php echo Form::button('<i class="fa fa-trash-alt"></i>', [
                                    'type' => 'button',
                                    'class' => 'btn btn-danger btn-sm',
                                    'onclick' => "confirmDelete(event, 'delete-form-{$user->id}')",
                                ]); ?>

                                <?php echo Form::close(); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <?php echo $data->links('pagination::bootstrap-4'); ?>

    </div>

    <script>
        function confirmDelete(event, formId) {
            event.preventDefault(); // Prevent the default form submission
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASA\Desktop\winscart_dashboard\winscart\resources\views/users/index.blade.php ENDPATH**/ ?>