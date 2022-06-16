
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Quality Butter DEO      <small><?= cclang('detail', ['Quality Butter DEO']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/trx_qbd'); ?>">Quality Butter DEO</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                    
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Quality Butter DEO</h3>
                     <h5 class="widget-user-desc">Detail Quality Butter DEO</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_trx_qbd" id="form_trx_qbd" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->id); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Date </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->date); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deo Ffa </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->deo_ffa); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deo Bci </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->deo_bci); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deo Ai </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->deo_ai); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deo Red </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->deo_red); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deo Yellow </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->deo_yellow); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deo Blue </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->deo_blue); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Deo Neutral </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->deo_neutral); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Raw Ffa </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->raw_ffa); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Raw Bci </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->raw_bci); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Raw Ai </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->raw_ai); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Raw Red </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->raw_red); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Raw Yellow </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->raw_yellow); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Raw Blue </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->raw_blue); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Raw Neutral </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->raw_neutral); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">User Id </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->user_id); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Created At </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->created_at); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Updated At </label>

                        <div class="col-sm-8">
                           <?= _ent($trx_qbd->updated_at); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('trx_qbd_update', function() use ($trx_qbd){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit trx_qbd (Ctrl+e)" href="<?= site_url('administrator/trx_qbd/edit/'.$trx_qbd->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Trx Qbd']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/trx_qbd/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Trx Qbd']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->
