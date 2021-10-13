<script type="text/javascript">
	this.dataTableInitial=function(){
		let _this=this
		this.apiRequest=function(page,query){
				let xhr=new XMLHttpRequest()
					xhr.open('GET','{{$url}}?page='+page+'&query='+query+'',true)
					xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
					xhr.onload = function() {
						if (xhr.status === 200) {  
					  		//console.log(xhr.response)
					  		document.querySelector('#table-data').innerHTML=xhr.response
					    }
					    else{
					       	console.log(`Request failed, this is the response: ${xhr.responseText}`)
					    }
				 	};
				xhr.send()
		},
		this.dataTableEventListener=function(selector){
			let page,
				query,
				hiddenPage=document.querySelector('#hidden_page')
				search=document.querySelector('#dataTableSearch')
				search.addEventListener('keyup',function(event){
					page=1
					query=this.value
					_this.apiRequest(page,query)
				})
			Array.from(selector).forEach(function(element,index){
				document.addEventListener('click',function(event){
					if(event.target.matches('a[class="paginate-item"]')){
						event.preventDefault()
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