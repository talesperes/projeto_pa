<div id="messages">
</div>
<input type="text" id="msg"><button id="sendMsg">Enviar</button>
<script type="text/javascript">

	$('#msg').on('keypress', function (e) {
         if(e.which === 13){
            $("#sendMsg").click();
         }
   	});

	function loadMessages() {
		$.ajax({ 
	        url: '<?=site_url('chat/getMessages/12')?>', 
	        success: function(data) { 
				$("#messages").html('');
	        	data = $.parseJSON(data);
	        	var id_usuario = '<?=$this->session->userdata('id')?>';

		        $.each( data, function( key, value ) {
		        	if(value.fk_c_usuario == id_usuario)
						$("<p style='text-align: right'>"+value.mensagem+"</p>").appendTo("#messages");
					else
						$("<p>"+value.mensagem+"</p>").appendTo("#messages");
				});

	        } 
	    });
	}

	loadMessages();
	setInterval(loadMessages, 4000);

	$("#sendMsg").click(function() {

		var msg = $("#msg");

		if(msg.val()) {

			var sendData = {};
			sendData.msg = msg.val();

			$("<p style='text-align: right'>"+msg.val()+"</p>").appendTo("#messages");

			$.ajax({
		    	type:"POST",
		        cache:false,
		        url:"<?=site_url('chat/insertMessage/12')?>",
		        data: sendData,
		        success: function () {
		        	loadMessages();
		        },
		        error: function (error) {
		        	console.log(error);
			    }
		   	});
			msg.val('');
		}

	})
</script>