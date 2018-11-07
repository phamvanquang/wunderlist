$(document).ready(function(){
	$('.tab-more').click(function(){
		$('.actionBar-top-sort').hide();
		$('.actionBar-top-more').slideToggle(200);
	});
	$('.tab-sort').click(function(){
		$('.actionBar-top-more').hide();
		$('.actionBar-top-sort').slideToggle(200);
	});

	$("body").on("click",".Task-list",function(){
		var Task_list = $('.Task-list');
		var Task_item_select = $('.Task-item-select');
			for(var i = 0; i < Task_list.length; i++){
				$(Task_list[i]).css("background-color","#fff");
			}
			for(var i = 0; i < Task_item_select.length; i++){
				$(Task_item_select[i]).css("background-color","#fff");
			}
			var change = $(this);
				console.log(change);
			$(this).css("background-color","#e1f2fe");
			var task_id = $(this).find(".idtask").val();
			$('.taskid').val(task_id);
			//console.log($('.taskid').val());
			$.ajax({
				url:"tasknamedetail.php",
				type:"post",
				dataType:"text",
				data:{
					task_id:task_id
				},
				success:function(data){
					
					$('.nametask').val(data);
				}
			})
			$.ajax({
				url:"showtaskdetail.php",
				type:"post",
				dataType:"json",
				data:{
					task_id:task_id
				},
				success:function(data){
					//console.log(data.name);
				
					if(typeof data.date == "object"){
						$('#datepicker').val("Set due date");
					}else{
						$('#datepicker').val(data.date);
					}
					if(typeof data.remind == "object"){
						$('#datetimepicker').val("Remind me");
					}
					else{
						$('#datetimepicker').val(data.remind);
					}
		
					$('.note').val(data.note);
				}
			})
			$.ajax({
				url:"showcomment.php",
				type:"post",
				dataType:"json",
				data:{
					task_id:task_id,
				},
				success:function(data){
					var html="";
					data.forEach(function(result){
						html += `<li class="comment-item">
						<div class="section-icon picture">
							<img src="p.png">
						</div>
						<div class="section-content">
							<span class="comment-author">
								Pham Quang
							</span>
							<span class="comment-time">
								`+result.time+`
							</span>
							<a href="#" class="section-delete">
								<i class="fas fa-backspace"></i>
							</a>
							<div class="comment-text">`+result.content+`</div>
						</div>
					</li>`;
					})
					$('.comment-list').html(html);
				}
			})
			$('.nametask').off('keyup').keyup(function(){
				var task_id = $('.taskid').val();
				var task_name = $('.nametask').val();
				console.log(change);
				$.ajax({
					url:"changetaskname.php",
					type:"post",
					data:{
						task_id:task_id,
						task_name:task_name
					},
					success:function(data){
						//console.log(change);	
						change.find('span').html(data);
					}
				})
			})
		
	})
	$('body').on("click",".Task-item-select",function(event){
		var Task_item_select = $('.Task-item-select');
		var Task_list = $('.Task-list');
		
			for(var i = 0; i < Task_item_select.length; i++){
				$(Task_item_select[i]).css("background-color","#fff");
			}
			for(var i = 0; i < Task_list.length; i++){
				$(Task_list[i]).css("background-color","#fff");
			}
			$(event.target).css("background-color","#e1f2fe");
	})
	$('body').on("dblclick",".Task-list",function(event){
		//alert(event.target.parent());
		//if(event.target.className == "Task-list item-list"){
			$('#detail').show(100);
			//var text_list = $(event.target).find('span').text();
			//$('.text-view input').val(text_list);
			
			//$('.list-item').click(function(e){
				//if(e.target.className == "Task-list item-list"){
					//var text_list = $(e.target).find('span').text();
					//$('.text-view input').val(text_list);
				//}
			//})
		//}
	});
	/*
	$('.Task-item').dblclick(function(event){
		if(event.target.className == "Task-item-select item-list"){
			$('#detail').show(100);
			var text_list = $(event.target).find('.Task-item-title').text();
			$('.text-view input').val(text_list);
			
			$('.list-item').click(function(e){
				if(e.target.className == "Task-list item-list"){
					var text_list = $(e.target).find('.Task-item-title').text();
					$('.text-view input').val(text_list);
				}
			})
		}
	});*/
	$('.forward').click(function(){
		$('#detail').hide(100);
	});
	$('.user-avatar').click(function(){
		$('.content').toggle();
	})
	$('.comment').click(function(){
		$('.popover').toggle();
	})
	$('#input-add').keypress(function(event){
		if(event.which == 13){
			var href = window.location.href;
			var n = href.indexOf("=");
			var lis_id = href.substring(n+1,);
			var name = $('#input-add').val();
			var checks = 1;
			$.ajax({
				url:"addtask.php",
				type:"post",
				dataType:"text",
				data:{
					name:name,
					checks:checks,
					lis_id:lis_id
				},
				success:function(data){
				 task_id = data;
				 var text_add = $('#input-add').val();
				text_add = text_add.trim();
				if(text_add != ""){
				
				$('.list-item').append(`<ul class="Task-list item-list">
										<li class="Task-list-select">
										<input type="text" class="idtask" value="`+task_id+`" style="display:none">
											<a href="#" class="select-item-icon">
												<i class="far fa-square icon"></i>
											</a>
											<span>`+text_add+`</span>
											<i class="far fa-star"></i>
										</li>
									</ul>`);
				$('#input-add').val("");	
			}
				}
			})
		}
	})
	$('.list-item').click(function(event){
		if(event.target.className == "far fa-square icon"){
			task_id = $(event.target).parents('ul').find('.idtask').val();
			console.log(task_id);
			$.ajax({
				url:"hidetask-ajax.php",
				type:"post",
				data:{
					task_id:task_id
				}
			})
			$(event.target).parents('ul').slideUp(500);
			var parents_span = $(event.target).parents('ul');
			var text_span = $(parents_span).find('span').text();
			$('.Task-item').append(`<ul class="Task-item-select item-list">
			<input type="text" class="idtask" value="`+task_id+`" style="display:none">
										<li>
											<i class="far fa-check-square icon-item"></i>
											<span class="Task-item-title">`+text_span+`</span>
											<span class="Task-item-time">Time post</span>
											<i class="far fa-star"></i>
										</li>
									</ul>`);
		}
	})
	$('.Task-item').click(function(){
		if(event.target.className == "far fa-check-square icon-item"){
			task_id = $(event.target).parents('ul').find('.idtask').val();
			console.log(task_id);
			$.ajax({
				url:"showtask-ajax.php",
				type:"post",
				data:{
					task_id:task_id
				}
			})
			$(event.target).parents('ul').slideUp(500);
			var parents_span_item = $(event.target).parents('ul');
			var text_span_item = $(parents_span_item).find('.Task-item-title').text();
			$('.list-item').append(`<ul class="Task-list item-list">
										<li class="Task-list-select">
										<input type="text" class="idtask" value="`+task_id+`" style="display:none">
											<a class="select-item-icon">
												<i class="far fa-square icon"></i>
											</a>
											<span>`+text_span_item	+`</span>
											<i class="far fa-star"></i>
										</li>
									</ul>`);
		}
	})
	$('.Task-list').on("contextmenu",function(event){
		$('.context-menu').css("display","block");
		var x = event.clientX + "px";
		var y = event.clientY + "px";
		$('.context-menu').css({marginTop: y, marginLeft: x});
		event.preventDefault();
		//a = $(event.target);
		console.log($(this));
		a = $(this);
		//var id = a.find(".task-item").attr("href");
		//var n = id.lastIndexOf("=");
		//var id = id.substring(n+1,);
		var id = a.find(".idtask").val();
		console.log(id);
		//$('.blue-1 a').attr("href","deletetask.php?task="+id);
		var text_context = $(event.target).find('span').text();
				$('.custom-text').find('h3').text(text_context + ' will be deleted forever.');
		$('.del').click(function(){
		$('#confirmation-main').css("display","block");
				$('.context-menu').css("display","none");
				$('.cancel').click(function(){
					$('#confirmation-main').css("display","none");
				})
				$('.blue').click(function(){
						a.css("display","none");
						$('#confirmation-main').css("display","none");
						$.ajax({
							url:"deletetask-ajax.php",
							type:"post",
							data:{
								task_id:id
							}
						})
				})
		})
	})
	$('#create-list').click(function(){
		$('.create-new-list').css("display","block");
		$('.cancel-full').click(function(){
			$('.create-new-list').css("display","none");
		});
		/*$('.save').click(function(){
			var text_create = $('.list-name').val();
			text_create = text_create.trim();
			if(text_create != ""){
				$('#list-scroll').append(`<a href="#" class="list-family">
										<ul class="list-select">
											<li class="family-item">
												<i class="fas fa-list-ul"></i>
												<span class="text media">`+text_create+`</span>
												<span class="number media">1</span>
											</li>
										</ul>
									</a>`);
			}
			$('.list-name').val("");
			$('.create-new-list').css("display","none");
		})*/
	})
	$(window).click(function(event){
		//if(!$(event.target).closest('.list-item').length && !$(event.target).closest('#list-scroll').length && !$(event.target).closest('#user-toolbar').length && !$(event.target).closest('#create-list').length && !$(event.target).closest('.list-toolbar').length && !$(event.target).closest('.title-head').length && !$(event.target).closest('.Task-item').length && !$(event.target).closest('#detail').length && !$(event.target).closest('.content-firm').length && !$(event.target).closest('.new-list').length && !$(event.target).closest('.context-menu').length){
			//$('#detail').hide(100);
		//}
		if(!$(event.target).closest('.user-avatar').length && !$(event.target).closest('.content').length){
			$('.content').hide();
		}
		if(!$(event.target).closest('.popover').length && !$(event.target).closest('.comment').length){
			$('.popover').hide();
		}
		if(!$(event.target).closest('.context-menu').length){
			$('.context-menu').hide();
		}
	})
	$('.input-fake input').keypress(function(event){
		if(event.which == 13){
			var text_comment = $('.input-fake input').val();
			text_comment = text_comment.trim();
			if(text_comment != ""){
				var task_id = $('.taskid').val();
				$.ajax({
					url:"comment-ajax.php",
					type:"post",
					data:{
						task_id:task_id,
						content:text_comment
					}
				})
				$('.comment-list').append(`<li class="comment-item">
											<div class="section-icon picture">
												<img src="p.png">
											</div>
											<div class="section-content">
												<span class="comment-author">Pham Quang</span>
												<span class="comment-time">Comment-time</span>
												<a href="#" class="section-delete">
													<i class="fas fa-backspace"></i>
												</a>
												<div class="comment-text">`+text_comment+`</div>
											</div>	
									   </li>`)
			}
			$('.input-fake input').val("");
		}
	})
	$('.title-head').click(function(){
		$('.Task-item').toggle();
	})
	$('.comment-list').click(function(event){
		comment_del = $(event.target);
		var text_context = $(event.target).parents('.section-content').find('.comment-text').text();
				$('.custom-text').find('h3').text(text_context + ' will be deleted forever.');
		if(event.target.className == "fas fa-backspace"){
			$('#confirmation').css("display","block");
			$('.cancel').click(function(){
				$('#confirmation').css("display","none");
			})
			$('.blue').click(function(){
				comment_del.parents('li').css("display","none");
				console.log(comment_del.parents('li'))
				$('#confirmation').css("display","none");
			})
		}
	})
	$('.search-icon').click(function(){
		$('.search').focus();
	})
	$('.icon-addTask').click(function(){
		$('#input-add').focus();
	})
	$('.account').click(function(){
		$('.content').hide();
		$('#confirmation-account').show();
	})
	$('.cols-20 button').click(function(){
		$('#confirmation-account').hide();
	})
	$('.toggle-icon').click(function(){
		if($(window).width() > 1000){
			$('#lists').toggleClass('lists-none');
			$('#main').toggleClass('main-none');
		}
		else{
			$('#lists').toggleClass('lists-media');
			$('#main').toggleClass('main-media');
		}
	})
	$(window).resize(function(){
		var width = $(window).width();
		if(width < 1000){
			/*$('#lists').removeClass('lists-none');
			$('#main').removeClass('main-none');*/
			$('#lists').removeClass('lists-none');
			$('#main').removeClass('main-none');
		}
		if(width > 1000){
			$('#lists').removeClass('lists-media');
			$('#main').removeClass('main-media');
		}
	})
	$('#datepicker').change(function(){
		var task_id = $('.taskid').val();
		var date = $(this).val();
		console.log(date);
		console.log(task_id);
		$.ajax({
			url:"changedate.php",
			type:"post",
			data:{
				task_id:task_id,
				date:date
			}
		})
	})
	$('#datetimepicker').change(function(){
		var task_id = $('.taskid').val();
		var remind = $(this).val();
		$.ajax({
			url:"changeremind.php",
			type:"post",
			data:{
				task_id:task_id,
				remind:remind
			}
		})
	})
	$('.note').change(function(){
		var task_id = $('.taskid').val();
		var note = $(this).val();
		$.ajax({
			url:"changenote.php",
			type:"post",
			data:{
				task_id:task_id,
				note:note
			}
		})
	})
	$('.gen').click(function(){
		$('.general').css("display","block");
		$('.account-me').css("display","none");
	})
	$('.acc').click(function(){
		$('.account-me').css("display","block");
		$('.general').css("display","none");
	})
	$('.select').change(function(){
		var language = $('.select').val();	
		$.ajax({
			url:"changelanguage.php",
			type:"post",
			dataType:"json",
			data:{
				language:language
			},
			success:function(data){
				console.log(data);
				$('.tab-share span').html(data.share);
				$('.tab-sort span').html(data.sort);
				$('.tab-more span').html(data.more);
				$('.inbox-item .text').html(data.inbox);
				$('.list-toolbar h1').html(data.inbox);
				$('.add-list span').html(data.creatlist);
				$('.title-head span').html(data.showcompletetodo);
				$('#input-add').attr("placeholder",data.addtodo);
			}

		})
	})
	$('.changepass').click(function(){
		$('.change-password').show();
		$('.changepass').css({"font-weight":"normal","text-align":"left"});
		$('.changepass').attr("placeholder","Current Password");
	})
	$('.cancel-pass').click(function(){
		$('.change-password').hide();
		$('.changepass').css({"font-weight":"bold","text-align":"center"});
		$('.changepass').attr("placeholder","Change Password");
	})
	$('.save-pass').click(function(){
		$('.change-password').hide();
		$('.changepass').css({"font-weight":"bold","text-align":"center"});
		$('.changepass').attr("placeholder","Change Password");
		var current_pass = $('.changepass').val();
		var new_pass = $('.new-pass').val();
		var repeat_pass = $('.repeat-pass').val();
		$.ajax({
			url:"changepass.php",
			type:"post",
			data:{
				current_pass:current_pass,
				new_pass:new_pass,
				repeat_pass:repeat_pass
			},
			success:function(data){
				alert(data);
			}
		})
		$('.changepass').val("");
	})
	$('.search').keyup(function(){
		$('.list-item').hide();
		$('.addTask').hide();
		$('.heading').hide();
		$('.Task-item').hide();
		var search = $('.search').val();
		$('.item-search').css("display","block");
		$.ajax({
			url:"searchtask.php",
			type:"post",
			dataType:"json",
			data:{
				search:search
			},
			success:function(data){
				console.log(data);
				if(data == ""){
					$('.item-search').html("");
				}
				var html="";
				data.forEach(function(result){
					html += `<h2 class="heading-search">
								<a href="">`+result.namelists+`</a>
							</h2>
				<div class="task-search">
					<ul class="Task-list item-list">
						<li class="Task-list-select">
						<input type="text" class="idtask" value="`+result.id+`" style="display:none">
							<a class="select-item-icon">
								<i class="far fa-square icon"></i>
							</a>
							<span>`+result.name+`</span>
							<i class="far fa-star"></i>
						</li>
					</ul>
				</div>`;
				//$('.heading-search a').html(result.lis_id);
				$('.item-search').html(html);
				})
			}
		})
		if(search == ""){
			$('.item-search').html("");
		}
	})
})