 var k=0;
 var link=null;

class AuthorizationScene extends Phaser.Scene {
    constructor() {
        super({key: 'authorization'});
        link=this; 
    this.del_all = function(){
        document.getElementById("l_press").remove();
        document.getElementById("l_head").remove();
        document.getElementById("lb_logg").remove();
        document.getElementById("logg").remove();
        document.getElementById("l_pass1").remove();
        document.getElementById("passw1").remove();
        if (k%2!=0){
            document.getElementById("sign_up").remove();
            document.getElementById("l_pass2").remove();
            document.getElementById("passw2").remove();
        }
        else document.getElementById("log_in").remove();
        k=0;
    }     
    this.show_login = function(){
        this.lb_press.innerHTML="Press SPACE to registrate";
        this.lb_head.innerHTML = "l o g i n";
        this.lb_head.style.left = 580+"px";
        document.body.appendChild(this.lb_press);
        document.body.appendChild(this.lb_head);
        document.body.appendChild(this.login);
        document.body.appendChild(this.lb_log); 
        document.body.appendChild(this.pass1);
        document.body.appendChild(this.lb_pass1);
        document.body.appendChild(this.log_in);
   //     document.body.appendChild(this.us_name);
        if(k>0){
        document.getElementById("l_pass2").remove();
        document.getElementById("passw2").remove();
        document.getElementById("sign_up").remove();
        }
    }
    this.show_reg = function(){
        this.lb_press.innerHTML="Press SPACE to log in";
        this.lb_head.innerHTML = "r e g i s t r a t i o n";
        this.lb_head.style.left = 630+"px";
        document.body.appendChild(this.pass2);
        document.body.appendChild(this.lb_pass2);
        document.body.appendChild(this.sign_up);
        document.getElementById("log_in").remove();
    }
    this.del_login = function(){
        document.getElementById("l_press").remove();
        document.getElementById("l_head").remove();
        document.getElementById("lb_logg").remove();
        document.getElementById("logg").remove();
        document.getElementById("l_pass1").remove();
        document.getElementById("passw1").remove();
        document.getElementById("log_in").remove();
    //    if((k>0)&&(k%2==0))document.getElementById("sign_up").remove();
    } 

    }
    preload() {
    }
    create() {
        this.key_reg = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.SPACE);
        this.key_esc = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.ESC);
        
        this.lb_press=document.createElement('Label');
        this.lb_press.style.font = "40px Verdana";
        this.lb_press.style.left = 450+'px';
        this.lb_press.style.top = 30+'px';
        $(this.lb_press).attr({'id':'l_press'}); 
        this.lb_press.innerHTML="Press SPACE to registrate";

        //header
        this.lb_head=document.createElement('Label');
        this.lb_head.style.font = "40px Impact";
        this.lb_head.style.left = 630+'px';
        this.lb_head.style.top = 90+'px';
        $(this.lb_head).attr({'id':'l_head'}); 
        this.lb_head.innerHTML="l o g  i n";
        //login
        this.lb_log=document.createElement('Label');
        this.lb_log.style.left = 500+'px';
        this.lb_log.style.top = 200+'px';
        $(this.lb_log).attr({'id':'lb_logg'}); 
        this.lb_log.innerHTML="login";

    	this.login=document.createElement('input');
		this.login.style.left = 700+'px';
		this.login.style.top = 200+'px';
		$(this.login).attr({'id':'logg'});
        //password 1
        this.lb_pass1=document.createElement('Label');
        this.lb_pass1.style.left = 500+'px';
        this.lb_pass1.style.top = 300+'px';
        $(this.lb_pass1).attr({'id':'l_pass1'}); 
        this.lb_pass1.innerHTML="password";

		this.pass1=document.createElement('input');
		this.pass1.style.left = 700+'px';
		this.pass1.style.top = 300+'px';
		$(this.pass1).attr({'id':'passw1'});
		$(this.pass1).attr({'type':'password'});

        //password 2
        this.lb_pass2=document.createElement('Label');
        this.lb_pass2.style.left = 500+'px';
        this.lb_pass2.style.top = 400+'px';
        $(this.lb_pass2).attr({'id':'l_pass2'}); 
        this.lb_pass2.innerHTML="repeat password";

        this.pass2=document.createElement('input');
        this.pass2.style.left = 700+'px';
        this.pass2.style.top = 400+'px';
        $(this.pass2).attr({'id':'passw2'});
        $(this.pass2).attr({'type':'password'});

		this.log_in=document.createElement('button');
		this.log_in.innerHTML=" l o g   i n ";
		this.log_in.style.left = 600+'px';
		this.log_in.style.top = 500+'px';
		$(this.log_in).attr({'id':'log_in'});

        this.sign_up=document.createElement('button');
        this.sign_up.innerHTML=" s i g n   u p ";
        this.sign_up.style.left = 600+'px';
        this.sign_up.style.top = 500+'px';
        $(this.sign_up).attr({'id':'sign_up'});

        this.show_login();
    }
    update(){
        link=this;
        if(k%2==0){
    	log_in.onclick = function(){
    		$(document).ready(function(){
    			var _login = $('#logg').val();
    			var _passw = $('#passw1').val();
    			var _data = '_login='+_login+'&_passw='+_passw;
    //			console.log(_data);

    			$.ajax({
    				type: "POST",
    				url:"php/login.php",
    				data: _data,
    				success: function(output){
                      if(output!="blablaflapp")
                        {
                      //      link.us_name.innerHTML=_login;
                            add_user(output,_login);
                            link.del_all();
                  //          alert(output);
                            link.scene.start('user');
                        }
    				}
    			});
    		});	
        }}
        else {
        sign_up.onclick = function(){

            $(document).ready(function(){
    if(($('#passw1').val() != "") && ($('#passw2').val()!="") && ($('#logg').val()!="")){  
                var ps1 = $('#passw1').val();
                var ps2 = $('#passw2').val();
                if(ps1==ps2){
                var _login = $('#logg').val();
                var _password = ps1;
                var _data = '_login='+_login+'&_password='+_password;
        //        console.log(_data);

                $.ajax({
                    type: "POST",
                    url:"php/signup.php",
                    data: _data,
                    success: function(output){
              //       alert(output);    
       //         console.log(link);
                     if(output=="vse horosho"){
                     k++;
                     console.log(k);
                     link.show_login();
                  }
                        }
                    });
                }
                else 
                    {
                        alert("passwords are different");
                        document.getElementById('passw1').value="";
                        document.getElementById('passw2').value="";
                    }
                }
                else alert("no empty fields, pls");
            }); 
        }    
    }
    if (this.key_esc.isDown) {
        this.del_all();
        this.scene.start('menu');
        console.log('key_esc');
        this.key_esc.isDown = false;
        console.log(k);
    }

    if (this.key_reg.isDown) {
        k++;
        if(k%2!=0){
            this.show_reg();
            console.log(k+" reg");
        }
        else {
            this.show_login();
            console.log(k+" log");
        }
        this.key_reg.isDown = false;
     }
	}; 
}