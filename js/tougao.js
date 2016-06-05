+(function($){
	/* tougao
	 * ====================================================
	*/
	var tougao = {
		init: function(){
			var that = this

			that._title = $('#tougao-title')
			that._url = $('#tougao-url')
			that._content = $('#tougao-content')
			//that._content = $('tougao-content_ifr')
			that._submit = $('#tougao_submit')
			that._cate = $('#tougao_categorg')

			that._check = [, 0, 0]

			$('#tougao').on('shown', function(){
				that._title.focus()
			})

			that._title.blur(function(){
				that.check_title( $(this) )
			})
			
			that._url.blur(function(){
				that.check_url( $(this) )
			})
			
			that._content.blur(function(){
				that.check_content( $(this) )
			})

			that._submit.bind('click', function(){
				var _tip = that._submit.prev()
				if( !that.is_check() ){
					that.check_title( that._title )
					that.check_url( that._url )
					that.check_content( that._content )
					//return true
				}
				_tip.show().html('内容正在提交中，请稍候！')
				$.ajax({
				    type: 'POST',
				    url: _deel.url+'/ajax/tougao.php',
				    data: 'title='+$.trim(that._title.val())+'&url='+$.trim(that._url.val())+'&category='+$.trim(that._cate.val())+'&content='+$.trim(that._content.val()),
				    success: function(data){
				    	if(data === 'off'){
				   			_tip.show().html('管理员关闭了投稿，请联系管理员！')
				   			setTimeout(function(){
				   				_tip.fadeOut(1000)
				   			}, 5000)
				        }
				   		if(data === 'sofast'){
				   			_tip.show().html('服务器忙，请稍候重试！')
				   			setTimeout(function(){
				   				_tip.fadeOut(1000)
				   			}, 5000)
				        }
				        if(data === 'success'){
				            _tip.show().addClass('text-success').html('投稿成功，审核通过后将正式发布！')
				            setTimeout(function(){
				   				$('#tougao').modal('hide')
				   				that._title.val('')
			        			that._url.val('')
			        			that._content.val('')
			        			_tip.hide()
			        			that._title.focus()
				   			}, 4000)
				        }
				        if(data === 'fail'){
				        	_tip.show().html('投稿失败，请稍候重试！')
				        	setTimeout(function(){
				        		_tip.fadeOut(1000)
				        	}, 5000)
				        }
				        if(data === 'title'){
				        	_tip.show().html('标题不能为空，且不能大于40个字符！')
				        }
				        if(data === 'url'){
				        	_tip.show().html('网址不能大于100个字符！')
				        }
				        if(data === 'content'){
				        	_tip.show().html('内容不能为空，且介于20-5000个字符之间！')
				        }
				    }
				});
			})
		},
		is_check: function(){
			return this._check.join('') === '111' ? true : false
		},
		check_title: function(target){
			if(!target.val() || target.val().length < 3){
				this.tip(target,'标题太短，不得少于3字！', 0);
				return
			}
			else if(target.val().length > 30){
				this.tip(target,'标题太长，不得超过30字！', 0);
				return
			}
			else{
				this.tip_hide(target, 0)
			}
		},
		check_url: function(target){
			if(target.val() && !target.val().match(/^(http|https):\/\/([a-z0-9-]{1,}.)?[a-z0-9-]{2,}.([a-z0-9-]{1,}.)?[a-z0-9]{2,}/)){
				this.tip(target,'格式错误！', 1)
				return
			}
			else{
				this.tip_hide(target, 1)
			}
		},
		check_content: function(target){
			if(!target.val() || target.val().length < 20){
				//this.tip(target,'内容太短，不得少于20字', 2)
				this.tip_content(target,'内容太短，不得少于20字', 2)
				return
			}
			else if(target.val().length > 5000){
				//this.tip(target,'内容太长，不得超过5000字', 2)
				this.tip_content(target,'内容太长，不得超过5000字', 2)
				return
			}
			else{
				//this.tip_hide(target, 2)
				this.tip_content_hide(target, 2)
			}
		},
		tip: function(id, txt, c){
			id.next('.text-error').html(txt).slideDown(300)
			this._check[c] = 0
		},
		tip_content:function(id, txt, c){
			$('#tougao-content-error').html(txt).slideDown(300)
			this._check[c] = 0
		},
		tip_content_hide:function(id, txt, c){
			$('#tougao-content-error').html(txt).slideUp(300)
			this._check[c] = 1
		},
		tip_hide: function(id, c){
			id.next('.text-error').slideUp(300)
			this._check[c] = 1
		}
	}

	tougao.init()

})(window.jQuery);