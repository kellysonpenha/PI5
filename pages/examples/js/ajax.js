<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  }); 
  
var elemEnviar = document.getElementById("enviar");
elemEnviar.onclick = function(){
	var url="returnLogin.php";
	var request = new XMLHttpRequest();	
	request.onload = function(){	
		if(this.status == 200){													
				this.response == "false" ? document.getElementById("erro").style="block" : location = "sessao.php";			
			}
		}
		
	request.open("POST", url);
	request.withCredentials = true;
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	request.send("login=" + document.getElementById("login").value + "&senha=" + document.getElementById("senha").value); 	
}
</script>