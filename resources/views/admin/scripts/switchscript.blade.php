<script>
	this.switchInitial=function(){
		let _this=this
		this.switchApiRequest=function(url,id,activate){
			fetch(url, {
				headers: {
					"Content-Type": "application/json",
					"Accept": "application/json, text-plain, */*",
					"X-Requested-With": "XMLHttpRequest",
					"X-CSRF-TOKEN": "{{csrf_token()}}"
				},
				method: 'post',
				body: JSON.stringify({
					id: id,
					activate: activate
				})
			}).then((response) => {
				document.querySelector('.ajax-loader').style.display='flex';
				if (response.ok) {
					return response.json();
				} else {
					return Promise.reject(response);
				}
			}).then((data) => {
				setTimeout(function(){
					document.querySelector('.ajax-loader').style.display='none';
				},1500)
				setTimeout(function(){
					swal('Success',data.message,'success')
				},1550)
			}).catch(function(error) {
				setTimeout(function(){
					document.querySelector('.ajax-loader').style.display='none';
				},1500)
				setTimeout(function(){
					swal('Error','Something were wrong','error')
				},1550)
			});
		},
		this.switchEventListener=function(){
			let selector=document.querySelector('.switch-action');
			let parent=document.querySelector('.switch-button')
				selector.addEventListener('click',function(event){
					let url=this.getAttribute('data-url')
					let id=this.getAttribute('data-id')
					let activate= (event.target.checked) ? 1 : 0
					if(event.target.checked){
						parent.classList.add('active')
					}else{
						parent.classList.remove('active')
					}
					_this.switchApiRequest(url,id,activate);
				})
		},
		this.init=function(){
			_this.switchEventListener()
		}
	}
	let switchObj=new switchInitial()
		switchObj.init()
</script>