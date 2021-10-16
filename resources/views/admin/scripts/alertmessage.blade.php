<script>
	@if(Session::has('message') && Session::get('type') == 'success')
		swal(
			'Success',
			'{{Session::get("message")}}',
			'success'
		)
	@endif

	this.deleteActionInitial=function(){
		let _this=this
		this.apiRequest=function(id,url,target){
			/*$.ajax({
				url:url,
				type:'get',
				data:{
					id:id
				},
				success:function(response){

				}
			})*/
			swal({
	            title: "Delete?",
	            text: "Please ensure and then confirm!",
	            type: "warning",
	            showCancelButton: !0,
	            confirmButtonText: "Yes, delete it!",
	            cancelButtonText: "No, cancel!",
	            reverseButtons: !0
        	}).then(function (e) {
        		if(e.value===true){
        			$.ajax({
        				url:url,
        				type:'get',
        				data:{
        					id:id
        				},
        				success:function(response){	
	                        if (response.type === 'success') {
	                        	target.parent().parent().remove()
	                            swal("Done!", response.message, "success")
	                        } else {
	                            swal("Error!",'Something went wrong', "error");
	                        }
        				}
        			})
        		}else{
        			 e.dismiss;
        		}
        	},function (dismiss) {
            	return false;
        	})

		},
		this.deleteEventListener=function(){
				$(document).on('click','.deleteAction',function(event){
					event.preventDefault()
					let url=$(this).attr('href'),
						id=url.split('/').pop()
					_this.apiRequest(id,url,$(this))
				})

		},
		this.init=function(){
			_this.deleteEventListener()
		}
	}
	let deleteActionObj=new deleteActionInitial()
		deleteActionObj.init()
</script>