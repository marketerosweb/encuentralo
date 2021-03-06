<div>
    <?php
		echo form_open(base_url() . 'index.php/admin/stock/do_destroy/', array(
			'class' => 'form-horizontal',
			'method' => 'post',
			'id' => 'stock_destroy',
			'enctype' => 'multipart/form-data'
		));
	?>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-4 control-label" for="demo-hor-1"><?php echo translate('category');?></label>
                <div class="col-sm-6">
                    <?php echo $this->crud_model->select_html('category','category','category_name','add','demo-chosen-select required','','','','get_cat'); ?>
                </div>
            </div>

            <div class="form-group" id="sub" style="display:none;">
                <label class="col-sm-4 control-label" for="demo-hor-2"><?php echo translate('sub_category');?></label>
                <div class="col-sm-6" id="sub_cat">
                </div>
            </div>

            <div class="form-group" id="brn" style="display:none;">
                <label class="col-sm-4 control-label" for="demo-hor-3"><?php echo translate('product');?></label>
                <div class="col-sm-6" id="product">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label" for="demo-hor-4"><?php echo translate('quantity');?></label>
                <div class="col-sm-6">
                    <input type="number" name="quantity" id="quantity" class="form-control totals required">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('monetary_loss');?></label>
                <div class="col-sm-6">
                    <input type="number" name="total" class="form-control totals required">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label" for="demo-hor-6"><?php echo translate('reason_note');?></label>
                <div class="col-sm-6">
                    <textarea name="reason_note" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>
	</form>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width:'100%'});
    });

    function other(){
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width:'100%'});
    }
    function get_cat(id){
        $('#brand').html('');
        $('#sub').hide('slow');
        ajax_load(base_url+'index.php/admin/product/sub_by_cat/'+id,'sub_cat','other');
        $('#sub').show('slow');
        $('#brn').hide('slow');
    }

    function get_sub_res(id){
        $('#brn').hide('slow');
        $('#additional_fields').hide('slow');
        ajax_load(base_url+'index.php/admin/product/product_by_sub/'+id,'product','other');
        $('#brn').show('slow');
        $('#additional_fields').show('slow');
    }
    
    function get_pro_res(id){

    }

    $(".totals").change(function(){
        total();
    });


	$(document).ready(function() {
		$("form").submit(function(e){
			return false;
		});
	});
</script>

