

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
        Quality Butter DEO        <small>Edit Quality Butter DEO</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/trx_qbd'); ?>">Quality Butter DEO</a></li>
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
                            <h3 class="widget-user-username">Quality Butter DEO</h3>
                            <h5 class="widget-user-desc">Edit Quality Butter DEO</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/trx_qbd/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_trx_qbd', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_trx_qbd', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="date" class="col-sm-2 control-label">Date 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="date"  placeholder="Date" id="date" value="<?= set_value('trx_qbd_date_name', $trx_qbd->date); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                                                 
                                                <div class="form-group ">
                            <label for="deo_ffa" class="col-sm-2 control-label">Deo Ffa 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="deo_ffa" id="deo_ffa" placeholder="Deo Ffa" value="<?= set_value('deo_ffa', $trx_qbd->deo_ffa); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="deo_bci" class="col-sm-2 control-label">Deo Bci 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="deo_bci" id="deo_bci" placeholder="Deo Bci" value="<?= set_value('deo_bci', $trx_qbd->deo_bci); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="deo_ai" class="col-sm-2 control-label">Deo Ai 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="deo_ai" id="deo_ai" placeholder="Deo Ai" value="<?= set_value('deo_ai', $trx_qbd->deo_ai); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="deo_red" class="col-sm-2 control-label">Deo Red 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="deo_red" id="deo_red" placeholder="Deo Red" value="<?= set_value('deo_red', $trx_qbd->deo_red); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="deo_yellow" class="col-sm-2 control-label">Deo Yellow 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="deo_yellow" id="deo_yellow" placeholder="Deo Yellow" value="<?= set_value('deo_yellow', $trx_qbd->deo_yellow); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="deo_blue" class="col-sm-2 control-label">Deo Blue 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="deo_blue" id="deo_blue" placeholder="Deo Blue" value="<?= set_value('deo_blue', $trx_qbd->deo_blue); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="deo_neutral" class="col-sm-2 control-label">Deo Neutral 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="deo_neutral" id="deo_neutral" placeholder="Deo Neutral" value="<?= set_value('deo_neutral', $trx_qbd->deo_neutral); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="raw_ffa" class="col-sm-2 control-label">Raw Ffa 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="raw_ffa" id="raw_ffa" placeholder="Raw Ffa" value="<?= set_value('raw_ffa', $trx_qbd->raw_ffa); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="raw_bci" class="col-sm-2 control-label">Raw Bci 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="raw_bci" id="raw_bci" placeholder="Raw Bci" value="<?= set_value('raw_bci', $trx_qbd->raw_bci); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="raw_ai" class="col-sm-2 control-label">Raw Ai 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="raw_ai" id="raw_ai" placeholder="Raw Ai" value="<?= set_value('raw_ai', $trx_qbd->raw_ai); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="raw_red" class="col-sm-2 control-label">Raw Red 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="raw_red" id="raw_red" placeholder="Raw Red" value="<?= set_value('raw_red', $trx_qbd->raw_red); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="raw_yellow" class="col-sm-2 control-label">Raw Yellow 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="raw_yellow" id="raw_yellow" placeholder="Raw Yellow" value="<?= set_value('raw_yellow', $trx_qbd->raw_yellow); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="raw_blue" class="col-sm-2 control-label">Raw Blue 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="raw_blue" id="raw_blue" placeholder="Raw Blue" value="<?= set_value('raw_blue', $trx_qbd->raw_blue); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="raw_neutral" class="col-sm-2 control-label">Raw Neutral 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="raw_neutral" id="raw_neutral" placeholder="Raw Neutral" value="<?= set_value('raw_neutral', $trx_qbd->raw_neutral); ?>">
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
              window.location.href = BASE_URL + 'administrator/trx_qbd';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_trx_qbd = $('#form_trx_qbd');
        var data_post = form_trx_qbd.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_trx_qbd.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#trx_qbd_image_galery').find('li').attr('qq-file-id');
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