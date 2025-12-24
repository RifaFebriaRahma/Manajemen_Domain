<?php
use kartik\dialog\Dialog;
use app\widgets\Alert;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header" style="margin-bottom: 0px;margin-top: 0px;padding-bottom: 0px;">
        <div class="container-fluid">
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?= Dialog::widget(); ?>
            <?= Alert::widget(); ?>
            <?= $content ?>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
