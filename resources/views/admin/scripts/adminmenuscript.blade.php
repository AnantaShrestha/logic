<script>
	this.adminmenuInitial=function(){
		let _this=this
		this.sortingEvent=function(){
			let selector=$('.menu-sort-save')
			selector.on('click',function(){
				let _this=$(this)
				let serialize = $('#menu-sort').nestable('serialize');
				let menu = JSON.stringify(serialize);
				let icon = _this.find('i')
				$.ajax({
					url:'{{route("menu.sort")}}',
					type: 'POST',
					dataType: 'json',
			        data: {
			            _token: '{{ csrf_token() }}',
			            menu: menu
			        },
			        beforeSend:function(){
			        	icon.removeClass('fa-save')
			        	icon.addClass('fa-spinner')
			        	icon.addClass('fa-spin')
			        },
			        success:function(response){
			        	setTimeout(function(){
			        		icon.removeClass('fa-spinner')
			        		icon.removeClass('fa-spin')
			        		icon.addClass('fa-save')
			        		if(response.error == 0){
			        			swal(
			        				'Success',
			        				response.message,
			        				'success'
			        				)
			        		}else{
			        			swal(
			        				'Warning',
			        				response.message,
			        				'warning'
			        				)
			        		}
			        	},2000)
			        },error:function(response){
			        	setTimeout(function(){
			        		icon.removeClass('fa-spinner')
			        		icon.removeClass('fa-spin')
			        		icon.addClass('fa-save')
			        		swal(
			        				'Error',
			        				'Permission Denied',
			        				'error'
			        			)
			        	},2000)
			        }
				})
			})
		},
		this.removeEvent=function(){
			let selector=$('.remove_menu')
			selector.on('click',function(e){
				e.preventDefault()
				let _this=$(this)
				let id = _this.data('id');
				let url = _this.attr('href')
				swal({
					title: "Delete?",
					text: "Please ensure and then confirm!",
					type: "warning",
					showCancelButton: !0,
					confirmButtonText: "Yes, delete it!",
					cancelButtonText: "No, cancel!",
					reverseButtons: !0
				}).then(function(e){
					if(e.value === true){
						$.ajax({
							url:url,
							type:'get',
							data:{
								id:id
							},
							success:function(response){	
								if (response.type === 'success') {
									_this.parent().parent().parent().remove()
									swal("Done!", response.message, "success")
								} else {
									swal("Error!",'Something went wrong', "error");
								}
							}
						})
					}else{
						e.dismiss;
					}
				},function(dismiss){
					return false
				})
			})
		}
		this.init=function(){
			$(document).ready(function(){
				$('.icp-auto').iconpicker();
				$('#menu-sort').nestable();
				_this.sortingEvent()
				_this.removeEvent()
			})
		}
	}
	let adminmenuObj=new adminmenuInitial()
		adminmenuObj.init()
</script>