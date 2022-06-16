

<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Patrol 5M        <small>Edit Patrol 5M</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/patrol_5m'); ?>">Patrol 5M</a></li>
        <li class="active">Edit</li>
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
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Patrol 5M</h3>
                            <h5 class="widget-user-desc">Edit Patrol 5M</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/patrol_5m/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_patrol_5m', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_patrol_5m', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="date" class="col-sm-2 control-label">Date 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datetimepicker" name="date"  placeholder="Date" id="date" value="<?= set_value('date', $patrol_5m->date); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="gerbang_masuk" class="col-sm-2 control-label">Gerbang Masuk 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="gerbang_masuk" id="gerbang_masuk" placeholder="Gerbang Masuk" value="<?= set_value('gerbang_masuk', $patrol_5m->gerbang_masuk); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="office" class="col-sm-2 control-label">Office 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="office" id="office" placeholder="Office" value="<?= set_value('office', $patrol_5m->office); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="fasilitas_umum" class="col-sm-2 control-label">Fasilitas Umum 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="fasilitas_umum" id="fasilitas_umum" placeholder="Fasilitas Umum" value="<?= set_value('fasilitas_umum', $patrol_5m->fasilitas_umum); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="produksi_upstream" class="col-sm-2 control-label">Produksi Upstream 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="produksi_upstream" id="produksi_upstream" placeholder="Produksi Upstream" value="<?= set_value('produksi_upstream', $patrol_5m->produksi_upstream); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="produksi_downstream" class="col-sm-2 control-label">Produksi Downstream 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="produksi_downstream" id="produksi_downstream" placeholder="Produksi Downstream" value="<?= set_value('produksi_downstream', $patrol_5m->produksi_downstream); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="laboraturium" class="col-sm-2 control-label">Laboraturium 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="laboraturium" id="laboraturium" placeholder="Laboraturium" value="<?= set_value('laboraturium', $patrol_5m->laboraturium); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="gudang" class="col-sm-2 control-label">Gudang 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="gudang" id="gudang" placeholder="Gudang" value="<?= set_value('gudang', $patrol_5m->gudang); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="utility" class="col-sm-2 control-label">Utility 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="utility" id="utility" placeholder="Utility" value="<?= set_value('utility', $patrol_5m->utility); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                        
                                                 <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                                                 <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
       
      
             
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/patrol_5m';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_patrol_5m = $('#form_patrol_5m');
        var data_post = form_patrol_5m.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_patrol_5m.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#patrol_5m_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
          } else {
            if (res.errors) {
               parseErrorField(res.errors);
            }
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
       
       

      async function chain(){
      }
       
      chain();


    
    
    }); /*end doc ready*/
</script>