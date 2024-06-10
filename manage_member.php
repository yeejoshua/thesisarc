<?php 
	require_once('./config.php');
	if(isset($_GET['id'])){
	    $qry= $conn->query("SELECT * FROM user_acc where id = '{$_GET['id']}'");
	    if($qry->num_rows > 0){
	        foreach($qry->fetch_array() as $k => $v){
	            if(!is_numeric($k))
	            $$k=$v;
	        }
	    }
	}
	?>
	<div class="container-fluid">
	    <form action="" id="member-form">
	        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
	        <div class="form-group">
	            <label for="firstname" class="control-label">First Name</label>
	            <input type="text" name="first_name" class="form-control form-control-sm rounded-0" value="<?php echo isset($first_name) ? $first_name : "" ?>" required>
	        </div>
	        <div class="form-group">
	            <label for="lastname" class="control-label">Last Name</label>
	            <input type="text" name="last_name" class="form-control form-control-sm rounded-0" value="<?php echo isset($lastname) ? $lastname : "" ?>" required>
	        </div>
	        <div class="form-group">
	            <label for="contact" class="control-label">Username</label>
	            <input type="text" name="username" class="form-control form-control-sm rounded-0" value="<?php echo isset($contact) ? $contact : "" ?>" required>
	        </div>
	        
	    </form>
	</div>
	<script>
	$(function(){
	    $('#member-form').submit(function(e){
	        e.preventDefault();
	        $('.pop_msg').remove()
	        var _this = $(this)
	        var _el = $('<div>')
	            _el.addClass('pop_msg')
	        $('#uni_modal button').attr('disabled',true)
	        $('#uni_modal button[type="submit"]').text('submitting form...')
	        $.ajax({
	            url:'./Actions.php?a=save_member',
	            data: new FormData($(this)[0]),
	            cache: false,
	            contentType: false,
	            processData: false,
	            method: 'POST',
	            type: 'POST',
	            dataType: 'json',
	            error:err=>{
	                console.log(err)
	                _el.addClass('alert alert-danger')
	                _el.text("An error occurred.")
	                _this.prepend(_el)
	                _el.show('slow')
	                    $('#uni_modal button').attr('disabled',false)
	                    $('#uni_modal button[type="submit"]').text('Save')
	            },
	            success:function(resp){
	                if(resp.status == 'success'){
	                    _el.addClass('alert alert-success')
	                    $('#uni_modal').on('hide.bs.modal',function(){
	                        location.reload()
	                    })
	                    if("<?php echo isset($enrollee_id) ?>" != 1)
	                    _this.get(0).reset();
	                }else{
	                    _el.addClass('alert alert-danger')
	                }
	                _el.text(resp.msg)
 
	                _el.hide()
	                _this.prepend(_el)
	                _el.show('slow')
	                    $('#uni_modal button').attr('disabled',false)
	                    $('#uni_modal button[type="submit"]').text('Save')
	            }
	        })
	    })
	})
	</script>