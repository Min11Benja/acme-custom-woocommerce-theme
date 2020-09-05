
	jQuery(document).ready(function() {
		
		var steps = jQuery('.wapf-section.step');
		var maxSteps = steps.length;
		var $prev = jQuery('.wapf_btn_prev');
		var $next = jQuery('.wapf_btn_next');
		var $stepList = jQuery('.wapf-progress-steps');
		var $bar = jQuery('.wapf-progress-bar');
		var $cart = jQuery('div.quantity,[name="add-to-cart"]');
		var currentStep = 1;
		var $form =	jQuery('form.cart');
		
		for(var i = 1; i <= maxSteps;i++) {
			var $div = jQuery('<div>');
			if(i === 1)
				$div.addClass('active');
			$stepList.append($div);
		}
								
		var post = function(e) {
			var max = $stepList.find('div:visible').length;

			e.preventDefault();

			steps.hide();
			steps.eq(currentStep-1).show();
			
			$stepList.find('div').removeClass('active').eq(currentStep).prevAll().addClass('active');
			if(currentStep == max) {
				$stepList.find('div').addClass('active');
				$cart.show();
			} else {
				$cart.hide();
			}
			
			$bar.css('width', (currentStep-1)*(100/(max-1))+'%');
			
			$prev.hide();
			$next.hide();
			if(currentStep < max)
				$next.show();
			if(currentStep > 1)
				$prev.show();
		}
		
		var isValid = function() {
			
			var $current = steps.eq(currentStep-1);
			var $inputs = $current.find(':input');
			
			for(var i = 0;i<$inputs.length;i++) {
				if(!$inputs[i].checkValidity())
					return false;
			}
			
			return true;
		}
		
		$prev.on('click', function(e) {
			currentStep--;
			post(e);
		});
		
		$next.on('click', function(e) {
			var $current = steps.eq(currentStep-1);
			var valid = isValid();
			if(isValid()) {
				currentStep++;
				post(e);
			}
		});
		
		jQuery(document).on('wapf/dependencies', function(){
			$stepList.find('div').removeClass('wapf-hide');
			steps.each(function(i,s){
				var $s = jQuery(s);
				if($s.hasClass('wapf-hide'))
					$stepList.find('div:eq('+i+')').addClass('wapf-hide');
			});
		});
		
	});
