

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
        Safety Observation        <small>Edit Safety Observation</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/so'); ?>">Safety Observation</a></li>
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
                            <h3 class="widget-user-username">Safety Observation</h3>
                            <h5 class="widget-user-desc">Edit Safety Observation</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/so/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_so', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_so', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="date" class="col-sm-2 control-label">Date 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datetimepicker" name="date"  placeholder="Date" id="date" value="<?= set_value('date', $so->date); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="lab" class="col-sm-2 control-label">Lab 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->lab == "Not ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="lab" value="Not ok"> Not ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->lab == "Ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="lab" value="Ok"> Ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->lab == "Close" ? "checked" : ""; ?> type="radio" class="flat-red" name="lab" value="Close"> Close                                    </label>
                                    </div>
                                    </select>
                                <div class="row-fluid clear-both">
                                <small class="info help-block">
                                </small>
                                </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="cw" class="col-sm-2 control-label">CW 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->cw == "Not ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="cw" value="Not ok"> Not ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->cw == "Ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="cw" value="Ok"> Ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->cw == "Close" ? "checked" : ""; ?> type="radio" class="flat-red" name="cw" value="Close"> Close                                    </label>
                                    </div>
                                    </select>
                                <div class="row-fluid clear-both">
                                <small class="info help-block">
                                </small>
                                </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="hs" class="col-sm-2 control-label">HS 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->hs == "Not ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="hs" value="Not ok"> Not ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->hs == "Ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="hs" value="Ok"> Ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->hs == "Close" ? "checked" : ""; ?> type="radio" class="flat-red" name="hs" value="Close"> Close                                    </label>
                                    </div>
                                    </select>
                                <div class="row-fluid clear-both">
                                <small class="info help-block">
                                </small>
                                </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="fg" class="col-sm-2 control-label">FG 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->fg == "Not ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="fg" value="Not ok"> Not ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->fg == "Ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="fg" value="Ok"> Ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->fg == "Close" ? "checked" : ""; ?> type="radio" class="flat-red" name="fg" value="Close"> Close                                    </label>
                                    </div>
                                    </select>
                                <div class="row-fluid clear-both">
                                <small class="info help-block">
                                </small>
                                </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="pdi" class="col-sm-2 control-label">PDI 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->pdi == "Not ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="pdi" value="Not ok"> Not ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->pdi == "Ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="pdi" value="Ok"> Ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->pdi == "Close" ? "checked" : ""; ?> type="radio" class="flat-red" name="pdi" value="Close"> Close                                    </label>
                                    </div>
                                    </select>
                                <div class="row-fluid clear-both">
                                <small class="info help-block">
                                </small>
                                </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="eng" class="col-sm-2 control-label">ENG 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->eng == "Not ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="eng" value="Not ok"> Not ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->eng == "Ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="eng" value="Ok"> Ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->eng == "Close" ? "checked" : ""; ?> type="radio" class="flat-red" name="eng" value="Close"> Close                                    </label>
                                    </div>
                                    </select>
                                <div class="row-fluid clear-both">
                                <small class="info help-block">
                                </small>
                                </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="hrd" class="col-sm-2 control-label">HRD 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->hrd == "Not ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="hrd" value="Not ok"> Not ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->hrd == "Ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="hrd" value="Ok"> Ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->hrd == "Close" ? "checked" : ""; ?> type="radio" class="flat-red" name="hrd" value="Close"> Close                                    </label>
                                    </div>
                                    </select>
                                <div class="row-fluid clear-both">
                                <small class="info help-block">
                                </small>
                                </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="whs" class="col-sm-2 control-label">WHS 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->whs == "Not ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="whs" value="Not ok"> Not ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->whs == "Ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="whs" value="Ok"> Ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->whs == "Close" ? "checked" : ""; ?> type="radio" class="flat-red" name="whs" value="Close"> Close                                    </label>
                                    </div>
                                    </select>
                                <div class="row-fluid clear-both">
                                <small class="info help-block">
                                </small>
                                </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="prj" class="col-sm-2 control-label">PRJ 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->prj == "Not ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="prj" value="Not ok"> Not ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->prj == "Ok" ? "checked" : ""; ?> type="radio" class="flat-red" name="prj" value="Ok"> Ok                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?= $so->prj == "Close" ? "checked" : ""; ?> type="radio" class="flat-red" name="prj" value="Close"> Close                                    </label>
                                    </div>
                                    </select>
                                <div class="row-fluid clear-both">
                                <small class="info help-block">
                                </small>
                                </div>
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
              window.location.href = BASE_URL + 'administrator/so';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_so = $('#form_so');
        var data_post = form_so.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_so.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#so_image_galery').find('li').attr('qq-file-id');
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