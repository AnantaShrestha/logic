@php
$url=str_replace('index','pagination',request()->url());
@endphp
<script type="text/javascript">
	this.dataTableInitial=function(){
		let _this=this
		this.apiRequest=function(page,query){
				let xhr=new XMLHttpRequest()
					xhr.onreadystatechange = function() {
						document.querySelector('.ajax-loader').style.display='flex';
						setTimeout(function(){
        					document.querySelector('.ajax-loader').style.display='none';
	                    },1500)
						setTimeout(function(){
							if (xhr.status === 200 && xhr.readyState === 4) {  
					  			document.querySelector('#table-data').innerHTML=xhr.response
					  		}
						  	else{
						  		swal("Error!",'Something went wrong', "error");
						  	}
						},1550)
				 	};
				 	xhr.open('GET','{{$url}}?page='+page+'&query='+query+'',true)
					xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
					xhr.send()
		},
		this.dataTableEventListener=function(selector){
			let page,
				query,
				hiddenPage=document.querySelector('#hidden_page')
				search=document.querySelector('#dataTableSearch')
				count=0
				search.addEventListener('keyup',function(event){
					page=1
					query=this.value
					_this.apiRequest(page,query)
				})
			Array.from(selector).forEach(function(element,index){
				document.addEventListener('click',function(event){
					if(event.target.matches('a[class="paginate-item"]') && index==0){
						event.preventDefault()
						console.log(count)
						let url=event.target.getAttribute('href')
						if(url){
							page=url.split('page=')[1]
							_this.apiRequest(page,query='')
						}
					}

					
				})
			})
		},
		this.init=function(){
			let selector=document.querySelectorAll('.pagination li a.paginate-item')
			if(selector){
				_this.dataTableEventListener(selector)
			}
		}
	}
	let dataTableObj=new dataTableInitial()
		dataTableObj.init()
</script>