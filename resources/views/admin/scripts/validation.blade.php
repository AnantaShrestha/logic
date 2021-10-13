<script>
	this.validationInitial=function(){
		let _this=this
		this.createNewElement=function(element){
			let message='This field is required'
			element.classList.add('error-validation')
			element.innerHTML = '<i class="fa fa-times-circle-o"></i>&nbsp;'+message
			return element
		},
		this.helperFunction=function(selector,event){
			selector.forEach(function(target,key){
				let input = target.querySelector('input'),
					required = input.getAttribute('data-required'),
					value=input.value
					validationErrorMessage=target.querySelector('.error-validation')
					createElement=document.createElement('p')
					if(validationErrorMessage){
						validationErrorMessage.remove()
					}
					if(required && value== ''){
						event.preventDefault()
						target.append(_this.createNewElement(createElement))
					}
			})
		},
		this.validationeventListener=function(selector){
			let formGroup=selector.querySelectorAll('.form-group')
			selector.addEventListener('submit',function(event){
				_this.helperFunction(formGroup,event)
			})
		},
		this.init=function(){
			let form=document.querySelector('.form-data')
			if(form){
				_this.validationeventListener(form)
			}
		}
	}
	let validationObj = new validationInitial()
	    validationObj.init()
</script>