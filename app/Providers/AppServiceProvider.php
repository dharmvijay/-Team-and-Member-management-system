<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->register(RepositoryServiceProvider::class);
		 config([
            'preload.styles' => [
                asset('packages/GionniValeriana/adminlte/bootstrap/css/bootstrap.min.css'),
                asset('packages/GionniValeriana/adminlte/plugins/font-awesome/font-awesome.min.css'),
                asset('packages/GionniValeriana/adminlte/plugins/ionicons/ionicons.min.css'),
                asset('packages/GionniValeriana/adminlte/dist/css/AdminLTE.min.css'),
                asset('packages/GionniValeriana/adminlte/dist/css/skins/_all-skins.min.css'),
                asset('packages/GionniValeriana/adminlte/plugins/iCheck/flat/blue.css'),
                asset('packages/GionniValeriana/adminlte/plugins/morris/morris.css'),
                asset('packages/GionniValeriana/adminlte/plugins/datatables/dataTables.bootstrap.css'),
                asset('packages/GionniValeriana/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css'),
                asset('packages/GionniValeriana/adminlte/plugins/datepicker/datepicker3.css'),
                asset('packages/GionniValeriana/adminlte/plugins/daterangepicker/daterangepicker-bs3.css'),
                asset('packages/GionniValeriana/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'),
            ],
            'preload.scripts' => [
                asset('packages/GionniValeriana/adminlte/plugins/jQuery/jQuery-2.1.3.min.js'),
                asset('packages/GionniValeriana/adminlte/bootstrap/js/bootstrap.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/input-mask/jquery.inputmask.js'),
                asset('packages/GionniValeriana/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js'),
                asset('packages/GionniValeriana/adminlte/plugins/input-mask/jquery.inputmask.extensions.js'),
                asset('packages/GionniValeriana/adminlte/plugins/moment/moment.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/daterangepicker/daterangepicker.js'),
                asset('packages/GionniValeriana/adminlte/plugins/colorpicker/bootstrap-colorpicker.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/timepicker/bootstrap-timepicker.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/datatables/jquery.dataTables.js'),
                asset('packages/GionniValeriana/adminlte/plugins/datatables/dataTables.bootstrap.js'),
                asset('packages/GionniValeriana/adminlte/plugins/slimScroll/jquery.slimscroll.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/iCheck/icheck.min.js'),
                asset('packages/GionniValeriana/adminlte/plugins/fastclick/fastclick.min.js'),
            ],
        ]);
    }
}
